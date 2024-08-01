<?php

namespace Drupal\invoice_to_client\Form;

use Drupal\Core\Database\Connection;
use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Messenger\MessengerInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Class for add client form.
 *
 * {@inheritdoc}
 */
class AddClient extends FormBase {

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
   * Factory method to create an instance of the AddClient class.
   *
   * class with the required services and dependencies injected.
   *
   * @param \Symfony\Component\DependencyInjection\ContainerInterface $container
   *   The container that holds the application services.
   *
   * @return static
   *   A new instance of the AddClient class.
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
    return 'addClient_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $form['#attached']['library'][] = 'invoice_to_client/invoice_to_client';
    $form['client_name'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Company Or Client Name'),
      '#required' => TRUE,
      '#size' => 60,
      '#maxlength' => 128,
      '#wrapper_attributes' => ['class' => 'col-md-6 col-xs-12'],
    ];
    $form['pan_or_tin'] = [
      '#type' => 'textfield',
      '#title' => $this->t('PAN/TIN'),
      '#required' => TRUE,
      '#size' => 60,
      '#wrapper_attributes' => ['class' => 'col-md-6 col-xs-12'],
    ];
    $form['gstin'] = [
      '#type' => 'textfield',
      '#title' => $this->t('GSTIN Number'),
      '#required' => TRUE,
      '#size' => 60,
      '#wrapper_attributes' => ['class' => 'col-md-6 col-xs-12'],
    ];
    $form['address'] = [
      '#type' => 'textarea',
      '#title' => $this->t('Address of Client'),
      '#required' => TRUE,
      '#size' => 400,
      '#maxlength' => 400,
      '#wrapper_attributes' => ['class' => 'col-md-6 col-xs-12'],
    ];
    $form['contact_person_name'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Contact Person Name'),
      '#required' => TRUE,
      '#size' => 60,
      '#maxlength' => 128,
      '#wrapper_attributes' => ['class' => 'col-md-6 col-xs-12'],
    ];
    $form['contact_person_email'] = [
      '#type' => 'email',
      '#title' => $this->t('Email'),
      '#required' => TRUE,
      '#size' => 60,
      '#maxlength' => 128,
      '#wrapper_attributes' => ['class' => 'col-md-6 col-xs-12'],
    ];
    $form['phone'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Phone Number'),
      '#required' => TRUE,
      '#size' => 60,
      '#maxlength' => 128,
      '#element_validate' => ['invoice_to_client_validate_phone_number'],
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
        '#markup' => t('Add Client'),
      ],
      'form' => [$form],
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    try {
      $field['client_name'] = $form_state->getValue('client_name');
      $field['pan_or_tin'] = $form_state->getValue('pan_or_tin');
      $field['gstin'] = $form_state->getValue('gstin');
      $field['address'] = $form_state->getValue('address');
      $field['contact_person_name'] = $form_state->getValue('contact_person_name');
      $field['contact_person_email'] = $form_state->getValue('contact_person_email');
      $field['contact_person_phone'] = $form_state->getValue('phone');
      $this->database->insert('client_table')
        ->fields($field)->execute();
      $this->messenger->addMessage($this->t('The client data has been succesfully saved'));
    }
    catch (Exception $ex) {
      \Drupal::logger('invoice_to_client')->error($ex->getMessage());
    }

  }

}
