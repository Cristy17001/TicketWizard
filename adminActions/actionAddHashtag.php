<?php
    declare(strict_types=1);

    require_once('../session.php');
    $session = new Session();

    require_once('../database/connection.db.php');
    require_once('../database/User.class.php');
    require_once('../database/Ticket.class.php');
    require_once('../templates/errorPage.php');

    $db = getDatabaseConnection();
    $user = User::getUser($db, $session->getId());

    if ($user) {
        if ($user->whatPermission($db) == "Admin") {
            $hashtag = htmlspecialchars(filter_var($_POST['add-hashtags-input'], FILTER_SANITIZE_STRING), ENT_QUOTES);
            addHashtag($db, $hashtag);
            header("Location: ../pages/admin.php");
        }
        else {
            header("Location: ../pages/error.php");
            drawErrorPage("Error: No Permission!");
        }
    }
    else {
        drawErrorPage("Error: Your were banned!");
    }
