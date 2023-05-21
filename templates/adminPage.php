<?php declare(strict_types=1);?>

<?php
function drawAdminTables($db, $selected) {
    ?>
    <div class="main-content">
        <?php if ($selected == "") { ?>
            <form class="filter">
                <label for="Modification"></label>
                <select class="form-filter" id="Modification" name="Modification">
                    <option value="">Options</option>
                    <option>Users Promotion</option>
                    <option>Data Manipulation</option>
                    <option>Department Assignment</option>
                    <option>All</option>
                </select>
            </form>
        <?php } ?>

        <div class="table-container">
            <?php if ($selected == "All" || $selected == "Users Promotion") {
                drawUserPromotion($db);
            }
            if ($selected == "All" || $selected == "Data Manipulation") {
                drawDataManipulation($db);
            }
            if ($selected == "All" || $selected == "Department Assignment") {
                drawDepartAssign($db);
            }
            ?>
        </div>
    </div>
<?php } ?>

<?php function drawUserPromotion($db) { ?>
    <h1 class="user-table-title">User Promotion Table:</h1>
    <table class="user-promotions">
        <tr>
            <th>Id</th>
            <th>Username</th>
            <th>FullName</th>
            <th>Email</th>
            <th>Permission</th>
            <th>Promote</th>
            <th>Demote</th>
            <th>Ban</th>
        </tr>
        <?php foreach(getUsers($db) as $user) { ?>
            <tr>
                <td><?=htmlspecialchars(strval($user['id']), ENT_QUOTES) ?></td>
                <td><?=htmlspecialchars($user['username'], ENT_QUOTES) ?></td>
                <td><?=htmlspecialchars($user['full_name'], ENT_QUOTES) ?></td>
                <td><?=htmlspecialchars($user['email'], ENT_QUOTES) ?></td>
                <td>
                    <?php
                    require_once('../database/User.class.php');
                    $user_instance = new User($user['id'], $user['username'], "dasdadsa", $user['email'], $user['full_name'], $user['image']);
                    echo $user_instance->whatPermission($db);
                    ?>
                </td>
                <td><button class="promote-btn" onclick="promote_user(<?=htmlspecialchars(strval($user['id']), ENT_QUOTES) ?>)">Promote</button></td>
                <td><button class="demote-btn" onclick="demote_user(<?=htmlspecialchars(strval($user['id']), ENT_QUOTES) ?>)">Demote</button></td>
                <td><button class="ban-btn" onclick="ban_user(<?=htmlspecialchars(strval($user['id']), ENT_QUOTES) ?>)">Ban</button></td>
            </tr>
        <?php } ?>
    </table>
<?php } ?>

