<?php
  declare(strict_types = 1);

  require_once('../session.php');
  $session = new Session();

  require_once('../database/connection.db.php');
  require_once('../database/User.class.php');
  require_once('../database/Ticket.class.php');
  require_once('../database/Message.class.php');


  $db = getDatabaseConnection();
  $ticket_id=$_POST['ticket_id'];
  $user_id=$_POST['user'];
  $message = htmlspecialchars(filter_var($_POST['message'], FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES), ENT_NOQUOTES, 'UTF-8');
  addMessage($db,$ticket_id,$user_id,$message);
  updatedTicket($db,$ticket_id);
  header('Location:../pages/' . $_POST['page'] . '.php');
?>