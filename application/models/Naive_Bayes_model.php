<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Naive_Bayes_model extends CI_Model
{

    public $table = 'data_testing';
    public $id = 'id';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id', $q);
	$this->db->or_like('job', $q);
	$this->db->or_like('marital', $q);
	$this->db->or_like('education', $q);
	$this->db->or_like('df', $q);
	$this->db->or_like('balance', $q);
	$this->db->or_like('housing', $q);
	$this->db->or_like('loan', $q);
	$this->db->or_like('day', $q);
	$this->db->or_like('month', $q);
	$this->db->or_like('duration', $q);
	$this->db->or_like('campaign', $q);
	$this->db->or_like('pdays', $q);
	$this->db->or_like('previous', $q);
	$this->db->or_like('poutcome', $q);
    $this->db->or_like('y', $q);
    $this->db->or_like('prediksi', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id', $q);
	$this->db->or_like('job', $q);
    $this->db->or_like('marital', $q);
    $this->db->or_like('education', $q);
    $this->db->or_like('df', $q);
    $this->db->or_like('balance', $q);
    $this->db->or_like('housing', $q);
    $this->db->or_like('loan', $q);
    $this->db->or_like('day', $q);
    $this->db->or_like('month', $q);
    $this->db->or_like('duration', $q);
    $this->db->or_like('campaign', $q);
    $this->db->or_like('pdays', $q);
    $this->db->or_like('previous', $q);
    $this->db->or_like('poutcome', $q);
    $this->db->or_like('y', $q);
    $this->db->or_like('prediksi', $q);
	$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

}
