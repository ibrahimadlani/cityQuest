<?php

class Evenement
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function addEvenement($data)
    {
        $this->db->query('INSERT INTO `Evenement`(`nom`, `description`, `presentation`, `adresse`, `lat`, `lng`, `ville`, `typeEvenement`, `auteur`, `debut`, `fin`, `etat`) VALUES (:nom, :description, :presentation, :adresse, :lat, :lng, :ville, :typeEvenement, :auteur, :debut, :fin, 1)');

        $this->db->bind(':nom', $data['nom']);
        $this->db->bind(':description', $data['description']);
        $this->db->bind(':presentation', $data['presentation']);
        $this->db->bind(':adresse', $data['adresse']);
        $this->db->bind(':lat', $data['lat']);
        $this->db->bind(':lng', $data['lng']);
        $this->db->bind(':ville', $data['ville']);
        $this->db->bind(':typeEvenement', $data['typeEvenement']);
        $this->db->bind(':auteur', $data['auteur']);
        $this->db->bind(':debut', $data['debut']);
        $this->db->bind(':fin', $data['fin']);

        if ($this->db->execute()) {
            return $this->db->lastInsertId();
        } else {
            return false;
        }
    }

    public function getEvenements()
    {
        $query =
            'SELECT ' .
                'Evenement.id, ' .
                'Evenement.nom, ' .
                'Evenement.description, ' .
                'Evenement.presentation, ' .
                'Evenement.adresse, ' .
                'Evenement.lat, ' .
                'Evenement.lng, ' .
                'Evenement.ville, ' .
                'Evenement.typeEvenement, ' .
                'Evenement.debut ' .
                'Evenement.fin ' .
            'FROM Evenement ' .
            'WHERE ' .
                'Evenement.etat = 2 ' .
                'AND Evenement.fin > NOW() ' .
            'ORDER BY Evenement.debut DESC, ';
        $this->db->query($query);
        $results = $this->db->resultset();
        return $results;
    }


    public function getEvenementsByVille($idVille)
    {
        $query =
            'SELECT ' .
                'Evenement.id, ' .
                'Evenement.nom, ' .
                'Evenement.description, ' .
                'Evenement.presentation, ' .
                'Evenement.adresse, ' .
                'Evenement.lat, ' .
                'Evenement.lng, ' .
                'Evenement.ville, ' .
                'Evenement.typeEvenement, ' .
                'Evenement.debut ' .
                'Evenement.fin ' .
            'FROM Evenement ' .
            'WHERE ' .
                'Evenement.etat = 2 ' .
                'AND Evenement.fin > NOW() ' .
                'AND Evenement.ville = ' . $idVille . ' ' .
            'ORDER BY Evenement.debut DESC, ';
        $this->db->query($query);
        $results = $this->db->resultset();
        return $results;
    }

    public function getEvenementsByType($idType)
    {
        $query =
            'SELECT ' .
                'Evenement.id, ' .
                'Evenement.nom, ' .
                'Evenement.description, ' .
                'Evenement.presentation, ' .
                'Evenement.adresse, ' .
                'Evenement.lat, ' .
                'Evenement.lng, ' .
                'Evenement.ville, ' .
                'Evenement.typeEvenement, ' .
                'Evenement.debut ' .
                'Evenement.fin ' .
            'FROM Evenement ' .
            'WHERE ' .
                'Evenement.etat = 2 ' .
                'AND Evenement.fin > NOW() ' .
                'AND Evenement.typeEvenement = ' . $idType . ' ' .
            'ORDER BY Evenement.debut DESC, ';
        $this->db->query($query);
        $results = $this->db->resultset();
        return $results;
    }

    public function getEvenementsByVilleAndType($idType, $idVille)
    {
        $query =
            'SELECT ' .
                'Evenement.id, ' .
                'Evenement.nom, ' .
                'Evenement.description, ' .
                'Evenement.presentation, ' .
                'Evenement.adresse, ' .
                'Evenement.lat, ' .
                'Evenement.lng, ' .
                'Evenement.ville, ' .
                'Evenement.typeEvenement, ' .
                'Evenement.debut ' .
                'Evenement.fin ' .
            'FROM Evenement ' .
            'WHERE ' .
                'Evenement.etat = 2 ' .
                'AND Evenement.fin > NOW() ' .
                'AND Evenement.ville = ' . $idVille . ' ' .
                'AND Evenement.typeEvenement = ' . $idType . ' ' .
            'ORDER BY Evenement.debut DESC, ';
        $this->db->query($query);
        $results = $this->db->resultset();
        return $results;
    }
}
