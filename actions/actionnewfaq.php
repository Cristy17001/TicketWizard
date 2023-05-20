<?php
    declare(strict_types = 1);

    require_once('../session.php');
    $session = new Session();

    require_once('../database/connection.db.php');
    require_once('../database/User.class.php');
    require_once('../database/FaqQuestions.class.php');

    $db = getDatabaseConnection();
    $title = htmlspecialchars(filter_var($_POST['title'], FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES), ENT_NOQUOTES, 'UTF-8');
    $response = htmlspecialchars(filter_var($_POST['response'], FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES), ENT_NOQUOTES, 'UTF-8');
    createFaqQuestion($db, $session->getId(), $title, $response);
    header('Location:../pages/faq.php');
