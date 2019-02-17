<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('pagination');
        $this->load->helper('url');
        $this->load->helper('html');
        $this->load->model('MainModels');
        $this->load->library('session');
        $this->load->database();
        error_reporting(0);
    }

    public function index()
    {
        $data['profession'] = $this->MainModels->SelectProf();
        $this->load->view('header');
        $this->load->view('index', $data);
        $this->load->view('footer');
    }

    public function start($name)
    {
        $data['table'] = $name;
        $this->load->view('header');
        $this->load->view('start', $data);
        $this->load->view('footer');
    }

    public function registeruser($name)
    {
        $username = $this->input->post('name');
        $mail = $this->input->post('email');
        $start = time();
        $data = array(
            'name' => $username,
            'mail' => $mail,
            'start' => $start
        );
        if ($this->db->insert('points', $data)) {
            $array = array(
                'name' => $username,
                'start' => $start
            );
            $this->session->set_userdata($array);
            $newURL = base_url() . "welcome/profession/$name";
            header('Location: ' . $newURL);
        }

    }

    public function profession($name)
    {
        /*проверка*/
        if ($this->session->has_userdata('name') == 1){
        $table_name = $name . '_questions';
        $array = array(
            'table_name' => $table_name
        );
        $this->session->set_userdata($array);

        $config['base_url'] = base_url() . "Welcome/profession/$name/";
        $config['total_rows'] = $this->db->count_all($table_name);
        $config['per_page'] = 1;
        $config['full_tag_open'] = '<div class="pagination go">';
        $config['full_tag_close'] = '</div>';

        $config['attributes'] = array('class' => 'myclass testSubmitbtn aBtn');
        $config['next_link'] = 'Следующая';
        $config['prev_link'] = FALSE;
        $config['display_pages'] = FALSE;
        $config['last_link'] = FALSE;
        $config['first_link'] = FALSE;
        $config['attributes']['rel'] = FALSE;

        $this->pagination->initialize($config);

        $data['question'] = $this->MainModels->selectAll($table_name, $config['per_page'], $this->uri->segment(4));

        $allAnswer = $this->db->from($table_name)->count_all_results();
        $data['last'] = $this->uri->segment(4);
        $data['all'] = (int)$allAnswer - 1;

        $this->load->view('header');
        $this->load->view('profession', $data);
        $this->load->view('footer');
        }

        else{
            $newURL = base_url();
            header('Location: ' . $newURL);
        }


    }

    public function balls()
    {
        $finish = $this->input->post('finish');//При нажатии на кнопку завершить
        $id = $this->input->post('id');//id вопроса
        $ans = $this->input->post('ans');// массив выбранных ответов

        $table = $this->session->userdata['table_name']; //название таблицы откуда читать
        $username = $this->session->userdata['name']; //имя юсера

        $row = $this->MainModels->getId($table, $id);// берем правильные ответы по id вопроса
        $correct_answer = $row[0]->correct_answer; // правильные ответы

        $correct_answer = json_decode($correct_answer);// переобразуем строку в массив
        $intersection = array_intersect($ans, $correct_answer); //проверяет схождение массивов
        $intersection = count($intersection);

        $endpoint = $intersection;

        $points = 'points';
        $point = $this->MainModels->getName($points, $username);
        if ($point) {
            $ball = $point[0]->points + $endpoint;
            $data = array(
                'points' => $ball,
            );
            $this->db->where('name', $username);
            $this->db->update('points', $data);
        }
        if (!empty($finish)) {
            $massiv['finish'] = 1;
            echo json_encode($massiv);
        }


    }

    public function finish()
    {
        /*проверка*/
        if ($this->session->has_userdata('name') == 1){
        $username = $this->session->userdata['name'];
        $startTime = $this->session->userdata['start'];
        $tableName= $this->session->userdata['table_name'];
         $tbl =  str_replace('_questions', '', $tableName);

        $stopTime = time();
        $finisTime = $stopTime - $startTime;
        $data['finisTimeResult'] = date("i:s", $finisTime);
//        echo 'потрачено времени:' . $finisTimeResult;
//        echo '<br>';
        $points = 'points';
        $point = $this->MainModels->getName($points, $username);
        $ball = $point[0]->points;
        $data['ball'] = $ball;
//        echo 'баллы:' . $ball;
//        echo '<br>';
        $allAnswer = $this->db->from($tableName)->count_all_results();
        $data['allAnswer'] = $allAnswer;
//        echo 'Всего вопросов:' . $allAnswer;
//        echo '<br>';
        $allAnswer10 = $allAnswer;
        $ball100 = $ball * 100;
        $procent = round($ball100/$allAnswer10, 2);
        $data['proc'] = $procent;
//        echo 'Процент:' . $proc;
//        echo '<br>';
            $res = $this->MainModels->getProffesion($tbl);
            if($procent>=0 && $procent <= 20 ){
                $data['grade'] = 3;
                $data['result_text'] = $res[0]->main20;
                $data['dop_text'] = $res[0]->dop20;
            }
            elseif ($procent>20 && $procent <= 50){
                $data['grade'] = 4;
                $data['result_text'] = $res[0]->main50;
                $data['dop_text'] = $res[0]->dop50;
            }
            elseif ($procent>50){
                $data['grade'] = 5;
                $data['result_text'] =  $res[0]->main90;
                $data['dop_text'] =  $res[0]->dop90;
            }


        $this->load->view('header');
        $this->load->view('finish',$data);
        $this->load->view('footer');
        $this->session->sess_destroy();
        }

        else{
            $newURL = base_url();
            header('Location: ' . $newURL);
        }
    }


}
