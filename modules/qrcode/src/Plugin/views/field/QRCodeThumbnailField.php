<?php

namespace Drupal\qrcode\Plugin\views\field;

use Drupal\Core\File\FileUrlGenerator;
use Drupal\views\Plugin\views\field\FieldPluginBase;
use Drupal\views\ResultRow;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Provides a view field for the thumbnail of a qrcode.
 *
 * @ViewsField("qrcode_thumbnail")
 */
class QRCodeThumbnailField extends FieldPluginBase {

  /**
   * The file url generator.
   *
   * @var \Drupal\Core\File\FileUrlGenerator
   */
  private FileUrlGenerator $fileUrlGenerator;

  /**
   * Constructs a Country object.
   *
   * @param array $configuration
   *   A configuration array containing information about the plugin instance.
   * @param string $plugin_id
   *   The id of the plugin instance.
   * @param mixed $plugin_definition
   *   The plugin implementation definition.
   * @param \Drupal\Core\File\FileUrlGenerator $fileUrlGenerator
   *   The file url generator.
   */
  public function __construct(array $configuration, $plugin_id, $plugin_definition, FileUrlGenerator $fileUrlGenerator) {
    parent::__construct($configuration, $plugin_id, $plugin_definition);

    $this->fileUrlGenerator = $fileUrlGenerator;
  }

  /**
   * {@inheritdoc}
   */
  public function usesGroupBy(): bool {
    return FALSE;
  }

  /**
   * {@inheritdoc}
   */
  public function query() {
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_definition): QRCodeThumbnailField {
    return new static(
      $configuration,
      $plugin_id,
      $plugin_definition,
      $container->get('file_url_generator')
    );
  }

  /**
   * The field renderer.
   */
  public function render(ResultRow $values): array {
    /** @var \Drupal\qrcode\Entity\QRCode $entity */
    $entity = $this->getEntity($values);
    $fileUrl = $this->fileUrlGenerator->generateString($entity->getFileUri());

    return [
      '#type' => 'inline_template',
      '#template' => '<img src="' . $fileUrl . '" width="150px" height="150px" />',
    ];
  }

}
