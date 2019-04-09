<?php
class UserModel extends CI_Model
{
  private $_table = "users";
  
  function __construct()
  {
    parent::__construct();
  }

  public function filter($search, $limit, $start, $order_field, $order_ascdesc)
  {
    $this->db->like('name', $search); // Untuk menambahkan query where LIKE
    $this->db->or_like('username', $search); // Untuk menambahkan query where OR LIKE
    $this->db->order_by($order_field, $order_ascdesc); // Untuk menambahkan query ORDER BY
    $this->db->limit($limit, $start); // Untuk menambahkan query LIMIT
    return $this->db->get($this->_table)->result_array(); // Eksekusi query sql sesuai kondisi diatas
  }

  public function getById($id)
  {
    return $this->db->get_where($this->_table, ["id_user" => $id])->row();
  }

  public function count_all(){
    return $this->db->count_all($this->_table); // Untuk menghitung semua data users
  }

  public function count_filter($search){
    $this->db->like('name', $search); // Untuk menambahkan query where LIKE
    $this->db->or_like('username', $search); // Untuk menambahkan query where OR LIKE
    return $this->db->get($this->_table)->num_rows(); // Untuk menghitung jumlah data sesuai dengan filter pada textbox pencarian
  }

  public function entriData($data=array())
  {
    $name     = $data["name"];
    $username = $data["username"];
    $password = $data["password"];
    $role     = $data["role"];

    $check = $this->__checkUserId($username);
    if($check > 0) {
      return 'exist';
    } else {
      $this->db->insert($this->_table, $data);
      return 'success';
    }
  }

  private function __checkUserId($username){    
    $q = $this->db->query("
      SELECT
        id_user
        ,username
      FROM
        ".$this->_table."
      WHERE
        username = '".$this->db->escape_str($username)."'
    ");
    $result = $q->num_rows();
    return $result;
  }
}