<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Laplace_Smoothing extends CI_Controller
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
       
        $this->breadcrumbs->push('laplace_smoothing', '/laplace_smoothing');

        $data = array(
         
            'content'     => 'laplace_smoothing/laplace_smoothing_list', 
            'breadcrumbs' => $this->breadcrumbs->show(),
          
            
            'naive_bayes_data' => $naive_bayes
        );

        $this->load->view('layout/layout', $data);
    }

    

	function hasil_laplace_smoothing($id){
        
    $this->breadcrumbs->push('Laplace_Smoothing', '/laplace_smoothing');
    $this->breadcrumbs->push('laplace_smoothing', '/hasil_laplace_smoothing');
    
    $row = $this->Naive_Bayes_model->get_by_id($id);
    if ($row) {
        $data = array(
            'title'       => 'Laplace_Smoothing' ,
            'content'     => 'laplace_smoothing/hasil_laplace_smoothing', 
            'breadcrumbs' => $this->breadcrumbs->show(),
           

            'button' => 'Analisa Prediksi',
            'action' => site_url('laplace_smoothing/hasil_laplace_smoothing'),
            
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
        //laplace
        $total_data=$data['total_data']=$this->Query_Naive_Bayes->coba();
        $total_yes=$data['total_yes']=$this->Query_Naive_Bayes->variabel_y_yes();
        $total_no=$data['total_no']=$this->Query_Naive_Bayes->variabel_y_no();

        //////////////////
        /////////////////////naive bayes
        $nv_total_job_yes  = $this->Query_Naive_Bayes->hitung_langsung_job_yes($data['job'],'yes')->jumlah;
        $nv_total_job_no = $this->Query_Naive_Bayes->hitung_langsung_job_no($data['job'],'no')->jumlah;
         //total education coba_dataset
                    
        $nv_total_education_yes= $this->Query_Naive_Bayes->hitung_langsung_education_yes($data['education'],'yes')->jumlah;
        $nv_total_education_no= $this->Query_Naive_Bayes->hitung_langsung_education_no($data['education'],'no')->jumlah;

          //total balance coba_dataset
         $nv_total_balance_yes= $this->Query_Naive_Bayes->hitung_langsung_balance_yes($data['balance'],'yes')->jumlah;
         $nv_total_balance_no=$this->Query_Naive_Bayes->hitung_langsung_balance_no($data['balance'],'no')->jumlah;
          
         //total loan coba_dataset
         $nv_total_loan_yes=$this->Query_Naive_Bayes->hitung_langsung_loan_yes($data['loan'],'yes')->jumlah;
         $nv_total_loan_no=$this->Query_Naive_Bayes->hitung_langsung_loan_no($data['loan'],'no')->jumlah;

          //total month coba_dataset
         $nv_total_month_yes=$this->Query_Naive_Bayes->hitung_langsung_month_yes($data['month'],'yes')->jumlah;
         $nv_total_month_no=$this->Query_Naive_Bayes->hitung_langsung_month_no($data['month'],'no')->jumlah;

          //total campaign coba_dataset
         $nv_total_campaign_yes=$this->Query_Naive_Bayes->hitung_langsung_campaign_yes($data['campaign'],'yes')->jumlah;
         $nv_total_campaign_no=$this->Query_Naive_Bayes->hitung_langsung_campaign_no($data['campaign'],'no')->jumlah;

          //total previous coba_dataset
         $nv_total_previous_yes=$this->Query_Naive_Bayes->hitung_langsung_previous_yes($data['previous'],'yes')->jumlah;
         $nv_total_previous_no=$this->Query_Naive_Bayes->hitung_langsung_previous_no($data['previous'],'no')->jumlah;
         
      ///////////////////////////////////////////////////////////////////////

/////////laplace
        $total_job_yes  = $this->Query_Naive_Bayes->hitung_langsung_job_yes($data['job'],'yes')->jumlah;
        if ($total_job_yes == 0) {
            $total_job_yes=+1;
        }else{
            $total_job_yes;
        }
        $total_job_no = $this->Query_Naive_Bayes->hitung_langsung_job_no($data['job'],'no')->jumlah;
        if ($total_job_no == 0) {
            $total_job_no=+1;
        } else {
            $total_job_no;
        }
        //total education coba_dataset               
        $total_education_yes= $this->Query_Naive_Bayes->hitung_langsung_education_yes($data['education'],'yes')->jumlah;
        if ($total_education_yes == 0) {
            $total_education_yes=+1;
        } else {
            $total_education_yes;
        }
        $total_education_no= $this->Query_Naive_Bayes->hitung_langsung_education_no($data['education'],'no')->jumlah;
        if ($total_education_no == 0) {
            $total_education_no=+1;
        } else {
            $total_education_no;
        }
          //total balance coba_dataset
         $total_balance_yes= $this->Query_Naive_Bayes->hitung_langsung_balance_yes($data['balance'],'yes')->jumlah;
         if ($total_balance_yes == 0) {
             $total_balance_yes=+1;
         } else {
             $total_balance_yes;
         }
         $total_balance_no=$this->Query_Naive_Bayes->hitung_langsung_balance_no($data['balance'],'no')->jumlah;
         if ($total_balance_no == 0) {
            $total_balance_no=+1;
        } else {
            $total_balance_no;
        }
         //total loan coba_dataset
         $total_loan_yes=$this->Query_Naive_Bayes->hitung_langsung_loan_yes($data['loan'],'yes')->jumlah;
         if ($total_loan_yes == 0) {
             $total_loan_yes=+1;
         } else {
            $total_loan_yes;
         }
         $total_loan_no=$this->Query_Naive_Bayes->hitung_langsung_loan_no($data['loan'],'no')->jumlah;
         if ($total_loan_no == 0) {
            $total_loan_no=+1;
        } else {
           $total_loan_no;
        }
          //total month coba_dataset
         $total_month_yes=$this->Query_Naive_Bayes->hitung_langsung_month_yes($data['month'],'yes')->jumlah;
         if ($total_month_yes == 0) {
            $total_month_yes=+1;
         } else {
            $total_month_yes;
         }
         $total_month_no=$this->Query_Naive_Bayes->hitung_langsung_month_no($data['month'],'no')->jumlah;
         if ($total_month_no == 0) {
            $total_month_no=+1;
         } else {
            $total_month_no;
         }
          //total campaign coba_dataset
         $total_campaign_yes=$this->Query_Naive_Bayes->hitung_langsung_campaign_yes($data['campaign'],'yes')->jumlah;
         if ($total_campaign_yes == 0) {
             $total_campaign_yes=+1;
         } else {
            $total_campaign_yes;
         }
         $total_campaign_no=$this->Query_Naive_Bayes->hitung_langsung_campaign_no($data['campaign'],'no')->jumlah;
         if ($total_campaign_no == 0) {
            $total_campaign_no=+1;
        } else {
           $total_campaign_no;
        }
          //total previous coba_dataset
         $total_previous_yes=$this->Query_Naive_Bayes->hitung_langsung_previous_yes($data['previous'],'yes')->jumlah;
         if ($total_previous_yes == 0) {
             $total_previous_yes=+1;
         } else {
            $total_previous_yes;
         }
         $total_previous_no=$this->Query_Naive_Bayes->hitung_langsung_previous_no($data['previous'],'no')->jumlah;
         if ($total_previous_no == 0) {
            $total_previous_no=+1;
        } else {
           $total_previous_no;
        }
/////////////////nv bayes
         $nv_hasil_data_yes=$nv_total_job_yes* $nv_total_education_yes* $nv_total_balance_yes* $nv_total_loan_yes* $nv_total_month_yes* $nv_total_campaign_yes * $nv_total_previous_yes;
         $nv_hasil_yes=$total_yes *$total_yes *$total_yes *$total_yes *$total_yes *$total_yes *$total_yes;
         $nv_yes=$nv_hasil_data_yes/$nv_hasil_yes;
         
         $nv_hasil_data_no=$nv_total_job_no * $nv_total_education_no * $nv_total_balance_no * $nv_total_loan_no * $nv_total_month_no * $nv_total_campaign_no * $nv_total_previous_no;
         $nv_hasil_no=$total_no *$total_no *$total_no *$total_no *$total_no *$total_no *$total_no;
         $nv_no=$nv_hasil_data_no/$nv_hasil_no;
         
       
///////////////////////////////////////
       //laplace
       $hasil_data_yes=$total_job_yes* $total_education_yes* $total_balance_yes* $total_loan_yes* $total_month_yes* $total_campaign_yes * $total_previous_yes;
       $hasil_yes=$total_yes *$total_yes *$total_yes *$total_yes *$total_yes *$total_yes *$total_yes;
       $yes=$hasil_data_yes/$hasil_yes;
       
       $hasil_data_no=$total_job_no * $total_education_no * $total_balance_no * $total_loan_no * $total_month_no * $total_campaign_no * $total_previous_no;
       $hasil_no=$total_no *$total_no *$total_no *$total_no *$total_no *$total_no *$total_no;
       $no=$hasil_data_no/$hasil_no;

		if ($nv_yes < $nv_no) { ////cek perhitungan naive bayes
			$prediksi = "UPDATE data_testing SET prediksi='no' WHERE id='$id'";
            $query=$this->db->query($prediksi);
            return $query;
        }
        else if($yes < $no) { ////eksekui laplace
            $prediksi = "UPDATE data_testing SET prediksi='no' WHERE id='$id'";
            $query=$this->db->query($prediksi);
            return $query;
            
        
        }if($nv_yes > $nv_no) {
            $rumus_laplace_yes=$yes;
            $prediksi = "UPDATE data_testing SET prediksi='yes' WHERE id='$id'";
            $query2=$this->db->query($prediksi);
            return $query2;
        }else if($yes > $no){
            $prediksi = "UPDATE data_testing SET prediksi='yes' WHERE id='$id'";
            $query2=$this->db->query($prediksi);
            return $query2;
        }
    }
}

public function algoritma_laplace_smoothing($id) 
{
    $this->breadcrumbs->push('Laplace_Smoothing', '/laplace_smoothing');
    $this->breadcrumbs->push('laplace_smoothing', '/hasil_laplace_smoothing');
    
    $row = $this->Naive_Bayes_model->get_by_id($id);
    if ($row) {
        $data = array(
            'title'       => 'Laplace_Smoothing' ,
            'content'     => 'laplace_smoothing/hasil_laplace_smoothing', 
            'breadcrumbs' => $this->breadcrumbs->show(),
           

            'button' => 'Analisa Prediksi',
            'action' => site_url('laplace_smoothing/hasil_laplace_smoothing'),
            
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

       ///////////////////////////////////////////////////////////////////////

         $total_job_yes  = $this->Query_Naive_Bayes->hitung_langsung_job_yes($data['job'],'yes')->jumlah;
         if ($total_job_yes == 0) {
             $total_job_yes=+1;
         }else{
             $total_job_yes;
         }
         $total_job_no = $this->Query_Naive_Bayes->hitung_langsung_job_no($data['job'],'no')->jumlah;
         if ($total_job_no == 0) {
             $total_job_no=+1;
         } else {
             $total_job_no;
         }
         //total education coba_dataset               
         $total_education_yes= $this->Query_Naive_Bayes->hitung_langsung_education_yes($data['education'],'yes')->jumlah;
         if ($total_education_yes == 0) {
             $total_education_yes=+1;
         } else {
             $total_education_yes;
         }
         $total_education_no= $this->Query_Naive_Bayes->hitung_langsung_education_no($data['education'],'no')->jumlah;
         if ($total_education_no == 0) {
             $total_education_no=+1;
         } else {
             $total_education_no;
         }
           //total balance coba_dataset
          $total_balance_yes= $this->Query_Naive_Bayes->hitung_langsung_balance_yes($data['balance'],'yes')->jumlah;
          if ($total_balance_yes == 0) {
              $total_balance_yes=+1;
          } else {
              $total_balance_yes;
          }
          $total_balance_no=$this->Query_Naive_Bayes->hitung_langsung_balance_no($data['balance'],'no')->jumlah;
          if ($total_balance_no == 0) {
             $total_balance_no=+1;
         } else {
             $total_balance_no;
         }
          //total loan coba_dataset
          $total_loan_yes=$this->Query_Naive_Bayes->hitung_langsung_loan_yes($data['loan'],'yes')->jumlah;
          if ($total_loan_yes == 0) {
              $total_loan_yes=+1;
          } else {
             $total_loan_yes;
          }
          $total_loan_no=$this->Query_Naive_Bayes->hitung_langsung_loan_no($data['loan'],'no')->jumlah;
          if ($total_loan_no == 0) {
             $total_loan_no=+1;
         } else {
            $total_loan_no;
         }
           //total month coba_dataset
          $total_month_yes=$this->Query_Naive_Bayes->hitung_langsung_month_yes($data['month'],'yes')->jumlah;
          if ($total_month_yes == 0) {
             $total_month_yes=+1;
          } else {
             $total_month_yes;
          }
          $total_month_no=$this->Query_Naive_Bayes->hitung_langsung_month_no($data['month'],'no')->jumlah;
          if ($total_month_no == 0) {
             $total_month_no=+1;
          } else {
             $total_month_no;
          }
           //total campaign coba_dataset
          $total_campaign_yes=$this->Query_Naive_Bayes->hitung_langsung_campaign_yes($data['campaign'],'yes')->jumlah;
          if ($total_campaign_yes == 0) {
              $total_campaign_yes=+1;
          } else {
             $total_campaign_yes;
          }
          $total_campaign_no=$this->Query_Naive_Bayes->hitung_langsung_campaign_no($data['campaign'],'no')->jumlah;
          if ($total_campaign_no == 0) {
             $total_campaign_no=+1;
         } else {
            $total_campaign_no;
         }
           //total previous coba_dataset
          $total_previous_yes=$this->Query_Naive_Bayes->hitung_langsung_previous_yes($data['previous'],'yes')->jumlah;
          if ($total_previous_yes == 0) {
              $total_previous_yes=+1;
          } else {
             $total_previous_yes;
          }
          $total_previous_no=$this->Query_Naive_Bayes->hitung_langsung_previous_no($data['previous'],'no')->jumlah;
          if ($total_previous_no == 0) {
             $total_previous_no=+1;
         } else {
            $total_previous_no;
         }
       
////////////////////////////////////
        //laplace
        $hasil_data_yes=$total_job_yes* $total_education_yes* $total_balance_yes* $total_loan_yes* $total_month_yes* $total_campaign_yes * $total_previous_yes;
        $hasil_yes=$total_yes *$total_yes *$total_yes *$total_yes *$total_yes *$total_yes *$total_yes;
        $yes=$hasil_data_yes/$hasil_yes;
        
        
        $hasil_data_no=$total_job_no * $total_education_no * $total_balance_no * $total_loan_no * $total_month_no * $total_campaign_no * $total_previous_no;
        $hasil_no=$total_no *$total_no *$total_no *$total_no *$total_no *$total_no *$total_no;
        $no=$hasil_data_no/$hasil_no;
         
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
     public function klasifikasi_form($id) 
    {
       
        $this->breadcrumbs->push('Naive_Bayes', '/klasifikasi_naive_bayes');
        $this->breadcrumbs->push('form_klasifikasi', '/klasifikasi_naive_bayes/klasifikasi_form');
        
        $row = $this->Naive_Bayes_model->get_by_id($id);
        if ($row) {
            $data = array(
                'title'       => 'Naive_Bayes' ,
                'content'     => 'klasifikasi_naive_bayes/klasifikasi_form', 
                'breadcrumbs' => $this->breadcrumbs->show(),
                

                'button' => 'Analisa Prediksi',

                //action me_load Klasifikasi_Coba_Dataset.php lalu memanggil function klasifikasi_naive_bayes yang terdapat pada Klasifikasi_Coba_Dataset.php 
                'action' => site_url('klasifikasi_coba_dataset/klasifikasi_naive_bayes'),
                
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