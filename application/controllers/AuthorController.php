<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AuthorController extends CI_Controller {
  
    public function __construct(){
        parent::__construct();
        $this->load->model('AuthorModel');
        $data = array();
    }

    public function addAuthor(){
        $data['title'] = 'Add New Author';
		$data['header'] = $this->load->view('include/header', $data, TRUE);
		$data['sidebar'] = $this->load->view('include/sidebar', '', TRUE);
		$data['content'] = $this->load->view('include/authoradd', '', TRUE);
		$data['footer'] = $this->load->view('include/footer', '', TRUE);
		$this->load->view('home', $data);
    }

    public function addAuthorForm(){
        $data['autname'] = $this->input->post('autname');

        #Add validation to the form fields

        $autname = $data['autname'];
       

        if (empty($autname)) {
            $sdata = array();
            $sdata['msg'] = '<span style="color:red">Field must not be empty</span>';
            $this->session->set_flashdata($sdata);
            redirect("AuthorController/addAuthor");
        }else{
            $this->AuthorModel->saveAuthor($data);
            $sdata = array();
            $sdata['msg'] = '<span style="color:green">Author Added Successfully</span>';
            $this->session->set_flashdata($sdata);
            redirect("AuthorController/addAuthor");
        }
    }

    public function authorlist(){
        $data['title'] = 'Author List';
		$data['header'] = $this->load->view('include/header', $data, TRUE);
		$data['sidebar'] = $this->load->view('include/sidebar', '', TRUE);
        $data['autdata'] = $this->AuthorModel->getAllAuthors();
        $data['content'] = $this->load->view('include/listAuthor', $data, TRUE);
		$data['footer'] = $this->load->view('include/footer', '', TRUE);
		$this->load->view('home', $data);

    }

    public function editauthor($id){
        $data['title'] = 'Edit Author';
		$data['header'] = $this->load->view('include/header', $data, TRUE);
		$data['sidebar'] = $this->load->view('include/sidebar', '', TRUE);
        $data['autById'] = $this->AuthorModel->getAuthorById($id);
        $data['content'] = $this->load->view('include/authoredit', $data, TRUE);
		$data['footer'] = $this->load->view('include/footer', '', TRUE);
		$this->load->view('home', $data);
    }

    public function updateAuthor(){
        $data['autid'] = $this->input->post('autid');
        $data['autname'] = $this->input->post('autname');

        #Add validation to the form fields

        $autid = $data['autid'];
        $autname = $data['autname'];
       

        if (empty($autname)) {
            $sdata = array();
            $sdata['msg'] = '<span style="color:red">Field must not be empty</span>';
            $this->session->set_flashdata($sdata);
            redirect("AuthorController/editauthor/".$autid);
        }else{
            $this->AuthorModel->updateAuthName($data);
            $sdata = array();
            $sdata['msg'] = '<span style="color:green">Author updated Successfully</span>';
            $this->session->set_flashdata($sdata);
            redirect("AuthorController/authorlist");
        }
    }

    public function deleteauthor($id){
        $this->AuthorModel->delAuthById($id);
        $sdata = array();
        $sdata['msg'] = '<span style="color:green">Author Deleted Successfully</span>';
        $this->session->set_flashdata($sdata);
        redirect("AuthorController/authorlist");
    }

}    