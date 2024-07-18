<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TaskModel extends CI_Model{

    public function get_task_id($id){
        return $this->db->get_where('Tasks', array('id'=> $id))->result_array();

    }



    
    public function getdata($id){
        $this->db->select('*');
        $this->db->from('Tasks');
        $this->db->where('users_id',$id);
        $query = $this->db->get();
        if($query->num_rows() > 0){
            return $query->result();
        }else{
            return array();
        }
        
    }

    public function gettask($data){
        $this->db->insert('Tasks',$data);
        return $this->db->insert_id();
        
    }


    public function getsinglet($id){
        $query = $this->db->get_where('Tasks',array('id'=> $id));
        return $query->row();    
    }

    public function updatedata($data, $id){
        $this->db->where('id',$id);
        return $this->db->update('Tasks',$data);
    }
    public function deletedata($id){
        return $this->db->delete('Tasks',array('id'=> $id));
        
    }

}