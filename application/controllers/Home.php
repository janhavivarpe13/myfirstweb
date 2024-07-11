<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller{


    public function __construct()
    {
        parent::__construct();
        if($this->session->has_userdata('authenticated'))
        {
            $this->session->set_flashdata('status','You are already Registered..');
            redirect(base_url('dash'));
        }

        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('UserModel');
        $this->load->library('session');
        
        

    }
    public function index(){
        $this->load->view('templates/header.php');
        $this->load->view('home'); 
        $this->load->view('templates/footer.php');
        
    }

    public function add(){
        
        $this->form_validation->set_rules('Fname','FirstName','trim|required|alpha_numeric');
        $this->form_validation->set_rules('Lname',"LastName",'trim|required|alpha_numeric');
        $this->form_validation->set_rules('birthday','birthday','required|callback_age_over_18');
        $this->form_validation->set_rules('email','email','trim|required|valid_email|is_unique[Users.email]');
        $this->form_validation->set_rules('password','password','required');
        $this->form_validation->set_rules('cpassword','cpassword','required|matches[password]');
        $this->form_validation->set_rules('gender','Gender','trim|required');
        $this->form_validation->set_message('age_over_18', 'You must be at least 18 years old.');
        // $this->form_validation->set_rules('profilepic','profilepic','trim|required');
        
        if($this->form_validation->run() == FALSE){  
        // echo 'Validation failed:';
        // var_dump($this->form_validation->run());
        // echo validation_errors();
        // exit; 
            $this->index();
        }
        else
        {
            $ori_filename = $_FILES['profilepic']['name'];
            if(empty($ori_filename)) 
            {
                $imageError = array('imageError' => 'Profile Picture is required');
                $this->load->view('home', $imageError);
            } 
            else 
            {
                $new_name= time()."".str_replace(" ","-", $ori_filename);
                $config= [
                    'upload_path'=> './images',
                    'allowed_types'=>'gif|jpg|png|jpeg',
                    'file_name'=>$new_name,
                ];
                $this->load->library('upload', $config);
                if(!$this->upload->do_upload('profilepic'))
                {
                    $imageError = array('imageError' => $this->upload->display_errors());
                    $this->load->view('home', $imageError);
                }
                else
                {
                    $pp_filename = $this->upload->data('file_name');
                    $data= [
                        'Fname' =>$this->input->post('Fname'),
                        'Lname' => $this->input->post('Lname'),
                        'email'=> $this->input->post('email'),
                        'Bdate' => $this->input->post('birthday'),
                        'pass'=> $this->input->post('password'),
                        'Cpass'=> $this->input->post('cpassword'),
                        'gender'=> $this->input->post('gender'),
                        'pp'=> $pp_filename,
                        
                    ];
                   
        
                //echo '<pre>'; print_r($data); exit();
                    $checking=$this->UserModel->homeuser($data);
                    if($checking)
                    {
                        //var_dump('imageError');exit;
                        $this->session->set_flashdata('status','Registered Successfully!');
                        redirect(base_url('login'));
                    }
                   
                    else
                    {
                        $this->session->set_flashdata('status','Registration Failed!');
                        redirect(base_url('home'));
                    }
                    
                }

            }
        }
        
        
    }
   
    public function age_over_18($str) {
        // Calculate the age from the birthdate
        $birthday = new DateTime($str);
        $today = new DateTime();
        $age = $today->diff($birthday)->y;

        // Check if age is 18 or older
        return ($age >= 18);
        //var_dump(age_over_18) ; exit();
    }
       
        
    
}