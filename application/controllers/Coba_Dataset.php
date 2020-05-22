<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Coba_Dataset extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Query_Coba_Dataset');
        $this->load->model('Users_model');
        $this->load->model('Coba_Dataset_model');


        $this->load->model('Users_model');
        $this->load->model('Coba_Dataset_model');
       
    }

    public function index()
    {
        $coba_dataset = $this->Coba_Dataset_model->get_all();
       
        $this->breadcrumbs->push('Data Train', '/coba_dataset');

        $data = array(
         
            'content'     => 'coba_dataset/coba_dataset_list', 
            'breadcrumbs' => $this->breadcrumbs->show(),
           
            
            'coba_dataset_data' => $coba_dataset
        );

        //memanggil tabel data_tes
        $db = $this->load->database('default', TRUE);
        $sql = $db->select('*')->get('data_tes');
        $query = $sql->result();

        $lihat = array();
        $data['data_tes']=$query;

        $this->load->view('layout/layout', $data);
    }
    ///tambahan
   

    public function read($id) 
    {
        $user = $this->ion_auth->user()->row();
        $this->breadcrumbs->push('Coba_Dataset', '/coba_dataset');
        $this->breadcrumbs->push('detail', '/coba_dataset/read');
        $row = $this->Coba_Dataset_model->get_by_id($id);
        if ($row) {
            $data = array(
                'title'       => 'Kelola Dataset' ,
                'content'     => 'coba_dataset/coba_dataset_read', 
                'breadcrumbs' => $this->breadcrumbs->show(),
                'user'        => $user ,
                
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
            redirect(site_url('coba_dataset'));
        }
    }

    public function create() 
    {
        $user = $this->ion_auth->user()->row();
        $this->breadcrumbs->push('Coba_Dataset', '/coba_dataset');
        $this->breadcrumbs->push('tambah', '/coba_dataset/create');
        $data = array(
            'title'       => 'Coba_Dataset' ,
            'content'     => 'coba_dataset/coba_dataset_form', 
            'breadcrumbs' => $this->breadcrumbs->show(),
            'user'        => $user ,

            'button' => 'Tambah',
            'action' => site_url('coba_dataset/create_action'),
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

            $this->Coba_Dataset_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('coba_dataset'));
        }
    }
    
    public function ubah($id) 
    {
        $user = $this->ion_auth->user()->row();
        $this->breadcrumbs->push('Coba_Dataset', '/coba_dataset');
        $this->breadcrumbs->push('ubah', '/coba_dataset/ubah');
        
        $row = $this->Coba_Dataset_model->get_by_id($id);
        if ($row) {
            $data = array(
                'title'       => 'Coba_Dataset' ,
                'content'     => 'coba_dataset/coba_dataset_form', 
                'breadcrumbs' => $this->breadcrumbs->show(),
                'user'        => $user ,

                'button' => 'Update',
                'action' => site_url('coba_dataset/update_action'),
                
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
            redirect(site_url('coba_dataset'));
        }
    }
    
    public function ubah_action() 
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

            $this->Coba_Dataset_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('coba_dataset'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Coba_Dataset_model->get_by_id($id);

        if ($row) {
            $this->Coba_Dataset_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('coba_dataset'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('coba_dataset'));
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