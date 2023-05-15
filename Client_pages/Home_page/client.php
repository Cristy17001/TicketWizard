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
  $db = getDatabaseConnection();

$user = User::getUser($db, $session->getId());
$tickets= getTicketsFromClient($db,$session->getId());

  if($user->whatPermition($db)!='Agent' && $user->whatPermition($db)!='Client') {
    echo 'No permission!';
  } else
  drawHeader($user->whatPermition($db));
  drawNav($user, $db,'client');
  drawClientTickets($tickets);
?>

<!-- # NAO ESQUECER POR ESPECIFICO PARA ADMIN !!!! -->