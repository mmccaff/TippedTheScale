<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ask extends CI_Controller {

	function __construct()
    {
		parent::__construct();

        $this->load->helper('url');
        $this->load->model('qa_model');
    }


	public function index()
	{
		$this->load->view('ask');
	}

	public function save()
	{
		$question = $this->input->post('question', TRUE);
		$optionOne = $this->input->post('option_a', TRUE);
		$optionTwo = $this->input->post('option_b', TRUE);
		$resultsTimer = $this->input->post('results_timer', TRUE);

		// escape user supplied html
		$questionText = htmlspecialchars(trim($question));
		$optionOne = htmlspecialchars(trim($optionOne));
		$optionTwo = htmlspecialchars(trim($optionTwo));

		// ignore everything but link to image, and then wrap in a tag
		$pattern = "/(http|https):\/\/([\w|.\/\-?=\+&#~]+\.(?:jpe?g|png|gif))/";
		preg_match($pattern, $optionOne, $matches);

		if (count($matches))
		{
			$optionOneImg = $matches[0];
		}	
				
		preg_match($pattern, $optionTwo, $matches);
		if (count($matches)) 
		{
			$optionTwoImg = $matches[0];
		}

		if (empty($optionOneImg) || empty($optionTwoImg) || empty($question))
		{
			$this->load->view('savedQuestionInputError');
			return;			
		}

		$createdId = $this->qa_model->setQuestion($question, $optionOneImg, $optionTwoImg, $resultsTimer);

		// this is essentially replicating getQuestion to avoid an extra sql call
		$viewData['id'] = $createdId;

		$this->load->view('savedQuestion', $viewData);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */