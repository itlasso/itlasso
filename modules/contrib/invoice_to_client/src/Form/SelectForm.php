<?php

namespace Drupal\invoice_to_client\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Class for selecting option form.
 *
 * {@inheritdoc}
 */
class SelectForm extends FormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'select_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $form['#attached']['library'][] = 'invoice_to_client/invoice_to_client';
    $form['Payment_Type'] = [
      '#type' => 'select',
      '#title' => $this->t('Select Payment Type'),
      '#options' => [
        'Hour' => t('Hourly'),
        'Month' => t('Monthly'),
      ],
      '#attributes' => [
        'class' => ['pay_select'],
      ],
      '#wrapper_attributes' => ['class' => 'col-md-4 col-xs-12'],
    ];
    $form['actions']['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Generate Invoice'),
      '#attributes' => [
        'class' => ['btn', 'btn-success'],
      ],
    ];
    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $pay_type = $form_state->getValue('Payment_Type');
    $client_id = $_REQUEST['sr_id'];
    if ($pay_type == 'Hour') {
      $form_state->setRedirect('hour_based.invoice', ['id' => $client_id]);
    }
    else {
      $form_state->setRedirect('month_based.invoice', ['id' => $client_id]);
    }
  }

}
