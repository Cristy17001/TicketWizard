<?php
  declare(strict_types = 1);

  require_once('../session.php');
  $session = new Session();

  if (!$session->isLoggedIn()) die(header('Location: /'));

  require_once('../database/connection.db.php');
  require_once('../database/User.class.php');

  $db = getDatabaseConnection();

  $user = User::getUser($db, $session->getId());



  if ($user) {

    echo $user->id;
    //passowords condtions
    /*
    if(empty($_POST['current-pass']) || empty($_POST['new-pass']) || empty($_POST['confirm-pass'])) die("Error: Missing password information.");
    if($_POST['new-pass'] != $_POST['confirm-pass']) die("Error: Wrong password information.");
    if(!password_verify($_POST['current-pass'],$user->password)) die("Error: Wrong current password information.");
    */

    //conditon to see if the empty strings (passwords hash missing)
    if(!empty($_POST['name']))$user->fullName = htmlspecialchars($_POST['name']);
    if(!empty($_POST['username']))$user->username = htmlspecialchars($_POST['username']);
    if(!empty($_POST['email'])) $user->email = htmlspecialchars($_POST['email']);
    //$user->password = password_hash($_POST['new-pass'],PASSWORD_DEFAULT);


    //saves the altered info
    $user->save($db);
    $session->setName($user->fullName);
  }
  header('Location: ../Client_pages/Profile_page/profile.php');
?>