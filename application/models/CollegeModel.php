<?php
class CollegeModel extends CI_Model{

    public function saveCollege($data){
       $this->db->insert('tbl_colleges', $data);
    }

    public function getAllColleges(){
        $this->db->select('*');
        $this->db->from('tbl_colleges');
        $this->db->order_by('colid', 'desc');
        $qresult = $this->db->get();
        $result = $qresult->result();
        return $result;
    }

    public function getCollegeById($id){
        $this->db->select('*');
        $this->db->from('tbl_colleges');
        $this->db->where('colid', $id);
        $qresult = $this->db->get();
        $result = $qresult->row();
        return $result;
    }

    public function updateColName($data){
        $this->db->set('colname', $data['colname']);
        $this->db->where('colid', $data['colid']);
        $this->db->update('tbl_colleges');
    }

    public function delColById($id){
        $this->db->where('colid', $id);
        $this->db->delete('tbl_colleges');
    }

    public function getAllCollege($cdepid){
        $this->db->select('*');
        $this->db->from('tbl_colleges');
        $this->db->where('colid', $cdepid);
        $qresult = $this->db->get();
        $result = $qresult->row();
        return $result;
    }
}