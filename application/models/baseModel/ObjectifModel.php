<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class ObjectifModel extends CI_Model
{
    public function getCalorieCible($id){
        $this->load->model('UserModel');
        $info = $this->UserModel->getUserInfo($id);
        $poids = $info['poids'];

    }
    public function getObjectifById($id){
        $this->db->select('*');
        $this->db->from('objectif');
        $this->db->where('iduser', $id);
        $result = $this->db->get();
        $row = $result->row_array();
        return $row;
    }
}