<?php
  declare(strict_types = 1);

  require_once('../session.php');
  $session = new Session();

  require_once('../database/connection.db.php');
  require_once('../database/User.class.php');
  require_once('../templates/errorPage.php');


$db = getDatabaseConnection();
$username=htmlspecialchars(filter_var($_POST['username'], FILTER_SANITIZE_STRING), ENT_QUOTES, 'UTF-8');
$password=htmlspecialchars(filter_var($_POST['password'], FILTER_SANITIZE_STRING), ENT_QUOTES, 'UTF-8');

  $user = User::getUserWithPassword($db, $username, $password);

  if ($user) {
    echo $user->whatPermission($db);
    $session->setId($user->id);
    $session->setName($user->username);
    $session->addMessage('success', 'Login successful!');
    header('Location: ../pages/client.php');
  } else {
    drawErrorPage("Error: Login Failed Username and Password don't match!");
    $session->addMessage('error', 'Wrong password!');
  }

  // header('Location: ' . $_SERVER['HTTP_REFERER']);
?>