<?php
    declare(strict_types=1);

    require_once('../session.php');
    $session = new Session();

    if (!$session->isLoggedIn()) die(header('Location: /'));

    require_once('../database/connection.db.php');
    require_once('../database/User.class.php');
    require_once('../database/FaqQuestions.class.php');


    require_once('../templates/common.php');
    require_once('../templates/nav.tpl.php');
    require_once('../templates/faqQuestions.php');


    $db = getDatabaseConnection();

    $user = User::getUser($db, $session->getId());
    $questions = getQuestions($db);

    if($user->whatPermission($db)!='Agent' && $user->whatPermission($db)!='Client' && $user->whatPermission($db)!='Admin') {
        echo 'error No Permission!';
    } else {
        drawHeader($user->whatPermission($db), 'faq', $db);
        drawNav($user, $db, 'faq');
        drawFaqQuestions($user, $questions, $db);
    }