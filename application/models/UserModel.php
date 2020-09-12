<?php
class UserModel extends CI_Model{

   public function checkUser($data){
        $this->db->select('*');
        $this->db->from('tbl_users');
        $this->db->where('username', $data['username']);
        $this->db->where('password', md5($data['password']));
        $qresult = $this->db->get();
        $user = $qresult->num_rows();
        if($user === 1){
            $result = $qresult->row();
            return $result;
        }

    } 
}
