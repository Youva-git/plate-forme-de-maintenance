<?php
class Listeanomalie extends Model{
  
  public function __construct(){
    $this->db = new Database();     
  }

  public function ajoutAnomalie($data){
    $this->db->preRequest('INSERT INTO listeanomalie (anomalie, ressource, etat) VALUES(:anomalie, :ressource, :etat)');
    $this->db->bindvalue(':anomalie', $data['anomalie']);
    $this->db->bindvalue(':ressource', $data['ressource']);
    $this->db->bindvalue(':etat', $data['etat']);
    return $this->db->executeData();
  }

  public function listeAnomalies($idresource){
    $this->db->preRequest("SELECT * FROM listeanomalie WHERE ressource = $idresource ORDER BY id DESC");
    return $this->db->getRowsTable();
  }

  public function suppAnomalies($id){
    $this->db->preRequest('DELETE FROM listeanomalie WHERE id = :id');
    $this->db->bindvalue(':id', $id);
    return $this->db->executeData();
  }

  public function modifAnomalie($id, $etat){
    $this->db->preRequest('UPDATE listeanomalie SET etat = :etat WHERE id = :id');
    $this->db->bindvalue(':etat',$etat);
    $this->db->bindvalue(':id', $id);
    return $this->db->executeData();
  }
  
  public function suppRessourceAnomalies($ressource){
    $this->db->preRequest('DELETE FROM listeanomalie WHERE ressource = :id');
    $this->db->bindvalue(':id', $ressource);
    return $this->db->executeData();
  }
}