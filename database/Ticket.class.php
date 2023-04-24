<?php

class Ticket {
    private int $id;
    private int $userId;
    private int $userAssignedId;
    private int $departmentId;
    private string $title;
    private string $description;
    private string $status;
    private string $priority;
    private datetime $createdAt;
    private datetime $updatedAt;
    private datetime $isClosed;

    public function __construct(int $id,int $userId,int $userAssignedId,int $departmentId,string $title,string $description,string $status,string $priority,datetime $createdAt,datetime $updatedAt,int $isClosed) {
        $this->id = $id;
        $this->userId = $userId;
        $this->userAssignedId = $userAssignedId;
        $this->departmentId = $departmentId;
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

?>