<?php

namespace Drupal\invoice_to_client\Form;

use Drupal\Core\Database\Connection;
use Drupal\Core\Entity\EntityTypeManagerInterface;
use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Messenger\MessengerInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * This is a brief description of the class.
 *
 * Class EditOrganizationInfo.
 */
class EditOrganizationInfo extends FormBase {

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
   * Factory method to create an instance of the EditOrganizationInfo class.
   *
   * class with the required services and dependencies injected.
   *
   * @param \Symfony\Component\DependencyInjection\ContainerInterface $container
   *   The container that holds the application services.
   *
   * @return static
   *   A new instance of the EditOrganizationInfo class.
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
    return 'edit_organization_info_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $form['#attached']['library'][] = 'invoice_to_client/invoice_to_client';
    $org_id = $_REQUEST['edit_id'];
    $org_query = $this->database->select('organization_info_table', 't')
      ->fields('t')
      ->condition('t.id', $org_id)
      ->execute()
      ->fetch();
    if (!$org_query) {
      $this->messenger->addMessage($this->t('No records found'));
    }
    else {
      $logo_file_id = $org_query->organization_logo;
      $file = $this->entityTypeManager->getStorage('file')->load($logo_file_id);
      // $file = File::load($logo_file_id);
      if ($file) {
        $fileUri = $file->getFileUri();
      }
      else {
        $fileUri = '';
      }
      $form['organization_name'] = [
        '#type' => 'textfield',
        '#title' => $this->t('Name of organization'),
        '#required' => TRUE,
        '#size' => 60,
        '#maxlength' => 100,
        '#default_value' => $org_query->organization_name,
        '#wrapper_attributes' => ['class' => 'col-md-6 col-xs-12'],
      ];
      $form['address'] = [
        '#type' => 'textarea',
        '#title' => $this->t('Full Address'),
        '#required' => TRUE,
        '#rows' => 3,
        '#cols' => 5,
        '#default_value' => $org_query->address,
        '#wrapper_attributes' => ['class' => 'col-md-6 col-xs-12'],
      ];
      $form['postal_code'] = [
        '#type' => 'textfield',
        '#title' => $this->t('Pin code'),
        '#required' => TRUE,
        '#size' => 20,
        '#maxlength' => 6,
        '#default_value' => $org_query->postal_code,
        '#wrapper_attributes' => ['class' => 'col-md-6 col-xs-12'],
      ];
      $form['work_location'] = [
        '#type' => 'textfield',
        '#title' => $this->t('Work location'),
        '#required' => TRUE,
        '#size' => 60,
        '#maxlength' => 50,
        '#default_value' => $org_query->work_location,
        '#wrapper_attributes' => ['class' => 'col-md-6 col-xs-12'],
      ];
      $form['account_holder_name'] = [
        '#type' => 'textfield',
        '#title' => $this->t('Account holder name'),
        '#required' => TRUE,
        '#size' => 60,
        '#maxlength' => 100,
        '#default_value' => $org_query->account_holder_name,
        '#wrapper_attributes' => ['class' => 'col-md-6 col-xs-12'],
      ];
      $form['bank_name'] = [
        '#type' => 'textfield',
        '#title' => $this->t('Bank Name'),
        '#required' => TRUE,
        '#size' => 60,
        '#maxlength' => 100,
        '#default_value' => $org_query->bank_name,
        '#wrapper_attributes' => ['class' => 'col-md-6 col-xs-12'],
      ];
      $form['bank_branch_name'] = [
        '#type' => 'textfield',
        '#title' => $this->t('Bank branch name'),
        '#required' => TRUE,
        '#size' => 60,
        '#maxlength' => 100,
        '#default_value' => $org_query->bank_branch_name,
        '#wrapper_attributes' => ['class' => 'col-md-6 col-xs-12'],
      ];
      $form['account_number'] = [
        '#type' => 'textfield',
        '#title' => $this->t('Account number'),
        '#required' => TRUE,
        '#size' => 20,
        '#maxlength' => 20,
        '#default_value' => $org_query->account_number,
        '#wrapper_attributes' => ['class' => 'col-md-6 col-xs-12'],
      ];
      $form['ifsc_code'] = [
        '#type' => 'textfield',
        '#title' => $this->t('IFSC code'),
        '#required' => TRUE,
        '#size' => 20,
        '#maxlength' => 11,
        '#default_value' => $org_query->ifsc_code,
        '#wrapper_attributes' => ['class' => 'col-md-6 col-xs-12'],
      ];
      $form['pan_number'] = [
        '#type' => 'textfield',
        '#title' => $this->t('PAN number'),
        '#required' => TRUE,
        '#size' => 20,
        '#maxlength' => 10,
        '#default_value' => $org_query->pan_number,
        '#wrapper_attributes' => ['class' => 'col-md-6 col-xs-12'],
      ];
      $form['email'] = [
        '#type' => 'email',
        '#title' => $this->t('Email'),
        '#required' => TRUE,
        '#size' => 60,
        '#maxlength' => 100,
        '#default_value' => $org_query->email,
        '#wrapper_attributes' => ['class' => 'col-md-6 col-xs-12'],
      ];
      $form['website_name'] = [
        '#type' => 'textfield',
        '#title' => $this->t('Website name'),
        '#required' => TRUE,
        '#size' => 50,
        '#maxlength' => 100,
        '#default_value' => $org_query->website_name,
        '#element_validate' => ['invoice_to_client_website_name_validate'],
        '#wrapper_attributes' => ['class' => 'col-md-6 col-xs-12'],
      ];
      $form['gstin'] = [
        '#type' => 'textfield',
        '#title' => $this->t('GSTIN'),
        '#required' => TRUE,
        '#size' => 50,
        '#maxlength' => 100,
        '#default_value' => $org_query->gstin,
        '#wrapper_attributes' => ['class' => 'col-md-6 col-xs-12'],
      ];
      $form['organization_logo'] = [
        '#type' => 'managed_file',
        '#title' => $this->t('Organization logo'),
        '#upload_location' => 'public://invoice_images/',
        '#default_value' => isset($fileUri) ? [$fileUri] : [],
        '#upload_validators' => [
          'file_validate_extensions' => ['png gif jpg jpeg'],
        ],
      ];
      $form['actions']['submit'] = [
        '#type' => 'submit',
        '#value' => $this->t('Save'),
        '#attributes' => [
          'class' => ['btn', 'btn-success'],
        ],
      ];
      return $form;
    }
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    try {
      $org_id = $_REQUEST['edit_id'];
      $organization_name = $form_state->getValue('organization_name');
      $address = $form_state->getValue('address');
      $postal_code = $form_state->getValue('postal_code');
      $work_location = $form_state->getValue('work_location');
      $account_holder_name = $form_state->getValue('account_holder_name');
      $bank_name = $form_state->getValue('bank_name');
      $bank_branch_name = $form_state->getValue('bank_branch_name');
      $account_number = $form_state->getValue('account_number');
      $ifsc_code = $form_state->getValue('ifsc_code');
      $pan_number = $form_state->getValue('pan_number');
      $email = $form_state->getValue('email');
      $website_name = $form_state->getValue('website_name');
      $gstin = $form_state->getValue('gstin');
      $organization_logo = $form_state->getValue('organization_logo');
      if (!empty($organization_logo[0])) {
        $file_id = $organization_logo[0];
        $file = $this->entityTypeManager->getStorage('file')->load($file_id);
        $file->setPermanent();
        $file->save();
        if ($file) {
          $organization_logo = $file_id;
        }
        else {
          $organization_logo = '';
        }
      }
      $updated = $this->database->update('organization_info_table')
        ->fields(
                [
                  'organization_name' => $organization_name,
                  'address' => $address,
                  'postal_code' => $postal_code,
                  'work_location' => $work_location,
                  'account_holder_name' => $account_holder_name,
                  'bank_name' => $bank_name,
                  'bank_branch_name' => $bank_branch_name,
                  'account_number' => $account_number,
                  'ifsc_code' => $ifsc_code,
                  'pan_number' => $pan_number,
                  'email' => $email,
                  'website_name' => $website_name,
                  'gstin' => $gstin,
                  'organization_logo' => $organization_logo,
                ]
            )
        ->condition('id', $org_id)
        ->execute();
      if ($updated) {
        $this->messenger->addMessage($this->t('The Organization data has been successfully updated'));
        $form_state->setRedirect('organiztion_info_display');
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
