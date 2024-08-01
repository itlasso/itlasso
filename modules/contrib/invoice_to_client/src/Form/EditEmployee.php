<?php

namespace Drupal\invoice_to_client\Form;

use Drupal\Core\Database\Connection;
use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Messenger\MessengerInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Class for edit employee form.
 *
 * {@inheritdoc}
 */
class EditEmployee extends FormBase {

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
   * Factory method to create an instance of the EditEmployee class.
   *
   * class with the required services and dependencies injected.
   *
   * @param \Symfony\Component\DependencyInjection\ContainerInterface $container
   *   The container that holds the application services.
   *
   * @return static
   *   A new instance of the EditEmployee class.
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
    return 'editEmployee_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $form['#attached']['library'][] = 'invoice_to_client/invoice_to_client';
    $emp_sr_id = $_REQUEST['sr_id'];
    $sql = $this->database->select('employee_table', 't');
    $sql->fields('t');
    $sql->condition('id', $value = $emp_sr_id, $operator = '=');
    $result = $sql->execute()->fetchAll();
    if ($result == NULL) {
      $this->messenger->addMessage($this->t('No records founds'));
    }
    else {
      foreach ($result as $row) {
        $form['emp_name'] = [
          '#type' => 'textfield',
          '#title' => $this->t('Employee Name'),
          '#required' => TRUE,
          '#size' => 60,
          '#maxlength' => 128,
          '#default_value' => $row->employee_name,
          '#wrapper_attributes' => ['class' => 'col-md-6 col-xs-12'],
        ];
        $form['emp_id'] = [
          '#type' => 'textfield',
          '#title' => $this->t('Employee Id'),
          '#size' => 60,
          '#default_value' => $row->emp_id,
          '#wrapper_attributes' => ['class' => 'col-md-6 col-xs-12'],
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
            '#prefix' => '<h5>',
            '#suffix' => '</h5>',
            '#markup' => t('Edit Employee'),
          ],
          'form' => [$form],
        ];
      }

    }

  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    try {
      // Find out what was submitted.
      $emp_sr_id = $_REQUEST['sr_id'];
      $employee_name = $form_state->getValue(['emp_name']);
      $emp_id = $form_state->getValue(['emp_id']);
      $updated = $this->database->update('employee_table')
        ->fields(
                [
                  'employee_name' => $employee_name,
                  'emp_id' => $emp_id,
                ]
            )
        ->condition('id', $emp_sr_id)
        ->execute();
      if ($updated) {
        $this->messenger->addMessage($this->t('The employee data has been successfully updated'));
        $form_state->setRedirect('show_employee');
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
