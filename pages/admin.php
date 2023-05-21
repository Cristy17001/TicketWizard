<?php
    declare(strict_types=1);

    require_once('../session.php');
    $session = new Session();

    if (!$session->isLoggedIn()) die(header('Location: /'));

    require_once('../database/connection.db.php');
    require_once('../database/User.class.php');

    require_once('../templates/common.php');
    require_once('../templates/nav.tpl.php');
    require_once('../templates/adminPage.php');

    $db = getDatabaseConnection();

    $user = User::getUser($db, $session->getId());
    $selected = htmlspecialchars(filter_var($_POST['data'], FILTER_SANITIZE_STRING), ENT_QUOTES);

    if ($user->whatPermission($db) !='Agent' && $user->whatPermission($db) != 'Admin') {
        drawErrorPage("Error 403: No Permission!");
    } else {
        if ($selected) {
            drawAdminTables($db, $selected);
        }
        else {
            drawHeader($user->whatPermission($db), 'admin', $db);
            drawNav($user, $db,'admin');
            drawAdminTables($db, "");
        }
    }
