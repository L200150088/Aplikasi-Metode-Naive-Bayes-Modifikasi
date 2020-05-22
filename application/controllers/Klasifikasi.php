<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Klasifikasi extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->model('Klasifikasi_model');
		$this->load->model('Users_model');
		$this->load->model('Data_set_model');
		$this->load->model('Data_set_model');
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
            'action' => site_url('klasifikasi/hitung_klasifikasi'),
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

	public function hitung_klasifikasi()
	{
		$user = $this->ion_auth->user()->row();
		$job = $this->Data_set_model->get_by_id($this->input->post('id',TRUE))->job;
        $this->breadcrumbs->push('Klasifikasi', '/klasifikasi');
        $this->breadcrumbs->push('', 'dashboard');
		$penginput = $this->Users_model->get_by_id($this->input->post('id_user',TRUE));

		$this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {

				$id = $this->input->post('id',TRUE);
				$id_user = $this->input->post('id_user',TRUE);
				$data_set = $this->Data_set_model->get_by_id($id);
				$tanggal = $this->input->post('tanggal',TRUE);
				$data = array(
					'title'       => 'Klasifikasi' ,
					'content'     => 'klasifikasi/hasil_klasifikasi', 
					'breadcrumbs' => $this->breadcrumbs->show(),
					'user'        => $user ,
					'button' => 'Klasifikasi',
					'action' => site_url('klasifikasi/simpan_hasil'),
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
				
				$joby  = $this->Klasifikasi_model->get_parameter('job',$data["job"],'yes')->hasil_bagi;  
				$jobN = $this->Klasifikasi_model->get_parameter('job',$data["job"],'no')->hasil_bagi; 

				/*  2.  */
				$educationy  = $this->Klasifikasi_model->get_parameter('education',$data["education"],'yes')->hasil_bagi;  
				$educationN  = $this->Klasifikasi_model->get_parameter('education',$data["education"],'no')->hasil_bagi;
				/*  3.  */
				$balancey  = $this->Klasifikasi_model->get_parameter('balance',$data["balance"],'yes')->hasil_bagi;  
				$balanceN  = $this->Klasifikasi_model->get_parameter('balance',$data["balance"],'no')->hasil_bagi;

				/*  4.  */
				$loany  = $this->Klasifikasi_model->get_parameter('loan',$data["loan"],'yes')->hasil_bagi;
				$loanN  = $this->Klasifikasi_model->get_parameter('loan',$data["loan"],'no')->hasil_bagi;

				/*  5.  */
				$monthy  = $this->Klasifikasi_model->get_parameter('month',$data["month"],'yes')->hasil_bagi;
				$monthN  = $this->Klasifikasi_model->get_parameter('month',$data["month"],'no')->hasil_bagi; 

				/*  6.  */
				$campaigny  = $this->Klasifikasi_model->get_parameter('campaign',$data["campaign"],'yes')->hasil_bagi;
				$campaignN  = $this->Klasifikasi_model->get_parameter('campaign',$data["campaign"],'no')->hasil_bagi;

				/*  7.  */
				$previousy  = $this->Klasifikasi_model->get_parameter('previous',$data["previous"],'yes')->hasil_bagi;  
				$previousN  = $this->Klasifikasi_model->get_parameter('previous',$data["previous"],'no')->hasil_bagi;

				/*  8.  */

				$y  = $this->Klasifikasi_model->get_parameter('y',$data["y"],'yes')->hasil_bagi;  
				$n = $this->Klasifikasi_model->get_parameter('y',$data["y"],'no')->hasil_bagi;




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