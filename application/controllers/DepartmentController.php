<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DepartmentController extends CI_Controller {
  
    public function __construct(){
        parent::__construct();
        If(!$this->session->userdata("userid"))
          return redirect("UserController/login");
        $this->load->model('DepartmentModel');
        $data = array();
    }

    public function adddepartment(){
        $data['title'] = 'Add New Department';
		$data['header'] = $this->load->view('include/header', $data, TRUE);
		$data['sidebar'] = $this->load->view('include/sidebar', '', TRUE);
		$data['content'] = $this->load->view('include/departmentadd', '', TRUE);
		$data['footer'] = $this->load->view('include/footer', '', TRUE);
		$this->load->view('home', $data);
    }

    public function addDepartmentForm(){
        $data['depname'] = $this->input->post('depname');

        #Add validation to the form fields

        $depname = $data['depname'];
       

        if (empty($depname)) {
            $sdata = array();
            $sdata['msg'] = '<span style="color:red">Field must not be empty</span>';
            $this->session->set_flashdata($sdata);
            redirect("DepartmentController/adddepartment");
        }else{
            $this->DepartmentModel->saveDepartment($data);
            $sdata = array();
            $sdata['msg'] = '<span style="color:green">Department Added Successfully</span>';
            $this->session->set_flashdata($sdata);
            redirect("DepartmentController/adddepartment");
        }
    }

    public function departmententlist(){
        $data['title'] = 'departmentent List';
		$data['header'] = $this->load->view('include/header', $data, TRUE);
		$data['sidebar'] = $this->load->view('include/sidebar', '', TRUE);
        $data['depdata'] = $this->DepartmentModel->getAllDepartments();
        $data['content'] = $this->load->view('include/listdepartmentent', $data, TRUE);
		$data['footer'] = $this->load->view('include/footer', '', TRUE);
		$this->load->view('home', $data);

    }

     public function editdepartment($id){
        $data['title'] = 'Edit Department';
		$data['header'] = $this->load->view('include/header', $data, TRUE);
		$data['sidebar'] = $this->load->view('include/sidebar', '', TRUE);
        $data['depById'] = $this->DepartmentModel->getDepartmentById($id);
        $data['content'] = $this->load->view('include/departmentedit', $data, TRUE);
		$data['footer'] = $this->load->view('include/footer', '', TRUE);
		$this->load->view('home', $data);
    } 

    public function updateDepartment(){
        $data['depid'] = $this->input->post('depid');
        $data['depname'] = $this->input->post('depname');

        #Add validation to the form fields

        $depid = $data['depid'];
        $depname = $data['depname'];
       

        if (empty($depname)) {
            $sdata = array();
            $sdata['msg'] = '<span style="color:red">Field must not be empty</span>';
            $this->session->set_flashdata($sdata);
            redirect("DepartmentController/editdepartment/".$depid);
        }else{
            $this->DepartmentModel->updaeDepName($data);
            $sdata = array();
            $sdata['msg'] = '<span style="color:green">Department updaed Successfully</span>';
            $this->session->set_flashdata($sdata);
            redirect("DepartmentController/departmententlist");
        }
    }

    public function deletedepartment($id){
        $this->DepartmentModel->delDepartById($id);
        $sdata = array();
        $sdata['msg'] = '<span style="color:green">Department Deleted Successfully</span>';
        $this->session->set_flashdata($sdata);
        redirect("DepartmentController/departmententlist");
    }

}
