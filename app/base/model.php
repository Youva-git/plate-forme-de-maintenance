<?php
class Model{
   public $db;
    public function __construct(){
    }
    
    public function findById($table, $id){
      $this->db->preRequest('SELECT * FROM '.$table.' WHERE id = :id');
      $this->db->bindvalue(':id', $id);
      $stmt = $this->db->getRowsTable();
      return $stmt;
    }

    public function findByAttr($table, $attr, $val){
      $this->db->preRequest('SELECT * FROM '.$table.' WHERE '.$attr.' = '.$val);
      return $this->db->getRowsTable();
    }

    public function getAllTable($table){
       $this->db->preRequest('SELECT * FROM ' . $table);
       $rows = $this->db->getRowsTable();
       return $rows;
    }

    public function getAllUsers(){
      $this->db->preRequest('SELECT id, username, nom, prenom, email FROM users where admin <> 1');
      return $this->db->getRowsTable();
    }

    public function deleteByID($table, $id){
     $this->db->preRequest('DELETE FROM '. $table .' WHERE id = '.$id);
     $this->db->bindvalue(':id', $id);
     return $this->db->executeData();
    }    
}
