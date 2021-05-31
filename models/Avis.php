<?php

class Avis
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function addAvis($data)
    {
        $this->db->query('INSERT INTO `Avis`(`text`, `note`, `auteur`, `idLieu`) VALUES (:text, :note, :auteur, :idLieu)');

        $this->db->bind(':text', $data['text']);
        $this->db->bind(':note', $data['note']);
        $this->db->bind(':auteur', $data['auteur']);
        $this->db->bind(':idLieu', $data['idLieu']);

        if ($this->db->execute()) {
            return $this->db->lastInsertId();
        } else {
            return false;
        }
    }

    public function getAvis()
    {
        $this->db->query('SELECT * FROM `Avis` ORDER BY `id`');
        $results = $this->db->resultset();
        return $results;
    }

    public function getAvisLieu($idLieu)
    {
        $this->db->query('SELECT * FROM `Avis` JOIN `Utilisateur` ON `Avis`.`auteur` = `Utilisateur`.`id` WHERE `idLieu` =' . $idLieu . ' ORDER BY `date`');
        $results = $this->db->resultset();
        return $results;
    }

    public function getNoteLieu($idLieu)
    {
        $this->db->query('SELECT IFNULL(AVG(`note`),0) FROM `Avis` WHERE `idLieu` = ' . $idLieu . ' GROUP BY `idLieu`');
        $result = $this->db->resultset();
        return $result;
    }

    public function getAvisUtilisateur($idUser): int
    {
        $this->db->query('SELECT * FROM `Avis` WHERE `auteur` =' . $idUser);
        $results = $this->db->resultset();
        return $results;
    }

    public function deleteAvis($idAvis)
    {
        $this->db->query('DELETE FROM `Avis` WHERE `id` =' . $idAvis);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

}

?>
