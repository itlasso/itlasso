<?php

namespace Drupal\invoice_to_client\Controller;

use Drupal\Core\Controller\ControllerBase;
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
class InvoiceIndex extends ControllerBase {

  /**
   * The renderer service.
   *
   * @var \Drupal\Core\Render\RendererInterface
   */
  protected $renderer;

  /**
   * ShowEmployee constructor.
   *
   * @param \Drupal\Core\Render\RendererInterface $renderer
   *   The renderer service.
   */
  public function __construct(RendererInterface $renderer) {
    $this->renderer = $renderer;
  }

  /**
   * {@inheritdoc}
   *
   * Factory method to create an instance of the InvoiceIndex class.
   *
   * class with the required services and dependencies injected.
   *
   * @param \Symfony\Component\DependencyInjection\ContainerInterface $container
   *   The container that holds the application services.
   *
   * @return static
   *   A new instance of the InvoiceIndex class.
   */
  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('renderer')
    );
  }

  /**
   * Show Link List.
   *
   * @return string
   *   Return Table format data.
   */
  public function listOfLinks() {
    $build['#attached']['library'][] = 'invoice_to_client/invoice_to_client';
    $show_emp_url = Url::fromRoute('show_employee');
    $show_emp_link = Link::FromTextAndUrl('All employee list', $show_emp_url);
    $show_client_url = Url::fromRoute('show_client');
    $show_client_link = Link::FromTextAndUrl('All Clients list', $show_client_url);
    $add_emp_url = Url::fromRoute('add_employee_form');
    $add_emp_link = Link::FromTextAndUrl('Add new employee', $add_emp_url);
    $add_client_url = Url::fromRoute('add_client_form');
    $add_client_link = Link::FromTextAndUrl('Add new client', $add_client_url);
    $emp_client_allocate_url = Url::fromRoute('allocate_emp_to_client');
    $emp_client_allocate_link = Link::FromTextAndUrl('Allocate employee to client', $emp_client_allocate_url);
    $invoice_generate_url = Url::fromRoute('generateInvoice_form');
    $invoice_generate_link = Link::FromTextAndUrl('Generate Invoice', $invoice_generate_url);
    $invoice_table_url = Url::fromRoute('companies_invoice.table');
    $invoice_table_link = Link::FromTextAndUrl('See invoice list', $invoice_table_url);
    $add_organization_info_url = Url::fromRoute('organiztion_info_form');
    $add_organization_info_link = Link::FromTextAndUrl('Add organization information', $add_organization_info_url);
    $display_organization_info_url = Url::fromRoute('organiztion_info_display');
    $display_organization_info_link = Link::FromTextAndUrl('View organization information', $display_organization_info_url);
    $data = [
        ['Link' => $show_emp_link],
        ['Link' => $show_client_link],
        ['Link' => $add_emp_link],
        ['Link' => $add_client_link],
        ['Link' => $emp_client_allocate_link],
        ['Link' => $invoice_generate_link],
        ['Link' => $invoice_table_link],
        ['Link' => $add_organization_info_link],
        ['Link' => $display_organization_info_link],
    ];

    $header = [
      'link' => t('Invoice Links'),
    ];
    foreach ($data as $item) {
      $rows[] = [
        'data' => [
          'link' => $item['Link'],
        ],
      ];
    }
    $build['table'] = [
      '#type' => 'table',
      '#header' => $header,
      '#rows' => $rows,
      '#attributes' => [
        'class' => ['table-responsive'],
      ],
    ];
    $output = $this->renderer->render($build);
    $output1 = [
      '#markup' => Markup::create($output),
    ];
    return $output1;
  }

}
