<?php
  declare(strict_types = 1);

  require_once('../session.php');
  $session = new Session();

  require_once('../database/connection.db.php');
  require_once('../database/User.class.php');

  $name=$_POST['name'];
  $email=$_POST['email'];
  $username=$_POST['username'];
  $pwd=password_hash($_POST['password'],PASSWORD_DEFAULT);  


  $db = getDatabaseConnection();
  $User= new User(null,$username,$pwd,$email,$name);
  $User->save($db);
  if ($User) {
    header('Location: ../login.php');
    
  } else {
    header('Location: ../register.php');
    echo 'Something went wrong!';
  }

//   header('Location: ' . $_SERVER['HTTP_REFERER']);
?>