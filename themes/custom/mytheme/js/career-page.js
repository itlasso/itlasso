(function ($, Drupal) {
  Drupal.behaviors.careerPage = {
    attach: function (context, settings) {
      $('.easy-apply', context).once('careerPage').on('click', function (event) {
        event.preventDefault();

        const jobId = $(this).data('job-id');

        $.ajax({
          url: `/job-details/${jobId}`,
          type: 'GET',
          dataType: 'json',
          success: function (data) {
            $('.job-details-container').html(data.html);
          },
          error: function (xhr, status, error) {
            console.error('Error fetching job details:', error);
          }
        });
      });
    }
  };
})(jQuery, Drupal);
