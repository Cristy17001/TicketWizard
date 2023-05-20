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
        $ticket_id = $_POST['ticket_id'];
        $optional = $_POST['department-assign'];
        if ($optional) {
            updateTicketDepartment($db, $ticket_id, $optional);
        }
        $agent = $_POST['agent-assign'];
        if ($agent) {
            updateTicketAgent($db, $ticket_id, $agent);
        }
        $status = $_POST['assigned-status'];
        if ($status) {
            updateTicketStatus($db, $ticket_id, $status);
        }
        updatedTicket($db, $ticket_id);
        header('Location:../pages/agent.php');
    }
    else {
        drawErrorPage("Error: Your were banned!");
    }
