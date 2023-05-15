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

?>