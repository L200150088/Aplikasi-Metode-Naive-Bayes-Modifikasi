<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Pengujian extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Pengujian_model');
        $this->load->model('Query_Naive_Bayes');
        
      
    }
    public function index()
    {
        $pengujian = $this->Pengujian_model->get_all();
      
        $this->breadcrumbs->push('pengujian', '/pengujian');
        $data = array(
         
            'content'     => 'pengujian/pengujian_list', 
            'breadcrumbs' => $this->breadcrumbs->show(),
            
            
            'pengujian_data' => $pengujian
        );
        $this->load->view('layout/layout', $data);
    }
    
///pengujian
public function pengujian(){
        
   
    $this->breadcrumbs->push('Pengujian', '/pengujian');
    $this->breadcrumbs->push('pengujian', '/pengujian_list');
    
    $row = $this->Pengujian_model->get_all();
    if ($row) {
        $data = array(
            'title'       => 'Pengujian' ,
            'content'     => 'pengujian/pengujian_list', 
            'breadcrumbs' => $this->breadcrumbs->show(),
          
        );

    $total_data_testing=$data['$total_data_testing']=$this->Query_Naive_Bayes->coba_testing();
    $total_data_training=$data['$total_data_training']=$this->Query_Naive_Bayes->coba();
    

     $total_pengujian_yes=$this->Query_Naive_Bayes->pengujian_yes(); 
     $total_pengujian_no=$this->Query_Naive_Bayes->pengujian_no();
     
     $total_pengujian_yes_no=$this->Query_Naive_Bayes->pengujian_yes_no();
     
     $total_pengujian_no_yes=$this->Query_Naive_Bayes->pengujian_no_yes();
     
   
     $data["total_data_training"] = $total_data_training;
    $data["total_data_testing"] = $total_data_testing;
    $data["total_pengujian_yes"] = $total_pengujian_yes;
    $data["total_pengujian_no"] = $total_pengujian_no;
    $data["total_pengujian_yes_no"] = $total_pengujian_yes_no;
    $data["total_pengujian_no_yes"] = $total_pengujian_no_yes;
    ///query update
    $this->load->view('layout/layout', $data);
}
}

public function pengujian_naive_bayes_modifikasi(){
        
    
    $this->breadcrumbs->push('Pengujian', '/pengujian');
    $this->breadcrumbs->push('pengujian', '/pengujian_list_modifikasi');
    
    $row = $this->Pengujian_model->get_all();
    if ($row) {
        $data = array(
            'title'       => 'Pengujian' ,
            'content'     => 'pengujian/pengujian_list_modifikasi', 
            'breadcrumbs' => $this->breadcrumbs->show(),
            
        );
    $total_data_testing=$data['total_data_testing']=$this->Query_Naive_Bayes->coba_testing();
    $total_data_training=$data['$total_data_training']=$this->Query_Naive_Bayes->coba();
        
     $total_pengujian_yes=$this->Query_Naive_Bayes->pengujian_yes(); 
     $total_pengujian_no=$this->Query_Naive_Bayes->pengujian_no();
     
     $total_pengujian_yes_no=$this->Query_Naive_Bayes->pengujian_yes_no();
     
     $total_pengujian_no_yes=$this->Query_Naive_Bayes->pengujian_no_yes();
     
        
     $data["total_data_training"] = $total_data_training;
     $data["total_data_testing"] = $total_data_testing;
    $data["total_pengujian_yes"] = $total_pengujian_yes;
    $data["total_pengujian_no"] = $total_pengujian_no;
    $data["total_pengujian_yes_no"] = $total_pengujian_yes_no;
    $data["total_pengujian_no_yes"] = $total_pengujian_no_yes;
    ///query update
    $this->load->view('layout/layout', $data);
}
}


public function pengujian_laplace(){
        
   
    $this->breadcrumbs->push('Pengujian', '/pengujian');
    $this->breadcrumbs->push('pengujian', '/pengujian_laplace');
    
    $row = $this->Pengujian_model->get_all();
    if ($row) {
        $data = array(
            'title'       => 'Pengujian' ,
            'content'     => 'pengujian/pengujian_laplace', 
            'breadcrumbs' => $this->breadcrumbs->show(),
            
        );
    
    $total_data_testing=$data['total_data_testing']=$this->Query_Naive_Bayes->coba_testing();
    $total_data_training=$data['$total_data_training']=$this->Query_Naive_Bayes->coba();
        
     $total_pengujian_yes=$this->Query_Naive_Bayes->pengujian_yes();
     $total_pengujian_no=$this->Query_Naive_Bayes->pengujian_no();
     
     $total_pengujian_yes_no=$this->Query_Naive_Bayes->pengujian_yes_no();
     
     $total_pengujian_no_yes=$this->Query_Naive_Bayes->pengujian_no_yes();
     
        
     $data["total_data_training"] = $total_data_training;
     $data["total_data_testing"] = $total_data_testing;
    $data["total_pengujian_yes"] = $total_pengujian_yes;
    $data["total_pengujian_no"] = $total_pengujian_no;
    $data["total_pengujian_yes_no"] = $total_pengujian_yes_no;
    $data["total_pengujian_no_yes"] = $total_pengujian_no_yes;
    ///query update
    $this->load->view('layout/layout', $data);
}
}

    public function _rules() 
    {
        $this->form_validation->set_rules('id', 'id', 'trim|required');
		
		$this->form_validation->set_rules('yes_TP', 'yes_TP', 'trim|required');
        $this->form_validation->set_rules('no_FN', 'no_FN', 'trim|required');
        
        $this->form_validation->set_rules('yes_FP', 'yes_FP', 'trim|required');
		$this->form_validation->set_rules('no_TN', 'no_TN', 'trim|required');

		$this->form_validation->set_rules('id', 'id', 'trim');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    } 

}