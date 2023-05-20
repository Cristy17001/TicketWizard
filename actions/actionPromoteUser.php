<?php
    declare(strict_types = 1);

    require_once('../session.php');
    $session = new Session();

    require_once('../database/connection.db.php');
    require_once('../database/User.class.php');
    require_once('../database/FaqQuestions.class.php');

    $db = getDatabaseConnection();
    $id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
    promoteUser($db, $id);
