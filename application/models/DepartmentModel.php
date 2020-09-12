<?php
class DepartmentModel extends CI_Model{

    public function saveDepartment($data){
        $this->db->insert('tbl_departments', $data);
    }

    public function getAllDepartments(){
        $this->db->select('*');
        $this->db->from(' tbl_departments');
        $this->db->order_by('depid', 'desc');
        $qresult = $this->db->get();
        $result = $qresult->result();
        return $result;
    }

    public function getDepartmentById($id){
        $this->db->select('*');
        $this->db->from('tbl_departments');
        $this->db->where('depid', $id);
        $qresult = $this->db->get();
        $result = $qresult->row();
        return $result;
    }

    public function updaeDepName($data){
        $this->db->set('depname', $data['depname']);
        $this->db->where('depid', $data['depid']);
        $this->db->update('tbl_departments');
    }

    public function delDepartById($id){
        $this->db->where('depid', $id);
        $this->db->delete('tbl_departments');
    }

    public function getAllDepartment($sdepid){
        $this->db->select('*');
        $this->db->from('tbl_departments');
        $this->db->where('depid', $sdepid);
        $qresult = $this->db->get();
        $result = $qresult->row();
        return $result;
    }
} 