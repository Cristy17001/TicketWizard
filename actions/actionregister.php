<?php
  declare(strict_types = 1);

  require_once('../session.php');
  $session = new Session();

  require_once('../database/connection.db.php');
  require_once('../database/User.class.php');

  // User input validation
  $name = htmlspecialchars(filter_var($_POST['name'], FILTER_SANITIZE_STRING), ENT_QUOTES, 'UTF-8');
  $email = htmlspecialchars(filter_var($_POST['email'], FILTER_SANITIZE_EMAIL), ENT_QUOTES, 'UTF-8');
  $username = htmlspecialchars(filter_var($_POST['username'], FILTER_SANITIZE_STRING), ENT_QUOTES, 'UTF-8');
  $pwd = password_hash($_POST['password'],PASSWORD_DEFAULT);
  $image = '../source/avatar.jpg';

  // Write to database
  $db = getDatabaseConnection();
  $User= new User(null, $username, $pwd, $email, $name,$image);
  $User->register_save($db);
  header('Location: ../pages/login.php');
