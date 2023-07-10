<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

class News_model extends CI_Model
{
/***Requenet d'insertion dans n'importe table**/
  public function insertion($table,$data){
      $this->db->insert($table,$data);
  }

  public function modification($table,$id,$data){
      $this->db->where('id',$id);
      $this->db->update($table,$data);
  }

  public function supression($table,$id){
      $this->db->where('id',$id);
      $this->db->delete($table);
  }
/***Requete pour prendre tous les elements du tableau entreprises**/
  public function selectusers($table){
      $this->db->select('*');
      $this->db->from($table);
      $result = $this->db->get();

      $table = array();
      $i = 0;
      foreach ($result->result_array() as $row) {
          $lists = array('id' => $row['id'],
                          'name' => $row['name'],
                          'email' => $row['email'],
                          'password' => $row['password']);
          $table[$i] = $lists;
          $i++;
      }
      return $table;
    }

}
