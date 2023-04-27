<?php

declare(strict_types = 1);

class User{
    public int $id;
    public string $username;
    public string $password;
    public string $email;
    public string $full_name;
    public datetime $created_at;

    public function __construct(string $username,string $password,string $email,string $fullName) {
        $this->username = $username;
        $this->password = $password;
        $this->email = $email;
        $this->fullName = $fullName;
    }

    public function save($db){
        $stmt = $db->prepare('INSERT INTO User(username,password,email, full_name, created_at) VALUES (?, ?, ?, ?,2015-12-17)');
        $stmt->execute(array($this->username, $this->password, $this->email,$this->fullName));
        $this->$id=$db->lastInsertId();
    }


}


?>