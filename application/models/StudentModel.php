<?php
class StudentModel extends CI_Model{

    public function saveStudent($data){
        $this->db->insert('tbl_students', $data);
    }

    public function getAllStudents(){
        $this->db->select('*');
        $this->db->from('tbl_students');
        $this->db->order_by('sid', 'desc');
        $qresult = $this->db->get();
        $result = $qresult->result();
        return $result;

    }

    public function getStudentById($sid){
        $this->db->select('*');
        $this->db->from('tbl_students');
        $this->db->where('sid', $sid);
        $qresult = $this->db->get();
        $result = $qresult->row();
        return $result;
    }

    public function getStudentByReg($reg){
        $this->db->select('*');
        $this->db->from('tbl_students');
        $this->db->where('reg', $reg);
        $qresult = $this->db->get();
        $result = $qresult->row();
        return $result;
    }

    public function  updateStudent($data){
        $this->db->set('name', $data['name']);
        $this->db->set('college', $data['college']);
        $this->db->set('dep', $data['dep']);
        $this->db->set('roll', $data['roll']);
        $this->db->set('reg', $data['reg']);
        $this->db->set('session', $data['session']);
        $this->db->set('phone', $data['phone']);
        $this->db->set('level', $data['level']);
        $this->db->where('sid', $data['sid']);
        $this->db->update('tbl_students');
    }

    public function delStudentById($sid){
        $this->db->where('sid', $sid);
        $this->db->delete('tbl_students');

    }
}
?>