<?php 

$q = $_POST["query"];
$id = $_POST["user_id"];
include_once "../connect.php";

$query = "SELECT * FROM users WHERE fname LIKE ? && id != ?";
         $params = array("%$q%", $id);
         $stmt2 = $con->prepare($query);
         $stmt2->execute($params);
        $stmt2->setFetchMode(PDO::FETCH_ASSOC);
        $s = $stmt2->fetchAll();
        
    if(count($s) > 0){
        for ($i=0; $i < count($s); $i++) {
            $res =   "<a href=\"chats.php?userid=".$s[$i]['id']."\"><div class='contact'>";
            $img =  "<img src=\"images/".$s[$i]['image']."\" alt=\"profile image\"/>";
            $contact_info = "<div class=\"contact-info\">"."<div class=\"date\"><h5>".$s[$i]['fname']." ".$s[$i]['lname']."</h5>";
            echo $res.$img.$contact_info."</div></div></div></a>";
        }
    }else{
        echo false;
    }
  

?>
          
                
