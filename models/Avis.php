<?php
  class Avis {
    private $db;

    public function __construct() { $this->db = new Database; }

    public function addAvis($data) {
      $this->db->query('INSERT INTO `Avis`(`text`, `note`, `auteur`, `idPoint`, `typePoint`) VALUES (:text, :note, :auteur, :idPoint, :typePoint)');
      
      $this->db->bind(':nom', $data['nom']);
      $this->db->bind(':note', $data['note']);
      $this->db->bind(':auteur', $data['auteur']);
      $this->db->bind(':idPoint', $data['idPoint']);
      $this->db->bind(':typePoint', $data['typePoint']);

      if($this->db->execute()) { return true; }
      else { return false; }
    }

    public function getAvis() {
      $this->db->query('SELECT * FROM `Avis` ORDER BY `id`');
      $results = $this->db->resultset();
      return $results;
    }

    public function getAvisParLieu($idPoint) {
      $this->db->query('SELECT * FROM `Avis` WHERE `idPoint` =' . $idPoint .' AND  `idPoint` = 1');
      $results = $this->db->resultset();
      return $results;
    }

    public function getAvisParEvenement($idPoint) {
      $this->db->query('SELECT * FROM `Avis` WHERE `idPoint` =' . $idPoint .' AND  `idPoint` = 2');
      $results = $this->db->resultset();
      return $results;
    }

    public function getAvisParUtilisateur($idUser) {
      $this->db->query('SELECT * FROM `Avis` WHERE `idPoint` =' . $idPoint .' AND  `idPoint` = 2');
      $results = $this->db->resultset();
      return $results;
    }

    public function deleteAvis($idAvis) {
      $this->db->query('DELETE FROM `Avis` WHERE `id` =' . $idAvis);
      if($this->db->execute()) { return true; }
      else { return false; }
    }
  }