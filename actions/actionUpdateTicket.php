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
    $ticket = getTicket($db, $_POST['ticket_id']);

    $content = "";
    $title = "";


    if ($user) {
        $ticket_id = $_POST['ticket_id'];
        $optional = $_POST['department-assign'];
        if ($optional) {
            if ($optional != $ticket['department']) {
                $content .= "Department was changed\n";
            }
            updateTicketDepartment($db, $ticket_id, $optional);
        }
        $agent = $_POST['agent-assign'];
        if ($agent) {
            if ($agent != $ticket['user_assigned_id']) {
                $content .= "Assigned agent was changed\n";
            }
            updateTicketAgent($db, $ticket_id, $agent);
        }
        $status = $_POST['assigned-status'];
        if ($status) {
            if ($status != $ticket['status']) {
                $content .= "Status was changed\n";
            }
            updateTicketStatus($db, $ticket_id, $status);
        }
        
        createEvent($db,$ticket['user_assigned_id'], $ticket['id'], $title, $content);
        updatedTicket($db, $ticket_id);
        header('Location: ../pages/agent.php#Ticket'.$ticket_id);
    } else {
        drawErrorPage("Error: You were banned!");
    }
?>