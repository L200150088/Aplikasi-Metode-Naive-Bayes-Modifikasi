<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Upload_Csv_dataset extends CI_Controller {
  private $filename = "import_data"; // Kita tentukan nama filenya
	
	public function __construct(){
		parent::__construct();
		
		$this->load->model('CsvModel_dataset');
	}
	
	public function index(){
		$data['Data_set'] = $this->CsvModel_dataset->view();
		$this->load->view('view', $data);
	}
	
	public function import(){
		// Load plugin PHPExcel nya
		include APPPATH.'third_party/PHPExcel/PHPExcel.php';
		
		$csvreader = PHPExcel_IOFactory::createReader('CSV');
		$loadcsv = $csvreader->load('csv/'.$this->filename.'.csv'); // Load file yang tadi diupload ke folder csv
		$sheet = $loadcsv->getActiveSheet()->getRowIterator();
		
		// Buat sebuah variabel array untuk menampung array data yg akan kita insert ke database
		$data = array();
		
		$numrow = 1;
		foreach($sheet as $row){
			// Cek $numrow apakah lebih dari 1
			// Artinya karena baris pertama adalah nama-nama kolom
			// Jadi dilewat saja, tidak usah diimport
			if($numrow){
				// START -->
				// Skrip untuk mengambil value nya
				$cellIterator = $row->getCellIterator();
				$cellIterator->setIterateOnlyExistingCells(false); // Loop all cells, even if it is not set
				
				$get = array(); // Valuenya akan di simpan kedalam array,dimulai dari index ke 0
				foreach ($cellIterator as $cell) {
					array_push($get, $cell->getValue()); // Menambahkan value ke variabel array $get
				}
				// <-- END
				
				// Ambil data value yang telah di ambil dan dimasukkan ke variabel $get
		
        $job = $get[0]; 
        $education = $get[1];
        $balance = $get[2]; 
        $loan = $get[3]; 
        $month = $get[4]; 
        $campaign = $get[5]; 
        $previous = $get[6]; 
        $y = $get[7];
       
				
			  array_push($data, array(
          
          'job'=>$job, 
          'education'=>$education, 
          'balance'=>$balance,
          'loan'=>$loan, 
          'month'=>$month, 
          'campaign'=>$campaign,
          'previous'=>$previous, 
          'y'=>$y, 
         
        ));
			}
			
			$numrow++; // Tambah 1 setiap kali looping
		}

		// Panggil fungsi insert_multiple yg telah kita buat sebelumnya di model
		$this->CsvModel_dataset->insert_multiple($data);
		
		redirect("Data_set"); // Redirect ke halaman awal (ke controller siswa fungsi index)
	}
}




