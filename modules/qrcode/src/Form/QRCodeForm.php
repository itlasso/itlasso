<?php

namespace Drupal\qrcode\Form;

use Drupal\Core\Config\ConfigFactory;
use Psr\Container\ContainerInterface;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Entity\ContentEntityForm;

/**
 * QRCode Entity form.
 */
class QRCodeForm extends ContentEntityForm {
  /**
   * ConfigFactory.
   *
   * @var Drupal\Core\Config\ConfigFactory
   */
  protected $configFactory;

  /**
   * Construct.
   */
  public function __construct(ConfigFactory $configFactory) {
    $this->configFactory = $configFactory;
  }

  /**
   * {@inheritDoc}
   */
  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('config.factory'),
    );
  }

  /**
   * {@inheritdoc}
   */
  public function form(array $form, FormStateInterface $form_state) {
    $form = parent::form($form, $form_state);
    /** @var \Drupal\qrcode\Entity\QRCode $qrcode */
    $qrcode = $this->entity;

    if (!$qrcode->isNew()) {
      $form['use_direct_link']['#access'] = FALSE;
    }
    elseif ($this->configFactory->get('qrcode.settings')->get('enable_direct_urls') === FALSE) {
      $form['use_direct_link']['#disabled'] = TRUE;
      $form['use_direct_link']['widget']['value']['#description'] = $this->t('This feature is disabled in qrcode settings.');
    }

    if ($qrcode->usesDirectLink()) {
      $form['target']['#disabled'] = TRUE;
      $form['status']['#disabled'] = TRUE;
      $form['target']['widget'][0]['uri']['#description'] = $this->t('The url cannot be changed because this qrcode uses the "direct link" feature.');
    }

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function save(array $form, FormStateInterface $form_state) {
    $this->entity->save();
    $this->messenger()->addMessage($this->t('The qrcode has been saved.'));
    $form_state->setRedirect('qrcode.list');
  }

}
