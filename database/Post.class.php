<?php

class Post {
    private $user_id;
    private $id;
    private $title;
    private $content;

    public function __construct($user_id, $id, $title, $content) {
        $this->user_id = $user_id;
        $this->id = $id;
        $this->title = $title;
        $this->content = $content;
    }
}

?>