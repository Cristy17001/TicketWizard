<?php
  declare(strict_types = 1);

  require_once('../session.php');
  $session = new Session();

  require_once('../database/connection.db.php');
  require_once('../database/User.class.php');

echo 'aaaaaaaa';
  $name=$_POST['name'];
  $email=$_POST['email'];
  $username=$_POST['username'];
  $pwd=$_POST['password'];  


  $db = getDatabaseConnection();
  $User= new User($username,$pwd,$email,$name);
  $User->save($db);

  if ($User) {
    echo 'woooooooooo';
    $session->setId($User->id);
    $session->setName($User->name());
    $session->addMessage('success', 'Login successful!');
  } else {
    echo 'bleck';
    $session->addMessage('error', 'Wrong password!');
  }

//   header('Location: ' . $_SERVER['HTTP_REFERER']);
?>