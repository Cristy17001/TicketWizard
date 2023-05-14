<?php

declare(strict_types = 1);

class User{
    public ?int $id;
    public string $username;
    public string $password;
    public string $email;
    public string $full_name;
    // public datetime $created_at;

    public function __construct(?int $id,string $username,string $password,string $email,string $fullName) {
        $this->id=$id;
        $this->username = $username;
        $this->password = $password;
        $this->email = $email;
        $this->fullName = $fullName;
    }

    public function save($db){
        $stmt = $db->prepare('INSERT INTO User(username,password,email, full_name, created_at) VALUES (?, ?, ?, ?,2015-12-17)');
        $stmt->execute(array($this->username, $this->password, strtolower($this->email),$this->fullName));
        $this->$id=$db->lastInsertId();
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

}

?>