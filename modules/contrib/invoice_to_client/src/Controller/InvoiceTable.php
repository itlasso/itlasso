<?php

namespace Drupal\invoice_to_client\Controller;

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
class InvoiceTable extends ControllerBase {

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
   * Factory method to create an instance of the InvoiceTable class.
   *
   * class with the required services and dependencies injected.
   *
   * @param \Symfony\Component\DependencyInjection\ContainerInterface $container
   *   The container that holds the application services.
   *
   * @return static
   *   A new instance of the InvoiceTable class.
   */
  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('database'),
      $container->get('renderer')
    );
  }

  /**
   * Show data.
   *
   * @return string
   *   Return Table format data.
   */
  public function showInvoice() {
    $build['#attached']['library'][] = 'invoice_to_client/invoice_to_client';
    $rows = [];
    $result = [];
    $select = $this->database->select('invoice_table ', 'a');
    $select->addJoin('inner', 'client_table', 'c', 'a.Client_id = c.id');
    $select->addField('a', 'Invoice_number');
    $select->addField('c', 'client_name');
    $result = $select->distinct()->execute()->fetchAll();
    if ($result == NULL) {
      $table = [
        '#markup' => Markup::create("<div class = 'message'>No records found.</div>"),
      ];
      return $table;
    }
    else {
      foreach ($result as $row) {
        $url_download = Url::fromRoute('company_invoice.pdf', ['invoice_number' => $row->Invoice_number], []);
        $linkDownload = Link::FromTextAndUrl('Download', $url_download);
        $rows[] = [
          'data' => [
            'invoice_number' => $row->Invoice_number,
            'Client_name' => $row->client_name,
            'download' => $linkDownload,
          ],
        ];
      }
      // Create the header.
      $header = [
        'invoice_number' => t('Invoice Number'),
        'Client_name' => t('Cleint Name'),
        'download' => t('Download'),
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
      return $table;
    }

  }

}
