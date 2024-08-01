<?php

namespace Drupal\invoice_to_client\Form;

use Drupal\Core\Database\Connection;
use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Messenger\MessengerInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Class for add Allocation form.
 *
 * {@inheritdoc}
 */
class Allocate extends FormBase {

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
   * Factory method to create an instance of the Allocate class.
   *
   * class with the required services and dependencies injected.
   *
   * @param \Symfony\Component\DependencyInjection\ContainerInterface $container
   *   The container that holds the application services.
   *
   * @return static
   *   A new instance of the Allocate class.
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
    return 'allocate_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $form['#attached']['library'][] = 'invoice_to_client/invoice_to_client';
    $sql = $this->database->select('client_table', 't');
    $sql->fields('t', ['id', 'client_name']);
    $result = $sql->execute()->fetchAll();
    $options = ['' => t('None')];
    foreach ($result as $value) {
      $options[$value->id] = $value->client_name;
    }
    $form['client'] = [
      '#type' => 'select',
      '#title' => $this->t('Select Client'),
      '#options' => $options,
      '#attributes' => [
        'class' => ['pay_select'],
      ],
      '#required' => TRUE,
      '#wrapper_attributes' => ['class' => 'col-md-6 col-xs-12'],
    ];
    $query = $this->database->select('employee_table', 't');
    $query->fields('t', ['id', 'employee_name']);
    $occur = $query->execute()->fetchAll();
    $records = ['' => t('None')];
    foreach ($occur as $row) {
      $records[$row->id] = $row->employee_name;
    }
    $form['employee'] = [
      '#type' => 'select',
      '#title' => $this->t('Allocate Employee'),
      '#options' => $records,
      '#attributes' => [
        'class' => ['pay_select'],
      ],
      '#required' => TRUE,
      '#wrapper_attributes' => ['class' => 'col-md-6 col-xs-12'],
    ];
    $form['price'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Monthly salary Rate'),
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
        '#markup' => t('Allocate employee to client'),
      ],
      'form' => [$form],
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    try {
      $field['client_serial_id'] = $form_state->getValue('client');
      $field['emp_serial_id'] = $form_state->getValue('employee');
      $field['price'] = $form_state->getValue('price');
      $this->database->insert('allocation_table')
        ->fields($field)->execute();
      $this->messenger->addMessage($this->t('The employee data has been succesfully saved'));
    }
    catch (Exception $ex) {
      \Drupal::logger('invoice_to_client')->error($ex->getMessage());
    }

  }

}
