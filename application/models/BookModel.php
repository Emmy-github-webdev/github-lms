<?php
class BookModel extends CI_Model{

     public function saveBook($data){
        $this->db->insert('tbl_books', $data);
    }

    public function getAllBooks(){
        $this->db->select('*');
        $this->db->from('tbl_books');
        $this->db->order_by('bookid', 'desc');
        $qresult = $this->db->get();
        $result = $qresult->result();
        return $result;
    }

    public function getBookByid($bookid){
        $this->db->select('*');
        $this->db->from('tbl_books');
        $this->db->where('bookid', $bookid);
        $qresult = $this->db->get();
        $result = $qresult->row();
        return $result;
    }


    public function  updateBook($data){
        $this->db->set('bookname', $data['bookname']);
        $this->db->set('college', $data['college']);
        $this->db->set('dep', $data['dep']);
        $this->db->set('author', $data['author']);
        $this->db->set('totalbook', $data['totalbook']);
        $this->db->where('bookid', $data['bookid']);
        $this->db->update('tbl_books');
    }

    public function delBookById($sid){
        $this->db->where('bookid', $sid);
        $this->db->delete('tbl_books');

    }

    public function getAllBook($sdepid){
        $this->db->select('*');
        $this->db->from('tbl_books');
        $this->db->where('bookid', $sdepid);
        $qresult = $this->db->get();
        $result = $qresult->row();
        return $result;
    }
}