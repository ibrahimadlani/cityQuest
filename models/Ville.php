<?php
class Ville {
    private $db;

    public function __construct() { $this->db = new Database; }

    public function addVille($data) {
        $this->db->query('INSERT INTO `Ville`(`ville`, `lat`, `lng`, `etat`) VALUES (:ville, :lat, :lng, 1)');

        $this->db->bind(':ville', $data['ville']);
        $this->db->bind(':lat', $data['lat']);
        $this->db->bind(':lng', $data['lng']);

        if ($this->db->execute()) { return $this->db->lastInsertId();}
        else { return false; }
    }

    public function getVilles() {
        $this->db->query('SELECT * FROM `Ville` ORDER BY `id`');
        $results = $this->db->resultset();
        return $results;
    }

    public function getVillesNonValide() {
        $this->db->query('SELECT * FROM `Ville` WHERE `etat` = 1');
        $results = $this->db->resultset();
        return $results;
    }

    public function getVillesValide() {
        $this->db->query('SELECT * FROM `Ville` WHERE `etat` = 2');
        $results = $this->db->resultset();
        return $results;
    }

    public function getVillesUsingNom($nom) {
        $this->db->query('SELECT * FROM `Ville` WHERE `ville` = "' . $nom . '"');
        $results = $this->db->resultset();
        return $results;
    }
}

