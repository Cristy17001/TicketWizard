<?php declare(strict_types=1); ?>


<?php function drawHeader(String $permission, String $page, $db) { ?>
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>TicketWizard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/constants.css">
    <link rel="stylesheet" href="../style/navigation.css">
    <link rel="icon" href="../source/icon.png">

    <?php if ($page == 'admin') {echo '<link rel="stylesheet" href="../style/admin.css">';} ?>
    <?php if ($page == 'client' || $page == 'agent') {echo '<link rel="stylesheet" href="../style/ticket.css">';} ?>
    <?php if ($page == 'client') {echo '<link rel="stylesheet" href="../style/create_ticket.css">';} ?>
    <?php if ($page == 'client') {echo '<link rel="stylesheet" href="../style/open_ticket.css">';} ?>
    <?php if ($page == 'agent') {echo '<link rel="stylesheet" href="../style/Agent.css">';} ?>
    <?php if ($page == 'agent') {echo '<link rel="stylesheet" href="../style/edit_ticket.css">';} ?>
    <?php if ($page == 'profile') {echo '<link rel="stylesheet" href="../style/profile.css">';} ?>
    <?php if ($page == 'faq') {echo '<link rel="stylesheet" href="../style/faq.css">';} ?>
    <?php if ($page == 'about') {echo '<link rel="stylesheet" href="../style/About.css">';} ?>
    <?php if ($page == 'client' || $page == 'agent') {echo '<script src="../scripts/rotateTicket.js"></script>';} ?>
    <?php if ($page == 'client' || $page == 'agent') {echo '<script src="../scripts/openTicket.js"></script>';} ?>
    <?php if ($page == 'client') {echo '<script src="../scripts/addTicket.js"></script>';} ?>
    <?php if ($page == 'faq' && ($permission == 'Agent' || $permission == 'Admin')) {echo '<script src="../scripts/copyFaq.js"></script>';} ?>
    <?php if ($page == 'faq') {echo '<script src="../scripts/highlightFaq.js"></script>';} ?>
    <?php if ($page == 'faq') {echo '<script src="../scripts/removeFaq.js"></script>';} ?>
    <?php if ($page == 'client' || $page == 'agent') {echo '<script src="../scripts/filter.js"></script>';} ?>
    <?php if ($page == 'profile') {echo '<script src="../scripts/uploadImage.js"></script>';} ?>

    <?php if ($page == 'admin') {echo '<script src="../scripts/filterAdmin.js"></script>';} ?>
    <?php if ($page == 'admin') {echo '<script src="../scripts/promoteDemoteBan.js"></script>';} ?>
    <?php if ($page == 'admin') {echo '<script src="../scripts/departManipulation.js"></script>';} ?>
    <?php if ($page == 'admin') {echo '<script src="../scripts/departAssignment.js"></script>';} ?>

</head>
<body>
<header>
    <div class="logo">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" xml:space="preserve">
                <path d="M61.34,61.51c2.46-1.36,4.63-2.39,6.76-3.19l-0.11-0.69c-0.53-0.08-2.28-0.34-6.65-0.67V61.51z"/>
            <path d="M35.22,37.04c0.27,0.34,0.38,0.38,0.38,0.38c0.18-0.21,0.21-1.93,0.22-3.08l0.01-0.58c0.04-2.52,1.77-4.58,2.8-4.99  l1.05-2.74c0.06-0.15,0.24-0.23,0.4-0.17c0.16,0.06,0.23,0.24,0.17,0.4l-1.02,2.59c0.28,0.35,0.33,1.21,0.4,3.43  c0.08,2.42,0.19,5.74,1.02,7.3c1.48,2.75,1.75,4.29-0.46,6.71c-1.42,1.56-1.25,2.27-0.84,3.94c0.15,0.56,0.29,1.19,0.42,1.98  c0.4,2.31-3.37,4.16-6.16,5.19c6.63-0.65,18.19-1.62,24.37-1.25c5.81,0.35,8.47,0.65,9.61,0.81c-1.36-1.94-6.06-8.71-12.86-18.8  C46.55,26,42.36,24.26,39.07,23.6c-3.72-0.76-5.39,4.19-5.95,6.35c-0.81,3.2,0.75,5.28,1.89,6.81L35.22,37.04z"/><path d="M32.72,73.29c2.04-0.18,3.99-0.48,5.95-0.95c0,0,0,0,0.01,0c7.04-1.64,12.46-4.86,17.71-7.97c1.12-0.67,2.27-1.35,3.42-2  c-6.62,0.22-13.26,0.74-19.75,1.59c-2.88,0.38-5.78,0.81-8.63,1.3c-0.01,0.01-0.04,0.01-0.05,0.01c-0.07,0-0.13-0.02-0.18-0.07  c-0.07-0.05-0.11-0.12-0.12-0.21l-0.13-1.53l-7.2-1.08c-4.58-0.69-9.17-1.39-13.74-2.08c0.53,3.3,1.79,6.04,3.73,8.16  C19.22,74.43,28.69,73.63,32.72,73.29z"/><path d="M39.98,63.36c6.81-0.9,13.79-1.44,20.75-1.64v-4.8c-0.84-0.06-1.76-0.12-2.79-0.18c-7.01-0.44-21.05,0.9-26.76,1.5h-0.1  l0.56,6.35C34.4,64.14,37.2,63.71,39.98,63.36z"/><path d="M56.71,64.89c-5.04,2.99-10.24,6.08-16.88,7.79c11.61,3.87,27.52,6.61,39.41-1.18c5.18-3.38,11.91-9.95,10.59-12.97  c-0.61-1.37-3.47-2.11-8.08-2.11h-0.29c-4.52,0.02-8.75,0.8-12.91,2.36c-2.31,0.85-4.65,1.96-7.37,3.48  C59.68,63.12,58.16,64.02,56.71,64.89z"/>
            </svg>
        <h1 class="unselectable">TicketWizard</h1>
    </div>
    <?php
    if(($permission=='Client' || $permission=='Agent' || $permission == 'Admin') && $page=='client' ){ ?>
        <button class="add-btn">
            <svg width="50" height="50" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" fill="none">
                <path fill="#000000" fill-rule="evenodd"
                      d="M9 17a1 1 0 102 0v-6h6a1 1 0 100-2h-6V3a1 1 0 10-2 0v6H3a1 1 0 000 2h6v6z"/>
            </svg>
        </button>
        <dialog data-modal class="create-card">
            <form class="add-form" action="../actions/actioncreateticket.php" method="post">
                <label for="title">Title:</label>
                <input name="title" id="title" type="text" placeholder="Enter a title...">
                <label for="description">Description:</label>
                <textarea name="description" id="description" placeholder="Enter a Description..."></textarea>
                <label for="optional">Optional:</label>
                <select name="optional" id="optional">
                    <option value="" disabled selected>Select Department</option>
                    <?php require_once('../database/Department.class.php'); $departments=getDepartments($db); foreach($departments as $department){ ?>
                        <option><?php echo $department['name'] ?></option>
                    <?php } ?>
                </select>
                <button>Add</button>
            </form>
        </dialog>
    <?php } ?>
</header>
<?php } ?>


