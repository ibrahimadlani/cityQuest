<?php

class TypeEvenement
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function addTypeEvenement($data)
    {
        $this->db->query('INSERT INTO `TypeEvenement`(`type`, `icone`) VALUES (:type, :icone)');

        $this->db->bind(':type', $data['type']);
        $this->db->bind(':icone', $data['icone']);

        if ($this->db->execute()) {
            return $this->db->lastInsertId();
        } else {
            return false;
        }
    }

    public function getTypesEvenement()
    {
        $this->db->query('SELECT * FROM `TypeEvenement` ORDER BY `id`');
        $results = $this->db->resultset();
        return $results;
    }
}
