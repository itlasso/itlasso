<?php

namespace Drupal\invoice_to_client\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Database\Connection;
use Drupal\Core\Url;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;

/**
 * Class Display.
 *
 * @package Drupal\invoice_to_client\Controller
 */
class DeleteAllocation extends ControllerBase {

  /**
   * The database connection.
   *
   * @var \Drupal\Core\Database\Connection
   */
  protected $database;

  /**
   * DeleteEmployee constructor.
   *
   * @param \Drupal\Core\Database\Connection $database
   *   The database connection service.
   */
  public function __construct(Connection $database) {
    $this->database = $database;
  }

  /**
   * {@inheritdoc}
   *
   * Factory method to create an instance of the DeleteAllocation class.
   *
   * class with the required services and dependencies injected.
   *
   * @param \Symfony\Component\DependencyInjection\ContainerInterface $container
   *   The container that holds the application services.
   *
   * @return static
   *   A new instance of the DeleteAllocation class.
   */
  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('database'),
    );
  }

  /**
   * Delete data.
   *
   * @return string
   *   Return Table format data.
   */
  public function delete() {
    $allocation_id = $_GET['delete_id'];
    $client_id = $_GET['sr_id'];
    $delete = $this->database->delete('allocation_table');
    $delete->condition('id', $value = $allocation_id, $operator = '=');
    $result = $delete->execute();
    $response = new RedirectResponse(Url::fromRoute('employees_table_display', ['sr_id' => $client_id], [])->toString());
    return $response;
  }

}
