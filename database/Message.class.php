<?php


class Message {
    public int $userId;
    public int $ticketId;
    public string $content;
    public DateTime $createdAt;
    public DateTime $updatedAt;

    public function __construct(int $userId, int $ticketId, string $content, DateTime $createdAt, DateTime $updatedAt) {
        $this->userId = $userId;
        $this->ticketId = $ticketId;
        $this->content = $content;
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;
    }

}

?>