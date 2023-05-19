<?php
    declare(strict_types = 1);

    require_once('../session.php');
    $session = new Session();

    require_once('../database/connection.db.php');
    require_once('../database/User.class.php');
    require_once('../database/Ticket.class.php');

    $db = getDatabaseConnection();
    $optional = htmlspecialchars(filter_var($_POST['optional'], FILTER_SANITIZE_STRING), ENT_QUOTES, 'UTF-8');
    $title = htmlspecialchars(filter_var($_POST['title'], FILTER_SANITIZE_STRING), ENT_QUOTES, 'UTF-8');
    $description = htmlspecialchars(filter_var($_POST['description'], FILTER_SANITIZE_STRING), ENT_QUOTES, 'UTF-8');
    createTicket($db, $session->getId(), $optional, $title, $description);
    header('Location:../pages/client.php');
?>