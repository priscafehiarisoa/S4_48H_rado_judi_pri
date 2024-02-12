<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class ObjectifModel extends CI_Model
{
    public function getCalorieCible($id){
        $this->load->model('baseModel/UserModel');
        $info = $this->UserModel->getUserInfo($id);
        $poids = $info['POIDS'];
        $objectif = $this->getObjectifUserById($id);
        $cible = $this->getObjectifById($objectif['IDOBJECTIF'])['OBJECTIF'];
        $poidsCible = $poids + ($objectif['POIDSCIBLE']*$cible);
        return $poidsCible*3000;
    }
    public function getObjectifUserById($id){
        $this->db->select('*');
        $this->db->from('OBJECTIFUSER');
        $this->db->where('IDUSER', $id);
        $result = $this->db->get();
        $row = $result->row_array();
        return $row;
    }
    public function getObjectifById($id){
        $this->db->select('*');
        $this->db->from('OBJECTIF');
        $this->db->where('IDOBJECTIF', $id);
        $result = $this->db->get();
        $row = $result->row_array();
        return $row;
    }
}