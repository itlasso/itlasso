<?php

namespace Drupal\invoice_to_client\Form;

use Drupal\Core\Database\Connection;
use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Messenger\MessengerInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Class for hour based invoice form.
 *
 * {@inheritdoc}
 */
class HourBasedForm extends FormBase {

  /**
   * The messenger service.
   *
   * @var \Drupal\Core\Messenger\MessengerInterface
   */
  protected $messenger;

  /**
   * The database service.
   *
   * @var \Drupal\Core\Database\Connection
   */
  protected $database;

  /**
   * OrganizationInfo constructor.
   *
   * @param \Drupal\Core\Messenger\MessengerInterface $messenger
   *   The messenger service.
   * @param \Drupal\Core\Database\Connection $database
   *   The database service.
   */
  public function __construct(MessengerInterface $messenger, Connection $database) {
    $this->messenger = $messenger;
    $this->database = $database;
  }

  /**
   * {@inheritdoc}
   *
   * Factory method to create an instance of the HourBasedForm class.
   *
   * class with the required services and dependencies injected.
   *
   * @param \Symfony\Component\DependencyInjection\ContainerInterface $container
   *   The container that holds the application services.
   *
   * @return static
   *   A new instance of the HourBasedForm class.
   */
  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('messenger'),
      $container->get('database')
    );
  }

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'invoice_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $form['#attached']['library'][] = 'invoice_to_client/invoice_to_client';
    $client_id = $_REQUEST['id'];
    $rows = [];
    $output = [];
    $bas_amount = 0;
    $form['month'] = [
      '#type' => 'select',
      '#title' => t('Select the month'),
      '#options' => [
        ''  => t('None'),
        '1' => t('January'),
        '2' => t('February'),
        '3' => t('March'),
        '4' => t('April'),
        '5' => t('May'),
        '6' => t('June'),
        '7' => t('July'),
        '8' => t('August'),
        '9' => t('September'),
        '10' => t('October'),
        '11' => t('November'),
        '12' => t('December'),
      ],
      '#required' => TRUE,
      '#prefix' => '<div class = "container-fluid select-fields"><div class = "row month-year"><div class = "col-md-4">',
      '#suffix' => '</div>',
    ];
    $form['year'] = [
      '#type' => 'select',
      '#title' => t('Select the year'),
      '#options' => [
        ''  => t('None'),
        '2022' => t('2022'),
        '2023' => t('2023'),
        '2024' => t('2024'),
        '2025' => t('2025'),
        '2026' => t('2026'),
        '2027' => t('2027'),
        '2028' => t('2028'),
        '2029' => t('2029'),
        '2030' => t('2030'),
      ],
      '#required' => TRUE,
      '#prefix' => '<div class = "col-md-4">',
      '#suffix' => '</div>',
    ];
    $form['invoice_date'] = [
      '#type' => 'date',
      '#title' => $this->t('Select Date'),
      '#date_date_format' => 'd-m-Y',
      '#dateformat' => 'd-m-Y',
      '#required' => TRUE,
      '#prefix' => '<div class = "col-md-4">',
      '#suffix' => '</div></div>',
    ];
    $form['structure'] = [
      '#type' => 'table',
      '#title' => 'invoice Table',
      '#header' => ['Employee Name', 'Employee Id', 'Price/hour', 'Hours(worked)', 'Amount'],
      '#attributes' => ['class' => ['table']],
      '#prefix' => '<div class = "row table-responsive">',
      '#suffix' => '</div>',
    ];
    $select = $this->database->select('allocation_table ', 'a');
    $select->addJoin('inner', 'employee_table', 'e', 'a.emp_serial_id = e.id');
    $select->addJoin('inner', 'client_table', 'c', 'a.client_serial_id = c.id');
    $select->addField('e', 'employee_name');
    $select->addField('e', 'emp_id');
    $select->addField('c', 'client_name');
    $select->addField('a', 'id');
    $select->condition('client_serial_id', $value = $client_id, $operator = '=');
    $result = $select->execute()->fetchAll();
    if ($result == NULL) {
      $this->messenger->addMessage($this->t('No Record Found'));
    }
    else {
      foreach ($result as $row) {
        $id = $row->id;
        $emp_id = $row->emp_id;
        if ($emp_id == NULL) {
          $get_emp_id = 'No';
        }
        else {
          $get_emp_id = $emp_id;
        }
        $form['structure'][$id]['emp_name'] = [
          '#type' => 'textfield',
          '#title' => t('Employee Name'),
          '#title_display' => 'invisible',
          '#size' => 20,
          '#default_value' => $row->employee_name,
          '#attributes' => ['readonly' => 'readonly'],
          '#prefix' => '<div class = "col-md-3">',
          '#suffix' => '</div>',
        ];
        $form['structure'][$id]['emp_id'] = [
          '#type' => 'textfield',
          '#title' => t('Employee Id'),
          '#size' => 10,
          '#title_display' => 'invisible',
          '#default_value' => $get_emp_id,
          '#attributes' => ['readonly' => 'readonly'],
          '#prefix' => '<div class = "col-md-2">',
          '#suffix' => '</div>',
        ];
        $form['structure'][$id]['price'] = [
          '#type' => 'textfield',
          '#title' => t('Price/hour'),
          '#size' => 10,
          '#title_display' => 'invisible',
          '#default_value' => '',
          '#attributes' => [
            'id' => 'price_' . $id,
            'class' => ['price_per_hour'],
          ],
          '#prefix' => '<div class = "col-md-2">',
          '#suffix' => '</div>',
        ];
        $form['structure'][$id]['hours'] = [
          '#type' => 'textfield',
          '#title' => t('Hours(worked)'),
          '#size' => 5,
          '#title_display' => 'invisible',
          '#attributes' => [
            'id' => $id,
            'class' => ['hours'],
          ],
          '#prefix' => '<div class = "col-md-2">',
          '#suffix' => '</div>',
        ];
        $form['structure'][$id]['amount'] = [
          '#type' => 'textfield',
          '#title' => t('Amount'),
          '#size' => 20,
          '#default_value' => 0,
          '#title_display' => 'invisible',
          '#attributes' => [
            'id' => 'amounts' . $id,
            'class' => ['amounts'],
            'readonly' => 'readonly',
          ],
          '#prefix' => '<div class = "col-md-3">',
          '#suffix' => '</div></div>',
        ];
      }

      $form['bas_amount'] = [
        '#type' => 'textfield',
        '#title' => t('Basic Amount'),
        '#size' => 20,
        '#value' => 0,
        '#attributes' => [
          'id' => 'bas_amount',
          'readonly' => 'readonly',
        ],
        '#prefix' => '<div class = "row"><div class = "col-md-12 output-hour-field">',
        '#suffix' => '</div>',
      ];
      $form['gst'] = [
        '#type' => 'checkbox',
        '#title' => t('Add GST (18%)'),
        '#attributes' => ['id' => 'gst_check'],
        '#prefix' => '<div class = "col-md-12>',
        '#suffix' => '</div>',
      ];
      $form['gst_amount'] = [
        '#type' => 'textfield',
        '#title' => t('GST Amount(18%)'),
        '#title_display' => 'invisible',
        '#size' => 20,
        '#value' => 0,
        '#attributes' => [
          'id' => 'gst',
          'readonly' => 'readonly',
        ],
        '#prefix' => '<div class = "col-md-12 gst-field">',
        '#suffix' => '</div>',
      ];
      $form['total_amount'] = [
        '#type' => 'textfield',
        '#title' => t('Total Amount'),
        '#size' => 20,
        '#value' => 0,
        '#attributes' => [
          'id' => 't_amount',
          'readonly' => 'readonly',
        ],
        '#prefix' => '<div class = "col-md-12">',
        '#suffix' => '</div>',
      ];
      $form['actions']['submit'] = [
        '#type' => 'submit',
        '#value' => $this->t('Submit'),
        '#prefix' => '<div class = "col-md-12">',
        '#suffix' => '</div></div></div>',
      ];
      return $form;
    }

  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    try {
      $values = $form_state->getValue(['structure']);
      $field['Month'] = $form_state->getValue(['month']);
      $field['Year'] = $form_state->getValue(['year']);
      $field['Invoice_date'] = $form_state->getValue(['invoice_date']);
      $basic_pay = $form_state->getValue(['bas_amount']);
      $field['GST_status'] = $form_state->getValue(['gst']);
      $gst_charge = $form_state->getValue(['gst_amount']);
      $total_sum = $form_state->getValue(['total_amount']);
      $field['client_id'] = $_REQUEST['id'];
      $select = $this->database->select('invoice_table ', 'i');
      $select->addField('i', 'Invoice_number');
      $result = $select->distinct()->execute()->fetchAll();
      if (!$result) {
        $field['Invoice_number'] = 1;
      }
      else {
        $l = count($result);
        $num = 0;
        $last_invoice = 0;
        $num = $result[$l - 1];
        $last_invoice = $num->Invoice_number;
        $field['Invoice_number'] = $last_invoice + 1;
      }
      foreach ($values as $index) {
        $field['Employee_name'] = $index['emp_name'];
        $field['Employee_id'] = $index['emp_id'];
        $field['Price'] = $index['price'];
        $field['Days_or_hours_worked'] = $index['hours'];
        $field['Amount'] = $index['amount'];
        $this->database->insert('invoice_table')
          ->fields($field)->execute();
        $this->messenger->addMessage($this->t('The Invoice data has been successfully saved'));
      }
    }
    catch (Exception $ex) {
      \Drupal::logger('invoice_to_client')->error($ex->getMessage());
    }

  }

}
