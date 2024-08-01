<?php

namespace Drupal\invoice_to_client\Form;

use Drupal\Core\Database\Connection;
use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Messenger\MessengerInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Class for add employee form.
 *
 * {@inheritdoc}
 */
class AddEmp extends FormBase {

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
   * Factory method to create an instance of the AddEmp class.
   *
   * class with the required services and dependencies injected.
   *
   * @param \Symfony\Component\DependencyInjection\ContainerInterface $container
   *   The container that holds the application services.
   *
   * @return static
   *   A new instance of the AddEmp class.
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
    return 'addEmp_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $form['#attached']['library'][] = 'invoice_to_client/invoice_to_client';
    $form['emp_name'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Employee Name'),
      '#required' => TRUE,
      '#size' => 60,
      '#maxlength' => 128,
      '#wrapper_attributes' => ['class' => 'col-md-6 col-xs-12'],
    ];
    $form['emp_id'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Employee Id'),
      '#size' => 60,
      '#wrapper_attributes' => ['class' => 'col-md-6 col-xs-12'],
    ];
    $form['actions']['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Add'),
      '#attributes' => [
        'class' => ['btn', 'btn-success'],
      ],
    ];
    return [
      'header' => [
        '#prefix' => '<h5>',
        '#suffix' => '</h5>',
        '#markup' => t('Add Employee'),
      ],
      'form' => [$form],
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    try {
      // Find out what was submitted.
      $field['employee_name'] = $form_state->getValue('emp_name');
      $field['emp_id'] = $form_state->getValue('emp_id');
      $this->database->insert('employee_table')
        ->fields($field)->execute();
      $this->messenger->addMessage($this->t('The employee data has been succesfully saved'));
    }
    catch (Exception $ex) {
      \Drupal::logger('invoice_to_client')->error($ex->getMessage());
    }

  }

}
