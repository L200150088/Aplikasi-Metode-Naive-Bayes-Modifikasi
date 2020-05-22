<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

//    SELECT (
//                select count(y) 
//                from data_testing
//                where job= 'management' AND y='no'
//            ) / COUNT(job) as hasil_bagi
//            FROM data_testing
//            WHERE job = 'management';
class Query_Naive_Bayes extends CI_Model {

	function __construct()
    {
        parent::__construct();
    } 
    
    //pengujian
    public function pengujian_yes()
    {
        $sql = $this->db->get_where('data_testing', array('y'=>'yes','prediksi'=>'yes')); //TN
        return $sql->num_rows();
    }

    
    public function pengujian_yes_no()
    {
        $sql = $this->db->get_where('data_testing', array('y'=>'yes','prediksi'=>'no')); //FN
        return $sql->num_rows();
    }

    public function pengujian_no_yes()
    {
       
        $sql = $this->db->get_where('data_testing', array('y'=>'no','prediksi'=>'yes')); //FP
        return $sql->num_rows();
    }

    public function pengujian_no()
        {
          
        $sql = $this->db->get_where('data_testing', array('y'=>'no','prediksi'=>'no')); //TP
        return $sql->num_rows();
    }




    //total data
    public function coba()
    {
        $coba_query=$this->db->get('dataset');
         return $coba_query->num_rows();
    }


    
    //total data testing
    public function coba_testing()
    {
        $coba_query=$this->db->get('data_testing');
         return $coba_query->num_rows();
    }

    //total yes pada variabel y
    public function variabel_y_yes()
        {
        $y=$this->db->get_where('dataset', array('y'=>'yes'));
        return $y->num_rows();
    }
    //total no pada variabel y
    public function variabel_y_no()
        {
        $n=$this->db->get_where('dataset', array('y'=>'no'));
        return $n->num_rows();
    }

    ////////////////coba ini baru
    public function hitung_langsung_job_yes($isi_job_yes)
    {
    $sql = "SELECT count(*) 'jumlah' from dataset where job='$isi_job_yes' and y='yes'";
    $query=$this->db->query($sql);
    return $query->row();
    }
/////job_yes
    public function hitung_langsung_job_no($isi_job_no)
    {
    $sql = "SELECT count(*) 'jumlah' from dataset where job='$isi_job_no' and y='no'";
    $query=$this->db->query($sql);
    return $query->row();
    }
/////education_yes
    public function hitung_langsung_education_yes($isi_education_yes)
    {
    $sql =  "SELECT count(*) 'jumlah' from dataset where education='$isi_education_yes' and y='yes'";
    $query=$this->db->query($sql);
    return $query->row();
    }
    public function hitung_langsung_education_no($isi_education_no)
    {
    $sql =  "SELECT count(*) 'jumlah' from dataset where education='$isi_education_no' and y='no'";
    $query=$this->db->query($sql);
    return $query->row();
    }

////balance
    public function hitung_langsung_balance_yes($isi_balance_yes)
    {
    $sql =  "SELECT count(*) 'jumlah' from dataset where balance='$isi_balance_yes' and y='yes'";
    $query=$this->db->query($sql);
    return $query->row();
    }
    public function hitung_langsung_balance_no($isi_balance_no)
    {
    $sql =  "SELECT count(*) 'jumlah' from dataset where balance='$isi_balance_no' and y='no'";
    $query=$this->db->query($sql);
    return $query->row();
    }

    
////loan
public function hitung_langsung_loan_yes($isi_loan_yes)
{
$sql =  "SELECT count(*) 'jumlah' from dataset where loan='$isi_loan_yes' and y='yes'";
$query=$this->db->query($sql);
return $query->row();
}
public function hitung_langsung_loan_no($isi_loan_no)
{
$sql =  "SELECT count(*) 'jumlah' from dataset where loan='$isi_loan_no' and y='no'";
$query=$this->db->query($sql);
return $query->row();
}

   
////month
public function hitung_langsung_month_yes($isi_month_yes)
{
$sql =  "SELECT count(*) 'jumlah' from dataset where month='$isi_month_yes' and y='yes'";
$query=$this->db->query($sql);
return $query->row();
}
public function hitung_langsung_month_no($isi_month_no)
{
$sql =  "SELECT count(*) 'jumlah' from dataset where month='$isi_month_no' and y='no'";
$query=$this->db->query($sql);
return $query->row();
}
   
////campaign
public function hitung_langsung_campaign_yes($isi_campaign_yes)
{
$sql =  "SELECT count(*) 'jumlah' from dataset where campaign='$isi_campaign_yes' and y='yes'";
$query=$this->db->query($sql);
return $query->row();
}
public function hitung_langsung_campaign_no($isi_campaign_no)
{
$sql =  "SELECT count(*) 'jumlah' from dataset where campaign='$isi_campaign_no' and y='no'";
$query=$this->db->query($sql);
return $query->row();
}

 
////previous
public function hitung_langsung_previous_yes($isi_previous_yes)
{
$sql =  "SELECT count(*) 'jumlah' from dataset where previous='$isi_previous_yes' and y='yes'";
$query=$this->db->query($sql);
return $query->row();
}
public function hitung_langsung_previous_no($isi_previous_no)
{
$sql =  "SELECT count(*) 'jumlah' from dataset where previous='$isi_previous_no' and y='no'";
$query=$this->db->query($sql);
return $query->row();
}
///////////////////////////////////////////////////////////////////////////////////

}