<?php
class AuthorModel extends CI_Model{

     public function saveAuthor($data){
        $this->db->insert('tbl_authors', $data);
    }
     
    public function getAllAuthors(){
        $this->db->select('*');
        $this->db->from('tbl_authors');
        $this->db->order_by('autid', 'desc');
        $qresult = $this->db->get();
        $result = $qresult->result();
        return $result;
    }

    public function getAuthorById($id){
        $this->db->select('*');
        $this->db->from(' tbl_authors');
        $this->db->where('autid', $id);
        $qresult = $this->db->get();
        $result = $qresult->row();
        return $result;

    }

    public function updateAuthName($data){
        $this->db->set('autname', $data['autname']);
        $this->db->where('autid', $data['autid']);
        $this->db->update('tbl_authors');
    }

    public function delAuthById($id){
        $this->db->where('autid', $id);
        $this->db->delete('tbl_authors');
    }

    public function getAllAuthor($sautid){
        $this->db->select('*');
        $this->db->from('tbl_authors');
        $this->db->where('autid', $sautid);
        $qresult = $this->db->get();
        $result = $qresult->row();
        return $result;
    }
}    