<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Coba_Data_tes extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
       
        $this->load->model('Users_model');
        $this->load->model('Coba_Data_tes_model');
        $this->load->model('Query_Coba_Dataset');
         $this->load->model('Query_Coba_Data_tes');

    }

    public function index()
    {
        $coba_data_tes = $this->Coba_Data_tes_model->get_all();
     
        $this->breadcrumbs->push('Data Train', '/coba_data_tes');

        $data = array(
         
            'content'     => 'coba_dataset/coba_dataset_list', 
            'breadcrumbs' => $this->breadcrumbs->show(),
           
            
            'coba_data_tes_data' => $coba_data_tes
        );

        $this->load->view('layout/layout', $data);
    }
    //langsung hasil klasifikasi
     public function klasifikasi_naive_bayes($id) 
    {
       
        $this->breadcrumbs->push('Klasifikasi_Coba_Dataset', '/klasifikasi_coba_dataset');
        $this->breadcrumbs->push('form_klasifikasi', '/klasifikasi_coba_dataset/hasil_klasifikasi');
        
        $row = $this->Coba_Data_tes_model->get_by_id($id);
        if ($row) {
            $data = array(
                'title'       => 'Klasifikasi_Coba_Data_tes' ,
                'content'     => 'klasifikasi_coba_data_tes/hasil_klasifikasi', 
                'breadcrumbs' => $this->breadcrumbs->show(),
               

                'button' => 'Analisa Prediksi',
                'action' => site_url('klasifikasi_coba_data_tes/hasil_klasifikasi'),
                
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

               
                //total data coba_dataset
                 $total_data=$data['total_data']=$this->Query_Coba_Data_tes->coba();
                 $total_yes=$data['total_yes']=$this->Query_Coba_Data_tes->variabel_y_yes();
                 $total_no=$data['total_no']=$this->Query_Coba_Data_tes->variabel_y_no();

                $total_job_yes  = $this->Query_Coba_Data_tes->hitung_langsung_job_yes($data['job'],'yes')->jumlah;
                $total_job_no = $this->Query_Coba_Data_tes->hitung_langsung_job_no($data['job'],'no')->jumlah;
                 //total education coba_dataset
                
                                
                $total_education_yes= $this->Query_Coba_Data_tes->hitung_langsung_education_yes($data['education'],'yes')->jumlah;
                $total_education_no= $this->Query_Coba_Data_tes->hitung_langsung_education_no($data['education'],'no')->jumlah;

                  //total balance coba_dataset
                 $total_balance_yes= $this->Query_Coba_Data_tes->hitung_langsung_balance_yes($data['balance'],'yes')->jumlah;
                 $total_balance_no=$this->Query_Coba_Data_tes->hitung_langsung_balance_no($data['balance'],'no')->jumlah;
                  
                 //total loan coba_dataset
                 $total_loan_yes=$this->Query_Coba_Data_tes->hitung_langsung_loan_yes($data['loan'],'yes')->jumlah;
                 $total_loan_no=$this->Query_Coba_Data_tes->hitung_langsung_loan_no($data['loan'],'no')->jumlah;

                  //total month coba_dataset
                 $total_month_yes=$this->Query_Coba_Data_tes->hitung_langsung_month_yes($data['month'],'yes')->jumlah;
                 $total_month_no=$this->Query_Coba_Data_tes->hitung_langsung_month_no($data['month'],'no')->jumlah;

                  //total campaign coba_dataset
                 $total_campaign_yes=$this->Query_Coba_Data_tes->hitung_langsung_campaign_yes($data['campaign'],'yes')->jumlah;
                 $total_campaign_no=$this->Query_Coba_Data_tes->hitung_langsung_campaign_no($data['campaign'],'no')->jumlah;

                  //total previous coba_dataset
                 $total_previous_yes=$this->Query_Coba_Data_tes->hitung_langsung_previous_yes($data['previous'],'yes')->jumlah;
                 $total_previous_no=$this->Query_Coba_Data_tes->hitung_langsung_previous_no($data['previous'],'no')->jumlah;
                 
               //new probabilitas
                 $hasil_job_yes=$total_job_yes* $total_education_yes* $total_balance_yes* $total_loan_yes* $total_month_yes* $total_campaign_yes * $total_previous_yes;
                 $hasil_yes=$total_yes *$total_yes *$total_yes *$total_yes *$total_yes *$total_yes *$total_yes;
                 $yes=$hasil_job_yes/$hasil_yes;
                 
                 $hasil_job_no=$total_job_no * $total_education_no * $total_balance_no * $total_loan_no * $total_month_no * $total_campaign_no * $total_previous_no;
                 $hasil_no=$total_no *$total_no *$total_no *$total_no *$total_no *$total_no *$total_no;
                 $no=$hasil_job_no/$hasil_no;
                
                if ($yes < $no) {
                    $prediksi = "<font color= 'black'><h4><b>Tidak melanjutkan langganan deposito berjangka</b></h4></font>";
                }elseif ($yes > $no) {
                    $prediksi = "<font color= 'blue'><h4><b><u>Ya melanjutkan langganan deposito berjangka</b></h4></font>";
                }
                 else {
                    $prediksi = "<font color= 'red'><b>GAGAL</font>";
                }
                 $data["yes"] = $yes;
                $data["no"] = $no;
               


                $data["prediksi"] = $prediksi;
                $data["total_yes"] = $total_yes;
                $data["total_no"] = $total_no;
                $data["total_job_yes"] = $total_job_yes; 
                $data["total_job_no"] = $total_job_no;
                $data["total_education_yes"] = $total_education_yes;
                $data["total_education_no"] = $total_education_no;
                $data["total_balance_yes"] = $total_balance_yes;
                $data["total_balance_no"] = $total_balance_no;
                $data["total_loan_yes"] = $total_loan_yes;
                $data["total_loan_no"] = $total_loan_no;
                $data["total_month_yes"] = $total_month_yes;
                $data["total_month_no"] = $total_month_no;
                $data["total_campaign_yes"] = $total_campaign_yes;
                $data["total_campaign_no"] = $total_campaign_no;
                $data["total_previous_yes"] = $total_previous_yes;
                $data["total_previous_no"] = $total_previous_no;
                
                $this->load->view('layout/layout', $data);
        }
    }
//modifikasi
    public function modifikasi_naive_bayes($id){
       
        $this->breadcrumbs->push('Klasifikasi_Coba_Dataset', '/klasifikasi_coba_dataset');
        $this->breadcrumbs->push('form_klasifikasi', '/klasifikasi_coba_dataset/hasil_modifikasi');
        
        $row = $this->Coba_Data_tes_model->get_by_id($id);
        if ($row) {
            $data = array(
                'title'       => 'Klasifikasi_Coba_Data_tes' ,
                'content'     => 'klasifikasi_coba_data_tes/hasil_modifikasi', 
                'breadcrumbs' => $this->breadcrumbs->show(),
               

                'button' => 'Analisa Prediksi',
                'action' => site_url('klasifikasi_coba_data_tes/hasil_modifikasi'),
                
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
            /*  1. Ambil data ---> P(job = ? | Y= ?) = hasil_bagi  */

            
                //total data coba_dataset
                $total_data=$data['total_data']=$this->Query_Coba_Data_tes->coba();
                ///total yes
                $total_yes=$data['total_yes']=$this->Query_Coba_Data_tes->variabel_y_yes();
                ////total no
                $total_no=$data['total_no']=$this->Query_Coba_Data_tes->variabel_y_no();

                $total_job_yes  = $this->Query_Coba_Data_tes->hitung_langsung_job_yes($data['job'],'yes')->jumlah;
                $total_job_no = $this->Query_Coba_Data_tes->hitung_langsung_job_no($data['job'],'no')->jumlah;
                 //total education coba_dataset
                
                                
                $total_education_yes= $this->Query_Coba_Data_tes->hitung_langsung_education_yes($data['education'],'yes')->jumlah;
                $total_education_no= $this->Query_Coba_Data_tes->hitung_langsung_education_no($data['education'],'no')->jumlah;

                  //total balance coba_dataset
                 $total_balance_yes= $this->Query_Coba_Data_tes->hitung_langsung_balance_yes($data['balance'],'yes')->jumlah;
                 $total_balance_no=$this->Query_Coba_Data_tes->hitung_langsung_balance_no($data['balance'],'no')->jumlah;
                  
                 //total loan coba_dataset
                 $total_loan_yes=$this->Query_Coba_Data_tes->hitung_langsung_loan_yes($data['loan'],'yes')->jumlah;
                 $total_loan_no=$this->Query_Coba_Data_tes->hitung_langsung_loan_no($data['loan'],'no')->jumlah;

                  //total month coba_dataset
                 $total_month_yes=$this->Query_Coba_Data_tes->hitung_langsung_month_yes($data['month'],'yes')->jumlah;
                 $total_month_no=$this->Query_Coba_Data_tes->hitung_langsung_month_no($data['month'],'no')->jumlah;

                  //total campaign coba_dataset
                 $total_campaign_yes=$this->Query_Coba_Data_tes->hitung_langsung_campaign_yes($data['campaign'],'yes')->jumlah;
                 $total_campaign_no=$this->Query_Coba_Data_tes->hitung_langsung_campaign_no($data['campaign'],'no')->jumlah;

                  //total previous coba_dataset
                 $total_previous_yes=$this->Query_Coba_Data_tes->hitung_langsung_previous_yes($data['previous'],'yes')->jumlah;
                 $total_previous_no=$this->Query_Coba_Data_tes->hitung_langsung_previous_no($data['previous'],'no')->jumlah;
                 
               //new probabilitas
                 $hasil_job_yes=$total_job_yes+ $total_education_yes+ $total_balance_yes+ $total_loan_yes+ $total_month_yes+ $total_campaign_yes +$total_previous_yes;
                 $hasil_yes=$total_yes +$total_yes +$total_yes +$total_yes +$total_yes +$total_yes +$total_yes;
                 $hasil_modifikasi_yes=$hasil_job_yes/$hasil_yes;
                 
                 $hasil_job_no=$total_job_no + $total_education_no + $total_balance_no + $total_loan_no + $total_month_no + $total_campaign_no + $total_previous_no;
                 $hasil_no=$total_no +$total_no +$total_no +$total_no +$total_no +$total_no +$total_no;
                 $hasil_modifikasi_no=$hasil_job_no/$hasil_no;
                
                if ($hasil_modifikasi_yes < $hasil_modifikasi_no) {
                    $prediksi = "<font color= 'black'><h5><b>Tidak melanjutkan langganan deposito berjangka</b></h5></font>";
                }elseif ($hasil_modifikasi_yes > $hasil_modifikasi_no) {
                    $prediksi = "<font color= 'blue'><h5><b><u>Ya melanjutkan langganan deposito berjangka</b></h5></font>";
                }
                 else {
                    $prediksi = "<font color= 'red'><b>GAGAL</font>";
                }
                
                $data["prediksi"] = $prediksi;
                

                $data["total_yes"] = $total_yes;
                $data["total_no"] = $total_no;
                $data["hasil_modifikasi_yes"] =  $hasil_modifikasi_yes;
                $data["hasil_modifikasi_no"] =  $hasil_modifikasi_no;
                $data["total_job_yes"] = $total_job_yes; 
                $data["total_job_no"] = $total_job_no;
                $data["total_education_yes"] = $total_education_yes;
                $data["total_education_no"] = $total_education_no;
                $data["total_balance_yes"] = $total_balance_yes;
                $data["total_balance_no"] = $total_balance_no;
                $data["total_loan_yes"] = $total_loan_yes;
                $data["total_loan_no"] = $total_loan_no;
                $data["total_month_yes"] = $total_month_yes;
                $data["total_month_no"] = $total_month_no;
                $data["total_campaign_yes"] = $total_campaign_yes;
                $data["total_campaign_no"] = $total_campaign_no;
                $data["total_previous_yes"] = $total_previous_yes;
                $data["total_previous_no"] = $total_previous_no;
                
                $this->load->view('layout/layout', $data);
        }
    }

//laplace
     public function laplace_smoothing($id){
        
        $this->breadcrumbs->push('Klasifikasi_Coba_Dataset', '/klasifikasi_coba_dataset');
        $this->breadcrumbs->push('form_klasifikasi', '/klasifikasi_coba_dataset/hasil_modifikasi_laplace_smoothing');
        
        $row = $this->Coba_Data_tes_model->get_by_id($id);
        if ($row) {
            $data = array(
                'title'       => 'Klasifikasi_Coba_Data_tes' ,
                'content'     => 'klasifikasi_coba_data_tes/hasil_modifikasi_laplace_smoothing', 
                'breadcrumbs' => $this->breadcrumbs->show(),
                

                'button' => 'Analisa Prediksi',
                'action' => site_url('klasifikasi_coba_data_tes/hasil_modifikasi_laplace_smoothing'),
                
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
            /*  1. Ambil data ---> P(job = ? | Y= ?) = hasil_bagi  */   
            
                //total data coba_dataset
                $total_data=$data['total_data']=$this->Query_Coba_Data_tes->coba();
                ///total yes
                $total_yes=$data['total_yes']=$this->Query_Coba_Data_tes->variabel_y_yes();
                ////total no
                $total_no=$data['total_no']=$this->Query_Coba_Data_tes->variabel_y_no();

               $total_job_yes  = $this->Query_Coba_Data_tes->hitung_langsung_job_yes($data['job'],'yes')->jumlah;
                if ($total_job_yes == 0) {
                    $total_job_yes=+1;
                }else{
                    $total_job_yes;
                }
                $total_job_no = $this->Query_Coba_Data_tes->hitung_langsung_job_no($data['job'],'no')->jumlah;
                if ($total_job_no == 0) {
                    $total_job_no=+1;
                }else{
                    $total_job_no;
                }
                
                //total education coba_dataset
                $total_education_yes= $this->Query_Coba_Data_tes->hitung_langsung_education_yes($data['education'],'yes')->jumlah;
                if ($total_education_yes == 0) {
                    $total_education_yes=+1;
                } else {
                    $total_education_yes;
                }
                $total_education_no= $this->Query_Coba_Data_tes->hitung_langsung_education_no($data['education'],'no')->jumlah;
                if ($total_education_no == 0) {
                    $total_education_no=+1;
                } else {
                    $total_education_no;
                }
                  //total balance coba_dataset
                 $total_balance_yes= $this->Query_Coba_Data_tes->hitung_langsung_balance_yes($data['balance'],'yes')->jumlah;
                 if ($total_balance_yes == 0) {
                     $total_balance_yes=+1;
                 } else {
                     $total_balance_yes;
                 }
                 $total_balance_no=$this->Query_Coba_Data_tes->hitung_langsung_balance_no($data['balance'],'no')->jumlah;
                 if ($total_balance_no == 0) {
                    $total_balance_no=+1;
                } else {
                    $total_balance_no;
                }
                 //total loan coba_dataset
                 $total_loan_yes=$this->Query_Coba_Data_tes->hitung_langsung_loan_yes($data['loan'],'yes')->jumlah;
                 if ($total_loan_yes == 0) {
                     $total_loan_yes=+1;
                 } else {
                    $total_loan_yes;
                 }
                 $total_loan_no=$this->Query_Coba_Data_tes->hitung_langsung_loan_no($data['loan'],'no')->jumlah;
                 if ($total_loan_no == 0) {
                    $total_loan_no=+1;
                } else {
                   $total_loan_no;
                }
                  //total month coba_dataset
                $total_month_yes=$this->Query_Coba_Data_tes->hitung_langsung_month_yes($data['month'],'yes')->jumlah;
                 if ($total_month_yes == 0) {
                    $total_month_yes=+1;
                 } else {
                    $total_month_yes;
                 }
                 $total_month_no=$this->Query_Coba_Data_tes->hitung_langsung_month_no($data['month'],'no')->jumlah;
                 if ($total_month_no == 0) {
                    $total_month_no=+1;
                 } else {
                    $total_month_no;
                 }
                  //total campaign coba_dataset
                 $total_campaign_yes=$this->Query_Coba_Data_tes->hitung_langsung_campaign_yes($data['campaign'],'yes')->jumlah;
                 if ($total_campaign_yes == 0) {
                     $total_campaign_yes=+1;
                 } else {
                    $total_campaign_yes;
                 }
                 $total_campaign_no=$this->Query_Coba_Data_tes->hitung_langsung_campaign_no($data['campaign'],'no')->jumlah;
                 if ($total_campaign_no == 0) {
                    $total_campaign_no=+1;
                } else {
                   $total_campaign_no;
                }
                  //total previous coba_dataset
                 $total_previous_yes=$this->Query_Coba_Data_tes->hitung_langsung_previous_yes($data['previous'],'yes')->jumlah;
                 if ($total_previous_yes == 0) {
                     $total_previous_yes=+1;
                 } else {
                    $total_previous_yes;
                 }
                 $total_previous_no=$this->Query_Coba_Data_tes->hitung_langsung_previous_no($data['previous'],'no')->jumlah;
                 if ($total_previous_no == 0) {
                    $total_previous_no=+1;
                } else {
                   $total_previous_no;
                }
               //new probabilitas
               $hasil_data_yes=$total_job_yes* $total_education_yes* $total_balance_yes* $total_loan_yes* $total_month_yes* $total_campaign_yes * $total_previous_yes;
               $hasil_yes=$total_yes *$total_yes *$total_yes *$total_yes *$total_yes *$total_yes *$total_yes;
               $yes=$hasil_data_yes/$hasil_yes;
               
               
               $hasil_data_no=$total_job_no * $total_education_no * $total_balance_no * $total_loan_no * $total_month_no * $total_campaign_no * $total_previous_no;
               $hasil_no=$total_no *$total_no *$total_no *$total_no *$total_no *$total_no *$total_no;
               $no=$hasil_data_no/$hasil_no;
                
              
              if ($yes < $no) {
                  $prediksi = "<font color= 'black'>Tidak melanjutkan langganan deposito berjangka</font>";
              }elseif ($yes > $no) {
                  $prediksi = "<font color= 'blue'><b><u>Ya melanjutkan langganan deposito berjangka</font>";
              }
               else {
                  $prediksi = "<font color= 'red'><b>GAGAL</font>";
              }
                 $data["yes"] = $yes;
                $data["no"] = $no;


                $data["prediksi"] = $prediksi;
                

                $data["total_yes"] = $total_yes;
                $data["total_no"] = $total_no;

               
                $data["total_job_yes"] = $total_job_yes; 
                $data["total_job_no"] = $total_job_no;
                $data["total_education_yes"] = $total_education_yes;
                $data["total_education_no"] = $total_education_no;
                $data["total_balance_yes"] = $total_balance_yes;
                $data["total_balance_no"] = $total_balance_no;
                $data["total_loan_yes"] = $total_loan_yes;
                $data["total_loan_no"] = $total_loan_no;
                $data["total_month_yes"] = $total_month_yes;
                $data["total_month_no"] = $total_month_no;
                $data["total_campaign_yes"] = $total_campaign_yes;
                $data["total_campaign_no"] = $total_campaign_no;
                $data["total_previous_yes"] = $total_previous_yes;
                $data["total_previous_no"] = $total_previous_no;
                
                $this->load->view('layout/layout', $data);
        }
    }

    public function read($id) 
    {
       
        $this->breadcrumbs->push('Coba_Data_tes', '/coba_dataset');
        $this->breadcrumbs->push('detail', '/coba_dataset/read');
        $row = $this->Coba_Data_tes_model->get_by_id($id);
        if ($row) {
            $data = array(
                'title'       => 'Kelola Dataset' ,
                'content'     => 'coba_dataset/coba_dataset_read', 
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
            redirect(site_url('coba_dataset'));
        }
    }

    public function create() 
    {
       
        $this->breadcrumbs->push('Coba_Data_tes', '/coba_dataset');
        $this->breadcrumbs->push('tambah', '/coba_dataset/create');
        $data = array(
            'title'       => 'Coba_Dataset' ,
            'content'     => 'coba_dataset/coba_dataset_form', 
            'breadcrumbs' => $this->breadcrumbs->show(),
            
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

            $this->Coba_Data_tes_modell->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('coba_dataset'));
        }
    }
    
    public function ubah($id) 
    {
       
        $this->breadcrumbs->push('Coba_Data_tes', '/coba_dataset');
        $this->breadcrumbs->push('ubah', '/coba_dataset/ubah');
        
        $row = $this->Coba_Data_tes_model->get_by_id($id);
        if ($row) {
            $data = array(
                'title'       => 'Coba_Dataset' ,
                'content'     => 'coba_dataset/coba_dataset_form', 
                'breadcrumbs' => $this->breadcrumbs->show(),
               

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

            $this->Coba_Data_tes_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('coba_dataset'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Coba_Data_tes_model->get_by_id($id);

        if ($row) {
            $this->Coba_Data_tes_model->delete($id);
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