<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Klasifikasi_Coba_Dataset extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->model('Query_Naive_Bayes');
		$this->load->model('Users_model');
		$this->load->model('Coba_Dataset_model');
		$this->load->model('Data_set_model');

		$this->load->model('Query_Coba_Dataset');
		$this->load->model('Naive_Bayes_model');
        if (!$this->ion_auth->logged_in())
        {
            redirect('auth/login', 'refresh');
        }
    }

	public function index()
	{
		$user = $this->ion_auth->user()->row();
		$id = $this->Coba_Dataset_model->get_by_id($user->id)->id;
		$job = $this->Coba_Dataset_model->get_by_id($user->id)->job;
        $this->breadcrumbs->push('Klasifikasi_Coba_Dataset', '/klasifikasi_coba_dataset');
        $this->breadcrumbs->push('Analisa Prediksi', '');
        $data_set = $this->Coba_Dataset_model-> get_by_id($id);
        $data = array(
            'title'       => 'Klasifikasi Dataset Telemarketing Bank' ,
            'breadcrumbs' => $this->breadcrumbs->show(),
            'user'        => $user ,
            'button' => 'Analisa_prediksi',
            'action' => site_url('klasifikasi_coba_dataset/hitung_klasifikasi'),
		    'id' => set_value('id'),
		    'id' => $id,
			'job' => $job,
		    'id_user' => set_value('id_user'),
		    'education' => set_value('education'),
		    
		    'balance' => set_value('balance'),
		    
		    'loan' => set_value('loan'),
		    'day' => set_value('month'),
		    'month' => set_value('month'),
		    
		    'campaign' => set_value('campaign'),
		    
		    'previous' => set_value('previous'),
            
		    'y' => set_value('y'),

			
		);
		// if($this->Klasifikasi_model->get_data_by_date($id_desa) == TRUE ){
		// 	$data['content'] = 'klasifikasi/sudah_input';
		// } else {
			$data['content'] = 'klasifikasi_coba_dataset/form';
		//}
		
        $this->load->view('layout/layout', $data);
	}

