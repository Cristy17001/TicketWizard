<?php
  declare(strict_types = 1);

  require_once('../session.php');
  $session = new Session();

  require_once('../database/connection.db.php');
  require_once('../database/User.class.php');

  $db = getDatabaseConnection();

  $user = User::getUserWithPassword($db, $_POST['username'], $_POST['password']);

  if ($user) {
    echo 'woooo'. '<br>';
    echo $user->whatPermission($db);
    $session->setId($user->id);
    $session->setName($user->username);
    $session->addMessage('success', 'Login successful!');
    header('Location: /../Client_pages/Home_page/client.php');
  } else {
    echo 'fack';
    $session->addMessage('error', 'Wrong password!');
  }

  // header('Location: ' . $_SERVER['HTTP_REFERER']);
?>