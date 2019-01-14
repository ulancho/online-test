<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->library('pagination');
        $this->load->helper('url');
        $this->load->helper('html');
        $this->load->model('MainModels');
        $this->load->database();
    }

	public function index()
	{
	    $table = 'profession';
        $data['profession'] = $this->MainModels->selectAllArray($table);
		$this->load->view('index',$data);
	}

	public function profession($name){
        $table_name = $name.'_questions';

        $config['base_url'] = base_url() . "Welcome/profession/$name/";
        $config['total_rows'] = $this->db->count_all($table_name);
        $config['per_page'] = 1;
        $config['full_tag_open'] = '<div class="pagination">';
        $config['full_tag_close'] = '</div>';
        $config['next_link'] = 'Следующая';

        $config['prev_link'] = '';
        $config['display_pages'] = FALSE;


        $this->pagination->initialize($config);

        $data['question']  = $this->MainModels->selectAll($table_name, $config['per_page'], $this->uri->segment(4));

        $this->load->view('profession',$data);


    }
}
