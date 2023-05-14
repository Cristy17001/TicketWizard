<?php

declare(strict_types = 1);

class Post {
    public $user_id;
    public $id;
    public $title;
    public $content;

    public function __construct($user_id, $id, $title, $content) {
        $this->user_id = $user_id;
        $this->id = $id;
        $this->title = $title;
        $this->content = $content;
    }
}

?>