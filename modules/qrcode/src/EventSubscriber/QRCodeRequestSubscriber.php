<?php

namespace Drupal\qrcode\EventSubscriber;

use Symfony\Component\HttpKernel\Event\RequestEvent;
use Drupal\Core\PathProcessor\InboundPathProcessorInterface;
use Drupal\Core\Routing\TrustedRedirectResponse;
use Drupal\qrcode\QRCodeRepository;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\KernelEvents;

/**
 * QRCode subscriber for controller requests.
 */
class QRCodeRequestSubscriber implements EventSubscriberInterface {

  /**
   * The qrcode repository.
   *
   * @var \Drupal\qrcode\QRCodeRepository
   */
  protected $qrcodeRepository;

  /**
   * A path processor manager for resolving the system path.
   *
   * @var \Drupal\Core\PathProcessor\InboundPathProcessorInterface
   */
  protected $pathProcessor;

  /**
   * Constructs a \Drupal\qrcode\EventSubscriber\QRCodeRequestSubscriber object.
   *
   * @param \Drupal\qrcode\QRCodeRepository $qrcodeRepository
   *   The qrcode repository.
   * @param \Drupal\Core\PathProcessor\InboundPathProcessorInterface $path_processor
   *   The path processor.
   */
  public function __construct(QRCodeRepository $qrcodeRepository, InboundPathProcessorInterface $path_processor) {
    $this->qrcodeRepository = $qrcodeRepository;
    $this->pathProcessor = $path_processor;
  }

  /**
   * Handles the qrcode if any found.
   *
   * @param \Symfony\Component\HttpKernel\Event\RequestEvent $event
   *   The event to process.
   *
   * @throws \Drupal\Component\Plugin\Exception\InvalidPluginDefinitionException
   * @throws \Drupal\Component\Plugin\Exception\PluginNotFoundException
   */
  public function onKernelRequestCheckQrcode(RequestEvent $event) {
    $request = clone $event->getRequest();

    // Get URL info and process it to be used for hash generation.
    if (str_starts_with($request->getPathInfo(), '/system/files/') && !$request->query->has('file')) {
      // Private files paths are split by the inbound path processor and the
      // relative file path is moved to the 'file' query string parameter. This
      // is because the route system does not allow an arbitrary amount of
      // parameters. We preserve the path as is returned by the request object.
      // @see \Drupal\system\PathProcessor\PathProcessorFiles::processInbound()
      $path = $request->getPathInfo();
    }
    else {
      // Do the inbound processing so that for example language prefixes are
      // removed.
      $path = $this->pathProcessor->processInbound($request->getPathInfo(), $request);
    }
    $path = trim($path, '/');

    if (str_starts_with($path, 'qrcode/')) {
      $explodedPath = explode('qrcode/', $path);

      if (count($explodedPath) === 2) {
        $hash = $explodedPath[1];

        if ($qrCode = $this->qrcodeRepository->findMatchingQrCode($hash)) {
          if (!$qrCode->isPublished()) {
            return;
          }

          $qrCode->countHit();

          // Build redirect url.
          $url = $qrCode->getTargetUrl();
          $response = new TrustedRedirectResponse($url->setAbsolute()->toString(), 302, [
            'X-QRCode-ID' => $qrCode->id(),
          ]);
          $response->addCacheableDependency($qrCode);
          $response->addCacheableDependency($url);

          $event->setResponse($response);
        }
      }
    }
  }

  /**
   * {@inheritdoc}
   */
  public static function getSubscribedEvents() {
    $events[KernelEvents::REQUEST][] = ['onKernelRequestCheckQrcode', 33];
    return $events;
  }

}
