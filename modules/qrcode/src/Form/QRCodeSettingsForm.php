<?php

namespace Drupal\qrcode\Form;

use Drupal\Core\Form\ConfigFormBase;
use Psr\Container\ContainerInterface;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\StreamWrapper\StreamWrapperManagerInterface;

/**
 * The qrcode settings form class.
 */
class QRCodeSettingsForm extends ConfigFormBase {
  /**
   * Stream Wrapper Interface.
   *
   * @var Drupal\Core\StreamWrapper\StreamWrapperManagerInterface
   */
  protected $streamWrapperManager;

  /**
   * Construct.
   */
  public function __construct(StreamWrapperManagerInterface $streamWrapperManager) {
    $this->streamWrapperManager = $streamWrapperManager;
  }

  /**
   * {@inheritDoc}
   */
  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('stream_wrapper_manager'),
    );
  }

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return ['qrcode.settings'];
  }

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'qrcode_settings_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $config = $this->config('qrcode.settings');

    $form['thumbnails_directory'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Thumbnails directory'),
      '#default_value' => $config->get('thumbnails_directory') ?? 'public://qrcode_thumbnails',
      '#required' => TRUE,
      '#description' => $this->t('The path where to save the thumbnails to. This must be a valid path and should start with public://'),
    ];

    $form['enable_direct_urls'] = [
      '#type' => 'checkbox',
      '#title' => $this->t('Enable direct urls'),
      '#default_value' => $config->get('enable_direct_urls'),
      '#description' => $this->t('This will allow users to create qrcodes which directly point to the entered url. However using this will make the qrcode uneditable.'),
    ];

    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritDoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {
    parent::validateForm(
      $form, $form_state
    );

    $thumbnailsDirectory = $form_state->getValue('thumbnails_directory');

    if (!$this->streamWrapperManager->isValidUri($thumbnailsDirectory)) {
      $form_state->setErrorByName('thumbnails_directory', $this->t('@path is not a valid path.', [
        '@path' => $thumbnailsDirectory,
      ]));
    }
  }

  /**
   * {@inheritDoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $config = $this->config('qrcode.settings');
    $config->set('thumbnails_directory', rtrim($form_state->getValue('thumbnails_directory'), '/'));
    $config->set('enable_direct_urls', $form_state->getValue('enable_direct_urls'));
    $config->save();

    parent::submitForm($form, $form_state);
  }

}
