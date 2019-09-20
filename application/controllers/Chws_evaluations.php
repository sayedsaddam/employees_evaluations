<?php defined('BASEPATH') OR exit('No direct script access allowed!');
/**
 * Filename: Chws_evaluations.php
 * Filepath: controllers / Chws_evaluations.php
 * Author: Saddam
 */
class Chws_evaluations extends CI_Controller
{
    /**
     * summary
     */
    public function __construct()
    {
        parent::__construct();
    }
    // Index method, load automatically when this controller has called. CHW's evaluation form.
    public function index(){
    	$data['title'] = "CHW's Evaluation | Emp Evaluations";
    	$data['content'] = 'chw_evaluation';
    	$this->load->view('components/template', $data);
    }
    // AS's evaluation.
    public function as_evaluation(){
    	$data['title'] = "AS Evaluation | Emp Evaluation";
    	$data['content'] = 'as_evaluation';
    	$this->load->view('components/template', $data);
    }
}

?>