<?php

namespace Drupal\qrcode\Entity;

use chillerlan\QRCode\QRCode as PHPQRCode;
use chillerlan\QRCode\QROptions;
use Drupal\Component\Utility\Crypt;
use Drupal\Component\Utility\Random;
use Drupal\Core\Config\ImmutableConfig;
use Drupal\Core\Entity\ContentEntityBase;
use Drupal\Core\Entity\EntityChangedTrait;
use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Entity\EntityPublishedTrait;
use Drupal\Core\Entity\EntityStorageInterface;
use Drupal\Core\Entity\EntityTypeInterface;
use Drupal\Core\Field\BaseFieldDefinition;
use Drupal\Core\File\FileSystemInterface;
use Drupal\Core\Url;
use Drupal\file\Entity\File;
use Drupal\link\LinkItemInterface;
use Drupal\qrcode\QRCodeInterface;
use Drupal\user\EntityOwnerTrait;

/**
 * The qrcode entity class.
 *
 * @ContentEntityType(
 *   id = "qrcode",
 *   label = @Translation("QRCode"),
 *   bundle_label = @Translation("QRCode type"),
 *   handlers = {
 *     "list_builder" = "Drupal\Core\Entity\EntityListBuilder",
 *     "view_builder" = "Drupal\Core\Entity\EntityViewBuilder",
 *     "form" = {
 *       "default" = "Drupal\qrcode\Form\QRCodeForm",
 *       "delete" = "Drupal\qrcode\Form\QRCodeDeleteForm",
 *       "edit" = "Drupal\qrcode\Form\QRCodeForm"
 *     },
 *     "views_data" = "Drupal\qrcode\QRCodeViewsData",
 *     "storage_schema" = "\Drupal\qrcode\QRCodeStorageSchema"
 *   },
 *   base_table = "qrcode",
 *   translatable = FALSE,
 *   admin_permission = "administer qrcodes",
 *   entity_keys = {
 *     "id" = "qid",
 *     "label" = "title",
 *     "uuid" = "uuid",
 *     "bundle" = "type",
 *     "published" = "status",
 *     "owner" = "uid"
 *   },
 *   links = {
 *     "canonical" = "/admin/config/services/qrcode/{qrcode}",
 *     "delete-form" = "/admin/config/services/qrcode/delete/{qrcode}",
 *     "edit-form" = "/admin/config/services/qrcode/edit/{qrcode}",
 *   }
 * )
 */
class QRCode extends ContentEntityBase implements QRCodeInterface {

  use EntityOwnerTrait;
  use EntityChangedTrait;
  use EntityPublishedTrait;

  /**
   * Generates a unique hash for identification purposes.
   *
   * @return string
   *   Base 64 hash.
   */
  public static function generateHash(): string {
    $random = new Random();
    return Crypt::hashBase64($random->string(256));
  }

  /**
   * Create the qrcode and add a svg file.
   *
   * @return \Drupal\Core\Entity\EntityInterface
   *   The file entity.
   *
   * @throws \Drupal\Core\Entity\EntityStorageException
   */
  protected function createQrCode(): EntityInterface {
    $qrcodeOptions = new QROptions([
      'outputType' => PHPQRCode::OUTPUT_MARKUP_SVG,
      'imageBase64' => FALSE,
    ]);
    $qrcode = new PHPQRCode($qrcodeOptions);
    $hash = $this->getHash();

    $url = !$this->usesDirectLink() ? Url::fromUserInput('/qrcode/' . $hash) : $this->getTargetUrl();
    $url->setAbsolute();

    /** @var \Drupal\Core\File\FileSystemInterface $fileSystem */
    $fileSystem = \Drupal::service('file_system');
    $dir = $this->getThumbnailsDirectory();
    $fileSystem->prepareDirectory($dir, FileSystemInterface::EXISTS_REPLACE);

    $filePath = $dir . '/' . $hash . '.svg';
    $qrcodeRenderResult = $qrcode->render($url->toString());

    $file = File::create([
      'filename' => $hash,
      'uri' => $filePath,
      'status' => 1,
      'uid' => 1,
    ]);
    $file->save();

    /** @var \Drupal\file\FileUsage\FileUsageBase $file_usage */
    $file_usage = \Drupal::service('file.usage');
    $file_usage->add($file, 'qrcode', $this->getEntityTypeId(), $this->id());

    /** @var \Drupal\file\FileRepositoryInterface $fileRepository */
    $fileRepository = \Drupal::service('file.repository');
    $fileRepository->writeData($qrcodeRenderResult, $filePath, FileSystemInterface::EXISTS_REPLACE);

    return $file;
  }

