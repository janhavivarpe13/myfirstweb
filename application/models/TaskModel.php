<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TaskModel extends CI_Model{

    public function gettask($data){

        return $this->db->insert('Tasks',$data);
    }

    public function getdata(){
        $this->db->select('*');
        $this->db->from('Tasks');
        $query = $this->db->get()->result();
        return $query;
    }

    public function getsinglet($id){
        $this->db->where('id',$id);
        $query = $this->db->get('Tasks');
        if($query){
            return $query->row();
        }
       
    }

    public function updatedata($data, $id){
        $this->db->where('id',$id);
        $query =$this->db->update('Tasks',$data);
        if($query){
            return true;
        }
        else{
            return false;
        }
    }
    public function deletedata($id){
        $this->db->where('id',$id);
        $query=$this->db->delete('Tasks');
        if($query){
            return true;
        }
        else{
            return false;
        }
    }

}