<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BookController extends CI_Controller {
  
    public function __construct(){
        parent::__construct();
        $this->load->model('BookModel');
        $this->load->model('StudentModel');
        $this->load->model('DepartmentModel');
        $this->load->model('CollegeModel');
        $this->load->model('AuthorModel');
        $data = array();
    }

    public function addBook(){
        $data['title'] = 'Add New Book';
		$data['header'] = $this->load->view('include/header', $data, TRUE);
        $data['sidebar'] = $this->load->view('include/sidebar', '', TRUE);
        $data['coldata'] = $this->CollegeModel->getAllColleges();
        $data['depdata'] = $this->DepartmentModel->getAllDepartments();
        $data['autdata'] = $this->AuthorModel->getAllAuthors();
		$data['content'] = $this->load->view('include/bookadd', $data, TRUE);
		$data['footer'] = $this->load->view('include/footer', '', TRUE);
		$this->load->view('home', $data);
    }

    public function addBookForm(){
        $data['bookname'] = $this->input->post('bookname');
        $data['college'] = $this->input->post('college');
        $data['dep'] = $this->input->post('dep');
        $data['author'] = $this->input->post('author');
        $data['totalbook'] = $this->input->post('totalbook');

        #Add validation to the form fields

        $bookname = $data['bookname'];
        $college = $data['college'];
        $dep = $data['dep'];
        $author = $data['author'];
        $totalbook = $data['totalbook'];

        if (empty($bookname) && empty($college) && empty($dep) && empty($author) && empty($totalbook)){
            $sdata = array();
            $sdata['msg'] = '<span style="color:red">Field must not be empty</span>';
            $this->session->set_flashdata($sdata);
            redirect("BookController/addBook");
        }else{
            $this->BookModel->saveBook($data);
            $sdata = array();
            $sdata['msg'] = '<span style="color:green">Book Added Successfully</span>';
            $this->session->set_flashdata($sdata);
            redirect("BookController/addBook");
        }
    }

    public function booklist(){
        $data['title'] = 'Book List';
		$data['header'] = $this->load->view('include/header', $data, TRUE);
		$data['sidebar'] = $this->load->view('include/sidebar', '', TRUE);
        $data['bookdata'] = $this->BookModel->getAllBooks();
        $data['content'] = $this->load->view('include/listbook', $data, TRUE);
		$data['footer'] = $this->load->view('include/footer', '', TRUE);
		$this->load->view('home', $data);
    }

    public function editbook($bookid){
        $data['title'] = 'Edit Book';
		$data['header'] = $this->load->view('include/header', $data, TRUE);
        $data['sidebar'] = $this->load->view('include/sidebar', '', TRUE);
        $data['depdata'] = $this->DepartmentModel->getAllDepartments();
        $data['coldata'] = $this->CollegeModel->getAllColleges();
        $data['autdata'] = $this->AuthorModel->getAllAuthors();
        $data['bookbyid'] = $this->BookModel->getBookByid($bookid);
        $data['content'] = $this->load->view('include/bookedit', $data, TRUE);
		$data['footer'] = $this->load->view('include/footer', '', TRUE);
		$this->load->view('home', $data);
    }

    public function updateBook(){
        $data['bookid'] = $this->input->post('bookid');
        $data['bookname'] = $this->input->post('bookname');
        $data['college'] = $this->input->post('college');
        $data['dep'] = $this->input->post('dep');
        $data['author'] = $this->input->post('author');
        $data['totalbook'] = $this->input->post('totalbook');

        #Add validation to the form fields

        $bookid = $data['bookid'];
        $bookname = $data['bookname'];
        $college = $data['college'];
        $dep = $data['dep'];
        $author = $data['author'];
        $totalbook = $data['totalbook'];

        if (empty($bookname) && empty($college) && empty($dep) && empty($author) && empty($totalbook)){
            $sdata = array();
            $sdata['msg'] = '<span style="color:red">Field must not be empty</span>';
            $this->session->set_flashdata($sdata);
            redirect("BookController/editbook/".$bookid);
        }else{
            $this->BookModel->updateBook($data);
            $sdata = array();
            $sdata['msg'] = '<span style="color:green">Book Updated Successfully</span>';
            $this->session->set_flashdata($sdata);
            redirect("BookController/editbook/".$bookid);
        }
    }

    public function deletebook($sid){
        $this->BookModel->delBookById($sid);
        $sdata = array();
        $sdata['msg'] = '<span style="color:green">Book Deleted Successfully</span>';
        $this->session->set_flashdata($sdata);
        redirect("BookController/booklist");
    }

}