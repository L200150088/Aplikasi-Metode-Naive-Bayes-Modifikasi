<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Data_set extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Data_set_model');
       
    }

    public function index()
    {
        $data_set = $this->Data_set_model->get_all();
       
        $this->breadcrumbs->push('Data Train', '/data_set');

        $data = array(
         
            'content'     => 'data_set/data_set_list', 
            'breadcrumbs' => $this->breadcrumbs->show(),
            
            
            'data_set_data' => $data_set
        );

        $this->load->view('layout/layout', $data);
    }

    public function read($id) 
    {
        
        $this->breadcrumbs->push('Data_set', '/data_set');
        $this->breadcrumbs->push('detail', '/data_set/read');
        $row = $this->Data_set_model->get_by_id($id);
        if ($row) {
            $data = array(
                'title'       => 'Kelola Dataset' ,
                'content'     => 'data_set/data_set_read', 
                'breadcrumbs' => $this->breadcrumbs->show(),
                
                
				'id' => $row->id,
				'job' => $row->job,
				
				'education' => $row->education,
				
				'balance' => $row->balance,
				
				'loan' => $row->loan,
				
				'month' => $row->month,
				
				'campaign' => $row->campaign,
				
				'previous' => $row->previous,
				
                'y' => $row->y,

			);
            $this->load->view('layout/layout', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('data_set'));
        }
    }

    public function create() 
    {
       
        $this->breadcrumbs->push('Data_set', '/data_set');
        $this->breadcrumbs->push('tambah', '/data_set/create');
        $data = array(
            'title'       => 'Data_set' ,
            'content'     => 'data_set/data_set_form', 
            'breadcrumbs' => $this->breadcrumbs->show(),
           

            'button' => 'Tambah',
            'action' => site_url('data_set/create_action'),
            'id' => set_value('id'),
		   
		    'job' => set_value('job'),
		   
		    'education' => set_value('education'),
		   
		    'balance' => set_value('balance'),
		   
		    'loan' => set_value('loan'),
		   
		    'month' => set_value('month'),
		    
		    'campaign' => set_value('campaign'),
		    
		    'previous' => set_value('previous'),
            
		    'y' => set_value('y'),
		);
        $this->load->view('layout/layout', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
               
				'job' => $this->input->post('job',TRUE),
				
				'education' => $this->input->post('education',TRUE),
				
				'balance' => $this->input->post('balance',TRUE),
				
				'loan' => $this->input->post('loan',TRUE),
				
				'month' => $this->input->post('month',TRUE),
				
                'campaign' => $this->input->post('campaign',TRUE),
                
                'previous' => $this->input->post('previous',TRUE),
                
				'y' => $this->input->post('y',TRUE),
		    );
            $this->Data_set_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('data_set'));
        }
    }
    
    public function update($id) 
    {
        
        $this->breadcrumbs->push('Data_set', '/data_set');
        $this->breadcrumbs->push('update', '/data_set/update');
        
        $row = $this->Data_set_model->get_by_id($id);
        if ($row) {
            $data = array(
                'title'       => 'Data_set' ,
                'content'     => 'data_set/data_set_form', 
                'breadcrumbs' => $this->breadcrumbs->show(),
               

                'button' => 'Update',
                'action' => site_url('data_set/update_action'),
                
				'id' => set_value('id', $row->id),
                'job' => set_value('job', $row->job),
				
				'education' => set_value('education', $row->education),
				
				'balance' => set_value('balance', $row->balance),
				
				'loan' => set_value('loan', $row->loan),
				
				'month' => set_value('month', $row->month),
				
				'campaign' => set_value('campaign', $row->campaign),
				
				'previous' => set_value('previous', $row->previous),
                
				'y' => set_value('y', $row->y),
		    );
            $this->load->view('layout/layout', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('data_set'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
                
				'id' => set_value('id', $row->id),
                'job' => $this->input->post('job',TRUE),
				
				'education' => $this->input->post('education',TRUE),
				
				'balance' => $this->input->post('balance',TRUE),
				
				'loan' => $this->input->post('loan',TRUE),
				
				'month' => $this->input->post('month',TRUE),
				
				'campaign' => $this->input->post('campaign',TRUE),
				
				'previous' => $this->input->post('previous',TRUE),
				
                'y' => $this->input->post('y',TRUE),
		    );

            $this->Data_set_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('data_set'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Data_set_model->get_by_id($id);

        if ($row) {
            $this->Data_set_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('data_set'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('data_set'));
        }
    }

    
    public function delete_all() 
    {
        $row = $this->Data_set_model;

        if ($row) {
            $this->Data_set_model->delete_semua();
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('data_set'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('data_set'));
        }
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