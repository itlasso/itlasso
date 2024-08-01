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
class ShowClient extends ControllerBase {

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
   * Factory method to create an instance of the ShowClient class.
   *
   * class with the required services and dependencies injected.
   *
   * @param \Symfony\Component\DependencyInjection\ContainerInterface $container
   *   The container that holds the application services.
   *
   * @return static
   *   A new instance of the ShowClient class.
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
    $sql = $this->database->select('client_table', 't');
    $sql->fields('t');
    $result = $sql->execute()->fetchAll();
    if ($result == NULL) {
      $table = [
        '#markup' => Markup::create("<div class = 'message'>No records found.</div>"),
      ];
    }
    else {
      foreach ($result as $row) {
        $url_edit = Url::fromRoute('edit_client_form', ['sr_id' => $row->id], []);
        $linkEdit = Link::FromTextAndUrl('Edit', $url_edit);
        $delete = new FormattableMarkup('<a href = "javascript:void(0);" class = "delete-client" data-id = "' . $row->id . '" >Delete</a>', []);
        $linkDelete = t('@deletelink', ['@deletelink' => $delete]);
        $rows[] = [
          'data' => [
            'sr_id' => $row->id,
            'client_name' => $row->client_name,
            'pan' => $row->pan_or_tin,
            'gstin' => $row->gstin,
            'address' => $row->address,
            'person_name' => $row->contact_person_name,
            'email' => $row->contact_person_email,
            'phone' => $row->contact_person_phone,
            'edit' => $linkEdit,
            'delete' => $linkDelete,
          ],
        ];
      }
      // Create the header.
      $header = [
        'id' => t('Sr. Id'),
        'client_name' => t('Client Name'),
        'pan' => t('PAN/TIN'),
        'gstin' => t('GSTIN'),
        'address' => t('Address'),
        'person_name' => t('Person Name'),
        'email' => t('Email'),
        'phone' => t('Phone Number'),
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
