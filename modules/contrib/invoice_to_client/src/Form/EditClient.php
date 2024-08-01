<?php

namespace Drupal\invoice_to_client\Form;

use Drupal\Core\Database\Connection;
use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Messenger\MessengerInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Class for edit client form.
 *
 * {@inheritdoc}
 */
class EditClient extends FormBase {

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
   * Factory method to create an instance of the EditClient class.
   *
   * class with the required services and dependencies injected.
   *
   * @param \Symfony\Component\DependencyInjection\ContainerInterface $container
   *   The container that holds the application services.
   *
   * @return static
   *   A new instance of the EditClient class.
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
    return 'editClient_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $form['#attached']['library'][] = 'invoice_to_client/invoice_to_client';
    $client_sr_id = $_REQUEST['sr_id'];
    $sql = $this->database->select('client_table', 't');
    $sql->fields('t');
    $sql->condition('id', $value = $client_sr_id, $operator = '=');
    $result = $sql->execute()->fetchAll();
    if ($result == NULL) {
      $this->messenger->addMessage($this->t('No records founds'));
    }
    else {
      foreach ($result as $row) {
        $form['client_name'] = [
          '#type' => 'textfield',
          '#title' => $this->t('Company Or Client Name'),
          '#required' => TRUE,
          '#size' => 60,
          '#default_value' => $row->client_name,
          '#maxlength' => 128,
          '#wrapper_attributes' => ['class' => 'col-md-6 col-xs-12'],
        ];
        $form['pan_or_tin'] = [
          '#type' => 'textfield',
          '#title' => $this->t('PAN/TIN'),
          '#required' => TRUE,
          '#size' => 60,
          '#default_value' => $row->pan_or_tin,
          '#wrapper_attributes' => ['class' => 'col-md-6 col-xs-12'],
        ];
        $form['gstin'] = [
          '#type' => 'textfield',
          '#title' => $this->t('GSTIN Number'),
          '#required' => TRUE,
          '#size' => 60,
          '#default_value' => $row->gstin,
          '#wrapper_attributes' => ['class' => 'col-md-6 col-xs-12'],
        ];
        $form['address'] = [
          '#type' => 'textarea',
          '#title' => $this->t('Address of Client'),
          '#required' => TRUE,
          '#size' => 400,
          '#maxlength' => 400,
          '#default_value' => $row->address,
          '#wrapper_attributes' => ['class' => 'col-md-6 col-xs-12'],
        ];
        $form['contact_person_name'] = [
          '#type' => 'textfield',
          '#title' => $this->t('Contact Person Name'),
          '#required' => TRUE,
          '#size' => 60,
          '#maxlength' => 128,
          '#default_value' => $row->contact_person_name,
          '#wrapper_attributes' => ['class' => 'col-md-6 col-xs-12'],
        ];
        $form['contact_person_email'] = [
          '#type' => 'textfield',
          '#title' => $this->t('Email'),
          '#required' => TRUE,
          '#size' => 60,
          '#maxlength' => 128,
          '#default_value' => $row->contact_person_email,
          '#wrapper_attributes' => ['class' => 'col-md-6 col-xs-12'],
        ];
        $form['phone'] = [
          '#type' => 'textfield',
          '#title' => $this->t('Phone Number'),
          '#required' => TRUE,
          '#size' => 60,
          '#maxlength' => 128,
          '#default_value' => $row->contact_person_phone,
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
            '#markup' => t('Edit Client Record'),
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
      $client_sr_id = $_REQUEST['sr_id'];
      $client_name = $form_state->getValue(['client_name']);
      $pan = $form_state->getValue(['pan_or_tin']);
      $gstin = $form_state->getValue(['gstin']);
      $address = $form_state->getValue(['address']);
      $person_name = $form_state->getValue(['contact_person_name']);
      $email = $form_state->getValue(['contact_person_email']);
      $phone = $form_state->getValue(['phone']);
      $updated = $this->database->update('client_table')
        ->fields(
                [
                  'client_name' => $client_name,
                  'pan_or_tin' => $pan,
                  'gstin' => $gstin,
                  'address' => $address,
                  'contact_person_name' => $person_name,
                  'contact_person_email' => $email,
                  'contact_person_phone' => $phone,
                ]
            )
        ->condition('id', $client_sr_id)
        ->execute();
      if ($updated) {
        $this->messenger->addMessage($this->t('The client data has been successfully updated'));
        $form_state->setRedirect('show_client');
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
