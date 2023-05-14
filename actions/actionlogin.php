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
      //checks if admin
      if($user->hasPermition($db,'Admin')){
          echo 'isAdmin'. '<br>';
      } else{
          echo 'notAdmin'. '<br>';
      }

      //checks if Agent
      if($user->hasPermition($db,'Agent')){
          echo 'isAgent'. '<br>';
      } else{
          echo 'notAgent'. '<br>';
      }

      //Checks if Client
      if($user->hasPermition($db,'Client')){
          echo 'isClient'. '<br>';
      } else{
          echo 'notClient'. '<br>';
      }
    $session->setId($user->id);
    echo $session->getId(). '<br>';
    $session->setName($user->username);
    $session->addMessage('success', 'Login successful!');
    header('Location: ../mainpage.php');
  } else {
    echo 'fack';
    $session->addMessage('error', 'Wrong password!');
  }

  // header('Location: ' . $_SERVER['HTTP_REFERER']);
?>