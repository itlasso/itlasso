namespace Drupal\support_ticket\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Implements the support ticket form.
 */
class SupportTicketForm extends FormBase {

  public function getFormId() {
    return 'support_ticket_form';
  }

  public function buildForm(array $form, FormStateInterface $form_state) {
    $form['date'] = [
      '#type' => 'date',
      '#title' => $this->t('Date'),
      '#required' => TRUE,
      '#default_value' => date('Y-m-d'),
      '#placeholder' => $this->t('Enter date'),
    ];

    $form['company_name'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Company Name'),
      '#required' => TRUE,
      '#placeholder' => $this->t('Enter company name'),
    ];

    $form['name'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Name'),
      '#required' => TRUE,
      '#placeholder' => $this->t('Enter your name'),
    ];

    $form['email'] = [
      '#type' => 'email',
      '#title' => $this->t('Email'),
      '#required' => TRUE,
      '#placeholder' => $this->t('Enter your email'),
    ];

    $form['phone_number'] = [
      '#type' => 'tel',
      '#title' => $this->t('Phone Number'),
      '#placeholder' => $this->t('Enter your phone number'),
    ];

    $form['service_issue'] = [
      '#type' => 'select',
      '#title' => $this->t('Service Issue'),
      '#options' => [
        'website' => $this->t('Website'),
        'virus' => $this->t('Virus'),
        'hardware' => $this->t('Computer Hardware'),
        'software' => $this->t('Computer Software'),
        'other' => $this->t('Other'),
      ],
    ];

    $form['issue_description'] = [
      '#type' => 'textarea',
      '#title' => $this->t('Issue Description'),
      '#required' => TRUE,
      '#placeholder' => $this->t('Describe the issue'),
    ];
    
    $form['file_upload'] = [
      '#type' => 'managed_file',
      '#title' => $this->t('Upload a file'),
      '#description' => $this->t('Allowed extensions: jpg jpeg png gif doc docx xls xlsx pdf'),
      '#upload_location' => 'public://support_tickets/',
      '#upload_validators' => [
        'file_validate_extensions' => ['jpg jpeg png gif doc docx xls xlsx pdf'],
        'file_validate_size' => [25600000], // 25MB
      ],
      '#required' => FALSE,
    ];

    $form['actions'] = [
      '#type' => 'actions',
    ];

    $form['actions']['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Submit'),
    ];

    return $form;
  }

  public function validateForm(array &$form, FormStateInterface $form_state) {
    // Add any validation needed.
  }

  public function submitForm(array &$form, FormStateInterface $form_state) {
    // Handle form submission, such as saving data.
    drupal_set_message($this->t('Ticket submitted successfully.'));
  }
}
