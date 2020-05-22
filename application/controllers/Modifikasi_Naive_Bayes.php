<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Modifikasi_Naive_Bayes extends CI_Controller
{
    public $CI = NULL;
    function __construct()
    {
        parent::__construct();
        $this->CI =& get_instance();
        $this->load->model('Naive_Bayes_model');
        $this->load->model('Data_set_model');
        $this->load->model('Query_Naive_Bayes');
        
        
        
    }

    public function index()
    {
       $naive_bayes = $this->Naive_Bayes_model->get_all();
       
        $this->breadcrumbs->push('modifikasi_naive_bayes', '/modifikasi_naive_bayes');

        $data = array(
         
            'content'     => 'modifikasi_naive_bayes/modifikasi_naive_bayes_list', 
            'breadcrumbs' => $this->breadcrumbs->show(),
           
            
            'naive_bayes_data' => $naive_bayes
        );

        $this->load->view('layout/layout', $data);
    }

     public function modifikasi_algoritma_naive_bayes($id) 
    {
       
        $this->breadcrumbs->push('Modifikasi_Naive_Bayes', '/modifikasi_naive_bayes');
        $this->breadcrumbs->push('modifikasi_naive_bayes', '/hasil__modifikasi_klasifikasi');
        
        $row = $this->Naive_Bayes_model->get_by_id($id);
        if ($row) {
            $data = array(
                'title'       => 'Modifikasi_Naive_Bayes' ,
                'content'     => 'modifikasi_naive_bayes/hasil__modifikasi_klasifikasi', 
                'breadcrumbs' => $this->breadcrumbs->show(),
                

                'button' => 'Analisa Prediksi',
                'action' => site_url('modifikasi_naive_bayes/hasil__modifikasi_klasifikasi'),
                
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
             $total_data=$data['total_data']=$this->Query_Naive_Bayes->coba();
             $total_yes=$data['total_yes']=$this->Query_Naive_Bayes->variabel_y_yes();
             $total_no=$data['total_no']=$this->Query_Naive_Bayes->variabel_y_no();

            
        $total_job_yes  = $this->Query_Naive_Bayes->hitung_langsung_job_yes($data['job'],'yes')->jumlah;
        $total_job_no = $this->Query_Naive_Bayes->hitung_langsung_job_no($data['job'],'no')->jumlah;
         //total education coba_dataset
        
                        
        $total_education_yes= $this->Query_Naive_Bayes->hitung_langsung_education_yes($data['education'],'yes')->jumlah;
        $total_education_no= $this->Query_Naive_Bayes->hitung_langsung_education_no($data['education'],'no')->jumlah;

          //total balance coba_dataset
         $total_balance_yes= $this->Query_Naive_Bayes->hitung_langsung_balance_yes($data['balance'],'yes')->jumlah;
         $total_balance_no=$this->Query_Naive_Bayes->hitung_langsung_balance_no($data['balance'],'no')->jumlah;
          
         //total loan coba_dataset
         $total_loan_yes=$this->Query_Naive_Bayes->hitung_langsung_loan_yes($data['loan'],'yes')->jumlah;
         $total_loan_no=$this->Query_Naive_Bayes->hitung_langsung_loan_no($data['loan'],'no')->jumlah;

          //total month coba_dataset
         $total_month_yes=$this->Query_Naive_Bayes->hitung_langsung_month_yes($data['month'],'yes')->jumlah;
         $total_month_no=$this->Query_Naive_Bayes->hitung_langsung_month_no($data['month'],'no')->jumlah;

          //total campaign coba_dataset
         $total_campaign_yes=$this->Query_Naive_Bayes->hitung_langsung_campaign_yes($data['campaign'],'yes')->jumlah;
         $total_campaign_no=$this->Query_Naive_Bayes->hitung_langsung_campaign_no($data['campaign'],'no')->jumlah;

          //total previous coba_dataset
         $total_previous_yes=$this->Query_Naive_Bayes->hitung_langsung_previous_yes($data['previous'],'yes')->jumlah;
         $total_previous_no=$this->Query_Naive_Bayes->hitung_langsung_previous_no($data['previous'],'no')->jumlah;
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
                $data["hasil_modifikasi_yes"] =  $hasil_modifikasi_yes; 
                $data["hasil_modifikasi_no"] =  $hasil_modifikasi_no;

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

////
function hasil_modifikasi($id){
        
   
    $this->breadcrumbs->push('Modifikasi_Naive_Bayes', '/modifikasi_naive_bayes');
    $this->breadcrumbs->push('modifkasi_naive_bayes', 'hasil_modifikasi_klasifikasi');
    
    $row = $this->Naive_Bayes_model->get_by_id($id);
    if ($row) {
        $data = array(
            'title'       => 'Naive_Bayes' ,
            'content'     => 'modifikasi_naive_bayes/hasil_modifikasi_klasifikasi', 
            'breadcrumbs' => $this->breadcrumbs->show(),
            

            'button' => 'Analisa Prediksi',
            'action' => site_url('modifikasi_naive_bayes/hasil_modifikasi_klasifikasi'),
            
            'id' => set_value('id', $row->id),
            'job' => set_value('job', $row->job),
            
            'education' => set_value('education', $row->education),
            
            'balance' => set_value('balance', $row->balance),
            
            'loan' => set_value('loan', $row->loan),
            
            'month' => set_value('month', $row->month),
            
            'campaign' => set_value('campaign', $row->campaign),
            
            'previous' => set_value('previous', $row->previous),
            
            'y' => set_value('y', $row->y),

            'prediksi' => set_value('prediksi', $row->y),
        );
    //total data coba_dataset
    $total_data=$data['total_data']=$this->Query_Naive_Bayes->coba();
    $total_yes=$data['total_yes']=$this->Query_Naive_Bayes->variabel_y_yes();
    $total_no=$data['total_no']=$this->Query_Naive_Bayes->variabel_y_no();

        
    $total_job_yes  = $this->Query_Naive_Bayes->hitung_langsung_job_yes($data['job'],'yes')->jumlah;
    $total_job_no = $this->Query_Naive_Bayes->hitung_langsung_job_no($data['job'],'no')->jumlah;
     //total education coba_dataset
    
                    
    $total_education_yes= $this->Query_Naive_Bayes->hitung_langsung_education_yes($data['education'],'yes')->jumlah;
    $total_education_no= $this->Query_Naive_Bayes->hitung_langsung_education_no($data['education'],'no')->jumlah;

      //total balance coba_dataset
     $total_balance_yes= $this->Query_Naive_Bayes->hitung_langsung_balance_yes($data['balance'],'yes')->jumlah;
     $total_balance_no=$this->Query_Naive_Bayes->hitung_langsung_balance_no($data['balance'],'no')->jumlah;
      
     //total loan coba_dataset
     $total_loan_yes=$this->Query_Naive_Bayes->hitung_langsung_loan_yes($data['loan'],'yes')->jumlah;
     $total_loan_no=$this->Query_Naive_Bayes->hitung_langsung_loan_no($data['loan'],'no')->jumlah;

      //total month coba_dataset
     $total_month_yes=$this->Query_Naive_Bayes->hitung_langsung_month_yes($data['month'],'yes')->jumlah;
     $total_month_no=$this->Query_Naive_Bayes->hitung_langsung_month_no($data['month'],'no')->jumlah;

      //total campaign coba_dataset
     $total_campaign_yes=$this->Query_Naive_Bayes->hitung_langsung_campaign_yes($data['campaign'],'yes')->jumlah;
     $total_campaign_no=$this->Query_Naive_Bayes->hitung_langsung_campaign_no($data['campaign'],'no')->jumlah;

      //total previous coba_dataset
     $total_previous_yes=$this->Query_Naive_Bayes->hitung_langsung_previous_yes($data['previous'],'yes')->jumlah;
     $total_previous_no=$this->Query_Naive_Bayes->hitung_langsung_previous_no($data['previous'],'no')->jumlah;
     
     $hasil_data_yes=$total_job_yes+ $total_education_yes+ $total_balance_yes+ $total_loan_yes+ $total_month_yes+ $total_campaign_yes +$total_previous_yes;
     $hasil_yes=$total_yes +$total_yes +$total_yes +$total_yes +$total_yes +$total_yes +$total_yes;
     $hasil_modifikasi_yes=$hasil_data_yes/$hasil_yes;
     
     $hasil_data_no=$total_job_no + $total_education_no + $total_balance_no + $total_loan_no + $total_month_no + $total_campaign_no + $total_previous_no;
     $hasil_no=$total_no +$total_no +$total_no +$total_no +$total_no +$total_no +$total_no;
     $hasil_modifikasi_no=$hasil_data_no/$hasil_no;
    
   if ($hasil_modifikasi_yes < $hasil_modifikasi_no) {
       $prediksi = "UPDATE data_testing SET prediksi='no' WHERE id=$id";
       $query=$this->db->query($prediksi);
       return $query;
   }elseif ($hasil_modifikasi_yes > $hasil_modifikasi_no) {
       $prediksi = "UPDATE data_testing SET prediksi='yes' WHERE id=$id";
       $query2=$this->db->query($prediksi);
       return $query2;
   }
    else {
        $prediksi = "UPDATE data_testing SET prediksi='-' WHERE id=$id";
        $query3=$this->db->query($prediksi);
        return $query3;
   }
        ///query update
            return $query;
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