<?php
  class Utilisateur {
    private $db;

    public function __construct() { $this->db = new Database; }

    public function addUtilisateur($data) {

      $this->db->query('INSERT INTO `Utilisateur`(`email`, `prenom`, `nom`, `bio`, `avatar`, `groupe`, `mdp`) VALUES (:email, :prenom, :nom, :bio, :avatar, :groupe, :mdp)');
      
      $this->db->bind(':email', $data['email']);
      $this->db->bind(':prenom', $data['prenom']);
      $this->db->bind(':nom', $data['nom']);
      $this->db->bind(':bio', $data['bio']);
      $this->db->bind(':avatar', $data['avatar']);
      $this->db->bind(':groupe', $data['groupe']);
      $this->db->bind(':mdp', $data['mdp']);
      
      if($this->db->execute()) { return true; }
      else { return false; }

    }

    public function getUtilisateurs() {

      $this->db->query('SELECT * FROM `Utilisateur` WHERE `groupe` = 0 ORDER BY `dateCreation` DESC');
      $results = $this->db->resultset();

      return $results;

    }

    public function getUtilisateurbyEmail($email) {

      $this->db->query('SELECT * FROM `Utilisateur` WHERE `email` = "'. $email .'"');
      $results = $this->db->resultset();

      return $results;

    }


    public function emailExist($email) {

      $this->db->query('SELECT * FROM `Utilisateur` WHERE `email` = "'. $email . '"');
      $results = $this->db->resultset();

      if (sizeof($results) > 0) { return true; }
      else { return false; }

    }

    public function checkCredential($email,$mdp) {

      $this->db->query('SELECT * FROM `Utilisateur` WHERE `email` = "'. $email .'"');
      $results = $this->db->resultset();

      if (sizeof($results) > 0) { return $verify = password_verify($mdp, $results[0]->mdp); }
      else { return false; }
      
    }
  }