<?php 
  declare(strict_types=1);

  // require_once('session.php');
  // $session = new Session();

  // if (!$session->isLoggedIn()) die(header('Location: /'));

  // require_once('/../../database/connection.db.php');
  // require_once('/../../database/User.class.php');

  require_once('../../templates/common.php');
  require_once('../../templates/nav.tpl.php');
  // $db = getDatabaseConnection();

// $user = User::getUser($db, $session->getId());

  drawHeader('yes');
  drawNav();
?>