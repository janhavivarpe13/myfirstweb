<?php

class UserModel extends CI_Model{


    public function get_profile($id){
       $this->db->select('pp');
       $this->db->where('users_id',$id);
       $query= $this->db->get('Users');
       $result = $query->row_array();

       return $result['pp'];
    }

    public function get_user_info($id){
        $query = $this->db->get_where('Users',array('users_id'=>$id));
        return $query->row_array();
    }

    public function get_user_id($id){
        return $this->db->get_where('Users',array('users_id'=>$id))->row_array();
    }
    public function fetch($id)
    {
        $query = $this->db->get_where('Users', array('users_id' => $id));        
        return $query->row_array();
    }

    public function loginuser($data){
        $this->db->select("*");
        $array = array('email' => $data["email"], 'pass' => $data["pass"]);
        $this->db->where($array);
        // $this->db->where("email",$data["email"]);
        // $this->db->where("pass",$data["pass"]);
        $this->db->from('Users');
        $this->db->limit(1);
        $query = $this->db->get();
        if($query->num_rows() ==1){
            return $query->row()->users_id;
        }else{
            return false;
        }

    }


    /*
    public function isUnique($field, $str){
        return $this->db->limit(1)->get_where('Users', array($field => $str))->num_rows() === 0;
    }
        */

    public function homeuser($data){

        return $this->db->insert("Users",$data);


        
    }
}