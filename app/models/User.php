<?php
  class User extends Model{
    
    public function __construct(){
        $this->db = new Database();     
    }

    public function connect($username, $password){
      $this->db->preRequest('SELECT * FROM users WHERE username = :username');
      $this->db->bindvalue(':username', $username);
      $row = $this->db->getRow();
      if(password_verify($password, $row->password)){
        return $row;
      } else {
        return null;
      }
    }

    public function signup($data){
      $this->db->preRequest('INSERT INTO users (username, nom, prenom, email, password, admin) VALUES(:username, :nom, :prenom, :email, :password, :admin)');
      $this->db->bindvalue(':username', $data['username']);
      $this->db->bindvalue(':nom', $data['nom']);
      $this->db->bindvalue(':prenom', $data['prenom']);
      $this->db->bindvalue(':email', $data['email']);
      $this->db->bindvalue(':password', $data['password']);
      $this->db->bindvalue(':admin', 0);
      if($this->db->executeData()){
        return true;
      } else {
        return false;
      }
    }

    public function isAdmin($username, $password){
      $row = $this->connect($username, $password);
      if(!empty($row)){
          $admin = $row->admin;
          return $admin; 
      }
    }

    public function findByUsername($username){
    $this->db->preRequest('SELECT * FROM users WHERE username = :username');
      $this->db->bindvalue(':username', $username);
      $fetch = $this->db->executeData();
      if($this->db->countRow() > 0){
        return true;
      } else {
        return false;
      }
    }

    public function findByNom($nom, $prenom){
      $this->db->preRequest("SELECT * FROM users WHERE nom = :nom AND prenom = :prenom");
        $this->db->bindvalue(':nom', $nom);
        $this->db->bindvalue(':prenom', $prenom);
        $fetch = $this->db->executeData();
        if($this->db->countRow() > 0){
          return true;
        } else {
          return false;
        }
      }
  }