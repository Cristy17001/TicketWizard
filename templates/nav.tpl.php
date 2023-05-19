<?php
declare(strict_types=1);
?>

<?php function drawNav(User $user, $db, String $selected){ ?>
    <main>
        <nav class="nav-bar">
            <ul>
                <?php if($user->whatPermission($db)=='Client' || $user->whatPermission($db)== 'Agent') drawNavClient($selected);?>
                <?php if($user->whatPermission($db)=='Agent' || $user->whatPermission($db)=='Admin') drawNavAgent($selected); ?>
                <!-- //Admin -->
                <li class="nav-item unselectable" selected="false">
                    <a href="#">
                        <div class="option-container">
                            <svg width="50" height="50" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g id="Iconly/Curved/Profile">
                                    <g id="Profile">
                                        <path id="Stroke 1" fill-rule="evenodd" clip-rule="evenodd" d="M11.8445 21.6618C8.15273 21.6618 5 21.0873 5 18.7865C5 16.4858 8.13273 14.3618 11.8445 14.3618C15.5364 14.3618 18.6891 16.4652 18.6891 18.766C18.6891 21.0658 15.5564 21.6618 11.8445 21.6618Z" />
                                        <path id="Stroke 3" fill-rule="evenodd" clip-rule="evenodd" d="M11.8372 11.1735C14.26 11.1735 16.2236 9.2099 16.2236 6.78718C16.2236 4.36445 14.26 2.3999 11.8372 2.3999C9.41452 2.3999 7.44998 4.36445 7.44998 6.78718C7.4418 9.20172 9.3918 11.1654 11.8063 11.1735C11.8172 11.1735 11.8272 11.1735 11.8372 11.1735Z"/>
                                    </g>
                                </g>
                            </svg>
                            <p>Profile</p>
                        </div>
                    </a>
                </li>
                <?php if($user->whatPermission($db)=='Agent' || $user->whatPermission($db)=='Admin' || $user->whatPermission($db)== 'Client') drawNavFaq($selected); ?>

                <li class="nav-item unselectable" selected="false">
                    <a href="#">
                        <div class="option-container">
                            <svg width="50" height="50" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg">
                                <title>about-filled</title>
                                <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <g id="drop" fill="#000000" transform="translate(42.666667, 42.666667)">
                                        <path d="M213.333333,3.55271368e-14 C331.154987,3.55271368e-14 426.666667,95.51168 426.666667,213.333333 C426.666667,331.153707 331.154987,426.666667 213.333333,426.666667 C95.51296,426.666667 3.55271368e-14,331.153707 3.55271368e-14,213.333333 C3.55271368e-14,95.51168 95.51296,3.55271368e-14 213.333333,3.55271368e-14 Z M234.713387,192 L192.04672,192 L192.04672,320 L234.713387,320 L234.713387,192 Z M213.55008,101.333333 C197.99616,101.333333 186.713387,112.5536 186.713387,127.704107 C186.713387,143.46752 197.698773,154.666667 213.55008,154.666667 C228.785067,154.666667 240.04672,143.46752 240.04672,128 C240.04672,112.5536 228.785067,101.333333 213.55008,101.333333 Z" id="Shape">

                                        </path>
                                    </g>
                                </g>
                            </svg>
                            <p>About</p>
                        </div>
                    </a>
                </li>
            </ul>
            <div class="user-info unselectable">
                <div class="square">
                    <img src="../source/avatar.jpg" alt="user_image">
                </div>
                <div>
                    <p class="name"><?php echo $user->fullName?></p>
                    <p class="role"><?php echo $user->whatPermission($db) ?></p>
                </div>
                <a href='../actions/actionlogout.php'>
                    <svg class="log-out" fill="#000000" width="50" height="50" viewBox="0 0 24 24"
                         xmlns="http://www.w3.org/2000/svg"><path d="M16 13v-2H7V8l-5 4 5 4v-3z"/><path d="M20 3h-9c-1.103 0-2 .897-2 2v4h2V5h9v14h-9v-4H9v4c0 1.103.897 2 2 2h9c1.103 0 2-.897 2-2V5c0-1.103-.897-2-2-2z"/></svg>
                </a>
            </div>
        </nav>
<?php } ?>

<?php function drawNavClient(String $selected){ ?>
    <?php $selectedBool='false'; if($selected=='client') $selectedBool='true'; ?>
    <li class="nav-item unselectable" selected = <?php echo $selectedBool ?>>
        <a href='../pages/client.php''>
            <div class="option-container">
                <svg xmlns="http://www.w3.org/2000/svg" fill="#000000" width="50px" height="50px"
                     viewBox="0 0 16 16"><path d="M8 .5A7.77 7.77 0 0 0 0 8a7.77 7.77 0 0 0 8 7.5A7.77 7.77 0 0 0 16 8 7.77 7.77 0 0 0 8 .5zM5.16 13.67A2.84 2.84 0 0 1 8 11.51a2.82 2.82 0 0 1 2.84 2.16 7.24 7.24 0 0 1-5.68 0zm6.84-.61a4.09 4.09 0 0 0-4-2.77 4.09 4.09 0 0 0-3.95 2.78A6.14 6.14 0 0 1 1.25 8 6.52 6.52 0 0 1 8 1.75 6.52 6.52 0 0 1 14.75 8 6.11 6.11 0 0 1 12 13.06z"/><path d="M8.05 4.3A2.33 2.33 0 0 0 5.8 6.7a2.33 2.33 0 0 0 2.25 2.4 2.33 2.33 0 0 0 2.25-2.4 2.33 2.33 0 0 0-2.25-2.4zm0 3.55a1.08 1.08 0 0 1-1-1.15 1.08 1.08 0 0 1 1-1.15 1.08 1.08 0 0 1 1 1.15 1.08 1.08 0 0 1-1 1.15z"/>
                </svg>
                <p>Client</p>
            </div>
        </a>
    </li>
<?php } ?>

