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
    
?>