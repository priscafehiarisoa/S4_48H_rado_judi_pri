<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class UserModel extends CI_Model
{
    public function getUserById($id){
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('iduser', $id);
        $result = $this->db->get();
        $row = $result->row_array();
        return $row;
    }
    public function getUserInfo($id){
        $this->db->select('*');
        $this->db->from('profil');
        $this->db->where('iduser', $id);
        $result = $this->db->get();
        $row = $result->row_array();
        return $row;
    }

}