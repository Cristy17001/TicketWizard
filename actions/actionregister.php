<?php
    declare(strict_types = 1);

    require_once('../session.php');
    $session = new Session();

    require_once('../database/connection.db.php');
    require_once('../database/User.class.php');
    require_once('../templates/errorPage.php');


// User input validation
    $name = htmlspecialchars(filter_var($_POST['name'], FILTER_SANITIZE_STRING), ENT_QUOTES, 'UTF-8');
    $email = htmlspecialchars(filter_var($_POST['email'], FILTER_SANITIZE_EMAIL), ENT_QUOTES, 'UTF-8');
    $username = htmlspecialchars(filter_var($_POST['username'], FILTER_SANITIZE_STRING), ENT_QUOTES, 'UTF-8');
    $pwd = password_hash($_POST['password'],PASSWORD_DEFAULT);
    $image = "../source/avatar.jpg";

    $db = getDatabaseConnection();
    $User= new User(null, $username, $pwd, $email, $name,$image);


    if(!$User->isThereUser($db)){
        $User->register_save($db);
        header('Location: ../pages/login.php');
    }
    else if ($User->isThereUser($db) == 1) {
        drawErrorPage("Error: Username already registered!");
    }
    else if ($User->isThereUser($db) == 2) {
        drawErrorPage("Error: Email already registered!");
    }
