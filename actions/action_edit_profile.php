<?php
  declare(strict_types = 1);

  echo "break";

  require_once('../session.php');
  $session = new Session();

  if (!$session->isLoggedIn()) die(header('Location: /'));

  require_once('../database/connection.db.php');
  require_once('../database/User.class.php');

  $db = getDatabaseConnection();

  $user = User::getUser($db, $session->getId());

  if ($user) {
    $user->fullName = $_POST['name'];
    echo "check";
    $user->save($db);
    echo "check2";
    $session->setName($user->fullName);
    echo "check3";

  }

  header('Location: ../Client_pages/Profile_page/profile.php');
?>