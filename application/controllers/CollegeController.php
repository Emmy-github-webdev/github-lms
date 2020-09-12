<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CollegeController extends CI_Controller {
  
    public function __construct(){
        parent::__construct();
        $this->load->model('CollegeModel');
        $data = array();
    } 

    public function addcollege(){
        $data['title'] = 'Add New College';
		$data['header'] = $this->load->view('include/header', $data, TRUE);
		$data['sidebar'] = $this->load->view('include/sidebar', '', TRUE);
		$data['content'] = $this->load->view('include/collegeadd', '', TRUE);
		$data['footer'] = $this->load->view('include/footer', '', TRUE);
		$this->load->view('home', $data);
    }

    public function addCollegeForm(){
        $data['colname'] = $this->input->post('colname');

        #Add validation to the form fields

        $colname = $data['colname'];
       

        if (empty($colname)) {
            $sdata = array();
            $sdata['msg'] = '<span style="color:red">Field must not be empty</span>';
            $this->session->set_flashdata($sdata);
            redirect("CollegeController/addcollege");
        }else{
            $this->CollegeModel->saveCollege($data);
            $sdata = array();
            $sdata['msg'] = '<span style="color:green">College Added Successfully</span>';
            $this->session->set_flashdata($sdata);
            redirect("CollegeController/addcollege");
        }
    }

    public function collegelist(){
        $data['title'] = 'College List';
		$data['header'] = $this->load->view('include/header', $data, TRUE);
		$data['sidebar'] = $this->load->view('include/sidebar', '', TRUE);
        $data['coldata'] = $this->CollegeModel->getAllColleges();
        $data['content'] = $this->load->view('include/listcollege', $data, TRUE);
		$data['footer'] = $this->load->view('include/footer', '', TRUE);
		$this->load->view('home', $data);
    }

    public function editcollege($id){
        $data['title'] = 'Edit College';
		$data['header'] = $this->load->view('include/header', $data, TRUE);
		$data['sidebar'] = $this->load->view('include/sidebar', '', TRUE);
        $data['colById'] = $this->CollegeModel->getCollegeById($id);
        $data['contentl'] = $this->load->view('include/collegeedit', $data, TRUE);
		$data['footer'] = $this->load->view('include/footer', '', TRUE);
		$this->load->view('home', $data);
    } 

    public function updateCollege(){
        $data['colid'] = $this->input->post('colid');
        $data['colname'] = $this->input->post('colname');

        #Add validation to the form fields

        $colid = $data['colid'];
        $colname = $data['colname'];
       

        if (empty($colname)) {
            $sdata = array();
            $sdata['msg'] = '<span style="color:red">Field must not be empty</span>';
            $this->session->set_flashdata($sdata);
            redirect("CollegeController/editcollege/".$colid);
        }else{
            $this->CollegeModel->updateColName($data);
            $sdata = array();
            $sdata['msg'] = '<span style="color:green">College updated Successfully</span>';
            $this->session->set_flashdata($sdata);
            redirect("CollegeController/collegelist");
        }
    }

    public function deletecollege($id){
        $this->CollegeModel->delColById($id);
        $sdata = array();
        $sdata['msg'] = '<span style="color:green">College Deleted Successfully</span>';
        $this->session->set_flashdata($sdata);
        redirect("CollegeController/collegelist");
    }

}