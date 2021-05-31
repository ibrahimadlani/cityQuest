<?php
class Avis {
  private $db;

  public function __construct() {
    $this->db = new Database;
  }

  public function addAvis($data) {
    $this->db->query('INSERT INTO `Avis`(`text`, `note`, `auteur`, `idPoint`, `typePoint`) VALUES (:text, :note, :auteur, :idPoint, :typePoint)');

    $this->db->bind(':nom', $data['nom']);
    $this->db->bind(':note', $data['note']);
    $this->db->bind(':auteur', $data['auteur']);
    $this->db->bind(':idPoint', $data['idPoint']);
    $this->db->bind(':typePoint', $data['typePoint']);

    if ($this->db->execute()) { return $this->db->lastInsertId(); }
    else { return false; }
  }

  public function getAvis() {
    $this->db->query('SELECT * FROM `Avis` ORDER BY `id`');
    $results = $this->db->resultset();
    return $results;
  }

  public function getAvisLieu($idLieu) {
    $this->db->query('SELECT * FROM `Avis` JOIN `Utilisateur` ON `Avis`.`auteur` = `Utilisateur`.`id` WHERE `idPoint` =' . $idLieu . ' AND  `typePoint` = 1 ORDER BY `date` DESC');
    $results = $this->db->resultset();
    return $results;
  }

    public function getNoteLieu($idLieu) {
        $this->db->query('SELECT IFNULL(AVG(`note`),0) FROM `Avis` WHERE `idPoint` = ' . $idLieu . ' AND `typePoint` = 1 GROUP BY `idPoint`');
        $result = $this->db->resultset();
        return $result;
    }

  public function getAvisEvenement($idEvenement) {
    $this->db->query('SELECT * FROM `Avis` JOIN `Utilisateur` ON `Avis`.`auteur` = `Utilisateur`.`id` WHERE `idPoint` =' . $idEvenement . ' AND  `typePoint` = 2 ORDER BY `date` DESC');
    $results = $this->db->resultset();
    return $results;
  }

    public function getNoteEvenement($idEvenement) {
        $this->db->query('SELECT IFNULL(AVG(`note`),0) FROM `Avis` WHERE `idPoint` =' . $idEvenement . ' AND  `typePoint` = 2');
        $results = $this->db->resultset();
        return $results;
    }

  public function getAvisUtilisateur($idUser):int {
    $this->db->query('SELECT * FROM `Avis` WHERE `auteur` =' . $idUser);
    $results = $this->db->resultset();
    return $results;
  }

  public function deleteAvis($idAvis) {
    $this->db->query('DELETE FROM `Avis` WHERE `id` =' . $idAvis);
    if ($this->db->execute()) { return true; }
    else { return false; }
  }

}
?>
