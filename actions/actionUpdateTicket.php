<?php
  declare(strict_types = 1);

  require_once('../session.php');
  $session = new Session();

  require_once('../database/connection.db.php');
  require_once('../database/User.class.php');
  require_once('../database/Ticket.class.php');

  $db = getDatabaseConnection();
  $ticket_id= $_POST['ticket_id'];
  $optional= $_POST['department-assign'];
  if(!empty($optional)) {
    updateTicketDepartment($db,$ticket_id, $optional);
  }
  $agent=$_POST['agent-assign'];
  if(!empty($agent)) {
    updateTicketAgent($db,$ticket_id, $agent);
  }
  $status=$_POST['assigned-status'];
  if(!empty($status)) {
    updateTicketStatus($db,$ticket_id, $status);
  }
  updatedTicket($db,$ticket_id);
  header('Location: ../pages/agent.php#Ticket'.$ticket_id);
?>