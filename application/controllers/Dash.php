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
        $this->load->library('pagination');
        $config = array();
        $config['base_url'] = base_url('dash/index/'); // Replace with your actual controller and method
        $config['per_page'] = 5; // Number of records per page
        $config['total_rows'] = $this->TaskModel->count_tasks(); 

        $config['full_tag_open'] = "<ul class='pagination'>";
        $config['full_tag_close'] = "</ul>";

        $config['prev_tag_open'] = "<li class='page-item'>";
        $config['prev_tag_close'] = "</li>";
   
        $config['cur_tag_open'] = "<li class='page-item active'><a class='page-link'>";
        $config['cur_tag_close'] = "</li>";

        $config['next_tag_open'] = "<li class='page-item'>";
        $config['next_tag_close'] = "</li>";
        $config['attributes'] = array('class' => 'page-link');


        $this->pagination->initialize($config);

        

        $id = $this->session->userdata('users_id');
        $data['tasks_data']= $this->TaskModel->getdata($id,$config['per_page'],$this->uri->segment(3));
        $data['links'] = $this->pagination->create_links(); 
        

      
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