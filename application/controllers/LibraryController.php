<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LibraryController extends CI_Controller {

	/* public function __construct(){
        parent::__construct();
		If(!$this->session->userdata("userid"))
          return redirect("usercontroller/login");
	} */

	public function index(){
		$this->home();
	}

	public function home(){
		$data = array();
		$data['title'] = 'Library Management System';
		$data['header'] = $this->load->view('include/header', $data, TRUE);
		$data['sidebar'] = $this->load->view('include/sidebar', '', TRUE);
		$data['content'] = $this->load->view('include/content', '', TRUE);
		$data['footer'] = $this->load->view('include/footer', '', TRUE);
		$this->load->view('home', $data);
	}
}
