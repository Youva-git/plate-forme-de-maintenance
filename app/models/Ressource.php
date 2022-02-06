<?php

class Ressource extends Model{
    
  public function __construct(){

        $this->db = new Database();     
  }

  public function ajoutRessource($data){
      $this->db->preRequest('INSERT INTO ressource (description, localisation, responsable, idresponsable) VALUES(:description, :localisation, :responsable, :idresponsable)');
      $this->db->bindvalue(':description', $data['description']);
      $this->db->bindvalue(':localisation', $data['localisation']);
      $this->db->bindvalue(':responsable', $data['responsable']);
      $this->db->bindvalue(':idresponsable', $data['idresponsable']);
      return $this->db->executeData();
  }

  public function suppRessource($id){
    $this->db->preRequest('DELETE FROM ressource WHERE id = :id');
    $this->db->bindvalue(':id', $id);
    return $this->db->executeData();
  }
 
  public function listeRessources($responsable){
     $this->db->preRequest("SELECT * FROM ressource WHERE idresponsable = $responsable ORDER BY id DESC");
     return $this->db->getRowsTable();
  }

  public function listeRessourcesPublics(){
    $this->db->preRequest("SELECT * FROM ressource ORDER BY id DESC");
    return $this->db->getRowsTable();
  }

  public function suppRessourceRsp($id){
    $this->db->preRequest('DELETE FROM ressource WHERE idresponsable = :id');
    $this->db->bindvalue(':id', $id);
    return $this->db->executeData();
  }

 }
