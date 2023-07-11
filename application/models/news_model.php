<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

class News_model extends CI_Model
{
/***Requenet d'insertion dans n'importe table**/
  public function insertion($table,$data){
      $this->db->insert($table,$data);
  }

  public function modification($table,$idname,$id,$data){
      $this->db->where($idname,$id);
      $this->db->update($table,$data);
  }

  public function supression($table,$idname,$id){
      $this->db->where($idname,$id);
      $this->db->delete($table);
  }
/***Requete pour prendre tous les elements du tableau entreprises**/
  public function select($table){
      $this->db->select('*');
      $this->db->from($table);
      $result = $this->db->get()->result_array();
      return $result;
    }

    public function selectregime(){
        $objectif = -1;
        $this->db->select('*');
        $this->db->from('objectif');
        $this->db->where('objectif', $objectif);
        $result = $this->db->get()->result_array();
        return $result;
    }

    public function selectprise(){
        $objectif = 1;
        $this->db->select('*');
        $this->db->from('objectif');
        $this->db->where('objectif', $objectif);
        $result = $this->db->get()->result_array();
        return $result;
    }

    public function login($email,$password){
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('email', $email);
        $this->db->where('password', $password);
        $result = $this->db->get();
        $row = $result->row_array();
        return $row;
    }

    public function selectuser($name){
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('name', $name);
        $result = $this->db->get();
        $row = $result->row_array();
        return $row;
    }

}
