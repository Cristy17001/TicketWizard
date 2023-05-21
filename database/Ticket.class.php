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
function getTicketsToAgent($db,$id) {
    $stmt = $db->prepare('SELECT * FROM Ticket WHERE user_assigned_id = ?');
    $stmt->execute(array($id));
    $tickets = $stmt->fetchAll();
    if(count($tickets)==0){
        $stmt = $db->prepare('SELECT * FROM Ticket WHERE status = 3 AND user_assigned_id != ?');
        $stmt->execute(array($id));
        $tickets = $stmt->fetchAll();
    }
    return $tickets;
}

function createTicket($db, $user_id, $optional, $title, $description) {
    $stmt = $db->prepare('
    INSERT INTO Ticket(user_id, department, title, description, isClosed, status)
    VALUES(?, ?, ?, ?, ?, ?)
    ');
    $stmt->execute(array($user_id,$optional, $title, $description, 1, 3));
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

function updateTicketDepartment($db, $ticket_id, $optional) {
    $stmt = $db->prepare('
    UPDATE Ticket 
    SET department = ?
    WHERE id= ?
    ');
    $stmt->execute(array($optional,$ticket_id));
}
function updateTicketAgent($db, $ticket_id,$agent) {
    $stmt = $db->prepare('
    UPDATE Ticket 
    SET user_assigned_id = ?
    WHERE id= ?
    ');
    $stmt->execute(array($agent,$ticket_id));
}
function updateTicketStatus($db, $ticket_id,$status) {
    $stmt = $db->prepare('
    UPDATE Ticket 
    SET status = ?
    WHERE id= ?
    ');
    $stmt->execute(array($status, $ticket_id));
}
function updatedTicket($db, $ticket_id) {
    $stmt = $db->prepare('
    UPDATE Ticket 
    SET updated_at = TIME()
    WHERE id= ?
    ');
    $stmt->execute(array($ticket_id));
}
function messageFromTicket($db, $ticket_id) {
    $stmt = $db->prepare('
    SELECT * 
    FROM Message
    WHERE ticket_id = ?
    ');
    $stmt->execute(array($ticket_id));
    $messages = $stmt->fetchAll();
    return $messages;
}
function getFilteredTickets($db, $state, $department, $hashtag) {
    if (!$state) {$state = 3;}

    $query = "SELECT t.* FROM Ticket AS t";
    $params = array();

    if ($hashtag) {
        $query .= " INNER JOIN TicketHashtags AS th ON t.id = th.ticket_id";
        $query .= " WHERE th.hashtag_id = ?";
        $params[] = $hashtag;
    } else {
        $query .= " WHERE 1";
    }

    if (!$department) {
        $query .= " AND t.department IS NULL";
    } else {
        $query .= " AND t.department = ?";
        $params[] = $department;
    }

    $query .= " AND t.status = ?";
    $params[] = $state;

    $stmt = $db->prepare($query);
    $stmt->execute($params);
    return $stmt->fetchAll();
}

function getFilteredTicketsClient($db, $state, $department, $id) {
    $query = "SELECT * FROM Ticket WHERE user_id = ?";
    $params = array($id);
    if (!$state) {
        $query .= " AND status IS NULL";
    } else {
        $query .= " AND status = ?";
        $params[] = $state;
    }

    if (!$department) {
        $query .= " AND department IS NULL";
    } else {
        $query .= " AND department = ?";
        $params[] = $department;
    }

    $stmt = $db->prepare($query);
    $stmt->execute($params);
    return $stmt->fetchAll();
}

function addStatus($db, $name) {
    $stmt = $db->prepare('INSERT INTO State_(name) VALUES (?)');
    $stmt->execute(array($name));
}

function removeStatus($db, $id) {
    $stmt = $db->prepare('DELETE FROM State_ WHERE id = ?');
    $stmt->execute(array($id));
}

function addHashtag($db, $name) {
    $stmt = $db->prepare('INSERT INTO Hashtags(name) VALUES (?)');
    $stmt->execute(array($name));
}

function removeHashtag($db, $id) {
    $stmt = $db->prepare('DELETE FROM Hashtags WHERE id = ?');
    $stmt->execute(array($id));
}
function getStatusName($db, $id) {
    $stmt = $db->prepare('SELECT name FROM State_ WHERE id = ?');
    $stmt->execute(array($id));
    $status = $stmt->fetch();
    return $status['name'];
}
function getHashtagName($db, $id) {
    $stmt = $db->prepare('SELECT name FROM Hashtags WHERE id = ?');
    $stmt->execute(array($id));
    $hashtagname= $stmt->fetch();
    return $hashtagname['name'];
}
function getTicketHashtags($db, $id) {
    $stmt = $db->prepare('SELECT hashtag_id FROM TicketHashtags WHERE ticket_id = ?');
    $stmt->execute(array($id));
    $hashtags= $stmt->fetchAll();
    return $hashtags;
}


