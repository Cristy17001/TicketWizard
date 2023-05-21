<?php
  declare(strict_types = 1);


  require_once('../database/connection.db.php');
  require_once('../database/User.class.php');
  require_once('../database/Ticket.class.php');




  $db = getDatabaseConnection();
  $state=$_POST['State'] ?? null;
  $department=$_POST['Department'] ?? null;
  $ticketsFromDB=getFilteredTickets($db,$state,$department);
  header('Location:../pages/agent.php')
?> 
