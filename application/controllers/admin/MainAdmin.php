<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MainAdmin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('MainModels');
        $this->load->library('session');
        $this->load->library('pagination');
        $this->load->helper('url');
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
        $this->load->dbforge();

        $arraydata = $this->session->userdata['login'];
        if (empty($arraydata)) {
            redirect(site_url() . 'admin/Admin_page/');
        }
    }

    public function all($id){
        $table = 'profession';
        $data['prof'] = $this->MainModels->getId($table,$id);
        $table_name = $data['prof'][0]->table_name.'_questions';
        $data['questions'] = $this->MainModels->selectAllArray($table_name);

        $this->load->view('admin/header');
        $this->load->view('admin/navbar');
        $this->load->view('admin/all',$data);
        $this->load->view('admin/footer');
    }

    //создание таблицы для вопроса и ответов
    private function createTable($table){
        $table_name = $table.'_questions';
        $fields = array(
            'id' => array(
                'type' => 'INT',
                'constraint' => '11',
                'unsigned' => TRUE,
                'unique' => TRUE,
                'auto_increment' => TRUE
            ),
            'question' => array(
                'type' => 'TEXT',
            ),
            'answer_1' => array(
                'type' => 'VARCHAR',
                'constraint' => '200',
            ),
            'answer_2' => array(
                'type' => 'VARCHAR',
                'constraint' => '200',
            ),
            'answer_3' => array(
                'type' => 'VARCHAR',
                'constraint' => '200',
            ),
            'answer_4' => array(
                'type' => 'VARCHAR',
                'constraint' => '200',
            ),
            'answer_5' => array(
                'type' => 'VARCHAR',
                'constraint' => '200',
            ),
            'img_status' => array(
                'type' => 'TINYINT',
                'default' => '0',
            ),
            'correct_answer' => array(
                'type' => 'VARCHAR',
                'constraint' => '50',
            ),
            'img_name' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
            ),
        );
        $this->dbforge->add_field($fields);
        $this->dbforge->create_table($table_name);
    }
    //добавление теста
    public function addTest(){
        $this->form_validation->set_rules('name', 'First Name', 'required|trim|max_length[100]',
            array('required' => 'Заполните название.',
                'max_length' => 'Должно содержать не больше 100 символов.'
            )
        );
        $this->form_validation->set_rules('table_name', 'Last Name', 'required|trim',
            array('required' => 'Заполните название таблицы.')
        );

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('admin/header');
            $this->load->view('admin/navbar');
            $this->load->view('admin/addTest_template');
            $this->load->view('admin/footer');
        } else {
            $array['name'] = $this->input->post('name');
            $str = $this->input->post('table_name');
            $array['table_name'] = mb_strtolower($str);
                if (!$this->MainModels->addTest($array)) {
                    $this->session->set_flashdata('flash_message', 'Не удалось добавить данные!');
                } else {
                    $this->createTable($str);
                    $this->session->set_flashdata('success_message', 'Данные успешно добавлены!');
                }
              redirect(site_url() . 'admin/MainAdmin/addTest');

        }

    }
    //добавление вопроса
    public function addQuestions($name){
            $data['table_name'] = $name;
            $this->load->view('admin/header');
            $this->load->view('admin/navbar');
            $this->load->view('admin/addQuestions_template',$data);
            $this->load->view('admin/footer');

    }
    //Процесс добавление вопроса
    public function addQuest(){
        echo "<pre>";
        print_r($_FILES);
        echo "</pre>";
        die();
        $questions = $this->input->post('questions') ?? "";
        $answer1 = $this->input->post('name-1') ?? "";

        $answer2 = $this->input->post('name-2') ?? "";
        $answer3 = $this->input->post('name-3') ?? "";
        $answer4 = $this->input->post('name-4') ?? "";
        $answer5 = $this->input->post('name-5') ?? "";

        $img_status = $this->input->post('img-status') ?? "";

        $json = [];
        for ($i=1; $i<=5; $i++){
            $right = 'right-'.$i;
            if (!empty($this->input->post($right))){
                $json[] = $i;
            }
        }

        $correct_answer = json_encode($json);

        $data = array(
            'question' => $questions,
            'answer_1' => $answer1,
            'answer_2' => $answer2,
            'answer_3' => $answer3,
            'answer_4' => $answer4,
            'answer_5' => $answer5,
            'img_status' => $img_status,
            'correct_answer' => $correct_answer
        );

        $this->db->insert('design_questions', $data);

    }

    private function do_upload($location, $name)
    {
        $config['upload_path'] = './public/images/' . $location . '/';
        $config['allowed_types'] = 'jpeg|jpg|png';
        $config['max_size'] = 1000;
        $config['max_width'] = 1000;
        $config['max_height'] = 1000;
        $config['encrypt_name'] = TRUE;
        $config['remove_spaces'] = TRUE;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload($name)) {
            return array('error' => $this->upload->display_errors());
        } else {
            return array('upload_data' => $this->upload->data());
        }
    }

}