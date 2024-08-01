<?php

namespace Drupal\qrcode;

use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Database\Connection;
use Drupal\Core\Entity\EntityTypeManagerInterface;

/**
 * The QRCodeRepository for qrcode entities.
 */
class QRCodeRepository {

  /**
   * The manager.
   *
   * @var \Drupal\Core\Entity\EntityTypeManagerInterface
   *   The entity type manager.
   */
  protected EntityTypeManagerInterface $manager;

  /**
   * The DB Connection.
   *
   * @var \Drupal\Core\Database\Connection
   *   The db connection.
   */
  protected Connection $connection;

  /**
   * Constructs a \Drupal\qrcode\QRCodeRepository object.
   *
   * @param \Drupal\Core\Entity\EntityTypeManagerInterface $manager
   *   The entity type manager.
   * @param \Drupal\Core\Database\Connection $connection
   *   The database connection.
   */
  public function __construct(
    EntityTypeManagerInterface $manager,
  Connection $connection
  ) {
    $this->manager = $manager;
    $this->connection = $connection;
  }

  /**
   * Load qrcode entity by id.
   *
   * @param int $qrcode_id
   *   The qrcode id.
   *
   * @return \Drupal\Core\Entity\EntityInterface|null
   *   The qrcode entity.
   *
   * @throws \Drupal\Component\Plugin\Exception\InvalidPluginDefinitionException
   * @throws \Drupal\Component\Plugin\Exception\PluginNotFoundException
   */
  public function load(int $qrcode_id): ?EntityInterface {
    return $this->manager->getStorage('qrcode')->load($qrcode_id);
  }

  /**
   * Loads multiple qrcode entities.
   *
   * @param array|null $qrcode_ids
   *   QRCode ids to load.
   *
   * @return \Drupal\Core\Entity\EntityInterface[]
   *   List of qrcode entities.
   *
   * @throws \Drupal\Component\Plugin\Exception\InvalidPluginDefinitionException
   * @throws \Drupal\Component\Plugin\Exception\PluginNotFoundException
   */
  public function loadMultiple(array $qrcode_ids = NULL): array {
    return $this->manager->getStorage('qrcode')->loadMultiple($qrcode_ids);
  }

  /**
   * Finds the matching qrcode for a hash.
   *
   * @param string $hash
   *   The hash of the qrcode entity.
   *
   * @return \Drupal\Core\Entity\EntityInterface|null
   *   The qrcode entity.
   *
   * @throws \Drupal\Component\Plugin\Exception\InvalidPluginDefinitionException
   * @throws \Drupal\Component\Plugin\Exception\PluginNotFoundException
   */
  public function findMatchingQrCode(string $hash): ?EntityInterface {
    $qid = $this->connection->query(
      'SELECT qid FROM {qrcode} WHERE hash = :hash', [':hash' => $hash]
    )->fetchField();

    if (!empty($qid)) {
      return $this->load($qid);
    }

    return NULL;
  }

}
