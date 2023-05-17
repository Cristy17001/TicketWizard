<?php
  declare(strict_types = 1);

  require_once('../session.php');
  $session = new Session();

  require_once('../database/connection.db.php');
  require_once('../database/User.class.php');
  require_once('../database/Ticket.class.php');

  $db = getDatabaseConnection();
  echo $session->getId();
  echo $_POST['optional'];
  createTicket($db, $session->getId(), $_POST['optional'], $_POST['title'], $_POST['description']);
  header('Location:../Client_pages/Home_page/client.php');
?>