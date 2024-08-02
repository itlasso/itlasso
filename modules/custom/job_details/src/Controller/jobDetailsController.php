namespace Drupal\job_details\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use Drupal\Core\Controller\ControllerBase;
use Drupal\node\Entity\Node;

class JobDetailsController extends ControllerBase {

  public function load($jobId) {
    $node = Node::load($jobId);
    if ($node && $node->bundle() == 'job_listing') {
      return new JsonResponse([
        'html' => $this->renderJobDetails($node),
      ]);
    }
    return new JsonResponse(['html' => '<p>Job not found</p>'], 404);
  }

  private function renderJobDetails($node) {
    return [
      '#theme' => 'job_details',
      '#title' => $node->getTitle(),
      '#location' => $node->get('field_location')->value,
      '#description' => $node->get('field_full_description')->value,
      '#responsibilities' => $node->get('field_responsibilities')->value,
      '#qualifications' => $node->get('field_qualifications')->value,
      '#pay' => $node->get('field_pay')->value,
      '#type' => $node->get('field_job_type')->value,
    ];
  }
}
