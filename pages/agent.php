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
  require_once('../templates/agentTickets.php');
  $db = getDatabaseConnection();

$user = User::getUser($db, $session->getId());
$tickets=getTicketsToAgent($db);

if($user->whatPermission($db)!='Agent' && $user->whatPermission($db)!='Admin'){
    echo 'No permission!';
} else {
  drawHeader($user->whatPermission($db), 'agent', $db);
  drawNav($user, $db,'agent');
  drawAgentTickets($tickets,$db);
}
?>