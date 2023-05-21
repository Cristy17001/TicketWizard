<?php declare(strict_types=1);?>

<?php function drawAgentTickets($user,$tickets, $db){ ?>
    <div class="main-content">
        <form class="filter" method="post" action="../pages/agent.php">   
                <label for="State"></label>
                <select class="form-filter" id="State" name="State" col-index=1 >
                    <option value="" >State</option>
                    <?php $status=getStates($db); foreach($status as $state){ ?>
                    <option><?php echo $state['name'] ?></option>
                     <?php } ?>
                </select>
                <label for="Department"></label>
                <select class="form-filter" id="Department" name="Department" col-index=2 >
                    <option value="">Department</option>
                    <?php require_once('../database/Department.class.php'); $departments=getDepartments($db); foreach($departments as $department){ ?>
                    <option><?php echo $department['name'] ?></option>
                     <?php } ?>
                </select>
                <label for="Hashtags"></label>
                <select id="Hashtags" name="Hashtags" col-index=3 >
                    <option value="">Hashtags</option>
                    <?php   $hashtags=getHashtags($db); foreach($hashtags as $hashtag){ ?>
                    <option><?=$hashtag['name'] ?></option>
                     <?php } ?>
                </select>
                <label for="Sort"></label>
                <input type="submit" value="Filter">
            </form>
            <button id="Sort">Sort by date</button>
            <div class="tickets-container">
            <?php foreach($tickets as $ticket) { ?>
                <div id="ticket" class="ticket unselectable" state="<?=$ticket['status'] ?>">
                    <div class="innerCard transition"  ticket_id = <?=$ticket['id'] ?>>
                        <div class="frontSide">
                            <p class="state"><?= $ticket['status']?></p>
                            <h2 class="title"><?=$ticket['title'] ?></h2>
                            <p class="description"><?=$ticket['description'] ?> </p>
                            <p class="hashtags">#informatics #something</p>
                            <p class="created"><?=$ticket['created_at'] ?></p>
                        </div>
                        <div class="backSide">
                            <h2><?=$ticket['status'] ?></h2>
                            <p class="department"><span>Department: </span><?=$ticket['department'] ?></p>
                            <p class="agent"><span>Agent:</span><?php if(is_null($ticket['user_assigned_id'])){ echo ' Undefined';} else { $agentName=User::getUser($db,$ticket['user_assigned_id']); echo $agentName->username; }?> </p> 
                            <div class="circle">
                                <img src="https://images.unsplash.com/photo-1547425260-76bcadfb4f2c?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&50=format&fit=crop&w=1170&q=80" alt="agent image">
                            </div>
                            <p class="date"><?php if($ticket['updated_at']!='') { echo 'Updated at, ' . $ticket['updated_at']; }?></p>
                        </div>
                    </div>
                </div>
                <dialog data-modal id=<?= "Ticket".$ticket['id'] ?> class="opened-ticket" ticket_id =<?=$ticket['id']?>>
                    <div class="edit-ticket-card" >
                        <svg class="close" xmlns="http://www.w3.org/2000/svg" width="800px" height="800px" viewBox="0 0 1024 1024"><path
                                fill="#000000" d="M764.288 214.592 512 466.88 259.712 214.592a31.936 31.936 0 0 0-45.12 45.12L466.752 512 214.528 764.224a31.936 31.936 0 1 0 45.12 45.184L512 557.184l252.288 252.288a31.936 31.936 0 0 0 45.12-45.12L557.12 512.064l252.288-252.352a31.936 31.936 0 1 0-45.12-45.184z"/>
                        </svg>
                        <div class="top">
                            <h1><?=$ticket['title']?></h1>
                            <p><?=$ticket['status']?></p>
                        </div>
                        <p class="description"><?=$ticket['description']?>
                        </p>
                        <form class="edit-ticket-form" method="post" action="../actions/actionUpdateTicket.php">
                         <input type="hidden" name="ticket_id" value="<?=$ticket['id'] ?>">
                            <label for="assigned-depart">Assigned Department:</label>
                            <select id="assigned-depart" name="department-assign">
                                <option value=""><?php if($ticket['department']!='') { echo $ticket['department']; } else { echo 'Department';}?></option>
                                <?php require_once('../database/Department.class.php'); $departments=getDepartments($db); foreach($departments as $department){ ?>
                                <option value="<?=$department['name']?>"><?=$department['name'] ?></option>
                            <?php } ?>
                            </select>
                            <label for="assigned-agent">Assigned agent:</label>
                            <select id="assigned-agent" name="agent-assign">
                                <option value=""><?php if($ticket['user_assigned_id']!='') { $agentName=User::getUser($db,$ticket['user_assigned_id']); echo $agentName->username; } else { echo 'Agent';}?></option>
                                <?php require_once('../database/User.class.php'); $agents=getAgents($db); foreach($agents as $agent){ ?>
                                <option id="agent_id" name="agent_id" value="<?=$agent['id']?>"><?=$agent['username']?></option>
                                <?php } ?>
                            </select>
                            <label for="assigned-status">Status:</label>
                            <select id="assigned-status" name="assigned-status">
                                <option value=""><?=$ticket['status'] ?></option>
                                <?php $status=getStates($db); foreach($status as $state){ ?>
                                <option value="<?=$state['name'] ?>"><?=$state['name'] ?></option>
                                <?php } ?>
                            </select>
                            <label for="add-chip">Hashtags:</label>
                            <input id="add-chip" type="text" placeholder="Enter a #...">
                            <div class="chip-container">
                                <div class="chip">#Informatics<span>X</span></div>
                                <div class="chip">#Something<span>X</span></div>
                            </div>
                            <button >Update</button>
                        </form>
                        <a href="#">Ticket History</a>
                        <h2>Chat:</h2>
                        <div class="chat">
                            <div class="chat-display">
                                <?php $messages= messageFromTicket($db,$ticket['id']); foreach($messages as $message) { if($message['user_id']==$ticket['user_id']) { ?>
                                <div class="left">
                                    <img src="../source/avatar.jpg" alt="replier image">
                                    <p><?=$message['content'] ?></p>
                                </div>
                                <?php } else { ?>
                                <div class="right">
                                    <p><?=$message['content'] ?></p>
                                    <img src="../source/agent_avatar.jpg" alt="my image">
                                </div>
                                <?php }; }?>
                            </div>
                            <?php if($user->id==$ticket['user_assigned_id']){ ?>
                            <form class="chat-response" method="post" action="../actions/actionAddMessage.php">
                                <input type="hidden" name="page" value="agent">
                                <input type="hidden" name="ticket_id" value="<?=$ticket['id']?>">
                                <input type="hidden" name="user" value="<?=$ticket['user_assigned_id']?>">
                                <label><textarea name="message" placeholder="Enter your message..."></textarea></label>
                                <button class="send-message">
                                    <svg width="30" height="30" viewBox="0 0 29 29" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M11.4165 17.5833L14.9204 25.7591C15.4026 26.8844 16.9027 27.0034 17.5039 25.9368C18.6905 23.8325 20.4493 20.4388 22.2082 16.0417C25.2915 8.33332 26.8332 2.16666 26.8332 2.16666C26.8332 2.16666 20.6665 3.70832 12.9582 6.79166C8.56107 8.55048 5.16729 10.3093 3.06295 11.4959C1.99652 12.0971 2.11541 13.5972 3.24069 14.0794L11.4165 17.5833Z" stroke="white" stroke-width="3.75" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </button>
                            </form>
                            <?php } ?>
                        </div>
                    </div>
                </dialog>
                <?php } ?>
                <script src="../scripts/orderByDate.js"></script>
                <script src="../scripts/dialogOpen.js"></script>
                </div>

    <?php } ?>