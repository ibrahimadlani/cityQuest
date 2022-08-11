<?php

class Ville
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function addVille($data)
    {
        $this->db->query('INSERT INTO `Ville`(`ville`, `lat`, `lng`, `etat`) VALUES (:ville, :lat, :lng, 2)');

        $this->db->bind(':ville', $data['ville']);
        $this->db->bind(':lat', $data['lat']);
        $this->db->bind(':lng', $data['lng']);

        if ($this->db->execute()) {
            return $this->db->lastInsertId();
        } else {
            return false;
        }
    }

    public function getVilles()
    {
        $query =
            'SELECT ' .
            'Ville.id, ' .
            'Ville.ville, ' .
            'Ville.lat, ' .
            'Ville.lng ' .
            'FROM Ville ' .
            'WHERE Ville.etat = 2 ' .
            'ORDER BY Ville.ville';
        $this->db->query($query);
        $results = $this->db->resultset();
        return $results;
    }

    public function getVillesUsingNom($nom)
    {
        $this->db->query('SELECT * FROM `Ville` WHERE `ville` = "' . $nom . '"');
        $results = $this->db->resultset();
        return $results;
    }
}

