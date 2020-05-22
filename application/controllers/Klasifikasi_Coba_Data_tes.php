<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Klasifikasi_Coba_Data_tes extends CI_Controller {

	function __construct()
    {
        parent::__construct();
         $this->load->model('Query_Coba_Data_tes');
		$this->load->model('Users_model');
		$this->load->model('Coba_Data_tes_model');
		$this->load->model('Coba_Data_tes_model');
        if (!$this->ion_auth->logged_in())
        {
            redirect('auth/login', 'refresh');
        }
    }

	public function index()
	{
		$user = $this->ion_auth->user()->row();
		$id = $this->Data_set_model->get_by_id($user->id)->id;
		$job = $this->Data_set_model->get_by_id($user->id)->job;
        $this->breadcrumbs->push('Klasifikasi', '/klasifikasi');
        $this->breadcrumbs->push('Analisa Prediksi', 'dashboard');
        $data_set = $this->Data_set_model-> get_by_id($id);
        $data = array(
            'title'       => 'Klasifikasi Dataset Telemarketing Bank' ,
            'breadcrumbs' => $this->breadcrumbs->show(),
            'user'        => $user ,
            'button' => 'Klasifikasi',
           'action' => site_url('klasifikasi_coba_dataset/hitung_klasifikasi'),
		    'id' => set_value('id'),
		    'id' => $id,
			'job' => $job,
		    'id_user' => set_value('id_user'),
		    'tanggal' => set_value('tanggal'),
		    'marital' => set_value('marital'),
		    'education' => set_value('education'),
		    'df' => set_value('df'),
		    'balance' => set_value('balance'),
		    'housing' => set_value('housing'),
		    'loan' => set_value('loan'),
		    'day' => set_value('month'),
		    'month' => set_value('month'),
		    'duration' => set_value('duration'),
		    'campaign' => set_value('campaign'),
		    'pdays' => set_value('pdays'),
		    'previous' => set_value('previous'),
            'poutcome' => set_value('poutcome'),
		    'y' => set_value('y'),

			
		);
		// if($this->Klasifikasi_model->get_data_by_date($id_desa) == TRUE ){
		// 	$data['content'] = 'klasifikasi/sudah_input';
		// } else {
			$data['content'] = 'klasifikasi/form';
		//}
		
        $this->load->view('layout/layout', $data);
	}

//yg benar di bawah ini
	public function klasifikasi_form($id) 
    {
        $user = $this->ion_auth->user()->row();
        $this->breadcrumbs->push('Klasifikasi_Coba_Dataset', '/klasifikasi_coba_dataset');
        $this->breadcrumbs->push('form_klasifikasi', '/klasifikasi_coba_dataset/klasifikasi_form');
        
        $row = $this->Coba_Data_tes_model->get_by_id($id);
        if ($row) {
            $data = array(
                'title'       => 'Klasifikasi_Coba_Data_tes' ,
                'content'     => 'klasifikasi_coba_data_tes/klasifikasi_form', 
                'breadcrumbs' => $this->breadcrumbs->show(),
                'user'        => $user ,

                'button' => 'Analisa Prediksi',
                'action' => site_url('klasifikasi_coba_dataset/klasifikasi'),
                
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
///lanjutkan meski eror


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

       
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }	

}    
    


