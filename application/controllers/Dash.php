<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dash extends CI_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->model('Authentication');
        $this->load->model('UserModel');
        $this->load->model('TaskModel');
    }
    public function index(){
        /*
        echo"<pre>";
        print_r($data);
        echo "<pre>";
        die();

        */
    
        $id = $this->session->userdata('users_id');
        $data['tasks_data']= $this->TaskModel->getdata($id);

        $this->load->view('templates/header.php');
        $this->load->view('dash', $data);
        $this->load->view('templates/footer.php');

       //echo '<pre>'; print_r($data); exit();
       
       
       //echo "<pre>"; print_r($data); die();


    }

    public function addtasks(){

       
        $data= [
            'users_id'=>$this->session->userdata('users_id'),
            'tname'=>$this->input->post('task_name'),
            'startD'=>$this->input->post('start_date'),
            'endD'=>$this->input->post('end_date'),
            'Status'=>$this->input->post('status'),

        ];
        $result= $this->TaskModel->gettask($data);
        if($result){
            $this->session->set_flashdata('status','Task added Successfully!');
                redirect(base_url('dash'));"";
        }
        else{
            $this->session->set_flashdata('status','Failed!');
                redirect(base_url('dash'));
        }
    }

    public function edit($id){

        $data['singlet'] = $this->TaskModel->getsinglet($id);
        $this->load->view('edittask',$data);
    }

    public function update($id){

        $data= [
            'tname'=>$this->input->post('task_name'),
            'startD'=>$this->input->post('start_date'),
            'endD'=>$this->input->post('end_date'),
            'Status'=>$this->input->post('status'),

        ];
        
        $result= $this->TaskModel->updatedata($data, $id);
        if($result){
            $this->session->set_flashdata('status','Task Updated Successfully!');
                redirect(base_url('dash'));"";
        }
        else{
            $this->session->set_flashdata('status','Failed!');
                redirect(base_url('dash'));
        }
    }

    public function delete($id){
        $result= $this->TaskModel->deletedata($id);
        if($result == true){
            $this->session->set_flashdata('status','Task Deleted Successfully!');
        }
        redirect(base_url('dash'));

    }

 
    
    

    

}