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
        if ($user->whatPermission($db) == "Agent" || $user->whatPermission($db) == "Admin") {
            $ticket_id = filter_var($_POST['ticket_id'], FILTER_SANITIZE_NUMBER_INT);
            $hashtag_id = filter_var($_POST['hashtag_id'], FILTER_SANITIZE_NUMBER_INT);
            removeTicketHashtags($db, $ticket_id, $hashtag_id);

            $ticket = getTicket($db, $ticket_id);
            createEvent($db, $ticket['user_assigned_id'], $ticket['id'], "", "Hashtag was changed from the ticket!");
        }
        else {
            header("Location: ../pages/error.php");
            drawErrorPage("Error: No Permission!");
        }
    }
    else {
        drawErrorPage("Error: Your were banned!");
    }