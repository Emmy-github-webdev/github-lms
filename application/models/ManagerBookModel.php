<?php
class ManagerBookModel extends CI_Model{


    public function saveManagerBook($data){
        $this->db->insert('tbl_managebooks', $data);
    } 

    public function getBookByDep($dep){
        $this->db->select('*');
        $this->db->from('tbl_books');
        $this->db->where('dep', $dep);
        $qresult = $this->db->get();
        $result = $qresult->result();
        return $result;
    }

    public function getAllIssuedBooks(){
        $this->db->select('*');
        $this->db->from('tbl_managebooks');
        $this->db->order_by('mbkid', 'desc');
        $qresult = $this->db->get();
        $result = $qresult->result();
        return $result;
    }

    public function getIssuedBookById($mbkid){
        $this->db->select('*');
        $this->db->from('tbl_managebooks');
        $this->db->where('mbkid', $mbkid);
        $qresult = $this->db->get();
        $result = $qresult->row();
        return $result;
    }

    public function  updateIssuedBook($data){
        $this->db->set('studname', $data['studname']);
        $this->db->set('reg', $data['reg']);
        $this->db->set('college', $data['college']);
        $this->db->set('dep', $data['dep']);
        $this->db->set('book', $data['book']);
        $this->db->set('phone', $data['phone']);
        $this->db->set('Returned', $data['Returned']);
        $this->db->set('date', $data['date']);
        $this->db->where('mbkid', $data['mbkid']);
        $this->db->update('tbl_managebooks');
    }

    public function delIssuedBookById($mbkid){
        $this->db->where('mbkid', $mbkid);
        $this->db->delete('tbl_managebooks');

    }


    public function getStudentByReg($reg){
        $this->db->select('*');
        $this->db->from('tbl_students');
        $this->db->where('reg', $reg);
        $qresult = $this->db->get();
        $result = $qresult->row();
        return $result;
    }

}    