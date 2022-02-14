<?php
session_start();
if(!isset($_SESSION['user_id'])){
    header("location:index.php");
}else{
    $userid = $_SESSION['user_id'];
    include_once "connect.php";
    $stmt = $con->query("SELECT * FROM users WHERE id='{$userid}'");
     $stmt->setFetchMode(PDO::FETCH_ASSOC);
     $user = $stmt->fetchAll();
        $stmt2 = $con->query("SELECT * FROM users WHERE id !='{$userid}'");
    $stmt2->setFetchMode(PDO::FETCH_ASSOC);
    $users = $stmt2->fetchAll();
     
    
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css?v=<?php echo time(); ?>"/>
    <title>Chats</title>
</head>
<body>
    <div class="chats-container">
        <div id="mchats" class="chats">
            <div class="search">
        <div class="contact me">
        <img id="profile" src="images/<?php echo $user[0]['image'] ?>" alt="profile image"/>
            <div class="contact-info">
                    <h5>You</h5>
                    <p>Active now</p>
                    <div class="active-now"></div>
            </div>
        </div>
            
            <button onclick="logout('<?php echo $userid ?>')">logout</button>
            </div>
            <div class="chats-bar">
               <h4>Chats</h4> 
               <i class="fas fa-ellipsis-h"></i>
            </div>
            
            <div class="search-history">
            <?php
                for ($i=0; $i < count($users); $i++) {  ?>
                    <img src="images/<?php echo $users[$i]['image'] ?>" alt="profile image"/>
               <?php } ?>
            <i class="fas fa-plus-circle add-contact"></i>
            </div>
            <input id="search_user" onkeyup="search_for_user('<?php echo $userid ?>')" type="search" placeholder="search" value="<?php 
            if(isset($_GET['query'])){
                echo $_GET['query'];
            } else{
                echo  '';
            }
            ?>"/>
            <div id="contacts" class="contacts">
                <h4>Suggestions</h4>
            </div>
        </div>
        <div id="mchat" class="chat">
            <?php if(!isset($_GET['userid'])){ ?>
                    <h1>Select user to Chat</h1>
          <?php  }else{
              $recid = $_GET['userid'];;
               $chat_stmt =  $con->query("SELECT * FROM users WHERE id = '{$recid}'");
               $chat_stmt->setFetchMode(PDO::FETCH_ASSOC);
               $receiver = $chat_stmt->fetchAll();
              ?>
              <script>
                  if(window.screen.width <= 600){
                      document.getElementById("mchats").style.display = "none";
                      document.getElementById("mchat").style.display = "block";
                  }
              </script>
              <input id="recid" class="hidden" type="text" value="<?php echo $_GET['userid'] ?>"/>
            <div class="chat-header"/>
            <div class="contact">
                <img src="images/<?php echo $receiver[0]['image']; ?>" alt="profile image"/>
                <div class="contact-info">
                    <div class="date">
                    <h5><?php echo $receiver[0]['fname']." ".$receiver[0]['lname']; ?></h5>
                    </div>
                    <p>Active now</p>
                </div>
            </div>
            
             </div>
             <div id="conve" class="conv">
                
                
            </div>
            <div class="send-msg">
                <input id="sendmessage" type="text" placeholder="send message"/>
                <i onclick="sendMessage()" class="fas fa-play"></i>
            </div>
        </div>
         <?php } ?>
          
    </div>
    <script src="js/contacts.js"></script>
    <script src="js/chats.js"></script>
    <script src="js/messages.js"></script>
</body>
</html>