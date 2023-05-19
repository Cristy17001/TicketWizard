<?php

declare(strict_types = 1);
class Faq {
    public int $id;
    public string $title;
    public string $response;
    public int $creatorId;
    public int $dateCreation;

    public function __construct(int $id, string $title, string $response, int $creatorId, int $dateCreation)
    {
        $this->id = $id;
        $this->title = $title;
        $this->response = $response;
        $this->creatorId = $creatorId;
        $this->dateCreation = $dateCreation;
    }
}

function getQuestions($db) {
    $stmt = $db->prepare('SELECT id, title, response, creator, created_at FROM Faq');
    return $stmt->fetchAll();
}