<?php function drawNavAgent(String $selected){ ?>
    <?php $selectedBool='false'; if($selected=='agent') $selectedBool='true'; ?>
    <li class="nav-item unselectable" selected =<?php echo $selectedBool ?>>
        <a href='../pages/agent.php'>
            <div class="option-container">
                <svg width="54" height="54" viewBox="0 0 54 54" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M47.625 21C49.5171 22.0895 51.0512 23.7061 52.0404 25.6525C53.0295 27.599 53.4309 29.7912 53.1955 31.9618C52.9602 34.1325 52.0983 36.1877 50.715 37.8769C49.3316 39.5661 47.4866 40.8163 45.405 41.475C44.6693 44.8137 42.8154 47.801 40.1504 49.9423C37.4853 52.0837 34.1688 53.2506 30.75 53.25H25.125C24.6277 53.25 24.1508 53.0525 23.7992 52.7008C23.4476 52.3492 23.25 51.8723 23.25 51.375C23.25 50.8777 23.4476 50.4008 23.7992 50.0492C24.1508 49.6975 24.6277 49.5 25.125 49.5H30.75C33.0773 49.5007 35.3476 48.7798 37.2482 47.4366C39.1488 46.0934 40.5862 44.194 41.3625 42H40.125C39.6277 42 39.1508 41.8025 38.7992 41.4508C38.4476 41.0992 38.25 40.6223 38.25 40.125V21.375C38.25 20.8777 38.4476 20.4008 38.7992 20.0492C39.1508 19.6975 39.6277 19.5 40.125 19.5H42C42.6075 19.5 43.2038 19.5488 43.7888 19.6425C43.3666 15.4833 41.4157 11.6289 38.314 8.82608C35.2122 6.02322 31.1805 4.47147 27 4.47147C22.8195 4.47147 18.7878 6.02322 15.6861 8.82608C12.5843 11.6289 10.6334 15.4833 10.2113 19.6425C10.8028 19.5478 11.4009 19.5001 12 19.5H13.875C14.3723 19.5 14.8492 19.6975 15.2008 20.0492C15.5525 20.4008 15.75 20.8777 15.75 21.375V40.125C15.75 40.6223 15.5525 41.0992 15.2008 41.4508C14.8492 41.8025 14.3723 42 13.875 42H12C9.5212 42.0028 7.11087 41.1867 5.14351 39.6787C3.17616 38.1708 1.76194 36.0552 1.12058 33.6608C0.479216 31.2664 0.646628 28.7272 1.5968 26.4377C2.54697 24.1482 4.22671 22.2367 6.37502 21C6.37502 15.5299 8.548 10.2839 12.4159 6.41592C16.2839 2.54798 21.5299 0.375 27 0.375C32.4701 0.375 37.7162 2.54798 41.5841 6.41592C45.452 10.2839 47.625 15.5299 47.625 21ZM12 23.25C10.0109 23.25 8.10324 24.0402 6.69672 25.4467C5.29019 26.8532 4.50002 28.7609 4.50002 30.75C4.50002 32.7391 5.29019 34.6468 6.69672 36.0533C8.10324 37.4598 10.0109 38.25 12 38.25V23.25ZM49.5 30.75C49.5 28.7609 48.7098 26.8532 47.3033 25.4467C45.8968 24.0402 43.9891 23.25 42 23.25V38.25C43.9891 38.25 45.8968 37.4598 47.3033 36.0533C48.7098 34.6468 49.5 32.7391 49.5 30.75Z" fill="white"/>
                </svg>
                <p>Agent</p>
            </div>
        </a>
    </li>
<?php } ?>
<?php function drawNavFaq(String $selected){ ?>
    <?php $selectedBool='false'; if($selected=='faq') $selectedBool='true'; ?>
    <li class="nav-item unselectable" selected =<?php echo $selectedBool ?>>
        <a href='../pages/faq.php'>
            <div class="option-container">
                <svg fill="#000000" width="50" height="50" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M12,22A10,10,0,1,0,2,12,10,10,0,0,0,12,22Zm0-2a1.5,1.5,0,1,1,1.5-1.5A1.5,1.5,0,0,1,12,20ZM8,8.994a3.907,3.907,0,0,1,2.319-3.645,4.061,4.061,0,0,1,3.889.316,4,4,0,0,1,.294,6.456,3.972,3.972,0,0,0-1.411,2.114,1,1,0,0,1-1.944-.47,5.908,5.908,0,0,1,2.1-3.2,2,2,0,0,0-.146-3.23,2.06,2.06,0,0,0-2.006-.14,1.937,1.937,0,0,0-1.1,1.8A1,1,0,0,1,8,9Z"/></svg>
                <p>FAQ</p>
            </div>
        </a>
    </li>
<?php } ?>
