<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dash extends CI_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->model('Authentication');
        $this->load->model('UserModel');
    }
    public function index(){
        $this->load->view('templates/header.php');
        $this->load->view('dash');
        $this->load->view('templates/footer.php');


        $id = $this->session->userdata('id');
        $user_data= $this->UserModel->fetch($id);
        $data['users'] = $user_data;
        $data['profilepic'] = $user_data['pp'];
        $this->load->view('dash' ,$data);
        //echo '<pre>'; print_r($data); exit();
        

    }
    

    

}