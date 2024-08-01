<?php

namespace Drupal\invoice_to_client\Form;

use Drupal\Core\Database\Connection;
use Drupal\Core\Entity\EntityTypeManagerInterface;
use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Messenger\MessengerInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Class for Organization information form.
 *
 * {@inheritdoc}
 */
class OrganizationInfo extends FormBase {

  /**
   * The entity type manager service.
   *
   * @var \Drupal\Core\Entity\EntityTypeManagerInterface
   */
  protected $entityTypeManager;

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
   * @param \Drupal\Core\Entity\EntityTypeManagerInterface $entityTypeManager
   *   The entity type manager service.
   * @param \Drupal\Core\Messenger\MessengerInterface $messenger
   *   The messenger service.
   * @param \Drupal\Core\Database\Connection $database
   *   The database service.
   */
  public function __construct(EntityTypeManagerInterface $entityTypeManager, MessengerInterface $messenger, Connection $database) {
    $this->entityTypeManager = $entityTypeManager;
    $this->messenger = $messenger;
    $this->database = $database;
  }

  /**
   * {@inheritdoc}
   *
   * Factory method to create an instance of the OrganizationInfo class.
   *
   * class with the required services and dependencies injected.
   *
   * @param \Symfony\Component\DependencyInjection\ContainerInterface $container
   *   The container that holds the application services.
   *
   * @return static
   *   A new instance of the OrganizationInfo class.
   */
  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('entity_type.manager'),
      $container->get('messenger'),
      $container->get('database')
    );
  }

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'organization_info_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $form['#attached']['library'][] = 'invoice_to_client/invoice_to_client';
    $form['organization_name'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Name of organization'),
      '#required' => TRUE,
      '#size' => 60,
      '#maxlength' => 100,
      '#wrapper_attributes' => ['class' => 'col-md-6 col-xs-12'],
    ];
    $form['address'] = [
      '#type' => 'textarea',
      '#title' => $this->t('Full Address'),
      '#required' => TRUE,
      '#rows' => 5,
      '#cols' => 60,
      '#maxlength' => 400,
      '#wrapper_attributes' => ['class' => 'col-md-6 col-xs-12'],
    ];

    $form['postal_code'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Pin code'),
      '#required' => TRUE,
      '#size' => 20,
      '#maxlength' => 6,
      '#wrapper_attributes' => ['class' => 'col-md-6 col-xs-12'],
    ];
    $form['work_location'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Work location'),
      '#required' => TRUE,
      '#size' => 60,
      '#maxlength' => 50,
      '#wrapper_attributes' => ['class' => 'col-md-6 col-xs-12'],
    ];
    $form['account_holder_name'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Account holder name'),
      '#required' => TRUE,
      '#size' => 60,
      '#maxlength' => 100,
      '#wrapper_attributes' => ['class' => 'col-md-6 col-xs-12'],
    ];
    $form['bank_name'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Bank Name'),
      '#required' => TRUE,
      '#size' => 60,
      '#maxlength' => 100,
      '#wrapper_attributes' => ['class' => 'col-md-6 col-xs-12'],
    ];
    $form['bank_branch_name'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Bank branch name'),
      '#required' => TRUE,
      '#size' => 60,
      '#maxlength' => 100,
      '#wrapper_attributes' => ['class' => 'col-md-6 col-xs-12'],
    ];
    $form['account_number'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Account number'),
      '#required' => TRUE,
      '#size' => 20,
      '#maxlength' => 20,
      '#wrapper_attributes' => ['class' => 'col-md-6 col-xs-12'],
    ];
    $form['ifsc_code'] = [
      '#type' => 'textfield',
      '#title' => $this->t('IFSC code'),
      '#required' => TRUE,
      '#size' => 20,
      '#maxlength' => 11,
      '#wrapper_attributes' => ['class' => 'col-md-6 col-xs-12'],
    ];
    $form['pan_number'] = [
      '#type' => 'textfield',
      '#title' => $this->t('PAN number'),
      '#required' => TRUE,
      '#size' => 20,
      '#maxlength' => 10,
      '#wrapper_attributes' => ['class' => 'col-md-6 col-xs-12'],
    ];
    $form['email'] = [
      '#type' => 'email',
      '#title' => $this->t('Email'),
      '#required' => TRUE,
      '#size' => 60,
      '#maxlength' => 100,
      '#wrapper_attributes' => ['class' => 'col-md-6 col-xs-12'],
    ];
    $form['website_name'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Website name'),
      '#required' => TRUE,
      '#size' => 60,
      '#maxlength' => 100,
      '#element_validate' => ['invoice_to_client_website_name_validate'],
      '#wrapper_attributes' => ['class' => 'col-md-6 col-xs-12'],
    ];
    $form['gstin'] = [
      '#type' => 'textfield',
      '#title' => $this->t('GSTIN'),
      '#required' => TRUE,
      '#size' => 60,
      '#maxlength' => 100,
      '#wrapper_attributes' => ['class' => 'col-md-6 col-xs-12'],
    ];
    $form['organization_logo'] = [
      '#type' => 'managed_file',
      '#title' => $this->t('Organization logo'),
      '#upload_location' => 'public://invoice_images/',
      '#upload_validators' => [
        '#wrapper_attributes' => ['class' => 'col-md-6 col-xs-12'],
      ],
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
        '#markup' => t('Add your organization information'),
      ],
      'form' => [$form],
    ];

  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    try {
      $field['organization_name'] = $form_state->getValue('organization_name');
      $field['address'] = $form_state->getValue('address');
      $field['postal_code'] = $form_state->getValue('postal_code');
      $field['work_location'] = $form_state->getValue('work_location');
      $field['account_holder_name'] = $form_state->getValue('account_holder_name');
      $field['bank_name'] = $form_state->getValue('bank_name');
      $field['bank_branch_name'] = $form_state->getValue('bank_branch_name');
      $field['account_number'] = $form_state->getValue('account_number');
      $field['ifsc_code'] = $form_state->getValue('ifsc_code');
      $field['pan_number'] = $form_state->getValue('pan_number');
      $field['email'] = $form_state->getValue('email');
      $field['website_name'] = $form_state->getValue('website_name');
      $field['gstin'] = $form_state->getValue('gstin');
      $organization_logo = $form_state->getValue('organization_logo');
      if (!empty($organization_logo[0])) {
        $file_id = $organization_logo[0];
        $file = $this->entityTypeManager->getStorage('file')->load($file_id);
        $file->setPermanent();
        $file->save();
        if ($file) {
          $field['organization_logo'] = $file_id;
        }
      }

      $this->database->insert('organization_info_table')
        ->fields($field)->execute();
      $this->messenger->addMessage($this->t('The organization information has been succesfully saved'));
    }
    catch (Exception $ex) {
      \Drupal::logger('invoice_to_client')->error($ex->getMessage());
    }

  }

}
