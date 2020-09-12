<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ManagerBookController extends CI_Controller {


    public function __construct(){
        parent::__construct();
        $this->load->model('ManagerBookModel');
        $this->load->model('BookModel');
        $this->load->model('StudentModel');
        $this->load->model('DepartmentModel');
        $this->load->model('CollegeModel');
        $this->load->model('AuthorModel');
        $data = array();
    }

    public function issuebook(){
        $data['title'] = 'Manage Book';
		$data['header'] = $this->load->view('include/header', $data, TRUE);
        $data['sidebar'] = $this->load->view('include/sidebar', '', TRUE);
        $data['coldata'] = $this->CollegeModel->getAllColleges();
        $data['depdata'] = $this->DepartmentModel->getAllDepartments();
		$data['content'] = $this->load->view('include/issuebook', $data, TRUE);
		$data['footer'] = $this->load->view('include/footer', '', TRUE);
		$this->load->view('home', $data);
    }

    public function getBookByIdDept($dep){
        $getAllBook = $this->ManagerBookModel->getBookByDep($dep);
        $output = null;
        $output .='<option value="0">Select Book</option>';
        foreach($getAllBook as $book){
            $output .='<option value=" '.$book->bookid.' ">'.$book->bookname.'</option>';
        }

        echo $output;
    }

    public function manageBookForm(){
        $data['studname'] = $this->input->post('studname');
        $data['reg'] = $this->input->post('reg');
        $data['college'] = $this->input->post('college');
        $data['dep'] = $this->input->post('dep');
        $data['book'] = $this->input->post('book');
        $data['phone'] = $this->input->post('phone');
        $data['Returned'] = $this->input->post('Returned');
        $data['date'] = $this->input->post('date');

        #Add validation to the form fields

        $studname = $data['studname'];
        $reg = $data['reg'];
        $college = $data['college'];
        $dep = $data['dep'];
        $book = $data['book'];
        $phone = $data['phone'];
        $Returned = $data['Returned'];
        $date = $data['date'];

        if (empty($studname) && empty($reg) && empty($college) && empty($dep) && empty($book) && empty($phone) && empty($Returned) && empty($date)){
            $sdata = array();
            $sdata['msg'] = '<span style="color:red">Field must not be empty</span>';
            $this->session->set_flashdata($sdata);
            redirect("ManagerBookController/manageBookForm");
        }else{
            $this->ManagerBookModel->saveManagerBook($data);
            $sdata = array();
            $sdata['msg'] = '<span style="color:green">Book issued Successfully</span>';
            $this->session->set_flashdata($sdata);
            redirect("ManagerBookController/issuebook");
        }
    }

    public function listedBook(){
        $data['title'] = 'List of Issued';
		$data['header'] = $this->load->view('include/header', $data, TRUE);
		$data['sidebar'] = $this->load->view('include/sidebar', '', TRUE);
        $data['issuedata'] = $this->ManagerBookModel->getAllIssuedBooks();
        $data['content'] = $this->load->view('include/listIssued', $data, TRUE);
		$data['footer'] = $this->load->view('include/footer', '', TRUE);
		$this->load->view('home', $data);

    }

    public function editIssuedBook($mbkid){
        $data['title'] = 'Edit Student';
		$data['header'] = $this->load->view('include/header', $data, TRUE);
		$data['sidebar'] = $this->load->view('include/sidebar', '', TRUE);
        $data['issueBookById'] = $this->ManagerBookModel->getIssuedBookById($mbkid);
        $data['colldata'] = $this->CollegeModel->getAllColleges();
        $data['deptdata'] = $this->DepartmentModel->getAllDepartments();
        $data['content'] = $this->load->view('include/issuebookedit', $data, TRUE);
		$data['footer'] = $this->load->view('include/footer', '', TRUE);
		$this->load->view('home', $data);

    }

    public function updateIssuedBook(){
        $data['mbkid'] = $this->input->post('mbkid');
        $data['studname'] = $this->input->post('studname');
        $data['reg'] = $this->input->post('reg');
        $data['college'] = $this->input->post('college');
        $data['dep'] = $this->input->post('dep');
        $data['book'] = $this->input->post('book');
        $data['phone'] = $this->input->post('phone');
        $data['Returned'] = $this->input->post('Returned');
        $data['date'] = $this->input->post('date');

        #Add validation to the form fields

        $mbkid = $data['mbkid'];
        $studname = $data['studname'];
        $reg = $data['reg'];
        $college = $data['college'];
        $dep = $data['dep'];
        $book = $data['book'];
        $phone = $data['phone'];
        $Returned = $data['Returned'];
        $date = $data['date'];

        if (empty($name) && empty($reg) && empty($college) && empty($dep) && empty($book) && empty($phone) && empty($Returned) && empty($date)){
            $sdata = array();
            $sdata['msg'] = '<span style="color:red">Field must not be empty</span>';
            $this->session->set_flashdata($sdata);
            redirect("ManagerBookController/editIssuedBook/".$mbkid);
        }else{
            $this->ManagerBookModel->updateIssuedBook($data);
            $sdata = array();
            $sdata['msg'] = '<span style="color:green">Issued Book Updated Successfully</span>';
            $this->session->set_flashdata($sdata);
            redirect("ManagerBookController/editIssuedBook/".$mbkid);
        }
    }

    public function deleteIssuedBook($mbkid){
        $this->ManagerBookModel->delIssuedBookById($mbkid);
        $sdata = array();
        $sdata['msg'] = '<span style="color:green">Issued Book Deleted Successfully</span>';
        $this->session->set_flashdata($sdata);
        redirect("ManagerBookController/listedBook");
    }


    public function viewBooks($bookid){
        $data['title'] = 'View Student';
		$data['header'] = $this->load->view('include/header', $data, TRUE);
		$data['sidebar'] = $this->load->view('include/sidebar', '', TRUE);
        $data['bookById'] = $this->BookModel->getBookByid($bookid);
        $data['content'] = $this->load->view('include/viewBooks', $data, TRUE);
		$data['footer'] = $this->load->view('include/footer', '', TRUE);
		$this->load->view('home', $data);

    }



  
    

   
}    