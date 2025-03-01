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
        $total_tasks = $this->TaskModel->count_tasks();
        $config['total_rows'] = $total_tasks;

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

        $page = $this->uri->segment(3) ? $this->uri->segment(3) : 0;

        $id = $this->session->userdata('users_id');
        
        $data['tasks_data']= $this->TaskModel->getdata($id,$config['per_page'],$page);

        
        $data['links'] = $this->pagination->create_links();
        $data['total_tasks'] = $total_tasks;
        
        $data['config']= $config;
       
      
       $this->load->view('templates/header.php');
        $this->load->view('dash', $data);
        $this->load->view('templates/footer.php');

       //echo '<pre>'; print_r($data); exit();
       
       
       //echo "<pre>"; print_r($data); die();


    }

    

    public function addtasks(){

        $this->load->library('form_validation');
        $this->form_validation->set_rules('task_name','Taskname','required');
        $this->form_validation->set_rules('assign','Assign','required|valid_email');
        $this->form_validation->set_rules('start_date','startdate','required');
        $this->form_validation->set_rules('end_date','enddate','required');
        $this->form_validation->set_rules('status','status', 'required');

        if($this->form_validation->run() == FALSE){
            $data_error = [

                "error" => validation_errors()
            ];

            $this->session->set_flashdata($data_error);

        }
        else{

        $data= [
            'users_id'=>$this->session->userdata('users_id'),
            'tname'=>$this->input->post('task_name'),
            'Assignby'=>$this->input->post('assign'),
            'startD'=>$this->input->post('start_date'),
            'endD'=>$this->input->post('end_date'),
            'Status'=>$this->input->post('status'),
            

        ];
        $result= $this->TaskModel->gettask($data);
        if($result){
            $this->session->set_flashdata('status','Task added Successfully!');
                redirect(base_url('dash'));
        }
        else{
            $this->session->set_flashdata('status','Failed!');
                redirect(base_url('dash'));
        }

        }
        redirect('dash');

       
    }

    public function edit($id){

        $data['singlet'] = $this->TaskModel->getsinglet($id);
        $this->load->view('edittask',$data);
    }

    public function update(){

            $task_id = $this->input->post('update_id');
            $data= [
                'tname'=>$this->input->post('task_name'),
                'Assignby'=>$this->input->post('assign'),
                'startD'=>$this->input->post('start_date'),
                'endD'=>$this->input->post('end_date'),
                'Status'=>$this->input->post('status'),
            ];

            
            
            $result= $this->TaskModel->updatedata($data,$task_id);
           
            if($result){
                $this->session->set_flashdata('status','Task Updated Successfully!');
                    redirect(base_url('dash'));
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