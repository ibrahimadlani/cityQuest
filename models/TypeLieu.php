<?php
class TypeLieu
{
  private $db;

  public function __construct()
  {
    $this->db = new Database;
  }

  public function addTypeLieu($data)
  {
    $this->db->query('INSERT INTO `TypeLieu`(`type`, `icone`) VALUES (:type, :icone)');

    $this->db->bind(':type', $data['type']);
    $this->db->bind(':icone', $data['icone']);

    if ($this->db->execute()) { return $this->db->lastInsertId();}
    else { return false; }
  }

  public function getTypesLieu()
  {
    $this->db->query('SELECT * FROM `TypeLieu` ORDER BY `id`');
    $results = $this->db->resultset();
    return $results;
  }
}
