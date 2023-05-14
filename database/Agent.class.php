<?php

declare(strict_types = 1);

class Agent{
    public int $id;
    public string $username;
    public string $password;
    public string $email;
    public datetime $created_at;
    public int $department_id;
    public string $fullName;

    public function __construct(int $id,string $username,string $password,string $email,string $fullName,datetime $created_at,int $department_id) {
        $this->id = $id;
        $this->username = $username;
        $this->password = $password;
        $this->email = $email;
        $this->fullName = $fullName;
        $this->created_at = $created_at;
        $this->department_id = $department_id;
    }

}

?>