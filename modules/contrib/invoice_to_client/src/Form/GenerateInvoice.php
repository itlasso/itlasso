<?php

namespace Drupal\invoice_to_client\Form;

use Drupal\Core\Database\Connection;
use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * This is a brief description of the class.
 *
 * Class for Generate Invoice.
 */
class GenerateInvoice extends FormBase {

  /**
   * The database service.
   *
   * @var \Drupal\Core\Database\Connection
   */
  protected $database;

  /**
   * OrganizationInfo constructor.
   *
   * @param \Drupal\Core\Database\Connection $database
   *   The database service.
   */
  public function __construct(Connection $database) {
    $this->database = $database;
  }

  /**
   * {@inheritdoc}
   *
   * Factory method to create an instance of the GenerateInvoice class.
   *
   * class with the required services and dependencies injected.
   *
   * @param \Symfony\Component\DependencyInjection\ContainerInterface $container
   *   The container that holds the application services.
   *
   * @return static
   *   A new instance of the GenerateInvoice class.
   */
  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('database')
    );
  }

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'generateInvoice_form';
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
    $form['actions']['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Submit'),
      '#attributes' => [
        'class' => ['btn', 'btn-success'],
      ],
    ];
    return [
      'header' => [
        '#prefix' => '<h5 class ="page-title">',
        '#suffix' => '</h5>',
        '#markup' => t('Gererate Invoice'),
      ],
      'form' => [$form],
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $client_id = $form_state->getValue('client');
    $form_state->setRedirect('invoice_select', ['sr_id' => $client_id]);
  }

}
