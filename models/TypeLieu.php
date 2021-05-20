<?php
  class TypeLieu {
    private $db;

    public function __construct() {
      $this->db = new Database;
    }

    public function addTypeLieu($data) {
      // Prepare Query
      $this->db->query('INSERT INTO `TypeLieu`(`nom`, `description`, `adresse`, `lat`, `lng`, `typeLieu`, `auteur`) VALUES (:nom, :description, :adresse, :lat, :lng, :typeLieu, :auteur)');
      
      
      
      $this->db->bind(':nom', $data['nom']);

      
      // Execute
      if($this->db->execute()) {
        return true;
      } else {
        return false;
      }
    }

    public function getTypesLieu() {
      $this->db->query('SELECT * FROM `TypeLieu` ORDER BY `id`');

      $results = $this->db->resultset();

      return $results;
    }




  }