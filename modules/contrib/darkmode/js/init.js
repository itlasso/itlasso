/**
 * @file
 * Provides base JS for darkmode.
 */

(function (Drupal, once) {

  /**
   * Enables the dark mode widget.
   */
  Drupal.behaviors.darkModeWidget = {
    attach: function (context) {
      // Check if the Darkmode library is available.
      if (typeof Darkmode !== 'undefined') {
        return;
      }

      once('darkmode', 'body', context).forEach(() => {
        const options = {
          bottom: '64px',
          right: '32px',
          left: 'unset',
          time: '0.5s',
          mixColor: '#fff',
          backgroundColor: '#fff',
          buttonColorDark: '#100f2c',
          buttonColorLight: '#fff',
          saveInCookies: false,
          label: '🌓',
          autoMatchOsTheme: true
        };

        // Initialize the dark mode widget.
        const darkmode = new Darkmode(options);
        darkmode.showWidget();

      })
    }
  }
})(Drupal, once);
