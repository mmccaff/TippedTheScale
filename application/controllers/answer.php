<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Answer extends CI_Controller {
	
	function __construct()
    {
		parent::__construct();

        $this->load->helper('url');
        $this->load->helper('date_format');
        $this->load->model('qa_model');
    }

	public function index()
	{
		// using custom routing for answer/:num in routes.php to override default class/method behavior
		$questionId = $this->uri->segment(2);
		
		// if not specified, redirect to a random question
		if (empty($questionId))
		{
			$questionId = $this->qa_model->getRandomQuestionId();
		
			// this would render a random question without a redirect, but the url would not be visible in the browser
			redirect("answer/$questionId");
		}
		
		$question = $this->qa_model->getQuestion($questionId);

		// if specified question does not exist, return a 404
		if (is_null($question))
		{
			show_404();
			return;
		}

		// show results link in view?
		$secondsCreatedAgo = time() - strtotime($question->timeCreated);
		$minutesLeft = 0;

		if ($question->resultsTimerMinutes == 0)
		{
			$minutesLeft = 0;
		}
		else if ($question->resultsTimerMinutes > 0)
		{
			if ($secondsCreatedAgo > ($question->resultsTimerMinutes * 60))
			{
				$minutesLeft = 0;
			}
			else
			{
				$minutesLeft = 	ceil($question->resultsTimerMinutes - ($secondsCreatedAgo/60));
				$timeUntilResults = time_from(date("Y-m-d H:i:s", time() + ($minutesLeft * 60))); 
			}
		}

		$viewData['id'] = $question->id; 
		$viewData['question'] = $question->question;
		$viewData['optionOne'] = $question->optionOne;
		$viewData['optionTwo'] = $question->optionTwo;
		$viewData['optionOneCount'] = $this->qa_model->getAnswerCountById($question->id, 1);
		$viewData['optionTwoCount'] = $this->qa_model->getAnswerCountById($question->id, 2);
		$viewData['minutesLeft'] = $minutesLeft;
		
		if (!empty($timeUntilResults))
		{
			$viewData['timeUntilResults'] = $timeUntilResults;
		}

		$this->load->view('answer', $viewData);
	}

	function save()
	{
		$question = $this->input->post('question', TRUE);
		$answer = $this->input->post('answer', TRUE);

		// one vote per ip address is not ideal, but good enough
		if ($this->qa_model->ipAddressVoted($question))
		{
			$this->load->view('deniedVote');
		}
		else
		{
			$this->qa_model->setAnswer($question, $answer);
			$this->load->view('savedVote');
		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */