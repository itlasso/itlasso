<?php

namespace Drupal\invoice_to_client\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Database\Connection;
use Drupal\Core\Entity\EntityTypeManagerInterface;
use Drupal\Core\File\FileUrlGenerator;
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
class DisplayOrganizationInfo extends ControllerBase {

  /**
   * The entity type manager service.
   *
   * @var \Drupal\Core\Entity\EntityTypeManagerInterface
   */
  protected $entityTypeManager;

  /**
   * The renderer service.
   *
   * @var \Drupal\Core\Render\RendererInterface
   */
  protected $renderer;


  /**
   * The database service.
   *
   * @var \Drupal\Core\Database\Connection
   */
  protected $database;

  /**
   * The FileUrlGenerator service.
   *
   * @var \Drupal\Core\File\FileUrlGenerator
   */
  protected $fileUrlGenerator;

  /**
   * OrganizationInfo constructor.
   *
   * @param \Drupal\Core\Entity\EntityTypeManagerInterface $entityTypeManager
   *   The entity type manager service.
   * @param \Drupal\Core\Render\RendererInterface $renderer
   *   The renderer service.
   * @param \Drupal\Core\Database\Connection $database
   *   The database service.
   * @param \Drupal\Core\File\FileSystemInterface $fileUrlGenerator
   *   The FileUrlGenerator service.
   */
  public function __construct(EntityTypeManagerInterface $entityTypeManager, RendererInterface $renderer, Connection $database, FileUrlGenerator $fileUrlGenerator) {
    $this->entityTypeManager = $entityTypeManager;
    $this->renderer = $renderer;
    $this->database = $database;
    $this->fileUrlGenerator = $fileUrlGenerator;
  }

  /**
   * {@inheritdoc}
   *
   * Factory method to create an instance of the DisplayOrganizationInfo class.
   *
   * class with the required services and dependencies injected.
   *
   * @param \Symfony\Component\DependencyInjection\ContainerInterface $container
   *   The container that holds the application services.
   *
   * @return static
   *   A new instance of the DisplayOrganizationInfo class.
   */
  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('entity_type.manager'),
      $container->get('renderer'),
      $container->get('database'),
      $container->get('file_url_generator')
    );
  }

  /**
   * Org data.
   *
   * @return string
   *   Return Table format data.
   */
  public function orgData() {
    $build['#attached']['library'][] = 'invoice_to_client/invoice_to_client';
    $org_query = $this->database->select('organization_info_table', 't')
      ->fields('t')
      ->condition('t.id', 1)
      ->execute()
      ->fetch();
    if ($org_query) {
      $logo_file_id = $org_query->organization_logo;
      $file = $this->entityTypeManager->getStorage('file')->load($logo_file_id);
      if ($file) {
        $fileUri = $file->getFileUri();
        $url = $this->fileUrlGenerator->generate($fileUri);
        // $url = \Drupal::service('file_url_generator')->generate($fileUri);
        $logo_url = $url->toString();
      }
      else {
        $logo_url = '';
      }
      $org_id = $org_query->id;
      $organization_name = $org_query->organization_name;
      $org_address = $org_query->address;
      $org_postal_code = $org_query->postal_code;
      $org_work_location = $org_query->work_location;
      $org_account_holder_name = $org_query->account_holder_name;
      $org_bank_name = $org_query->bank_name;
      $org_bank_branch_name = $org_query->bank_branch_name;
      $org_account_number = $org_query->account_number;
      $org_ifsc_code = $org_query->ifsc_code;
      $org_pan_number = $org_query->pan_number;
      $org_email = $org_query->email;
      $org_website_name = $org_query->website_name;
      $org_gstin = $org_query->gstin;
      $url_edit = Url::fromRoute('organiztion_info_edit', ['edit_id' => $org_query->id],);
      $linkEdit = Link::FromTextAndUrl('Edit', $url_edit);
      if ($logo_url) {
        $logo_image = [
          '#markup' => Markup::create('<div class = "org_logo"><img src = "' . $logo_url . '" alt = "logo"></div>'),
        ];
      }
      else {
        $logo_image = '';
      }
      $logo_image_render = $this->renderer->render($logo_image);
      $rows = [
        ['logo', $logo_image_render],
        ['Organization Name', $organization_name],
        ['Address', $org_address],
        ['Postal Cod', $org_postal_code],
        ['Work Location', $org_work_location],
        ['Account Holder Name', $org_account_holder_name],
        ['Bank Name', $org_bank_name],
        ['Bank Branch', $org_bank_branch_name],
        ['Account Number', $org_account_number],
        ['IFSC', $org_ifsc_code],
        ['PAN', $org_pan_number],
        ['Email', $org_email],
        ['Website', $org_website_name],
        ['GSTIN', $org_gstin],

      ];
      $build['table'] = [
        '#type' => 'table',
        '#rows' => $rows,
        '#attributes' => [
          'class' => ['table'],
        ],
      ];
      $build['link'] = [
        'my_link' => [
          '#type' => 'link',
          '#title' => $linkEdit->getText(),
          '#url' => $linkEdit->getUrl(),
          '#attributes' => [
            'id' => ['edit-submit'],
            'class' => ["btn btn-success button--primary button js-form-submit form-submit"],
          ],
        ],
      ];
      $output = $this->renderer->render($build);
      $table = [
        '#markup' => Markup::create($output),
      ];
      return $table;
    }
    else {
      $table = [
        '#markup' => Markup::create("<div class = 'message'>No records found.</div>"),
      ];
      return $table;
    }

  }

}
