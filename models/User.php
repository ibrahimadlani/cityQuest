<?php



  class User {
    private $db;

    public function __construct() {
      $this->db = new Database;
    }

    public function addUser($data) {
      // Prepare Query
      $this->db->query('INSERT INTO User (`mail`, `motDePasse`, `nom`, `prenom`, `groupe`) VALUES(:mail, :motDePasse, :nom, :prenom, :groupe)');
      
      $this->db->bind(':mail', $data['mail']);
      $this->db->bind(':motDePasse', $data['motDePasse']);
      $this->db->bind(':nom', $data['nom']);
      $this->db->bind(':prenom', $data['prenom']);
      $this->db->bind(':groupe', $data['groupe']);
      
      // Execute
      if($this->db->execute()) {
        return true;
      } else {
        return false;
      }
    }

    public function getUsers() {
      $this->db->query('SELECT * FROM `User` WHERE `groupe` = 0 ORDER BY createdAt DESC');

      $results = $this->db->resultset();

      return $results;
    }

    public function getUsersbyEmail($email) {
      $this->db->query('SELECT * FROM `User` WHERE `mail` = "'. $email .'"');

      $results = $this->db->resultset();

      return $results;
    }


    public function emailExist($email) {
      $this->db->query('SELECT * FROM `User` WHERE `mail` = "'. $email . '"');

      $results = $this->db->resultset();

      if (sizeof($results) > 0) {
        return true;
      }else {
        return false;
      }
    }

    public function checkCredential($email,$mdp) {
      $this->db->query('SELECT * FROM `User` WHERE `mail` = "'. $email .'"');

      $results = $this->db->resultset();

      if (sizeof($results) > 0) {
        return $verify = password_verify($mdp, $results[0]->motDePasse);
      }else {
        return false;
      }
    }
  }