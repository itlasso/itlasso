<?php

namespace Drupal\qrcode\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\qrcode\Entity\QRCode;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

/**
 * QRCode controller for downloading qrcodes.
 */
class QRCodeController extends ControllerBase {

  /**
   * Returns a render-able array for a test page.
   */
  public function download(QRCode $qrcode): BinaryFileResponse {
    $headers = [
      'Content-Type'     => 'application/pdf',
      'Content-Disposition' => 'attachment;filename="' . $qrcode->label() . '.svg"',
    ];

    return new BinaryFileResponse($qrcode->getFileUri(), 200, $headers, FALSE);
  }

}
