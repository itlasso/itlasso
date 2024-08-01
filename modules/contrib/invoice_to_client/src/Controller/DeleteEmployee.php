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
class DeleteEmployee extends ControllerBase {

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
   * Factory method to create an instance of the DeleteEmployee class.
   *
   * class with the required services and dependencies injected.
   *
   * @param \Symfony\Component\DependencyInjection\ContainerInterface $container
   *   The container that holds the application services.
   *
   * @return static
   *   A new instance of the DeleteEmployee class.
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
    $emp_id = $_GET['id'];
    $delete = $this->database->delete('employee_table');
    $delete->condition('id', $value = $emp_id, $operator = '=');
    $result = $delete->execute();
    $response = new RedirectResponse(Url::fromRoute('show_employee')->toString());
    return $response;
  }

}
