<?php
    declare(strict_types=1);

    require_once('../session.php');
    $session = new Session();

    if (!$session->isLoggedIn()) die(header('Location: /'));

    require_once('../database/connection.db.php');
    require_once('../database/User.class.php');
    require_once('../database/Ticket.class.php');

    require_once('../templates/common.php');
    require_once('../templates/nav.tpl.php');
    require_once('../templates/ticketHistory.tpl.php');
    require_once('../templates/clientTickets.php');
    require_once('../templates/errorPage.php');


    $db = getDatabaseConnection();

    $user = User::getUser($db, $session->getId());
    $events = getEvents($db,$_GET['id']);
    if ($user->whatPermission($db) != 'Agent' && $user->whatPermission($db) != 'Admin') {
        drawErrorPage("Error 403: No Permission!");
    }
    else {
        drawTicketHistory($db, $events);
    }
?>