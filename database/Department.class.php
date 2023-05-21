<?php

declare(strict_types = 1);

class Department {
    public $id;
    public $name;
  
    public function __construct($id, $name) {
      $this->id = $id;
      $this->name = $name;
    }

}

function getDepartments($db) {
  $stmt = $db->prepare('
  SELECT * FROM Department 
  ');
  $stmt->execute();
  $departments = $stmt->fetchAll();
  return $departments;
}

function removeDepartment($db, $id) {
    $stmt = $db->prepare('DELETE FROM Department WHERE id = ?');
    $stmt->execute(array($id));
    $stmt = $db->prepare('UPDATE Ticket SET department = null WHERE department = ?');
    $stmt->execute(array($id));
    $stmt = $db->prepare('UPDATE Agent SET department_id = null WHERE department_id = ?');
    $stmt->execute(array($id));
}

function addDepartment($db, $name) {
    $stmt = $db->prepare('INSERT INTO Department(name) VALUES (?)');
    $stmt->execute(array($name));
}
    
?>