<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserController extends CI_Controller {
  
    public function __construct(){
        parent::__construct();
        $this->load->model('UserModel');
        $data = array();
    }

    public function login(){
       /*  If($this->session->userdata("userid"))
        return redirect("LibraryController"); */        
		$this->load->view('login');
    }

    public function loginForm(){
        $data = array();
        $data['username'] = $this->input->post('username');
        $data['password'] = $this->input->post('password');
        $check = $this->UserModel->checkUser($data);
        if($check){
            $sdata = array();
            $sdata['userid'] = $check->userid;
            $sdata['userLogin'] = TRUE;
            $this->session->set_userdata($sdata);
            redirect('LibraryController');
        }else{
            $sdata = array();
            $sdata['msg'] = '<span style="color:red">Username and/or Password incorrect</span>';
            $this->session->set_flashdata($sdata);
            redirect("usercontroller/login");
        }
    }

    public function logout(){
        $this->session->unset_userdata($userid);
        $this->session->set_userdata('userLogin', FALSE);
        $this->session->sess_destroy();
        redirect("usercontroller/login");
    }
}    