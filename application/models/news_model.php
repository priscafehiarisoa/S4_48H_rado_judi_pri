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
  public function delete($table,$id,$idname){
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

    function selectFromTable($tableName) {
        $CI =& get_instance();
        $query = $CI->db->query("SELECT * FROM " . $tableName);

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return array();
        }
    }
    function selectFromTableConditions($tableName, $conditions = array()) {
        $CI =& get_instance();
        $query = $CI->db->select('*')
            ->from($tableName);
        if (!empty($conditions)) {
            $query->where($conditions);
        }
        $result = $query->get();

        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return array();
        }
    }


    public function login($email,$password){
        $this->db->select('*');
        $this->db->from('USER');
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

    public function selectCodesNonvalides()
    {
        $this->db->select('*');
        $this->db->from('CODEUTILISE');
        $this->db->join('CODE C', 'C.IDCODE = CODEUTILISE.IDCODE');
        $this->db->where('CODEUTILISE.IDCODE NOT IN (SELECT IDCODE FROM CODEVALIDEE)', NULL, FALSE);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return array();
        }
    }

    public function selectCountuser()
    {
        $admin = -1;
        $this->db->select('count(name) as nombre');
        $this->db->from('user');
        $this->db->where('admin', $admin);
        $result = $this->db->get();
        $row = $result->row_array();
        return $row;
    }

}
