<?php
  class Ville {
    private $db;

    public function __construct() {
      $this->db = new Database;
    }

    public function addVille($data) {
      // Prepare Query
      $this->db->query('INSERT INTO `Ville`(`nom`, `description`, `adresse`, `lat`, `lng`, `typeLieu`, `auteur`) VALUES (:nom, :description, :adresse, :lat, :lng, :typeLieu, :auteur)');
      
      
      
      $this->db->bind(':nom', $data['nom']);

      
      // Execute
      if($this->db->execute()) {
        return true;
      } else {
        return false;
      }
    }

    public function getVilles() {
      $this->db->query('SELECT * FROM `Ville` ORDER BY `id`');

      $results = $this->db->resultset();

      return $results;
    }




  }