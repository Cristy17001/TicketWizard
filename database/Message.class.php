<?php

declare(strict_types = 1);

class Message {
    public int $userId;
    public int $ticketId;
    public string $content;
    public DateTime $createdAt;

    public function __construct(int $userId, int $ticketId, string $content, DateTime $createdAt) {
        $this->userId = $userId;
        $this->ticketId = $ticketId;
        $this->content = $content;
        $this->createdAt = $createdAt;
    }

}
function addMessage($db, $ticket_id, $user_id, $context){
    $stmt = $db->prepare('
    INSERT INTO Message(user_id, ticket_id, content, created_at)
    VALUES(?, ?, ?, TIME())
    ');
    $stmt->execute(array($user_id,$ticket_id, $context));
}

?>