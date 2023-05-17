<?php 
  declare(strict_types=1);

  require_once('../../session.php');
  $session = new Session();

  if (!$session->isLoggedIn()) die(header('Location: /'));

  require_once('../../database/connection.db.php');
  require_once('../../database/User.class.php');
  require_once('../../database/Ticket.class.php');

  require_once('../../templates/common.php');
  require_once('../../templates/nav.tpl.php');
  require_once('../../templates/clientTickets.php');
  require_once('../../templates/errorPage.php');

$db = getDatabaseConnection();

$user = User::getUser($db, $session->getId());
$tickets= getTicketsFromClient($db,$session->getId());

  if($user->whatPermission($db)!='Agent' && $user->whatPermission($db)!='Client') {
    drawErrorPage("You dont have access!");
  } else {
      drawHeader($user->whatPermission($db), 'client', $db);
      drawNav($user, $db, 'client');
      drawClientTickets($tickets, $db);
  }
?>

<!-- # NAO ESQUECER POR ESPECIFICO PARA ADMIN !!!! -->