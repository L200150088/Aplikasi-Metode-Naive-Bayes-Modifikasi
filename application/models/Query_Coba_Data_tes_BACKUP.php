<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Query_Coba_Data_tes extends CI_Model {

	function __construct()
    {
        parent::__construct();
    }
    public function get_coba_dataset($val_param)
    {
        $sql = "SELECT (
            select count(job) 
            from coba_dataset
            where `job`= '$val_param')";
    $query=$this->db->query($sql);
    return $query->row();
	}

        //total data
        public function coba()
        {
            $coba_query=$this->db->get('coba_dataset');
             return $coba_query->num_rows();
        }
    
        //total yes pada variabel y
        public function variabel_y_yes()
            {
            $y=$this->db->get_where('coba_dataset', array('y'=>'yes'));
            return $y->num_rows();
        }
        //total no pada variabel y
        public function variabel_y_no()
            {
            $n=$this->db->get_where('coba_dataset', array('y'=>'no'));
            return $n->num_rows();
        }
   
    //////////////////////////////////////////////////

    /* Ambil data ---> P(job = ? | Y= yes) = hasil_bagi  */
    public function get_dataset_job_yes()
    {
        $data=array('job'=>'services','job'=>'management','job'=>'blue-collar','job'=>'technician','job'=>'admin','job'=>'self-employed','job'=>'enterpreneur','job'=>'student','job'=>'retired');
        $job=0;
        if(is_array($data)){
            $coba_query=$this->db->get_where('coba_dataset', array('job'=>$job,'y'=>'yes'));
            return $coba_query->num_rows();
        }else{
            echo "data Tidak Di Temukan";
        }
    }
    public function get_dataset_job_no()
    {
        $data=array('job'=>'services','job'=>'management','job'=>'blue-collar','job'=>'technician','job'=>'admin','job'=>'self-employed','job'=>'enterpreneur','job'=>'student','job'=>'retired');
        $job=0;
        if(is_array($data)){
            $coba_query=$this->db->get_where('coba_dataset', array('job'=>$job,'y'=>'no'));
            return $coba_query->num_rows();
        }else{
            echo "data Tidak Di Temukan";
        }
    }
     /* Ambil data ---> P(education = ? | Y= yes) = hasil_bagi  */
    public function get_dataset_education_yes()
    {
        $data=array('education'=>'tertiary','education'=>'uknmown','education'=>'primary','education'=>'secondary');
        $education=0;
        if(is_array($data)){
            $coba_query=$this->db->get_where('coba_dataset', array('y'=>'yes', 'education'=>$education));
            return $coba_query->num_rows();
        }else{
            echo "data Tidak Di Temukan";
        }
    }
    public function get_dataset_education_no()
    {
        $data=array('education'=>'tertiary','education'=>'uknmown','education'=>'primary','education'=>'secondary');
        $education=0;
        if(is_array($data)){
            $coba_query=$this->db->get_where('coba_dataset', array('y'=>'no', 'education'=>$education));
            return $coba_query->num_rows();
        }else{
            echo "data Tidak Di Temukan";
        }
    }
    /* Ambil data ---> P(balance = ? | Y= yes) = hasil_bagi  */
    public function get_dataset_balance_yes()
    {
        $data=array('balance'=>'rich','balance'=>'middle','balance'=>'enough','balance'=>'less');
        $balance=0;
        if(is_array($data)){
            $coba_query=$this->db->get_where('coba_dataset', array('y'=>'yes', 'balance'=>$balance));
            return $coba_query->num_rows();
        }else{
            echo "data Tidak Di Temukan";
        }
    }
    public function get_dataset_balance_no()
    {
        $data=array("middle","enough","less","rich");
        if(is_array($data)){
            $coba_query=$this->db->get_where('coba_dataset', array('y'=>'no', 'balance'=>'rich'));
            return $coba_query->num_rows();
        }elseif(is_array($data)){
            $coba_query=$this->db->get_where('coba_dataset', array('y'=>'no', 'balance'=>'enough'));
            return $coba_query->num_rows();
        }elseif(is_array($data)){
            $coba_query=$this->db->get_where('coba_dataset', array('y'=>'no', 'balance'=>'less'));
            return $coba_query->num_rows();
        }elseif(is_array($data)){
            $coba_query=$this->db->get_where('coba_dataset', array('y'=>'no', 'balance'=>'middle'));
            return $coba_query->num_rows();
        }else{
            echo "data Tidak Di Temukan";
        }
    }
     /* Ambil data ---> P(loan = ? | Y= yes) = hasil_bagi  */
    public function get_dataset_loan_yes()
    {
        $data=array("no","yes");
        if(is_array($data)){
            $coba_query=$this->db->get_where('coba_dataset', array('y'=>'yes', 'loan'=>'no'));
            return $coba_query->num_rows();
        }elseif(is_array($data)){
            $coba_query=$this->db->get_where('coba_dataset', array('y'=>'yes', 'loan'=>'yes'));
            return $coba_query->num_rows();
        }else{
            echo "Data Tidak Di Temukan";
        }
    }
    public function get_dataset_loan_no()
    {
        $data=array("yes","no");
        if(is_array($data)){
            $coba_query=$this->db->get_where('coba_dataset', array('y'=>'no', 'loan'=>'yes'));
            return $coba_query->num_rows();
        }elseif(is_array($data)){
            $coba_query=$this->db->get_where('coba_dataset', array('y'=>'no', 'loan'=>'no'));
            return $coba_query->num_rows();
        }else{
            echo "data Tidak Di Temukan";
        }
    }

    /* Ambil data ---> P(month = ? | Y= yes) = hasil_bagi  */
    public function get_dataset_month_yes()
    {
        $data=array("jan","feb","mar","apr","may","jun","jul","aug","sep","oct","nov","dec");
        if(is_array($data)){
            $coba_query=$this->db->get_where('coba_dataset', array('y'=>'yes', 'month'=>'jul'));
            return $coba_query->num_rows();
        }elseif(is_array($data)){
            $coba_query=$this->db->get_where('coba_dataset', array('y'=>'yes', 'month'=>'feb'));
            return $coba_query->num_rows();
        }elseif(is_array($data)){
            $coba_query=$this->db->get_where('coba_dataset', array('y'=>'yes', 'month'=>'mar'));
            return $coba_query->num_rows();
        }elseif(is_array($data)){
            $coba_query=$this->db->get_where('coba_dataset', array('y'=>'yes', 'month'=>'apr'));
            return $coba_query->num_rows();
        }elseif(is_array($data)){
            $coba_query=$this->db->get_where('coba_dataset', array('y'=>'yes', 'month'=>'may'));
            return $coba_query->num_rows();
        }elseif(is_array($data)){
            $coba_query=$this->db->get_where('coba_dataset', array('y'=>'yes', 'month'=>'jun'));
            return $coba_query->num_rows();
        }elseif(is_array($data)){
            $coba_query=$this->db->get_where('coba_dataset', array('y'=>'yes', 'month'=>'jan'));
            return $coba_query->num_rows();
        }elseif(is_array($data)){
            $coba_query=$this->db->get_where('coba_dataset', array('y'=>'yes', 'month'=>'aug'));
            return $coba_query->num_rows();
        }elseif(is_array($data)){
            $coba_query=$this->db->get_where('coba_dataset', array('y'=>'yes', 'month'=>'sep'));
            return $coba_query->num_rows();
        }elseif(is_array($data)){
            $coba_query=$this->db->get_where('coba_dataset', array('y'=>'yes', 'month'=>'oct'));
            return $coba_query->num_rows();
        }elseif(is_array($data)){
            $coba_query=$this->db->get_where('coba_dataset', array('y'=>'yes', 'month'=>'nov'));
            return $coba_query->num_rows();
        }elseif(is_array($data)){
            $coba_query=$this->db->get_where('coba_dataset', array('y'=>'yes', 'month'=>'dec'));
            return $coba_query->num_rows();
        }else{
            echo "data Tidak Di Temukan";
        }
    }
    public function get_dataset_month_no()
    {
        $data=array("jan","feb","mar","apr","may","jun","jul","aug","sep","oct","nov","dec");
        if(is_array($data)){
            $coba_query=$this->db->get_where('coba_dataset', array('y'=>'no', 'month'=>'jan'));
            return $coba_query->num_rows();
        }elseif(is_array($data)){
            $coba_query=$this->db->get_where('coba_dataset', array('y'=>'no', 'month'=>'feb'));
            return $coba_query->num_rows();
        }elseif(is_array($data)){
            $coba_query=$this->db->get_where('coba_dataset', array('y'=>'no', 'month'=>'mar'));
            return $coba_query->num_rows();
        }elseif(is_array($data)){
            $coba_query=$this->db->get_where('coba_dataset', array('y'=>'no', 'month'=>'apr'));
            return $coba_query->num_rows();
        }elseif(is_array($data)){
            $coba_query=$this->db->get_where('coba_dataset', array('y'=>'no', 'month'=>'may'));
            return $coba_query->num_rows();
        }elseif(is_array($data)){
            $coba_query=$this->db->get_where('coba_dataset', array('y'=>'no', 'month'=>'jun'));
            return $coba_query->num_rows();
        }elseif(is_array($data)){
            $coba_query=$this->db->get_where('coba_dataset', array('y'=>'no', 'month'=>'jul'));
            return $coba_query->num_rows();
        }elseif(is_array($data)){
            $coba_query=$this->db->get_where('coba_dataset', array('y'=>'no', 'month'=>'aug'));
            return $coba_query->num_rows();
        }elseif(is_array($data)){
            $coba_query=$this->db->get_where('coba_dataset', array('y'=>'no', 'month'=>'sep'));
            return $coba_query->num_rows();
        }elseif(is_array($data)){
            $coba_query=$this->db->get_where('coba_dataset', array('y'=>'no', 'month'=>'oct'));
            return $coba_query->num_rows();
        }elseif(is_array($data)){
            $coba_query=$this->db->get_where('coba_dataset', array('y'=>'no', 'month'=>'nov'));
            return $coba_query->num_rows();
        }elseif(is_array($data)){
            $coba_query=$this->db->get_where('coba_dataset', array('y'=>'no', 'month'=>'dec'));
            return $coba_query->num_rows();
        }else{
            echo "data Tidak Di Temukan";
        }
    }
     /* Ambil data ---> P(campaign = ? | Y= yes) = hasil_bagi  */
    public function get_dataset_campaign_yes()
    {
        $data=array("not","rarely","often","always");
        if(is_array($data)){
            $coba_query=$this->db->get_where('coba_dataset', array('y'=>'yes', 'campaign'=>'not'));
            return $coba_query->num_rows();
        }elseif(is_array($data)){
            $coba_query=$this->db->get_where('coba_dataset', array('y'=>'yes', 'campaign'=>'rarely'));
            return $coba_query->num_rows();
        }elseif(is_array($data)){
            $coba_query=$this->db->get_where('coba_dataset', array('y'=>'yes', 'campaign'=>'often'));
            return $coba_query->num_rows();
        }elseif(is_array($data)){
            $coba_query=$this->db->get_where('coba_dataset', array('y'=>'yes', 'campaign'=>'always'));
            return $coba_query->num_rows();
        }else{
            echo "data Tidak Di Temukan";
        }
    }
    public function get_dataset_campaign_no()
    {
        $data=array("not","rarely","often","always");
        if(is_array($data)){
            $coba_query=$this->db->get_where('coba_dataset', array('y'=>'no', 'campaign'=>'not'));
            return $coba_query->num_rows();
        }elseif(is_array($data)){
            $coba_query=$this->db->get_where('coba_dataset', array('y'=>'no', 'campaign'=>'rarely'));
            return $coba_query->num_rows();
        }elseif(is_array($data)){
            $coba_query=$this->db->get_where('coba_dataset', array('y'=>'no', 'campaign'=>'often'));
            return $coba_query->num_rows();
        }elseif(is_array($data)){
            $coba_query=$this->db->get_where('coba_dataset', array('y'=>'no', 'campaign'=>'always'));
            return $coba_query->num_rows();
        }else{
            echo "data Tidak Di Temukan";
        }
    }

    public function get_dataset_previous_yes()
    {
        $data=array("low","half","high");
        if(is_array($data)){
            $coba_query=$this->db->get_where('coba_dataset', array('y'=>'yes', 'previous'=>'low'));
            return $coba_query->num_rows();
        }elseif(is_array($data)){
            $coba_query=$this->db->get_where('coba_dataset', array('y'=>'yes', 'previous'=>'half'));
            return $coba_query->num_rows();
        }elseif(is_array($data)){
            $coba_query=$this->db->get_where('coba_dataset', array('y'=>'yes', 'previous'=>'high'));
            return $coba_query->num_rows();
        }else{
            echo "data Tidak Di Temukan";
        }
    }
    public function get_dataset_previous_no()
    {
        $data=array("low","half","high");
        if(is_array($data)){
            $coba=$this->db->get_where('coba_dataset', array('y'=>'no', 'previous'=>'low'));
            return $coba->num_rows();
        }elseif(is_array($data)){
            $coba_query=$this->db->get_where('coba_dataset', array('y'=>'no', 'previous'=>'half'));
            return $coba_query->num_rows();
        }elseif(is_array($data)){
            $coba_query=$this->db->get_where('coba_dataset', array('y'=>'no', 'previous'=>'high'));
            return $coba_query->num_rows();
        }else{
            echo "data Tidak Di Temukan";
        }
    }
///////////////////////////////////////////////////////////////////////////////////

}