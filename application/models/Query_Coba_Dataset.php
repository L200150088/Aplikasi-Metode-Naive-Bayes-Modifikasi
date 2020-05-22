<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Query_Coba_Dataset extends CI_Model {

	function __construct()
    {
        parent::__construct();
    }

    /* Ambil data ---> P(kemiringan_lereng = ? | Y= ?) = hasil_bagi  */
    public function get_data($ambil_tabel,$y)
    {
    	$sql = "
    		SELECT (
    			select count(y) 
    			from coba_dataset
    			where job= '$ambil_tabel' AND y='$y'
    		) / COUNT(job) as hasil_bagi
			FROM `coba_dataset`
			WHERE job = '$ambil_tabel' ";
    	$query=$this->db->query($sql);
        return $query->row();
    }
}