<?php
  declare(strict_types = 1);

  require_once('../session.php');
  $session = new Session();

  require_once('../database/connection.db.php');
  require_once('../database/User.class.php');

  $db = getDatabaseConnection();

  $user = User::getUserWithPassword($db, $_POST['username'], $_POST['password']);
  echo $user->id;

  if ($user) {
    echo 'woooo';
      //checks if admin
      if($user->hasPermition($db,'Admin')){
          echo 'isAdmin';
      } else{
          echo 'notAdmin';
      }

      //checks if Agent
      if($user->hasPermition($db,'Agent')){
          echo 'isAgent';
      } else{
          echo 'notAgent';
      }

      //Checks if Client
      if($user->hasPermition($db,'Client')){
          echo 'isClient';
      } else{
          echo 'notClient';
      }
    $session->setId($user->id);
    $session->setName($user->username);
    $session->addMessage('success', 'Login successful!');
    echo 'woooo';
  } else {
    echo 'fack';
    $session->addMessage('error', 'Wrong password!');
  }

  // header('Location: ' . $_SERVER['HTTP_REFERER']);
?>