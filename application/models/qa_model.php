<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Qa_model extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
 
	function getQuestion($id)
    {
        $this->db->where("id", $id);
        $query = $this->db->get('questions');

        if ($query->num_rows() == 1) 
        {
            return $query->row();
        }
        
        return NULL;
    }

    function getRandomQuestionId()
    {
        // this is specific to mysql
        $query = $this->db->query("select id from questions order by RAND() LIMIT 1");
        $result = $query->row();

        return $result->id;
    }

    function getMaxQuestionId()
    {
        $query = $this->db->select_max('id');
        $query = $this->db->get('questions');
        $result = $query->row();

        return $result->id ? $result->id : 0;
    }

    function getAnswerCountById($id, $option)
    {
        $this->db->where('optionChosen', $option);
        $this->db->where('questionId', $id);
      
        return $this->db->count_all_results('answers');
    }

    function ipAddressVoted($id)
    {
        $this->db->where('ip', $this->input->ip_address());
        $this->db->where('questionId', $id);
      
        return $this->db->count_all_results('answers');
    }

    function setQuestion($question, $optionA, $optionB, $resultsTimer)
    {
        $timestamp = $create_date = date("Y-m-d H:i:s");
        $data = array(
            'question' => $question,
            'optionOne' => $optionA,
            'optionTwo' => $optionB,
            'timeCreated' => $timestamp,
            'resultsTimerMinutes' => $resultsTimer
        );
     
        $this->db->insert('questions', $data);

        return $this->db->insert_id();       
    }

    function setAnswer($id, $choice)
    {
        $timestamp = $create_date = date("Y-m-d H:i:s");
        $ip = $this->input->ip_address();

        $data = array(
            'questionId' => $id,
            'optionChosen' => $choice,
            'timeCreated' => $timestamp,
            'ip' => $ip
        );
    
        $this->db->insert('answers', $data);

        return $this->db->insert_id();
    }
   
}

?>