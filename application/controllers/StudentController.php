<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class StudentController extends CI_Controller {
    public function __construct(){
        parent::__construct();
        If(!$this->session->userdata("userid"))
          return redirect("usercontroller/login");
        $this->load->model('StudentModel');
        $this->load->model('DepartmentModel');
        $this->load->model('CollegeModel');
        $data = array();
    }

    public function addstudent(){
        $data['title'] = 'Add New Student';
		$data['header'] = $this->load->view('include/header', $data, TRUE);
        $data['sidebar'] = $this->load->view('include/sidebar', '', TRUE);
        $data['coldata'] = $this->CollegeModel->getAllColleges();
        $data['depdata'] = $this->DepartmentModel->getAllDepartments();
		$data['content'] = $this->load->view('include/studentadd', $data, TRUE);
		$data['footer'] = $this->load->view('include/footer', '', TRUE);
		$this->load->view('home', $data);
    }

    public function addStudentForm(){
        $data['name'] = $this->input->post('name');
        $data['college'] = $this->input->post('college');
        $data['dep'] = $this->input->post('dep');
        $data['roll'] = $this->input->post('roll');
        $data['reg'] = $this->input->post('reg');
        $data['session'] = $this->input->post('session');
        $data['phone'] = $this->input->post('phone');
        $data['level'] = $this->input->post('level');

        #Add validation to the form fields

        $name = $data['name'];
        $college = $data['college'];
        $dep = $data['dep'];
        $roll = $data['roll'];
        $reg = $data['reg'];
        $session = $data['session'];
        $phone = $data['phone'];
        $batch = $data['level'];

        if (empty($name) && empty($college) && empty($dep) && empty($roll) && empty($reg) && empty($session) && empty($phone) && empty($level)){
            $sdata = array();
            $sdata['msg'] = '<span style="color:red">Field must not be empty</span>';
            $this->session->set_flashdata($sdata);
            redirect("StudentController/addStudent");
        }else{
            $this->StudentModel->saveStudent($data);
            $sdata = array();
            $sdata['msg'] = '<span style="color:green">Student Added Successfully</span>';
            $this->session->set_flashdata($sdata);
            redirect("StudentController/addStudent");
        }
    }

    public function studentlist(){
        $data['title'] = 'Student List';
		$data['header'] = $this->load->view('include/header', $data, TRUE);
		$data['sidebar'] = $this->load->view('include/sidebar', '', TRUE);
        $data['studentdata'] = $this->StudentModel->getAllStudents();
        $data['content'] = $this->load->view('include/liststudent', $data, TRUE);
		$data['footer'] = $this->load->view('include/footer', '', TRUE);
		$this->load->view('home', $data);

    }

    public function editstudent($sid){
        $data['title'] = 'Edit Student';
		$data['header'] = $this->load->view('include/header', $data, TRUE);
		$data['sidebar'] = $this->load->view('include/sidebar', '', TRUE);
        $data['stuById'] = $this->StudentModel->getStudentById($sid);
        $data['colldata'] = $this->CollegeModel->getAllColleges();
        $data['deptdata'] = $this->DepartmentModel->getAllDepartments();
        $data['content'] = $this->load->view('include/studentedit', $data, TRUE);
		$data['footer'] = $this->load->view('include/footer', '', TRUE);
		$this->load->view('home', $data);

    }

    public function viewstudent($reg){
        $data['title'] = 'View Student';
		$data['header'] = $this->load->view('include/header', $data, TRUE);
		$data['sidebar'] = $this->load->view('include/sidebar', '', TRUE);
        $data['stuByreg'] = $this->StudentModel->getStudentByReg($reg);
       /*  $data['colldata'] = $this->CollegeModel->getAllColleges();
        $data['deptdata'] = $this->DepartmentModel->getAllDepartments(); */
        $data['content'] = $this->load->view('include/viewstudent', $data, TRUE);
		$data['footer'] = $this->load->view('include/footer', '', TRUE);
		$this->load->view('home', $data);

    }


    public function updateStudent(){
        $data['sid'] = $this->input->post('sid');
        $data['name'] = $this->input->post('name');
        $data['college'] = $this->input->post('college');
        $data['dep'] = $this->input->post('dep');
        $data['roll'] = $this->input->post('roll');
        $data['reg'] = $this->input->post('reg');
        $data['session'] = $this->input->post('session');
        $data['phone'] = $this->input->post('phone');
        $data['level'] = $this->input->post('level');

        #Add validation to the form fields

        $sid = $data['sid'];
        $name = $data['name'];
        $college = $data['college'];
        $dep = $data['dep'];
        $roll = $data['roll'];
        $reg = $data['reg'];
        $session = $data['session'];
        $phone = $data['phone'];
        $level = $data['level'];

        if (empty($name) && empty($college) && empty($dep) && empty($roll) && empty($reg) && empty($session) && empty($phone) && empty($level)){
            $sdata = array();
            $sdata['msg'] = '<span style="color:red">Field must not be empty</span>';
            $this->session->set_flashdata($sdata);
            redirect("StudentController/editstudent/".$sid);
        }else{
            $this->StudentModel->updateStudent($data);
            $sdata = array();
            $sdata['msg'] = '<span style="color:green">Student Updated Successfully</span>';
            $this->session->set_flashdata($sdata);
            redirect("StudentController/editstudent/".$sid);
        }
    }

    public function deletestudent($sid){
        $this->StudentModel->delStudentById($sid);
        $sdata = array();
        $sdata['msg'] = '<span style="color:green">Student Deleted Successfully</span>';
        $this->session->set_flashdata($sdata);
        redirect("StudentController/studentlist");
    }
    

}
