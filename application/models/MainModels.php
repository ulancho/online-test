<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MainModels extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();

    }

    public function selectAllArray($table)
    {
        $this->db->order_by('id', 'desc');
        $query = $this->db->get($table);
        return $query->result_array();
    }

    public function selectAll($table, $num = null, $offset = null)
    {
        $this->db->order_by('id', 'desc');
        $query = $this->db->get($table, $num, $offset);
        return $query->result_array();
    }
}