<?php

namespace Drupal\qrcode;

use Drupal\Core\Config\ImmutableConfig;
use Drupal\Core\Url;
use Drupal\file\Entity\File;
use Drupal\Core\Entity\ContentEntityInterface;
use Drupal\Core\Entity\EntityChangedInterface;
use Drupal\Core\Entity\EntityPublishedInterface;
use Drupal\Core\Entity\EntityStorageInterface;
use Drupal\user\EntityOwnerInterface;

/**
 * The qrcode entity interface.
 */
interface QRCodeInterface extends ContentEntityInterface, EntityChangedInterface, EntityOwnerInterface, EntityPublishedInterface {

  /**
   * {@inheritdoc}
   */
  public function postSave(EntityStorageInterface $storage, $update = TRUE);

  /**
   * File Setter.
   *
   * @param \Drupal\file\Entity\File $file
   *   The file entity.
   */
  public function setFile(File $file);

  /**
   * Helper to get the file uri.
   *
   * @return string
   *   The file uri.
   *
   * @throws \Drupal\Core\TypedData\Exception\MissingDataException
   */
  public function getFileUri(): string;

  /**
   * Sets the qrcode created datetime.
   *
   * @param int $datetime
   *   The qrcode created datetime.
   */
  public function setCreated($datetime);

  /**
   * Gets the qrcode created datetime.
   *
   * @return int
   *   The qrcode created datetime.
   */
  public function getCreated(): int;

  /**
   * Gets the current qrcode entity hash.
   *
   * @return string
   *   The hash.
   */
  public function getHash(): string;

  /**
   * Gets the current qrcode entity title.
   *
   * @return string
   *   The title.
   */
  public function getTitle(): string;

  /**
   * Gets the current qrcode entity target.
   *
   * @return array
   *   The target link value.
   */
  public function getTarget(): array;

  /**
   * Helper to get target url.
   *
   * @return \Drupal\Core\Url
   *   The url of the target link.
   */
  public function getTargetUrl(): Url;

  /**
   * Increases the hit count.
   *
   * @throws \Drupal\Core\Entity\EntityStorageException
   * @throws \Drupal\Core\TypedData\Exception\MissingDataException
   */
  public function countHit();

  /**
   * Gets the use_direct_link field value.
   *
   * @return bool
   *   Boolean which shows if the qrcode uses direct link feature.
   */
  public function usesDirectLink(): bool;

  /**
   * Gets the settings for the qrcode module.
   *
   * @return \Drupal\Core\Config\ImmutableConfig
   *   The settings.
   */
  public function getSettings(): ImmutableConfig;

  /**
   * Gets the setting if direct link is enabled.
   *
   * @return bool
   *   Indicator if direct linking is enabled.
   */
  public function getIsDirectLinkEnabled(): bool;

  /**
   * Gets the setting of thumbnail directory.
   *
   * @return string
   *   The thumbnails directory.
   */
  public function getThumbnailsDirectory(): string;

}
