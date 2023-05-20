<?php

declare(strict_types = 1);

class Ticket {
    public int $id;
    public int $userId;
    public int $userAssignedId;
    public String $department;
    public string $title;
    public string $description;
    public string $status;
    public string $priority;
    public datetime $createdAt;
    public datetime $updatedAt;
    public datetime $isClosed;

    public function __construct(int $id,int $userId,int $userAssignedId,String $department,string $title,string $description,string $status,string $priority,datetime $createdAt,datetime $updatedAt,int $isClosed) {
        $this->id = $id;
        $this->userId = $userId;
        $this->userAssignedId = $userAssignedId;
        $this->department = $department;
        $this->title = $title;
        $this->description = $description;
        $this->status = $status;
        $this->priority = $priority;
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;
        $this->isClosed = setIsClosed($isClosed);
    }


    public function setIsClosed(int $isClosed): void {
        if ($isClosed === 0 || $isClosed === 1) {
            $this->isClosed = $isClosed;
        } else {
            throw new InvalidArgumentException("isClosed must be either 0 or 1");
        }
    }

    
}
function getTicketsFromClient($db, int $user_id) {
    $stmt = $db->prepare('
    SELECT id, user_id, user_assigned_id, department, title, description, status, priority, created_at, updated_at, isClosed
    FROM Ticket 
    WHERE user_id = ?
    ');
    $stmt->execute(array($user_id));
    $tickets = $stmt->fetchAll();
    return $tickets;
}
function getTicketsToAgent($db) {
    $stmt = $db->prepare('
    SELECT *
    FROM Ticket
    ');
    $stmt->execute();
    $tickets = $stmt->fetchAll();
    return $tickets;
}

function createTicket($db, $user_id, $department, $title, $description) {
    $stmt = $db->prepare('
    INSERT INTO Ticket(user_id, department, title, description, isClosed)
    VALUES(?, ?, ?, ?, ?)
    ');
    $stmt->execute(array($user_id,$department, $title, $description, 1));
}

function getHashtags($db) {
    $stmt = $db->prepare('SELECT * FROM Hashtags');
    $stmt->execute();
    return $stmt->fetchAll();
}

function getStates($db) {
    $stmt = $db->prepare('SELECT * FROM State_');
    $stmt->execute();
    return $stmt->fetchAll();
}