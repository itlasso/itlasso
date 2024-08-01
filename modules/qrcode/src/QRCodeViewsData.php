<?php

namespace Drupal\qrcode;

use Drupal\views\EntityViewsData;

/**
 * Provides views integration for qrcode entities.
 */
class QRCodeViewsData extends EntityViewsData {

  /**
   * {@inheritdoc}
   */
  public function getViewsData() {
    $data = parent::getViewsData();

    $data['qrcode']['qrcode_thumbnail'] = [
      'title' => $this->t('QRCode Thumbnail'),
      'help' => $this->t('test'),
      'field' => [
        'id' => 'qrcode_thumbnail',
      ],
    ];

    return $data;
  }

}
