<?php

namespace Drupal\darkmode\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Adds Darkmode switcher block.
 *
 * @Block(
 *   id = "darkmode_switcher",
 *   admin_label = @Translation("Darkmode Switcher"),
 * )
 */
class DarkmodeSwitcherBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    $build['content'] = [
      '#attached' => [
        'library' => [
          'darkmode/initiator',
        ],
      ],
    ];
    return $build;
  }

}
