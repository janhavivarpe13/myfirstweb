<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TaskModel extends CI_Model{


    public function getdata($id,$limit, $offset){
        $this->db->where('users_id',$id);
        $this->db->limit($limit,$offset);
        $query = $this->db->get('Tasks');
        if($query->num_rows() > 0){

            $index = $offset + 1;
            $result =  $query->result();
            foreach($result as $row){
                $row->sequential = $index;
                $index++;
            }
            return $result;
        }else{
            return array();
        }
        
    }
   
    public function count_tasks() {
        $id = $this->session->userdata('users_id');
        $this->db->where('users_id', $id);
        return $this->db->count_all_results('Tasks');
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