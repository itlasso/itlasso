<?php

namespace Drupal\invoice_to_client\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Database\Connection;
use Drupal\Core\Entity\EntityTypeManagerInterface;
use Drupal\Core\File\FileUrlGenerator;
use Drupal\Core\Render\Markup;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Class DisplayTableController.
 *
 * @package Drupal\invoice_to_client\Controller.
 */
class CompanyInvoiceController extends ControllerBase {

  /**
   * The entity type manager service.
   *
   * @var \Drupal\Core\Entity\EntityTypeManagerInterface
   */
  protected $entityTypeManager;

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
   * @param \Drupal\Core\Database\Connection $database
   *   The database service.
   * @param \Drupal\Core\File\FileSystemInterface $fileUrlGenerator
   *   The FileUrlGenerator service.
   */
  public function __construct(EntityTypeManagerInterface $entityTypeManager, Connection $database, FileUrlGenerator $fileUrlGenerator) {
    $this->entityTypeManager = $entityTypeManager;
    $this->database = $database;
    $this->fileUrlGenerator = $fileUrlGenerator;
  }

  /**
   * {@inheritdoc}
   *
   * Factory method to create an instance of the CompanyInvoiceController class.
   *
   * class with the required services and dependencies injected.
   *
   * @param \Symfony\Component\DependencyInjection\ContainerInterface $container
   *   The container that holds the application services.
   *
   * @return static
   *   A new instance of the CompanyInvoiceController class.
   */
  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('entity_type.manager'),
      $container->get('database'),
      $container->get('file_url_generator')
    );
  }

  /**
   * Display the markup.
   *
   * Return markup array.
   */
  public function index() {
    if (class_exists('TCPDF')) {
      $invoice_num = $_REQUEST['invoice_number'];
      $org_query = $this->database->select('organization_info_table', 't')
        ->fields('t')
        ->condition('t.id', 1)
        ->execute()
        ->fetch();
      if ($org_query) {
        $logo_file_id = $org_query->organization_logo;
        $file = $this->entityTypeManager->getStorage('file')->load($logo_file_id);
        // $file = File::load($logo_file_id);
        if ($file) {
          $fileUri = $file->getFileUri();
          $url = $this->fileUrlGenerator->generate($fileUri);
          $logo_url = $url->toString();
        }
        else {
          $logo_url = '';
        }
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
        $organization_logo = $org_query->organization_logo;

        $select = $this->database->select('invoice_table ', 'a');
        $select->addJoin('inner', 'client_table', 'c', 'a.Client_id = c.id');
        $select->Fields('a');
        $select->Fields('c');
        $select->condition('a.Invoice_number', $value = $invoice_num, $operator = '=');
        $result = $select->distinct()->execute()->fetchAll();
        foreach ($result as $row) {
          $working_days = $row->Working_days;
          $invoice_number = $row->Invoice_number;
          $invoice_date = $row->Invoice_date;
          $company_name = $row->client_name;
          $address = $row->address;
          $gstin = $row->gstin;
          $pan = $row->pan_or_tin;
          $person_name = $row->contact_person_name;
          $email = $row->contact_person_email;
          $phone_number = $row->contact_person_phone;
          if ($working_days != NULL) {
            $html = "";
            $html .= '<style>
              .invoice-page {
                max-width: 100%;
                overflow-x: auto;
                display: block;
                margin: 80px  auto;
                font-family: Inter,arial,sans-serif !important;
                font-style: normal;
                font-variant: normal;
                font-weight: 500;
                letter-spacing: 0;
                line-height: 10.4px;
              }
              table{
                width: 100%;
                border-spacing: 0px;
                border: 0.5 px solid black;
                padding:4px;
              }
              .element-center{
                text-align: center;
              }
              th, td {
                border: 0.5px solid black;
                padding: 10px 10px;
                vertical-align: top;
              }

              tr {
                display: table-row;
                vertical-align: inherit;
                border-color: inherit;
              }
              .img-logo{
                width: 130px;
                height: 65px;
                object-fit: cover;
              }
              .signature{
                position: absolute;
                bottom: 0px;
                border-top: 1px solid;
                left: 0;
                right: 0;
                padding: 10px 20px;
              }
              .border-top-0{
                border-top: none;
              }

              .position-relative{
                position: relative;
              }
              .desc {
                width:31%;
              }
              .const {
                 width:13%;
              }
              .twh {
                width:30%
              }
              .position-relative {
                text-align: center;
              }
               </style>';
            $html .= '<div class="invoice-page">
            <table class = "table m-0">
              <tr>
                <td colspan = "4"><img  class="img-logo" src="' . $logo_url . '" alt="logo"></td>
              </tr>
              <tr class = "element-center">
                <td colspan="4"> <strong>TAX INVOICE</strong></td>
              </tr>
              <tr>
                <th colspan="2"><strong>Bill to</strong></th>
                <th colspan="2"><strong>Bill from</strong></th>
              </tr>
              <tr>
                <td colspan="2"><strong>' . $company_name . '</strong><br/>' . $address . '</td>
                <td colspan="2"><strong>' . $organization_name . '</strong><br>' . $org_address . ' - ' . $org_postal_code . '</td>
              </tr>
              <tr>
                <td colspan="2">' . $org_work_location . '</td>
                <td colspan="2"><strong>Indore</strong></td>
              </tr>
              <tr>
                <td colspan="2"><p>PAN of ' . $company_name . '</p>
                  <p>invoice Number</p>
                  <p>invoice Date</p>
                </td>
                <td colspan="2"><p>' . $pan . '</p>
                  <p>I-' . $invoice_number . '</p>
                  <p>' . $invoice_date . '</p>
                </td>
              </tr>
              <tr class="element-center">
                <td colspan="2"><strong>' . $company_name . ' - GSTIN ' . $gstin . '</strong></td>
                <td colspan="2"><strong>' . $organization_name . ' - ' . 'GSTIN' . $org_gstin . '</strong></td>
              </tr>
            </table>
            <!-- table version 2 -->
            <table class="m-0 border-top-0">
              <tr>
                <th class="desc"><strong>Description</strong></th>
                <th class="twh"><strong>Total working Days</strong></th>
                <th class="const"><strong>Days Worked</strong></th>
                <th class="const"><strong>Price per month</strong></th>
                <th class="const"><strong>Amount</strong></th>
              </tr>';
            $sql = $this->database->select('invoice_table', 't');
            $sql->fields('t');
            $sql->condition('Invoice_number', $value = $invoice_num, $operator = '=');
            $result = $sql->execute()->fetchAll();
            $basic_amount = 0;
            foreach ($result as $rows) {
              $working_days = $rows->Working_days;
              $days_worked = $rows->Days_or_hours_worked;
              $price = $rows->Price;
              $amount = $rows->Amount;
              $month_num = $rows->Month;
              $month_invoice = date("F", mktime(0, 0, 0, $month_num, 10));
              $year = $rows->Year;
              $html .= '<tr>
                <td class="desc">' . $rows->Employee_name . ' - Services for the month of' . ' ' . $month_invoice . ' ' . $year . '</td>
                <td>' . $working_days . '</td>
                <td>' . $days_worked . '</td>
                <td>' . $price . '</td>
                <td>' . number_format((float) $amount, 4, '.', '') . '</td>
              </tr>';
              $basic_amount += $amount;
            }
            $html .= '<tr>
                <td colspan="2"></td>
                <td colspan="2"><strong>Basic value</strong></td>
                <td><strong>' . number_format((float) $basic_amount, 4, '.', '') . '</strong></td>
              </tr>
              <tr>
                <td>Contact Person</td>
                <td>' . $person_name . '</td>
                <td colspan="2"></td>
                <td></td>
              </tr>
              <tr>
                <td>Contact Email</td>
                <td>' . $email . '/' . $phone_number . '</td>';
            $gst_status = $rows->GST_status;
            if ($gst_status == 1) {
              $gst_amount = $basic_amount * 18 / 100;
              $total_amount = $basic_amount + $gst_amount;
              $t_amt = number_format((float) $total_amount, 4, '.', '');
            }
            else {
              $gst_amount = 0;
              $total_amount = $basic_amount + $gst_amount;
              $t_amt = number_format((float) $basic_amount, 4, '.', '');

            }
            $html .= '<td colspan="2">C-GST</td>
                  <td>0</td>
                </tr>
                <tr>
                  <td rowspan="4" colspan="2"></td>
                  <td colspan="2">S-GST</td>
                  <td>0</td>
                </tr>
                <tr>
                  <td colspan="2">I-GST @ 18%</td>
                  <td>' . number_format((float) $gst_amount, 4, '.', '') . '</td>
                </tr>
                <tr>
                  <td colspan="2">Total GST</td>
                  <td>' . number_format((float) $gst_amount, 4, '.', '') . '</td>
                </tr>
                <tr>
                  <td colspan="2"><strong>Total Amount (Rs.)</strong></td>
                  <td><strong>' . $t_amt . '</strong></td>
                </tr>';
            $html .= '<tr class="element-center">
                  <th colspan="3"><strong>Account Details</strong></th>
                  <th colspan="2"><strong>For ' . $organization_name . '</strong></th>
                </tr>
                <tr>
                  <td colspan="1"><p>Account holder</p>
                    <p>Bank Name</p>
                    <p>Branch Name <br></p>
                    <p>Account</p>
                    <p>NumberIFSC</p>
                    <p>PAN</p>
                  </td>
                  <td colspan="2">
                    <p>' . $org_account_holder_name . '</p>
                    <p>' . $org_bank_name . '</p>
                    <p>' . $org_bank_branch_name . '</p>
                    <p>' . $org_account_number . '</p>
                    <p>' . $org_ifsc_code . '</p>
                    <p>' . $org_pan_number . '</p>
                  </td>
                  <td class="position-relative" colspan="2"><span class="signature">Authorised Signatory</span>
                  </td>
                </tr>
                <!-- Companey Address -->
                <tr>
                  <td colspan="5" class="element-center"><strong>' . $organization_name . '</strong><br>
                    ' . $org_address . ' - ' . $org_postal_code . '<br>
                    Email:- ' . $org_email . '<br>
                    website:- ' . $org_website_name . '
                  </td>
                </tr>
              </table>
              </div>';
            $tcpdf = new \TCPDF();
            $tcpdf->SetMargins(1, 1, 1, TRUE);
            $font_size = $tcpdf->pixelsToUnits('28');
            $tcpdf->SetFont('', '', $font_size, '', 'default', TRUE);
            $tcpdf->SetPrintHeader(FALSE);
            $tcpdf->setPrintFooter(FALSE);
            $tcpdf->SetAutoPageBreak(TRUE, '2');
            $tcpdf->AddPage('P', 'A4');
            $tcpdf->writeHTMLCell(0, 0, '', '', $html, 0, 0, 0, TRUE, 'L', TRUE);
            $pdf = $tcpdf->Output('Invoice.pdf', 'I');
          }
          else {
            $html = "";
            $html .= '<style>
              .invoice-page {
                max-width: 100%;
                overflow-x: auto;
                display: block;
                margin: 80px  auto;
                font-family: Inter,arial,sans-serif !important;
                font-style: normal;
                font-variant: normal;
                font-weight: 500;
                letter-spacing: 0;
                line-height: 10.4px;
             }
             table{
                width: 100%;
                border-spacing: 0px;
                border: 0.5 px solid black;
                padding:4px;
             }
             .element-center{
                text-align: center;
             }
             th,
             td {
                 border: 0.5px solid black;
                 padding: 10px 10px;
                 vertical-align: top;
              }
              tr {
                display: table-row;
                vertical-align: inherit;
                border-color: inherit;
              }
              .img-logo{
                width: 130px;
                height: 65px;
                object-fit: cover;
              }
              .signature {
                position: absolute;
                bottom: 0px;
                border-top: 1px solid;
                left: 0;
                right: 0;
                padding: 10px 20px;
              }
              .border-top-0 {
                border-top: none;
              }

              .position-relative {
                position: relative;
              }
              .desc {
                 width:38%;
              }
              .const_hour {
                width:30%;
              }
              .const_price {
                width:15%;
              }
              .const_total {
                width:17%;
              }
              .position-relative {
                text-align: center;
              }
              </style>';
            $html .= '<div class="invoice-page">
              <table class="table m-0">
                <tr>
                  <td colspan="4"><img  class="img-logo" src="' . $logo_url . '" alt="logo"></td>
                </tr>
                <tr class="element-center">
                  <td colspan="4"> <strong>TAX INVOICE</strong></td>
                </tr>
                <tr>
                  <th colspan="2"><strong>Bill to</strong></th>
                  <th colspan="2"><strong>Bill from</strong></th>
                </tr>
                <tr>
                  <td colspan="2"><strong>' . $company_name . '</strong><br/>' . $address . '</td>
                  <td colspan="2"><strong>' . $organization_name . '</strong><br>' . $org_address . ' - ' . $org_postal_code . '</td>
                </tr>
                <tr>
                  <td colspan="2">' . $org_work_location . '</td>
                  <td colspan="2"><strong>Indore</strong></td>
                </tr>
                <tr>
                  <td colspan="2"><p>PAN of ' . $company_name . '</p>
                    <p>invoice Number</p>
                    <p>invoice Date</p>
                  </td>
                  <td colspan="2"><p>' . $pan . '</p>
                    <p>I-' . $invoice_number . '</p>
                    <p>' . $invoice_date . '</p>
                  </td>
                </tr>
                <tr class="element-center">
                  <td colspan="2"><strong>' . $company_name . ' - GSTIN ' . $gstin . '</strong></td>
                  <td colspan="2"><strong>' . $organization_name . ' - GSTIN ' . $org_gstin . '</strong></td>
                </tr>
              </table>
              <!-- table version 2 -->
              <table class="m-0 border-top-0">
                <tr>
                  <th class="desc"><strong>Description</strong></th>
                  <th class="const_hour"><strong>Hours Worked</strong></th>
                  <th class="const_price"><strong>Price per hour</strong></th>
                  <th class="const_total"><strong>Amount</strong></th>
                </tr>';
            $sql = $this->database->select('invoice_table', 't');
            $sql->fields('t');
            $sql->condition('Invoice_number', $value = $invoice_num, $operator = '=');
            $result = $sql->execute()->fetchAll();
            $basic_amount = 0;
            foreach ($result as $rows) {
              $days_worked = $rows->Days_or_hours_worked;
              $price = $rows->Price;
              $amount = $rows->Amount;
              $month_num = $rows->Month;
              $month_invoice = date("F", mktime(0, 0, 0, $month_num, 10));
              $year = $rows->Year;
              $html .= '<tr>
                <td class="desc">' . $rows->Employee_name . ' - Services for the month of' . ' ' . $month_invoice . ' ' . $year . '</td>
                <td>' . $days_worked . '</td>
                <td>' . $price . '</td>
                <td>' . number_format((float) $amount, 4, '.', '') . '</td>
              </tr>';
              $basic_amount += $amount;
            }
            $html .= '<tr>
                  <td colspan="2"></td>
                  <td><strong>Basic value</strong></td>
                  <td><strong>' . number_format((float) $basic_amount, 4, '.', '') . '</strong></td>
                </tr>
                <tr>
                  <td>Contact Person</td>
                  <td>' . $person_name . '</td>
                  <td colspan="2"></td>
                  <td></td>
                </tr>
                <tr>
                  <td>Contact Email</td>
                  <td>' . $email . '/' . $phone_number . '</td>';
            $gst_status = $rows->GST_status;
            if ($gst_status == 1) {
              $gst_amount = $basic_amount * 18 / 100;
              $total_amount = $basic_amount + $gst_amount;
              $t_amt = number_format((float) $total_amount, 4, '.', '');
            }
            else {
              $gst_amount = 0;
              $total_amount = $basic_amount + $gst_amount;
              $t_amt = number_format((float) $basic_amount, 4, '.', '');
            }
            $html .= '<td>C-GST</td>
                    <td>0</td>
                  </tr>
                  <tr>
                    <td rowspan="4" colspan ="2" ></td>
                    <td>S-GST</td>
                    <td>0</td>
                  </tr>
                  <tr>
                    <td >I-GST @ 18%</td>
                    <td>' . number_format((float) $gst_amount, 4, '.', '') . '</td>
                  </tr>
                  <tr>
                    <td >Total GST</td>
                    <td>' . number_format((float) $gst_amount, 4, '.', '') . '</td>
                  </tr>
                  <tr>
                    <td><strong>Total Amount (Rs.)</strong></td>
                    <td><strong>' . $t_amt . '</strong></td></tr>';
            $html .= '<tr class="element-center">
                <th colspan="3"><strong>Account Details</strong></th>
                <th colspan="2"><strong>For ' . $organization_name . '</strong></th>
              </tr>
              <tr>
                <td colspan="1"><p>Account holder</p>
                  <p>Bank Name</p>
                  <p>Branch Name <br></p>
                  <p>Account</p>
                  <p>NumberIFSC</p>
                  <p>PAN</p>
                </td>
                <td colspan="2"><p>' . $org_bank_name . '</p>
                  <p>' . $org_bank_name . '</p>
                  <p>' . $org_bank_branch_name . '</p>
                  <p>' . $org_account_number . '</p>
                  <p>' . $org_ifsc_code . '</p>
                  <p>' . $org_pan_number . '</p>
                </td>
                  <td class="position-relative" colspan="2"><span class="signature">Authorised Signatory
                    </span>
                  </td>
              </tr>
              <!-- companey Address-->
              <tr>
                <td colspan="5" class="element-center"><strong>' . $organization_name . '</strong><br>
                  ' . $org_address . ' - ' . $org_postal_code . '<br>
                  Email:- ' . $org_email . '<br>
                  website:- ' . $org_website_name . '
                </td>
              </tr>
              </table>
              </div>';
            $tcpdf = new \TCPDF();
            $tcpdf->SetMargins(1, 1, 1, TRUE);
            $font_size = $tcpdf->pixelsToUnits('28');
            $tcpdf->SetFont('', '', $font_size, '', 'default', TRUE);
            $tcpdf->SetPrintHeader(FALSE);
            $tcpdf->setPrintFooter(FALSE);
            $tcpdf->SetAutoPageBreak(TRUE, '2');
            $tcpdf->AddPage('P', 'A4');
            $tcpdf->writeHTMLCell(0, 0, '', '', $html, 0, 0, 0, TRUE, 'L', TRUE);
            $pdf = $tcpdf->Output('Invoice.pdf', 'I');
          }
          return new Response($pdf);
        }

      }
      else {
        $output = [
          '#markup' => Markup::create("<div class = 'message'>Your organization records not found.</div>"),
        ];
        return $output;
      }
    }
    else {
      $output = [
        '#markup' => Markup::create("<div class = 'message'>TCPDF library is not found Please install tcpdf library by composer [<span style = 'color:gray;'>composer require tecnickcom/tcpdf</span>] as given in <strong> module description</strong>.</div>"),
      ];
      return $output;
    }

  }

}
