<?php 
session_start();
$id = $_SESSION['user_id'];
include_once "../connect.php";

$query = "SELECT * FROM users WHERE id != ? ";
         $params = array($id);
         $stmt2 = $con->prepare($query);
         $stmt2->execute($params);
        $stmt2->setFetchMode(PDO::FETCH_ASSOC);
        $s = $stmt2->fetchAll();
       
    if(count($s) > 0){
        for ($i=0; $i < count($s); $i++) {
            $query2 = "SELECT * FROM messages WHERE (sender = :sender && reciver = :reciver ) || (sender = :reciver && reciver = :sender ) ORDER BY sent_at DESC";
            $lastmsg_stmt = $con->prepare($query2);
            $lastmsg_stmt->bindParam(':sender', $id);
            $lastmsg_stmt->bindParam(':reciver', $s[$i]['id']);
            $lastmsg_stmt->execute();
            $lastmsg_stmt->setFetchMode(PDO::FETCH_ASSOC);
            $lastmsg = $lastmsg_stmt->fetchAll(); 
            $res =   "<a href=\"chats.php?userid=".$s[$i]['id']."\"><div class='contact'>";
            $online = $s[$i]['online'] ?  '<div class="active-now"></div>' : '';
            $img =  "<img src=\"images/".$s[$i]['image']."\" alt=\"profile image\"/>";
            $contact_info = "<div class=\"contact-info\">"."<div class=\"date\"><h5>".$s[$i]['fname']." ".$s[$i]['lname']."</h5><p>".$lastmsg[0]['message'] ."</p>";
            echo $res.$img.$contact_info."</div>".$online."</div></div></a>";
        }
    }


?>
          
                