<?php function drawDataManipulation($db) { ?>
    <h1 class="department-table-title">Department Manipulation Table:</h1>
    <div class="department-container">
        <table class="department-manipulation">
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Remove</th>
            </tr>

            <?php
            require_once('../database/Department.class.php');
            foreach(getDepartments($db) as $department) { ?>
                <tr>
                    <td><?=htmlspecialchars(strval($department['id']), ENT_QUOTES) ?></td>
                    <td><?=htmlspecialchars($department['name'], ENT_QUOTES) ?></td>
                    <td><button class="remove-btn" onclick="removeDepartment(<?=htmlspecialchars(strval($department['id']), ENT_QUOTES) ?>)">
                            <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M17.5 12.5V21.25M12.5 12.5V21.25M7.5 7.5V22.25C7.5 23.6501 7.5 24.3498 7.77249 24.8845C8.01216 25.3549 8.39434 25.7381 8.86475 25.9777C9.399 26.25 10.0987 26.25 11.4961 26.25H18.5039C19.9012 26.25 20.6 26.25 21.1343 25.9777C21.6046 25.7381 21.9881 25.3549 22.2277 24.8845C22.5 24.3503 22.5 23.6513 22.5 22.2539V7.5M7.5 7.5H10M7.5 7.5H5M22.5 7.5H20M22.5 7.5H25M10 7.5H20M10 7.5C10 6.33515 10 5.75301 10.1903 5.29357C10.444 4.68101 10.9304 4.19404 11.543 3.9403C12.0024 3.75 12.5851 3.75 13.75 3.75H16.25C17.4149 3.75 17.9972 3.75 18.4567 3.9403C19.0692 4.19404 19.5559 4.68101 19.8096 5.29357C19.9999 5.753 20 6.33515 20 7.5" stroke="#001AFF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </button>
                    </td>
                </tr>
            <?php } ?>

        </table>
        <form class="add-department" action="../adminActions/actionAddDepart.php" method="post">
            <label for="add-department-input">Add Department:</label>
            <input type="text" id="add-department-input" name="add-department-input"
                   placeholder="Enter a department...">
            <button type="submit">ADD</button>
        </form>
    </div>
    <h1 class="status-table-title">Status Manipulation Table:</h1>
    <div class="status-container">
        <table class="status-manipulation">
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Remove</th>
            </tr>
            <?php
            require_once('../database/Ticket.class.php');
            foreach(getStates($db) as $status) { ?>
                <tr>
                    <td><?=htmlspecialchars(strval($status['id']), ENT_QUOTES) ?></td>
                    <td><?=htmlspecialchars($status['name'], ENT_QUOTES) ?></td>
                    <td><button class="remove-btn" onclick="removeStatus(<?=htmlspecialchars(strval($status['id']), ENT_QUOTES) ?>)">
                            <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M17.5 12.5V21.25M12.5 12.5V21.25M7.5 7.5V22.25C7.5 23.6501 7.5 24.3498 7.77249 24.8845C8.01216 25.3549 8.39434 25.7381 8.86475 25.9777C9.399 26.25 10.0987 26.25 11.4961 26.25H18.5039C19.9012 26.25 20.6 26.25 21.1343 25.9777C21.6046 25.7381 21.9881 25.3549 22.2277 24.8845C22.5 24.3503 22.5 23.6513 22.5 22.2539V7.5M7.5 7.5H10M7.5 7.5H5M22.5 7.5H20M22.5 7.5H25M10 7.5H20M10 7.5C10 6.33515 10 5.75301 10.1903 5.29357C10.444 4.68101 10.9304 4.19404 11.543 3.9403C12.0024 3.75 12.5851 3.75 13.75 3.75H16.25C17.4149 3.75 17.9972 3.75 18.4567 3.9403C19.0692 4.19404 19.5559 4.68101 19.8096 5.29357C19.9999 5.753 20 6.33515 20 7.5" stroke="#001AFF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </button>
                    </td>
                </tr>
            <?php } ?>
        </table>
        <form class="add-status" action="../adminActions/actionAddStatus.php" method="post">
            <label for="add-status-input">Add Status:</label>
            <input type="text" id="add-status-input" name="add-status-input"
                   placeholder="Enter a status...">
            <button type="submit">ADD</button>
        </form>
    </div>
    <h1 class="hashtags-table-title">Hashtags Manipulation Table:</h1>
    <div class="hashtags-container">
        <table class="hashtags-manipulation">
            <tr>
                <th>Id</th>
                <th>Hashtag</th>
                <th>Remove</th>
            </tr>
            <?php
            require_once('../database/Ticket.class.php');
            foreach(getHashtags($db) as $hashtag) { ?>
                <tr>
                    <td><?=htmlspecialchars(strval($hashtag['id'])) ?></td>
                    <td><?=htmlspecialchars($hashtag['name'], ENT_QUOTES) ?></td>
                    <td><button class="remove-btn" onclick="removeHashtag(<?=htmlspecialchars(strval($hashtag['id']), ENT_QUOTES) ?>)">
                            <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M17.5 12.5V21.25M12.5 12.5V21.25M7.5 7.5V22.25C7.5 23.6501 7.5 24.3498 7.77249 24.8845C8.01216 25.3549 8.39434 25.7381 8.86475 25.9777C9.399 26.25 10.0987 26.25 11.4961 26.25H18.5039C19.9012 26.25 20.6 26.25 21.1343 25.9777C21.6046 25.7381 21.9881 25.3549 22.2277 24.8845C22.5 24.3503 22.5 23.6513 22.5 22.2539V7.5M7.5 7.5H10M7.5 7.5H5M22.5 7.5H20M22.5 7.5H25M10 7.5H20M10 7.5C10 6.33515 10 5.75301 10.1903 5.29357C10.444 4.68101 10.9304 4.19404 11.543 3.9403C12.0024 3.75 12.5851 3.75 13.75 3.75H16.25C17.4149 3.75 17.9972 3.75 18.4567 3.9403C19.0692 4.19404 19.5559 4.68101 19.8096 5.29357C19.9999 5.753 20 6.33515 20 7.5" stroke="#001AFF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </button>
                    </td>
                </tr>
            <?php } ?>
        </table>
        <form class="add-hashtags">
            <label for="add-hashtags-input">Add Hashtag:</label>
            <input type="text" id="add-hashtags-input" name="add-hashtags-input"
                   placeholder="Enter a hashtag...">
            <button type="submit">ADD</button>
        </form>
    </div>
<?php } ?>

<?php function drawDepartAssign($db) { ?>
    <h1 class="depart-assign-title">Department Assignment table:</h1>
    <table class="depart-assign">
        <tr>
            <th>Id</th>
            <th>Username</th>
            <th>FullName</th>
            <th>Email</th>
            <th>Department</th>

        </tr>

        <?php
        foreach(getUsers($db) as $user) { ?>
            <tr>
                <td><?= htmlspecialchars(strval($user['id']),ENT_QUOTES) ?></td>
                <td><?= htmlspecialchars($user['username'],ENT_QUOTES) ?></td>
                <td><?= htmlspecialchars($user['full_name'], ENT_QUOTES) ?></td>
                <td><?= htmlspecialchars($user['email'], ENT_QUOTES) ?></td>
                <td>
                    <label>
                        <select class = "department-select" name = "Modification">
                            <option value="">Department</option>
                            <?php
                            require_once('../database/Department.class.php');
                            foreach(getDepartments($db) as $department) { ?>
                                <option><?= htmlspecialchars($department['name'], ENT_QUOTES) ?></option>
                            <?php } ?>
                        </select>
                    </label>
                </td>
            </tr>
        <?php } ?>
    </table>
<?php } ?>
