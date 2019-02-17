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
       error_reporting(0);
    }

    public function all($id){

        $table = 'profession';
        $data['prof'] = $this->MainModels->getId($table,$id);
        $table_name = $data['prof'][0]->table_name.'_questions';
        $data['questions'] = $this->MainModels->selectAllArray($table_name);
        $data['table'] = $table_name;
        $data['id_prof'] = $id;

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
            $sql = "SELECT id FROM profession WHERE table_name = ?  LIMIT 1";
            $query = $this->db->query($sql, array($name));
            if ($query) {
                $query = $query->result_array();
                $data['allid'] = $query[0]['id'];

            } else {
            return false;
            }
            $this->load->view('admin/header');
            $this->load->view('admin/navbar');
            $this->load->view('admin/addQuestions_template',$data);
            $this->load->view('admin/footer');

    }
    //Процесс добавление вопроса
    public function addQuest(){
        $location = 'answer-photo';
//        $location_question = 'question-photo';
        $questions_file = 'questions_file';
        $img_status = $this->input->post('img-status') ?? "";
        $questions = $this->input->post('questions') ?? "";
        $questions_file = $this->do_upload($location, $questions_file) ?? "";
        $table_name =  $this->input->post('table');
        $table = $table_name.'_questions';
        if (!empty($img_status)){
            $ans1 = 'name-1';
            $ans2 = 'name-2';
            $ans3 = 'name-3';
            $ans4 = 'name-4';
            $ans5 = 'name-5';
            $answer1 = $this->do_upload($location, $ans1) ?? "";
            $answer2 = $this->do_upload($location, $ans2) ?? "";
            $answer3 = $this->do_upload($location, $ans3) ?? "";
            $answer4 = $this->do_upload($location, $ans4) ?? "";
            $answer5 = $this->do_upload($location, $ans5) ?? "";

        }
        else{
            $answer1 = $this->input->post('name-1') ?? "";
            $answer2 = $this->input->post('name-2') ?? "";
            $answer3 = $this->input->post('name-3') ?? "";
            $answer4 = $this->input->post('name-4') ?? "";
            $answer5 = $this->input->post('name-5') ?? "";
        }

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
            'correct_answer' => $correct_answer,
            'img_name' => $questions_file,
        );


        if (!$this->db->insert($table, $data)) {
            $this->session->set_flashdata('flash_message', 'Не удалось добавить данные!');
        } else {
            $this->session->set_flashdata('success_message', 'Данные успешно добавлены!');
        }
        redirect(site_url() . "admin/MainAdmin/addQuestions/$table_name");

    }
    //Процесс удаление вопроса
    public function deleteQuestion($id, $table, $id_profession){
        $puth = 'answer-photo';
        $get = $this->MainModels->getId($table, $id);

        if (!empty($get[0]->img_name)){
            $question_img = $this->MainModels->deleteFiles($get[0]->img_name, $puth);
        }
        if($get[0]->img_status == 1){
            !empty($get[0]->answer_2) ? $this->MainModels->deleteFiles($get[0]->answer_1, $puth) : '';
            !empty($get[0]->answer_2) ? $this->MainModels->deleteFiles($get[0]->answer_2, $puth) : '';
            !empty($get[0]->answer_3) ? $this->MainModels->deleteFiles($get[0]->answer_3, $puth) : '';
            !empty($get[0]->answer_4) ? $this->MainModels->deleteFiles($get[0]->answer_4, $puth) : '';
            !empty($get[0]->answer_5) ? $this->MainModels->deleteFiles($get[0]->answer_5, $puth) : '';
        }

        $result = $this->MainModels->deleteOneColumn($id,$table);
        if ($result == FALSE) {
            $this->session->set_flashdata('flash_message', 'Упс! Произошла ошибка');
        } else {
            $this->session->set_flashdata('success_message', 'Успешно удален!');

        }
        redirect(site_url() . "admin/MainAdmin/all/$id_profession");
    }

    //страничка редактирование вопроса
    public function updateQuestion($id,$table,$id_profession){
        $getRow = $this->MainModels->getId($table, $id);
        $imgStatus =  $getRow[0]->img_status;
        $data['row'] = $getRow;
        $this->load->view('admin/header');
        $this->load->view('admin/navbar');
        $this->load->view('admin/updateQuestion',$data);
        $this->load->view('admin/footer');

//        echo "<pre>";
//        print_r($imgStatus);
//        echo "</pre>";
//        die();
    }

    //редактирование название професси
    public function updateProfession(){
        $array['id'] = $this->input->post('id-prof');
        $array['name'] = trim($this->input->post('name-prof'));

        if (!$this->MainModels->updateProfession($array)) {
            $this->session->set_flashdata('flash_message', 'Не удалось обновить данные!');
        } else {
            $this->session->set_flashdata('success_message', 'Данные успешно обновлены.');
        }
        redirect(site_url() . 'admin/Admin_page/admin/');
    }
    //удаление профессии
    public function deleteProfession(){
        $table = 'profession';
        $id = $this->input->post('id-prof');
        $row = $this->MainModels->getId($table,$id);
        $prof_name = $row[0]->table_name.'_questions';
        $puth = 'answer-photo';

        $question_array = $this->MainModels->selectAllArray($prof_name);

        foreach ($question_array as $rows){
            if (!empty($rows['img_name'])){
                $this->MainModels->deleteFiles($rows['img_name'], $puth);
            }
            if ($rows['img_status'] == 1){
                 !empty($rows['answer_1']) ? $this->MainModels->deleteFiles($rows['answer_1'], $puth) : '';
                 !empty($rows['answer_2']) ? $this->MainModels->deleteFiles($rows['answer_2'], $puth) : '';
                 !empty($rows['answer_3']) ? $this->MainModels->deleteFiles($rows['answer_3'], $puth) : '';
                 !empty($rows['answer_4']) ? $this->MainModels->deleteFiles($rows['answer_4'], $puth) : '';
                 !empty($rows['answer_5']) ? $this->MainModels->deleteFiles($rows['answer_5'], $puth) : '';
            }
        }

        if (!$this->dbforge->drop_table($prof_name,TRUE) || !$this->MainModels->deleteOneColumn($id,$table)) {
            $this->session->set_flashdata('flash_message', 'Не удалось удалить профессию!');
        } else {
            $this->session->set_flashdata('success_message', 'Данные успешно удалены.');
        }
        redirect(site_url() . 'admin/Admin_page/admin/');

    }
    //изменение статуса профессии
    public function upStatus(){
        $table = 'profession';
        $id = $this->input->post('id');
        $get = $this->MainModels->getId($table, $id);
        $status = $get[0]->status;
        if ($status == 1){
            $array['status'] = 0;
        }
        elseif($status == 0){
            $array['status'] = 1;
        }
        $array['id'] = $id;

        $this->MainModels->updateStatus($array) ? $json['succes'] = 1 : $json['succes'] = 0;
        echo json_encode($json);
    }

    //добавление резултата профессии
    public function addResult(){
        $array['id'] = trim($this->input->post('id'));
        $array['main20'] = trim($this->input->post('main-result-20'));
        $array['dop20'] = trim($this->input->post('dop-result-20'));
        $array['main50'] = trim($this->input->post('main-result-50'));
        $array['dop50'] = trim($this->input->post('dop-result-50'));
        $array['main90'] = trim($this->input->post('main-result-90'));
        $array['dop90'] = trim($this->input->post('dop-result-90'));

        if (!$this->MainModels->AddProfessionResult($array)) {
               $json['succes'] = 0;
        } else {
            $json['succes'] = 1;
        }
        echo json_encode($json);
    }

    public function test(){
        $id = 8;
        $table = 'profession';
        if($this->MainModels->deleteOneColumn($id,$table)){
            echo "delete";
        }
        else{
            echo "no delete";
        }

    }
    // загрузка файлов
    private function do_upload($location, $name)
    {
        $config['upload_path'] = './public/images/' . $location . '/';
        $config['allowed_types'] = 'jpeg|jpg|png';
        $config['max_size'] = 2500;
        $config['max_width'] = 1000;
        $config['max_height'] = 1000;
        $config['encrypt_name'] = TRUE;
        $config['remove_spaces'] = TRUE;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload($name)) {
            $empty = '';
            return $empty;
        } else {
            $photo = $this->upload->data();
            $photo = $photo['file_name'];
            return $photo;
        }
    }

}