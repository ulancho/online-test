<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MainModels extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function addTest($row){
        $string = array(
            'name' => $row['name'],
            'table_name' => $row['table_name'],
        );
        $this->db->insert('profession', $string);
        return $this->db->insert_id();
    }
    // Select with where po id
    public function getId($tablename, $id)
    {
        $sql = "SELECT * FROM $tablename WHERE id = ?  LIMIT 1";
        $query = $this->db->query($sql, array($id));
        if ($query) {
            return $query->result();
        } else {
            return false;
        }
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