<?php
class Lieu
{
  private $db;

  public function __construct()
  {
    $this->db = new Database;
  }

  public function addLieu($data)
  {
    $this->db->query('INSERT INTO `Lieu`(`nom`, `description`,`presentation`, `adresse`, `lat`, `lng`, `ville`, `typeLieu`, `auteur`) VALUES (:nom, :description, :presentation, :adresse, :lat, :lng, :ville, :typeLieu, :auteur)');

    $this->db->bind(':nom', $data['nom']);
    $this->db->bind(':description', $data['description']);
    $this->db->bind(':presentation', $data['presentation']);
    $this->db->bind(':adresse', $data['adresse']);
    $this->db->bind(':lat', $data['lat']);
    $this->db->bind(':lng', $data['lng']);
    $this->db->bind(':ville', $data['ville']);
    $this->db->bind(':typeLieu', $data['typeLieu']);
    $this->db->bind(':auteur', $data['auteur']);

    if ($this->db->execute()) { return $this->db->lastInsertId();}
    else { return false; }
  }

  public function getLieux()
  {
    $this->db->query('SELECT * FROM `Lieu` ORDER BY `Lieu`.`promotion` DESC ,`Lieu`.`note` DESC');
    $results = $this->db->resultset();
    return $results;
  }


  public function getLieuxByVille($idVille)
  {
    $this->db->query('SELECT * FROM `Lieu` WHERE `ville` = "' . $idVille . '"  ORDER BY `Lieu`.`promotion` DESC ,`Lieu`.`note` DESC');
    $results = $this->db->resultset();
    return $results;
  }

  public function getLieuxByAuteur($auteur)
  {
    $this->db->query('SELECT * FROM `Lieu` WHERE `auteur` = "' . $auteur . '" ORDER BY `Lieu`.`promotion` DESC ,`Lieu`.`note` DESC');
    $results = $this->db->resultset();
    return $results;
  }

  public function getLieuxByPromotion($promotion)
  {
    $this->db->query('SELECT * FROM `Lieu` WHERE `promotion` = "' . $promotion . '" ORDER BY `Lieu`.`promotion` DESC ,`Lieu`.`note` DESC');
    $results = $this->db->resultset();
    return $results;
  }

  public function getLieuxByType($idType)
  {
    $this->db->query('SELECT * FROM `Lieu` WHERE `typeLieu` = "' . $idType . '"  ORDER BY `Lieu`.`promotion` DESC ,`Lieu`.`note` DESC');
    $results = $this->db->resultset();
    return $results;
  }

  public function getLieuxByVilleAndType($idType, $idVille)
  {
    $this->db->query('SELECT * FROM `Lieu` WHERE `typeLieu` = "' . $idType . '" AND `ville` = "' . $idVille . '"  ORDER BY `Lieu`.`promotion` DESC ,`Lieu`.`note` DESC');
    $results = $this->db->resultset();
    return $results;
  }

    public function setProprietaire($idUtilisateur, $idLieu) {
        $this->db->query('INSERT INTO `Proprietaire`(`utilisateur`, `lieu`, `etat`) VALUES (' . $idUtilisateur . ', ' . $idLieu . ', 1)');
        $a = $this->db->execute();
        if ($a){
            return true;
        }
    }

    /*public function getLieux() {
        $this->db->query('SELECT `nom`, `description`, `presentation`, `adresse`, `lat`, `lng`, `ville`, `typeLieu`, `text`, `note`, `date`, AVG(`note`) FROM `Lieu` JOIN `Avis` ON (`Lieu`.`id` = `Avis`.`idPoint` AND `Avis`.`typePoint` = 1) JOIN `Utilisateur` ON (`Avis`.`auteur` = `Utilisateur`.`id`) GROUP BY `Lieu`.`id` ORDER BY `Lieu`.`promotion` DESC ,`Lieu`.`note` DESC, `Avis`.`date` DESC');
        $results = $this->db->resultset();
        return $results;
    }*/


  /*public function setNote($idLieu)) {
      $somme = 0;
      $effectifs = 0;
      $avis = new Avis();
      $avisParLieu = $avis->getAvisParLieu();
      foreach ($avisParLieu as $a) {
        $somme =+ $a->note;
        $effectifs++;
      }
      $moyenne = $somme / $effectifs;
      $this->db->query('UPDATE `Lieu` SET `note`= ' . $moyenne .' WHERE `id` = ' . $idLieu);
      $results = $this->db->resultset();
      return $results;
    }*/
}
