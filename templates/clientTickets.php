<?php declare(strict_types=1);?>


<?php function drawClientTickets($tickets, $db){ ?>
        <div class="main-content">
            <form class="filter">
                <label for="search"></label>
                <input id="search" type="text" placeholder="Search...">
                <label for="Department"></label>
                <select id="Department" name="Department">
                    <option  disabled selected>Department</option>
                    <?php require_once('../database/Department.class.php'); $departments=getDepartments($db); foreach($departments as $department){ ?>
                    <option><?php echo $department['name'] ?></option>
                     <?php } ?>
                </select>
                <label for="State"></label>
                <select id="State" name="State">
                    <option  disabled selected>State</option>
                    <option >Open</option>
                    <option >Closed</option>
                    <option >Assigned</option>
                </select>
                <input type="submit" value="Filter">
            </form>
            <div class="tickets-container">
            <?php foreach($tickets as $ticket) { ?>
    <div class="ticket unselectable" state="pending">
                    <div class="innerCard transition"  ticket_id =<?php echo $ticket['id'] ?>>
                        <div class="frontSide">
                            <p class="state"><?=$ticket['status'] ?> </p>
                            <h2 class="title"><?=$ticket['title'] ?></h2>
                            <p class="description"><?=$ticket['description'] ?> </p>
                            <p class="hashtags">#informatics #something</p>
                            <p class="created">Created, <?=$ticket['created_at'] ?></p>
                        </div>
                        <div class="backSide">
                            <h2>Assigned</h2>
                            <p class="agent"><span>Agent:</span><?php if($ticket['user_assigned_at']==''){ echo ' Yet to be defined';} else { echo $ticket['user_assigned_at']; }?> </p>
                            <p class="department"><span>Department: </span><?=$ticket['department'] ?></p>
                            <div class="circle">
                                <img src="https://images.unsplash.com/photo-1547425260-76bcadfb4f2c?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&50=format&fit=crop&w=1170&q=80" alt="agent image">
                            </div>
                            <p class="date"><?php if($ticket['updated_at']!='') { echo 'Updated at, ' . $ticket['updated_at']; }?></p>
                        </div>
                    </div>
                </div>
                <dialog data-modal class="opened-ticket" ticket_id =<?=$ticket['id'] ?>>
                    <svg class="close" xmlns="http://www.w3.org/2000/svg" width="800px" height="800px" viewBox="0 0 1024 1024"><path
                            fill="#000000" d="M764.288 214.592 512 466.88 259.712 214.592a31.936 31.936 0 0 0-45.12 45.12L466.752 512 214.528 764.224a31.936 31.936 0 1 0 45.12 45.184L512 557.184l252.288 252.288a31.936 31.936 0 0 0 45.12-45.12L557.12 512.064l252.288-252.352a31.936 31.936 0 1 0-45.12-45.184z"/>
                    </svg>
                    <div class="top">
                        <h1><?=$ticket['title'] ?></h1>
                        <p><?=$ticket['status'] ?></p>
                    </div>
                    <p class="description">
                    <?=$ticket['description'] ?>
                    </p>
                    <h2>Assigned Department:</h2>
                    <p><?=$ticket['department']?></p>
                    <h2>Assigned agent:</h2>
                    <p><?php if($ticket['user_assigned_at']==''){ echo ' Yet to be defined';} else { echo $ticket['user_assigned_at']; }?></p>
                    <h2>Hashtags:</h2>
                    <p>#informatics #something</p>
                    <h2>Chat:</h2>
                    <div class="chat">
                        <div class="chat-display">
                            <div class="left">
                                <img src="../source/avatar.jpg" alt="replier image">
                                <p>I really don't know how to solve this can you help me?</p>
                            </div>
                            <div class="right">
                                <p>Sure you give me a little more context, what does it say in the blue screen?</p>
                                <img src="../source/agent_avatar.jpg" alt="my image">
                            </div>
                        </div>
                        <form class="chat-response">
                            <label><textarea placeholder="Enter your message..."></textarea></label>
                            <button class="send-message">
                                <svg width="30" height="30" viewBox="0 0 29 29" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M11.4165 17.5833L14.9204 25.7591C15.4026 26.8844 16.9027 27.0034 17.5039 25.9368C18.6905 23.8325 20.4493 20.4388 22.2082 16.0417C25.2915 8.33332 26.8332 2.16666 26.8332 2.16666C26.8332 2.16666 20.6665 3.70832 12.9582 6.79166C8.56107 8.55048 5.16729 10.3093 3.06295 11.4959C1.99652 12.0971 2.11541 13.5972 3.24069 14.0794L11.4165 17.5833Z" stroke="white" stroke-width="3.75" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </button>
                        </form>
                    </div>
                </dialog>
                <?php } ?>
        </div>
    </div>
<?php } ?>
