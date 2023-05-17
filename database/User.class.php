<?php

declare(strict_types = 1);

class User{
    public ?int $id;
    public string $username;
    public string $password;
    public string $email;
    public string $fullName;
    // public datetime $created_at;

    public function __construct(?int $id, string $username, string $password, string $email, string $fullName) {
        $this->id=$id;
        $this->username = $username;
        $this->password = $password;
        $this->email = $email;
        $this->fullName = $fullName;
    }

    public function register_save($db) {
        $stmt = $db->prepare('INSERT INTO User(username, password, email, full_name, created_at) VALUES (?, ?, ?, ?, 2015-12-17)');
        $stmt->execute(array($this->username, $this->password, strtolower($this->email), $this->fullName));
        $this->id = intval($db->lastInsertId());

        $stmt = $db->prepare('INSERT INTO Client(id, username, password, email, full_name, created_at) VALUES (?, ?, ?, ?, ?, 2015-12-17)');
        $stmt->execute(array($this->id, $this->username, $this->password, strtolower($this->email), $this->fullName));
    }

    function save($db) {
        $stmt = $db->prepare('UPDATE User SET username = ?,email = ? ,full_name  = ?   WHERE id = ?');
        $stmt->execute(array($this->username,$this->email,$this->fullName , $this->id));
    }


    static function getUserWithPassword($db, string $username, string $password){
        $stmt = $db->prepare('
        SELECT id, username, password, email, full_name
        FROM User 
        WHERE username = ?
      ');

      $stmt->execute(array(($username)));
      $user=$stmt->fetch();
      if($user!=null && password_verify($password, $user['password'])){
        return new User(
            $user['id'],
            $user['username'],
            $user['password'],
            $user['email'],
            $user['full_name']
        );
      } else return null;
    }
    public function hasPermition($db,string $typeUser) {
        $allowedTables = ['Client', 'Admin', 'Agent']; // replace with actual table names
        if (!in_array($typeUser, $allowedTables)) {
            throw new InvalidArgumentException('Invalid user type');
        }
        $stmt = $db->prepare("SELECT * FROM $typeUser WHERE id = ?");
        $stmt->execute([$this->id]);
        $result = $stmt->fetch();
        return ($result !== false);
    }

    public function whatPermission($db) {

        $stmt = $db->prepare("SELECT * FROM Admin WHERE id = ?");
        $stmt->execute([$this->id]);
        $result = $stmt->fetch();
        if($result !== false) return 'Admin';
        $stmt = $db->prepare("SELECT * FROM Agent WHERE id = ?");
        $stmt->execute([$this->id]);
        $result = $stmt->fetch();
        if($result !== false) return 'Agent';
        $stmt = $db->prepare("SELECT * FROM Client WHERE id = ?");
        $stmt->execute([$this->id]);
        $result = $stmt->fetch();
        if($result !== false) return 'Client';
    }


    static function getUser($db, int $id) : User {
        $stmt = $db->prepare('
        SELECT id, username, password, email, full_name
        FROM User 
        WHERE id = ?
        ');
  
        $stmt->execute(array($id));
        $user = $stmt->fetch();
        
        return new User(
            $user['id'],
            $user['username'],
            $user['password'],
            $user['email'],
            $user['full_name']
        );
      }

}

?>