//masuk form
	public function form_klasifikasi($id) 
    {
        $user = $this->ion_auth->user()->row();
        $this->breadcrumbs->push('Klasifikasi_Coba_Dataset', '/klasifikasi_coba_dataset');
        $this->breadcrumbs->push('form_klasifikasi', '/klasifikasi_coba_dataset/klasifikasi_form');
        
        $row = $this->Coba_Dataset_model->get_by_id($id);
        if ($row) {
            $data = array(
                'title'       => 'Klasifikasi_Coba_Dataset' ,
                'content'     => 'klasifikasi_coba_dataset/klasifikasi_form', 
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

	public function klasifikasi()
	{
		$user = $this->ion_auth->user()->row();
		$job = $this->Coba_Dataset_model->get_by_id($this->input->post('id',TRUE))->job;
        $this->breadcrumbs->push('Klasifikasi_Coba_Dataset', '/klasifikasi_coba_dataset');
        $this->breadcrumbs->push('Hasil', 'dashboard');
		$penginput = $this->Users_model->get_by_id($this->input->post('id_user',TRUE));

		$this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {

				$id = $this->input->post('id',TRUE);
				$id_user = $this->input->post('id_user',TRUE);
				$data_set = $this->Coba_Dataset_model->get_by_id($id);
				$tanggal = $this->input->post('tanggal',TRUE);
				$data = array(
					'title'       => 'Klasifikasi_Coba_Dataset' ,
					'content'     => 'Klasifikasi_Coba_Dataset/hasil_klasifikasi', 
					'breadcrumbs' => $this->breadcrumbs->show(),
					'user'        => $user ,
					'button' => 'Klasifikasi_Coba_Dataset',
					'action' => site_url('klasifikasi_coba_dataset/simpan_hasil'),
					
					'dataset'	=> $data_set ,
				);

				 /*  1. Ambil data ---> P(job = ? | Y= ?) = hasil_bagi  */
				
				$joby  = $this->Query_Coba_Dataset->get_data('job',$data["job"],'yes')->hasil_bagi;  
				$jobN = $this->Query_Coba_Dataset->get_data('job',$data["job"],'no')->hasil_bagi; 

				/*  2.  */
				$educationy  = $this->Query_Coba_Dataset->get_data('education',$data["education"],'yes')->hasil_bagi;  
				$educationN  = $this->Query_Coba_Dataset->get_data('education',$data["education"],'no')->hasil_bagi;
				/*  3.  */
				$balancey  = $this->Query_Coba_Dataset->get_data('balance',$data["balance"],'yes')->hasil_bagi;  
				$balanceN  = $this->Query_Coba_Dataset->get_data('balance',$data["balance"],'no')->hasil_bagi;

				/*  4.  */
				$loany  = $this->Query_Coba_Dataset->get_data('loan',$data["loan"],'yes')->hasil_bagi;
				$loanN  = $this->Query_Coba_Dataset->get_data('loan',$data["loan"],'no')->hasil_bagi;

				/*  5.  */
				$monthy  = $this->Query_Coba_Dataset->get_data('month',$data["month"],'yes')->hasil_bagi;
				$monthN  = $this->Query_Coba_Dataset->get_data('month',$data["month"],'no')->hasil_bagi; 

				/*  6.  */
				$campaigny  = $this->Query_Coba_Dataset->get_data('campaign',$data["campaign"],'yes')->hasil_bagi;
				$campaignN  = $this->Query_Coba_Dataset->get_data('campaign',$data["campaign"],'no')->hasil_bagi;

				/*  7.  */
				$previousy  = $this->Query_Coba_Dataset->get_data('previous',$data["previous"],'yes')->hasil_bagi;  
				$previousN  = $this->Query_Coba_Dataset->get_data('previous',$data["previous"],'no')->hasil_bagi;

				/*  8.  */

				$y  = $this->Query_Coba_Dataset->get_data('y',$data["y"],'yes')->hasil_bagi;  
				$n = $this->Query_Coba_Dataset->get_data('y',$data["y"],'no')->hasil_bagi;




				// probabilitas
				$prob_yes = $joby * $educationy * $balancey * $loany * $monthy * $campaigny * $previousy ;
				$prob_no = $jobN * $educationN * $balanceN * $loanN * $monthN * $campaignN * $previousN ;
				
				$hasil_prob_yes = $prob_yes; //fixed division by zero ($jumlah!=0)?($hasil_prob_yes/$jumlah) * 100:0;   erorr Division by zero in dikarenakan pembagiannya bernilai nol
				$hasil_prob_no = $prob_no; //fixed division by zero  ($jumlah!=0)?($hasil_prob_no/$jumlah) * 100:0;
				
				if ($prob_yes < $prob_no) {
					$prediksi = "<font color= 'black'>Tidak melanjutkan langganan deposito berjangka</font>";
				}elseif ($prob_yes > $prob_no) {
					$prediksi = "<font color= 'blue'><b><u>Ya melanjutkan langganan deposito berjangka</font>";
				}
				 else {
					$prediksi = "<font color= 'red'><b>GAGAL</font>";
				}
				
				$data["prob_yes"] = $hasil_prob_yes;
				$data["prob_no"] = $hasil_prob_no;
				$data["prediksi"] = $prediksi;
				
				$data["joby"] = $joby;
				$data["jobN"] = $jobN;
				$data["educationy"] = $educationy; 
				$data["educationN"] = $educationN;
				$data["balancey"] = $balancey;
				$data["balanceN"] = $balanceN;
				$data["loany"] = $loany;
				$data["loanN"] = $loanN;
				$data["monthy"] = $monthy;
				$data["monthN"] = $monthN;
				$data["campaigny"] = $campaigny;
				$data["campaignN"] = $campaignN;
				$data["previousy"] = $previousy;
				$data["previousN"] = $previousN;
				$data["y"] = $y;
				$data["n"] = $n;
				$this->load->view('layout/layout', $data);
        }
	}
    









    public function klasifikasi_naive_bayes()
	{
		$user = $this->ion_auth->user()->row();
		$job = $this->Data_set_model->get_by_id($this->input->post('id',TRUE))->job;
        $this->breadcrumbs->push('Klasifikasi_Coba_Dataset', '/klasifikasi_coba_dataset');
        $this->breadcrumbs->push('Hasil', 'dashboard');
		$penginput = $this->Users_model->get_by_id($this->input->post('id_user',TRUE));

		$this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {

				$id = $this->input->post('id',TRUE);
				$id_user = $this->input->post('id_user',TRUE);
				$data_set = $this->Data_set_model->get_by_id($id);
				
				$data = array(
					'title'       => 'klasifikasi_naive_bayes' ,
					'content'     => 'Klasifikasi_Coba_Dataset/hasil_klasifikasi', 
					'breadcrumbs' => $this->breadcrumbs->show(),
					'user'        => $user ,
					'button' => 'Klasifikasi_Coba_Dataset',
					'action' => site_url('klasifikasi_coba_dataset/simpan_hasil'),
					'job' =>$this->input->post('job',TRUE),
					'id' => $this->input->post('id',TRUE),
					'penginput' => $penginput, 
					'id' => $this->input->post('id',TRUE),
					'tanggal' => $this->input->post('tanggal',TRUE),
					'job' => $this->input->post('job',TRUE),
					'education' => $this->input->post('education',TRUE),
					'balance' => $this->input->post('balance',TRUE),
					'loan' => $this->input->post('loan',TRUE),
					'month' => $this->input->post('month',TRUE),
					'campaign' => $this->input->post('campaign',TRUE),
					'previous' => $this->input->post('previous',TRUE),
					'y' => $this->input->post('y',TRUE),
					'dataset'	=> $data_set ,
				);

				 /*  1. Ambil data ---> P(job = ? | Y= ?) = hasil_bagi  */
				
				$joby  = $this->Query_Naive_Bayes->get_dataset('job',$data["job"],'yes')->hasil_bagi;  
				$jobN = $this->Query_Naive_Bayes->get_dataset('job',$data["job"],'no')->hasil_bagi; 

				/*  2.  */
				$educationy  = $this->Query_Naive_Bayes->get_dataset('education',$data["education"],'yes')->hasil_bagi;  
				$educationN  = $this->Query_Naive_Bayes->get_dataset('education',$data["education"],'no')->hasil_bagi;
				/*  3.  */
				$balancey  = $this->Query_Naive_Bayes->get_dataset('balance',$data["balance"],'yes')->hasil_bagi;  
				$balanceN  = $this->Query_Naive_Bayes->get_dataset('balance',$data["balance"],'no')->hasil_bagi;

				/*  4.  */
				$loany  = $this->Query_Naive_Bayes->get_dataset('loan',$data["loan"],'yes')->hasil_bagi;
				$loanN  = $this->Query_Naive_Bayes->get_dataset('loan',$data["loan"],'no')->hasil_bagi;

				/*  5.  */
				$monthy  = $this->Query_Naive_Bayes->get_dataset('month',$data["month"],'yes')->hasil_bagi;
				$monthN  = $this->Query_Naive_Bayes->get_dataset('month',$data["month"],'no')->hasil_bagi; 

				/*  6.  */
				$campaigny  = $this->Query_Naive_Bayes->get_dataset('campaign',$data["campaign"],'yes')->hasil_bagi;
				$campaignN  = $this->Query_Naive_Bayes->get_dataset('campaign',$data["campaign"],'no')->hasil_bagi;

				/*  7.  */
				$previousy  = $this->Query_Naive_Bayes->get_dataset('previous',$data["previous"],'yes')->hasil_bagi;  
				$previousN  = $this->Query_Naive_Bayes->get_dataset('previous',$data["previous"],'no')->hasil_bagi;

				/*  8.  */

				$y  = $this->Query_Naive_Bayes->get_dataset('y',$data["y"],'yes')->hasil_bagi;  
				$n = $this->Query_Naive_Bayes->get_dataset('y',$data["y"],'no')->hasil_bagi;

				// probabilitas
				$prob_yes = $joby * $educationy * $balancey * $loany * $monthy * $campaigny * $previousy ;
				$prob_no = $jobN * $educationN * $balanceN * $loanN * $monthN * $campaignN * $previousN ;


				 $prob_yes = $joby * $educationy * $balancey * $loany * $monthy * $campaigny * $previousy ;
                $prob_no = $jobN * $educationN * $balanceN * $loanN * $monthN * $campaignN * $previousN ;
                
                $jumlah = $prob_yes + $prob_no;
                $hasil_prob_yes =  $prob_yes / $jumlah;
                $hasil_prob_no =  $prob_no / $jumlah;
				
				 //fixed division by zero ($jumlah!=0)?($hasil_prob_yes/$jumlah) * 100:0;   erorr Division by zero in dikarenakan pembagiannya bernilai nol
				 //fixed division by zero  ($jumlah!=0)?($hasil_prob_no/$jumlah) * 100:0;
				
				if ($hasil_prob_yes < $hasil_prob_no) {
					$prediksi = "<font color= 'black'>Tidak melanjutkan langganan deposito berjangka</font>";
				}elseif ($hasil_prob_yes > $hasil_prob_no) {
					$prediksi = "<font color= 'blue'><b><u>Ya melanjutkan langganan deposito berjangka</font>";
				}
				 else {
					$prediksi = "<font color= 'red'><b>GAGAL</font>";
				}
				
				$data["prob_yes"] = $hasil_prob_yes;
				$data["prob_no"] = $hasil_prob_no;
				$data["prediksi"] = $prediksi;
				
				$data["joby"] = $joby;
				$data["jobN"] = $jobN;
				$data["educationy"] = $educationy; 
				$data["educationN"] = $educationN;
				$data["balancey"] = $balancey;
				$data["balanceN"] = $balanceN;
				$data["loany"] = $loany;
				$data["loanN"] = $loanN;
				$data["monthy"] = $monthy;
				$data["monthN"] = $monthN;
				$data["campaigny"] = $campaigny;
				$data["campaignN"] = $campaignN;
				$data["previousy"] = $previousy;
				$data["previousN"] = $previousN;
				$data["y"] = $y;
				$data["n"] = $n;
				$this->load->view('layout/layout', $data);
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

       
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }	

}

/* End of file Klasifikasi.php */
/* Location: ./application/controllers/Klasifikasi.php */