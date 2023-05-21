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
    $checkUpdate = false;

    if ($user) {
        $ticket_id = $_POST['ticket_id'];
        $optional = $_POST['department-assign'];
        if ($optional) {
            if ($optional != $ticket['department']) {
                $checkUpdate = true;
                $content .= "Department was changed to " . getDepartmentName($db, (int)$optional) . "<br>";
            }
            updateTicketDepartment($db, $ticket_id, $optional);
        }
        $agent = $_POST['agent-assign'];
        if ($agent) {
            if ($agent != $ticket['user_assigned_id']) {
                $checkUpdate = true;
                $content .= "Assigned agent was changed to " . User::getUser($db, (int)$agent)->fullName . "<br>";
            }
            updateTicketAgent($db, $ticket_id, $agent);
        }
        $status = $_POST['assigned-status'];
        if ($status) {
            if ($status != $ticket['status']) {
                $checkUpdate = true;
                $content .= "Status was changed to " . getStatusName($db, (int)$status) ."<br>";
            }
            updateTicketStatus($db, $ticket_id, $status);
        }
        $hashtag = $_POST['assigned-hashtag'];
        if ($hashtag) {
            $checkUpdate = true;
            $content .= "Hashtag " . getHashtagName($db, (int)$hashtag) ." was added <br>";
            updateTicketHashtags($db, $ticket_id, $hashtag);
        }


    if($checkUpdate){
        createEvent($db, $user->id, $ticket['id'], $title, $content);
        updatedTicket($db, $ticket_id);}
        header('Location: ../pages/agent.php#Ticket'.$ticket_id);
    } else {
        drawErrorPage("Error: You were banned!");
    }
