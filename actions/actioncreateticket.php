<?php
    declare(strict_types = 1);

    require_once('../session.php');
    $session = new Session();

    require_once('../database/connection.db.php');
    require_once('../database/User.class.php');
    require_once('../database/Ticket.class.php');
    require_once('../templates/errorPage.php');


    $db = getDatabaseConnection();
    $user = User::getUser($db, $session->getId());

    if ($user) {
        $user = User::getUser($db, $session->getId());

        if ($user->whatPermission($db) != 'Agent' && $user->whatPermission($db) != 'Client' && $user->whatPermission($db) != 'Admin') {
            header('Location:../pages/error.php');
            drawErrorPage("Error: Your are probably banned!");
        } else {
            $optional = htmlspecialchars(filter_var($_POST['optional'], FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES), ENT_NOQUOTES, 'UTF-8');
            $title = htmlspecialchars(filter_var($_POST['title'], FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES), ENT_NOQUOTES, 'UTF-8');
            $description = htmlspecialchars(filter_var($_POST['description'], FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES), ENT_NOQUOTES, 'UTF-8');
            createTicket($db, $session->getId(), $optional, $title, $description);
            header('Location:../pages/client.php');
        }
    }
    else {
        drawErrorPage("Error: Your were banned!");
    }
?>