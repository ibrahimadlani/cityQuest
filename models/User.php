<?php
  class User {
    private $db;

    public function __construct() {
      $this->db = new Database;
    }

    public function addUser($data) {
      // Prepare Query
      $this->db->query('INSERT INTO user (`mail`, `motDePasse`, `nom`, `prenom`, `groupe`) VALUES(:mail, :motDePasse, :nom, :prenom,0');
      
      $this->db->bind(':mail', $data['mail']);
      $this->db->bind(':motDePasse', $data['motDePasse']);
      $this->db->bind(':nom', $data['nom']);
      $this->db->bind(':prenom', $data['prenom']);
      
      // Execute
      if($this->db->execute()) {
        return true;
      } else {
        return false;
      }
    }

    public function getUsers() {
      $this->db->query('SELECT * FROM user WHERE `groupe` = 0 ORDER BY createdAt DESC');

      $results = $this->db->resultset();

      return $results;
    }
  }