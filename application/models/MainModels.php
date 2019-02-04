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

    public function getName($tablename, $name)
    {
        $sql = "SELECT * FROM $tablename WHERE name = ?  LIMIT 1";
        $query = $this->db->query($sql, array($name));
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

    // Удаление изобр из папки
    public function deleteFiles($name, $puth)
    {
        return unlink(FCPATH . "public/images/$puth/" . $name);
    }

    // Delete по id и tablename
    public function deleteOne($table, $id, $puth = '')
    {
        $con = $this->getId($table, $id);
        $name = $con[0]->img_name;
        $this->db->where('id', $id);
        $this->db->delete($table);
        if ($this->db->affected_rows() == '1') {
            $this->deleteFiles($name,$puth);
            return TRUE;
        } else {
            return FAlSE;
        }
    }
}