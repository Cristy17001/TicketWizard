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
    $stmt = $db->prepare('SELECT * FROM Faq');
    $stmt->execute();
    return $stmt->fetchAll();
}

function createFaqQuestion($db, $user_id, $title, $response) {
    $stmt = $db->prepare('INSERT INTO Faq(title, response, creator) VALUES(?, ?, ?)');
    $stmt->execute(array($title, $response, $user_id));
}

function removeFaqQuestion($db, $faqId) {
    $stmt = $db->prepare('DELETE FROM Faq WHERE id = ?');
    $stmt->execute(array($faqId));
}