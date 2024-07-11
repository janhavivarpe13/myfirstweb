<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logout extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Authentication');
    }

    public function logout()
    {
        $this->session->unset_userdata('authenticated');
        $this->session->unset_userdata('userdata');

        $this->session->set_flashdata('status','You are Logged Out Successfully !');
        redirect(base_url('login'));

    }

}