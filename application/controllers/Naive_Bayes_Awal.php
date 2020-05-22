<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Naive_Bayes_Awal extends CI_Controller
{
    public $CI = NULL;
    function __construct()
    {
        parent::__construct();
        $this->CI =& get_instance();
        $this->load->model('Naive_Bayes_model');

        
        $this->load->model('Query_Naive_Bayes');
        
     
    }

    public function index()
    {
       $naive_bayes = $this->Naive_Bayes_model->get_all();
       
        $this->breadcrumbs->push('naive_bayes_awal', '/naive_bayes_awal');

        $data = array(
         
            'content'     => 'naive_bayes_awal/naive_bayes_list', 
            'breadcrumbs' => $this->breadcrumbs->show(),
            
            
            'naive_bayes_data' => $naive_bayes
        );
        $this->load->view('layout/layout', $data);
    }

    public function _rules() 
    {
        $this->form_validation->set_rules('id', 'id', 'trim|required');
        $this->form_validation->set_rules('job', 'job', 'trim|required');
        
        $this->form_validation->set_rules('education', 'education', 'trim|required');
        $this->form_validation->set_rules('balance', 'balance', 'trim|required');
        
        $this->form_validation->set_rules('loan', 'loan', 'trim|required');
        $this->form_validation->set_rules('month', 'month', 'trim|required');
        
        $this->form_validation->set_rules('campaign', 'campaign', 'trim|required');
        
        $this->form_validation->set_rules('previous', 'previous', 'trim|required');
        
        $this->form_validation->set_rules('y', 'y', 'trim|required');

        $this->form_validation->set_rules('id', 'id', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    } 

    }