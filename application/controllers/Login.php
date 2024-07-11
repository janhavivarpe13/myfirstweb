<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller{

    public function __construct(){
        parent::__construct();
        if($this->session->has_userdata('authenticated'))
        {
            $this->session->set_flashdata('status','You are already Loggedin..');
            redirect(base_url('dash'));
        }

        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('UserModel');
    }
    public function index(){
        $this->load->view('templates/header.php');
        $this->load->view('login');
        $this->load->view('templates/footer.php');
    }

    public function login(){

        $this->form_validation->set_rules('email','Email','required|valid_email');
        $this->form_validation->set_rules('password','password','trim|required');
        if($this->form_validation->run() == FALSE)
        {
            $this->index();
        }
        else
        {
            $data = [
                'email'=> $this->input->post('email'),
                'pass'=> $this->input->post('password'),
            ];
            $user = new UserModel;
            $result = $user->loginuser($data);
            if($result)
            {
                $userdata=[
                    'id' => $result->id,
                    'Fname'=>$result->Fname,
                    'Lname'=> $result->Lname,
                    'authenticated' => TRUE
                ];
                $this->session->set_userdata($userdata);
                redirect('dash');
            }
            else{
                $this->session->set_flashdata('status','Invaild Email Id or Password');
                redirect(base_url('login'));
            }
        }
        
    }


}