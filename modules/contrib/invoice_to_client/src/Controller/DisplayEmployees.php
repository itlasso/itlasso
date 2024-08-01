<?php

namespace Drupal\invoice_to_client\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Database\Connection;
use Drupal\Core\Form\FormBuilderInterface;
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
class DisplayEmployees extends ControllerBase {

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
   * The FormBuilderInterface service.
   *
   * @var \Drupal\Core\Form\FormBuilderInterface
   */
  protected $formBuilder;

  /**
   * ShowEmployee constructor.
   *
   * @param \Drupal\Core\Database\Connection $database
   *   The database connection service.
   * @param \Drupal\Core\Render\RendererInterface $renderer
   *   The renderer service.
   * @param \Drupal\Core\Form\FormBuilderInterface $formBuilder
   *   The FormBuilderInterface service.
   */
  public function __construct(Connection $database, RendererInterface $renderer, FormBuilderInterface $formBuilder) {
    $this->database = $database;
    $this->renderer = $renderer;
    $this->formBuilder = $formBuilder;
  }

  /**
   * {@inheritdoc}
   *
   * Factory method to create an instance of the DisplayEmployee class.
   *
   * class with the required services and dependencies injected.
   *
   * @param \Symfony\Component\DependencyInjection\ContainerInterface $container
   *   The container that holds the application services.
   *
   * @return static
   *   A new instance of the DisplayEmployee class.
   */
  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('database'),
      $container->get('renderer'),
      $container->get('form_builder')
    );
  }

  /**
   * Show data.
   *
   * @return string
   *   Return Table format data.
   */
  public function showdata() {
    $build['#attached']['library'][] = 'invoice_to_client/invoice_to_client';
    $client_id = $_REQUEST['sr_id'];
    $form = $this->formBuilder->getForm('Drupal\invoice_to_client\Form\SelectForm');
    $renderForm = $this->renderer->render($form);
    $form_output = [
      '#markup' => Markup::create($renderForm),
    ];
    $result = "";
    $select = $this->database->select('allocation_table ', 'a');
    $select->addJoin('inner', 'employee_table', 'e', 'a.emp_serial_id = e.id');
    $select->addJoin('inner', 'client_table', 'c', 'a.client_serial_id = c.id');
    $select->addField('e', 'employee_name');
    $select->addField('e', 'emp_id');
    $select->addField('c', 'client_name');
    $select->addField('a', 'price');
    $select->addField('a', 'id');
    $select->condition('client_serial_id', $value = $client_id, $operator = '=');
    $result = $select->execute()->fetchAll();
    if ($result != NULL) {
      $rows = [];
      foreach ($result as $row) {
        $price = $row->price;
        if ($price == NULL) {
          $price = 'Hour based';
          $emp_id = $row->emp_id;
          if ($emp_id == NULL) {
            $get_emp_id = 'No';
          }
          else {
            $get_emp_id = $emp_id;
          }
          $url_edit = Url::fromRoute('editAllocation_form', ['edit_id' => $row->id], []);
          $linkEdit = Link::FromTextAndUrl('Edit', $url_edit);
          $url_delete = Url::fromRoute('delete_allocation', ['delete_id' => $row->id, 'sr_id' => $client_id], []);
          $linkDelete = Link::FromTextAndUrl('Delete', $url_delete);
          $rows[] = [
            'data' => [
              'emp_name' => $row->employee_name,
              'emp_id' => $get_emp_id,
              'client' => $row->client_name,
              'price' => $price,
              'edit' => $linkEdit,
              'delete' => $linkDelete,
            ],
          ];
        }
        else {
          $emp_id = $row->emp_id;
          if ($emp_id == NULL) {
            $get_emp_id = 'No';
          }
          else {
            $get_emp_id = $emp_id;
          }
          $url_edit = Url::fromRoute('editAllocation_form', ['edit_id' => $row->id], []);
          $linkEdit = Link::FromTextAndUrl('Edit', $url_edit);
          $url_delete = Url::fromRoute('delete_allocation', ['delete_id' => $row->id, 'sr_id' => $client_id], []);
          $linkDelete = Link::FromTextAndUrl('Delete', $url_delete);
          $rows[] = [
            'data' => [
              'emp_name' => $row->employee_name,
              'emp_id' => $get_emp_id,
              'client' => $row->client_name,
              'price' => $row->price,
              'edit' => $linkEdit,
              'delete' => $linkDelete,
            ],
          ];
        }

      }

      // Create the header.
      $header = [
        'emp_name' => t('Employee Name'),
        'id' => t('Employee Id'),
        'client' => t('Cleint Name'),
        'price' => t('Price per Hour/month'),
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
    else {
      $table = [
        '#markup' => Markup::create("<div class = 'message'>No records found.</div>"),
      ];
    }
    return [$form_output, $table];
  }

}
