<?php

namespace Drupal\invoice_to_client\Form;

use Drupal\Core\Database\Connection;
use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Messenger\MessengerInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Class for Edit Allocation form.
 *
 * {@inheritdoc}
 */
class EditAllocation extends FormBase {

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
   * Factory method to create an instance of the EditAllocation class.
   *
   * class with the required services and dependencies injected.
   *
   * @param \Symfony\Component\DependencyInjection\ContainerInterface $container
   *   The container that holds the application services.
   *
   * @return static
   *   A new instance of the EditAllocation class.
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
    return 'editAllocation_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $form['#attached']['library'][] = 'invoice_to_client/invoice_to_client';
    $allocated_id = $_REQUEST['edit_id'];
    $select = $this->database->select('allocation_table ', 'a');
    $select->addJoin('inner', 'employee_table', 'e', 'a.emp_serial_id = e.id');
    $select->addJoin('inner', 'client_table', 'c', 'a.client_serial_id = c.id');
    $select->addField('a', 'price');
    $select->addField('a', 'id');
    $select->addField('a', 'client_serial_id');
    $select->addField('a', 'emp_serial_id');
    $select->condition('a.id', $value = $allocated_id, $operator = '=');
    $data = $select->execute()->fetchAll();
    foreach ($data as $content) {
      $e_id = $content->emp_serial_id;
      $c_id = $content->client_serial_id;
      $rate = $content->price;
    }
    $sql = $this->database->select('client_table', 't');
    $sql->fields('t', ['id', 'client_name']);
    $result = $sql->execute()->fetchAll();
    $options = [];
    foreach ($result as $col) {
      $options[$col->id] = $col->client_name;
    }
    $form['client'] = [
      '#type' => 'select',
      '#title' => $this->t('Select Client'),
      '#options' => $options,
      '#default_value' => $c_id,
      '#attributes' => [
        'class' => ['pay_select'],
      ],
      '#required' => TRUE,
      '#wrapper_attributes' => ['class' => 'col-md-6 col-xs-12'],
    ];
    $query = $this->database->select('employee_table', 't');
    $query->fields('t', ['id', 'employee_name']);
    $occur = $query->execute()->fetchAll();
    $records = [];
    foreach ($occur as $row) {
      $records[$row->id] = $row->employee_name;
    }
    $form['employee'] = [
      '#type' => 'select',
      '#title' => $this->t('Allocate Employee'),
      '#options' => $records,
      '#default_value' => $e_id,
      '#attributes' => [
        'class' => ['pay_select'],
      ],
      '#required' => TRUE,
      '#wrapper_attributes' => ['class' => 'col-md-6 col-xs-12'],
    ];
    $form['price'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Salary Rate per month if paid monthly'),
      '#default_value' => $rate,
      '#wrapper_attributes' => ['class' => 'col-md-4 col-xs-12'],
    ];
    $form['actions']['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Save'),
      '#attributes' => [
        'class' => ['btn', 'btn-success'],
      ],
    ];
    return [
      'header' => [
        '#prefix' => '<h5 class = "page-title">',
        '#suffix' => '</h5>',
        '#markup' => t('Update Allocation'),
      ],
      'form' => [$form],
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    try {
      $allocated_id = $_REQUEST['edit_id'];
      $client_serial_id = $form_state->getValue(['client']);
      $emp_serial_id = $form_state->getValue(['employee']);
      $price = $form_state->getValue(['price']);
      $updated = $this->database->update('allocation_table')
        ->fields(
                [
                  'emp_serial_id' => $emp_serial_id,
                  'client_serial_id' => $client_serial_id,
                  'price' => $price,
                ]
            )
        ->condition('id', $allocated_id)
        ->execute();
      if ($updated) {
        $this->messenger->addMessage($this->t('The  allocation table has been successfully updated'));
        $form_state->setRedirect('table_display', ['sr_id' => $client_serial_id]);
      }
      else {
        $this->messenger->addMessage($this->t('Try again later'));
      }
    }
    catch (Exception $ex) {
      \Drupal::logger('invoice_to_client')->error($ex->getMessage());
    }

  }

}
