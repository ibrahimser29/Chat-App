<?php 
session_start();
include_once "../connect.php";
$userid=  $_SESSION['user_id'];
$recid =  $_POST['reciever'];
$messages = $con->query("SELECT * FROM messages WHERE (sender = '{$userid}' && reciver = '{$recid}') || (sender = '{$recid}' && reciver = '{$userid}') ORDER BY sent_at");
$messages->setFetchMode(PDO::FETCH_ASSOC);
$allmsgs = $messages->fetchAll();
$output = "";
if(!empty($allmsgs)){
    for ($i=0; $i < count($allmsgs) ; $i++) {
        if($allmsgs[$i]['sender'] == $userid){ 
            $st2 =  $con->query("SELECT * from reactions WHERE message_id = '{$allmsgs[$i]['id']}'");
         $st2->setFetchMode(PDO::FETCH_ASSOC);
         $reaction = $st2->fetchAll();
         $reactdiv = "";
         if(!empty($reaction)){
             $reactdiv .= "<i class=\"fas fa-heart\"></i>";
         }
        $output .= "<div class='msg-to'>".$allmsgs[$i]['message']."</div>
        <div class='clearfix'></div>
        <div  class='msg-to-reaction'>".$reactdiv."</div>";
     }else {
        $output .= "<div class='msg-from'>";
         $st =  $con->query("SELECT * from users WHERE id = '{$recid}'");
         $st->setFetchMode(PDO::FETCH_ASSOC);
         $receiver = $st->fetchAll();
         $st2 =  $con->query("SELECT * from reactions WHERE message_id = '{$allmsgs[$i]['id']}'");
         $st2->setFetchMode(PDO::FETCH_ASSOC);
         $reaction = $st2->fetchAll();
         $reactdiv = "";
         if(!empty($reaction)){
             $reactdiv .= "<i class=\"fas fa-heart\"></i>";
         }
         $output .= "<img src='images/".$receiver[0]['image']."' alt='profile image'/>
         <p ondblclick='ReacttoMessage(".$allmsgs[$i]['id'].")'   class='msg'>".$allmsgs[$i]['message']."</p><div  class='reaction'>".$reactdiv."</div></div>";
     }

}
echo $output;
}
?>