  /**
   * {@inheritdoc}
   */
  public static function preCreate(EntityStorageInterface $storage, array &$values) {
    $values += [
      'type' => 'qrcode',
      'hash' => QRCode::generateHash(),
      'hits' => 0,
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function postSave(EntityStorageInterface $storage, $update = TRUE) {
    if (!$update) {
      $file = $this->createQRCode();
      $this->set('file', ['target_id' => $file->id()]);
      $this->save();
    }
  }

  /**
   * {@inheritdoc}
   */
  public function preSave(EntityStorageInterface $storage) {
    // Always publish if using direct link.
    if ($this->usesDirectLink()) {
      $this->setPublished();
    }
  }

  /**
   * {@inheritdoc}
   */
  public function setFile(File $file) {
    $this->set('file', $file);
  }

  /**
   * {@inheritdoc}
   */
  public function getFileUri(): string {
    $fileData = $this->get('file')->first()->getValue();
    $file = File::load($fileData['target_id']);
    return $file->getFileUri();
  }

  /**
   * {@inheritdoc}
   */
  public function setCreated($datetime) {
    $this->set('created', $datetime);
  }

  /**
   * {@inheritdoc}
   */
  public function getCreated(): int {
    return $this->get('created')->value;
  }

  /**
   * {@inheritdoc}
   */
  public function getHash(): string {
    return $this->get('hash')->value;
  }

  /**
   * {@inheritdoc}
   */
  public function getTitle(): string {
    return $this->get('title')->value;
  }

  /**
   * {@inheritdoc}
   */
  public function getTarget(): array {
    return $this->get('target')->first()->getValue();
  }

  /**
   * {@inheritdoc}
   */
  public function getTargetUrl(): Url {
    $uri = $this->getTarget()['uri'];

    return Url::fromUri($uri);
  }

  /**
   * {@inheritdoc}
   */
  public static function baseFieldDefinitions(EntityTypeInterface $entity_type) {
    $fields['qid'] = BaseFieldDefinition::create('integer')
      ->setLabel(t('QRCode ID'))
      ->setDescription(t('The QRCode ID.'))
      ->setReadOnly(TRUE);

    $fields['uuid'] = BaseFieldDefinition::create('uuid')
      ->setLabel(t('UUID'))
      ->setDescription(t('The record UUID.'))
      ->setReadOnly(TRUE);

    $fields['title'] = BaseFieldDefinition::create('string')
      ->setLabel(t('Title'))
      ->setDescription(t('The qrcode title.'))
      ->setDisplayOptions('form', [
        'type' => 'text',
        'weight' => -4,
      ]);

    $fields += static::publishedBaseFieldDefinitions($entity_type);
    $fields += static::ownerBaseFieldDefinitions($entity_type);

    $fields['hash'] = BaseFieldDefinition::create('string')
      ->setLabel(t('Hash'))
      ->setSetting('max_length', 64)
      ->setDescription(t('The qrcode hash.'));

    $fields['type'] = BaseFieldDefinition::create('string')
      ->setLabel(t('Type'))
      ->setDescription(t('The qrcode type.'));

    $fields['target'] = BaseFieldDefinition::create('link')
      ->setLabel(t('Link'))
      ->setRequired(TRUE)
      ->setTranslatable(FALSE)
      ->setSettings([
        'link_type' => LinkItemInterface::LINK_GENERIC,
        'title' => DRUPAL_DISABLED,
      ])
      ->setDisplayOptions('form', [
        'type' => 'link',
        'weight' => -4,
      ])
      ->setDisplayConfigurable('form', TRUE);

    $fields['file'] = BaseFieldDefinition::create('file')
      ->setLabel(t('File'))
      ->setSettings([
        'uri_scheme' => 'public',
        'file_directory' => 'qrcodes',
        'file_extensions' => 'svg',
      ])
      ->setTranslatable(FALSE);

    $fields['hits'] = BaseFieldDefinition::create('integer')
      ->setLabel(t('QRCode Hits'))
      ->setDescription(t('Count how often the qrcode has been scanned.'));

    $fields['use_direct_link'] = BaseFieldDefinition::create('boolean')
      ->setLabel(t('Enable direct link'))
      ->setDefaultValue(FALSE)
      ->setDescription(t('This will directly link to the entered url but will disable the ability to edit the qrcode link after generation and will also skip counting hits.'))
      ->setDisplayOptions('form', [
        'type' => 'checkbox',
        'weight' => -2,
      ]);

    $fields['created'] = BaseFieldDefinition::create('created')
      ->setLabel(t('Created'))
      ->setDescription(t('The date when the qrcode was created.'));

    $fields['changed'] = BaseFieldDefinition::create('changed')
      ->setLabel(t('Changed'))
      ->setDescription(t('The time that the qrcode was last edited.'))
      ->setTranslatable(TRUE);

    $fields['status']->setDisplayOptions('form', [
      'type' => 'checkbox',
      'weight' => -1,
    ])
      ->setDisplayConfigurable('form', TRUE);

    return $fields;
  }

  /**
   * {@inheritdoc}
   */
  public function countHit() {
    $hits = $this->get('hits')->first()->getValue();

    $this->set('hits', intval($hits['value']) + 1);
    $this->save();
  }

  /**
   * {@inheritdoc}
   */
  public function usesDirectLink(): bool {
    return $this->get('use_direct_link')->value;
  }

  /**
   * {@inheritdoc}
   */
  public function getSettings(): ImmutableConfig {
    return \Drupal::config('qrcode.settings');
  }

  /**
   * {@inheritdoc}
   */
  public function getIsDirectLinkEnabled(): bool {
    return $this->getSettings()->get('enable_direct_urls');
  }

  /**
   * {@inheritdoc}
   */
  public function getThumbnailsDirectory(): string {
    return $this->getSettings()->get('thumbnails_directory');
  }

}
