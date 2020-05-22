<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Upload_Csv extends CI_Controller {
 public function __construct()
 {
  parent::__construct();
  $this->load->model('csv_import_model');
  $this->load->library('csvimport');
 }

 function index()
 {
  $this->load->view('data_tes');
 }

 function import()
 {
  $file_data = $this->csvimport->get_array($_FILES["csv_file"]["tmp_name"]);
  foreach($file_data as $row)
  {
   $data[] = array(
   		  
          'job'  => $row["job"],
          'education'   => $row["education"],
          'balance'   => $row["balance"],
          'loan' => $row["loan"],
          'month'  => $row["month"],
          'campaign'   => $row["campaign"],
          'previous'   => $row["previous"],
          'y'   => $row["y"],
          'prediksi'   => $row["prediksi"]
      );
  }
  $this->csv_import_model->insert($data);
  redirect(site_url('data_tes'));
 }
 
  
}



