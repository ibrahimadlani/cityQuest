<?php

class Utilisateur
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function addUtilisateur($data)
    {

        $this->db->query('INSERT INTO `Utilisateur`(`email`, `prenom`, `nom`, `bio`, `avatar`, `groupe`, `mdp`,`valide`,`token`) VALUES (:email, :prenom, :nom, :bio, :avatar, :groupe, :mdp, 0,:token)');

        $this->db->bind(':email', $data['email']);
        $this->db->bind(':prenom', $data['prenom']);
        $this->db->bind(':nom', $data['nom']);
        $this->db->bind(':bio', $data['bio']);
        $this->db->bind(':avatar', $data['avatar']);
        $this->db->bind(':groupe', $data['groupe']);
        $this->db->bind(':mdp', $data['mdp']);
        $this->db->bind(':token', $data['token']);

        if ($this->db->execute()) {
            return $this->db->lastInsertId();
        } else {
            return false;
        }

    }

    public function getUtilisateurs()
    {
        $this->db->query('SELECT * FROM `Utilisateur` WHERE `groupe` = 0 ORDER BY `dateCreation` DESC');
        $results = $this->db->resultset();
        return $results;
    }

    public function getUtilisateurbyEmail($email)
    {
        $this->db->query('SELECT * FROM `Utilisateur` WHERE `email` = "' . $email . '"');
        $results = $this->db->resultset();
        return $results;
    }

    public function getUtilisateurbyId($id)
    {
        $this->db->query('SELECT * FROM `Utilisateur` WHERE `id` = ' . $id . '');
        $results = $this->db->resultset();
        return $results;
    }

    public function getUtilisateurModerateur()
    {
        $this->db->query('SELECT * FROM `Utilisateur` WHERE `groupe` = 2');
        $results = $this->db->resultset();
        return $results;
    }

    public function getUtilisateurAdministrateur()
    {
        $this->db->query('SELECT * FROM `Utilisateur` WHERE `groupe` = 3');
        $results = $this->db->resultset();
        return $results;
    }

    public function emailExist($email)
    {
        $this->db->query('SELECT * FROM `Utilisateur` WHERE `email` = "' . $email . '"');
        $results = $this->db->resultset();
        if (sizeof($results) > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function checkCredential($email, $mdp)
    {
        $this->db->query('SELECT * FROM `Utilisateur` WHERE `email` = "' . $email . '"');
        $results = $this->db->resultset();
        if (sizeof($results) > 0) {
            return $verify = password_verify($mdp, $results[0]->mdp);
        } else {
            return false;
        }
    }

    public function tokenExist($token)
    {
        $this->db->query('SELECT * FROM `Utilisateur` WHERE `token` = "' . $token . '"');
        $results = $this->db->resultset();
        if (sizeof($results) > 0) {
            return $results;
        } else {
            return false;
        }
    }

    public function compteEstValide($email)
    {
        $this->db->query('SELECT * FROM `Utilisateur` WHERE `email` = "' . $email . '"');
        $results = $this->db->resultset();
        if ($results[0]->valide == 1) {
            return true;
        } else {
            return false;
        }
    }

    public function validerCompte($id)
    {
        $this->db->query('UPDATE `Utilisateur` SET `valide` = 1 WHERE `id`=' . $id);
        $a = $this->db->execute();
        $this->db->query('UPDATE `Utilisateur` SET `token` = NULL WHERE `id`=' . $id);
        $b = $this->db->execute();
        if ($a && $b) {
            return true;
        } else {
            return false;
        }
    }

    public function verifierToken($token)
    {
        $id = $this->tokenExist($token)[0]->id;
        $email = $this->tokenExist($token)[0]->email;
        if ($this->tokenExist($token)) {
            $this->validerCompte($id);
            return $email;
        } else {
            return false;
        }
    }

    public function modifierInfos($id, $nom, $prenom, $bio, $file)
    {
        $this->db->query('UPDATE `Utilisateur` SET `nom` = "' . $nom . '", `prenom` = "' . $prenom . '", `bio` = "' . $bio . '", `avatar` = "' . $file . '" WHERE `id`=' . $id);
        $a = $this->db->execute();
        if ($a) {
            return true;
        }
    }

    public function getRandomProfiles($id)
    {
        $this->db->query('SELECT id, nom, prenom, avatar, bio FROM `Utilisateur` WHERE `id`!="' . $id . '" ORDER BY RAND ( )  LIMIT 3  ');
        $results = $this->db->resultset();
        return $results;
    }

    public function isProprietaire($id): bool
    {
        $this->db->query('SELECT * FROM `Proprietaire` WHERE `utilisateur`="' . $id . '" AND `etat` = 2');
        $results = $this->db->resultset();
        if (sizeof($results) > 0) {
            return true;
        } else {
            return false;
        }
    }

}
