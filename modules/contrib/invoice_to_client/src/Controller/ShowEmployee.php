<?php

namespace Drupal\invoice_to_client\Controller;

use Drupal\Component\Render\FormattableMarkup;
use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Database\Connection;
use Drupal\Core\Link;
use Drupal\Core\Render\Markup;
use Drupal\Core\Render\RendererInterface;
use Drupal\Core\Url;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Class Display.
 *
 * @package Drupal\invoice_to_client\Controller
 */
class ShowEmployee extends ControllerBase {

  /**
   * The database connection.
   *
   * @var \Drupal\Core\Database\Connection
   */
  protected $database;

  /**
   * The renderer service.
   *
   * @var \Drupal\Core\Render\RendererInterface
   */
  protected $renderer;

  /**
   * ShowEmployee constructor.
   *
   * @param \Drupal\Core\Database\Connection $database
   *   The database connection service.
   * @param \Drupal\Core\Render\RendererInterface $renderer
   *   The renderer service.
   */
  public function __construct(Connection $database, RendererInterface $renderer) {
    $this->database = $database;
    $this->renderer = $renderer;
  }

  /**
   * {@inheritdoc}
   *
   * Factory method to create an instance of the ShowEmployee class.
   *
   * class with the required services and dependencies injected.
   *
   * @param \Symfony\Component\DependencyInjection\ContainerInterface $container
   *   The container that holds the application services.
   *
   * @return static
   *   A new instance of the ShowEmployee class.
   */
  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('database'),
      $container->get('renderer')
    );
  }

  /**
   * Showdata.
   *
   * @return string
   *   Return Table format data.
   */
  public function showdata() {
    $build['#attached']['library'][] = 'invoice_to_client/invoice_to_client';
    $sql = $this->database->select('employee_table', 't');
    $sql->fields('t');
    $result = $sql->execute()->fetchAll();
    if ($result == NULL) {
      $table = [
        '#markup' => Markup::create("<div class = 'message'>No records found.</div>"),
      ];
    }
    else {
      foreach ($result as $row) {
        $emp_id = $row->emp_id;
        if ($emp_id == NULL) {
          $get_emp_id = 'None';
        }
        else {
          $get_emp_id = $emp_id;
        }
        $url_edit = Url::fromRoute('edit_employee_form', ['sr_id' => $row->id]);
        $linkEdit = Link::FromTextAndUrl('Edit', $url_edit);
        $delete = new FormattableMarkup('<a href = "javascript:void(0);" class = "delete-emp " data-id = "' . $row->id . '">Delete</a>', []);
        $linkDelete = t('@deletelink', ['@deletelink' => $delete]);
        $rows[] = [
          'data' => [
            'sr_id' => $row->id,
            'emp_name' => $row->employee_name,
            'emp_id' => $get_emp_id,
            'edit' => $linkEdit,
            'delete' => $linkDelete,
          ],
        ];
      }
      // Create the header.
      $header = [
        'id' => t('Sr. Id'),
        'emp_name' => t('Employee Name'),
        'emp_id' => t('Employee Id'),
        'edit' => t('Edit'),
        'delete' => t('Delete'),
      ];
      $build['table'] = [
        '#type' => 'table',
        '#header' => $header,
        '#rows' => $rows,
        '#attributes' => [
          'class' => ['table'],
        ],
      ];
      $output = $this->renderer->render($build);
      $table = [
        '#markup' => Markup::create($output),
      ];
    }
    return $table;
  }

}
