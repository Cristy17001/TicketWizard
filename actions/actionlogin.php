<?php
  declare(strict_types = 1);

  require_once(__DIR__ . '/../session.php');
  $session = new Session();

  require_once(__DIR__ . '/../database/connection.db.php');
  require_once(__DIR__ . '/../database/user.class.php');

  $db = getDatabaseConnection();

  $user = User::getCustomerWithPassword($db, $_POST['email'], $_POST['password']);

  if ($user) {
    $session->setId($customer->id);
    $session->setName($customer->name());
    $session->addMessage('success', 'Login successful!');
  } else {
    $session->addMessage('error', 'Wrong password!');
  }

  header('Location: ' . $_SERVER['HTTP_REFERER']);
?>