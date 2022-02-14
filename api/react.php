<?php 
$msgid = $_POST["msgid"];
include_once "../connect.php";
$stmt = $con->prepare("SELECT * FROM reactions WHERE message_id = :message_id");
$stmt->bindParam(':message_id', $msgid);
$stmt->execute();
if($stmt->rowCount() > 0){
  echo "alreay added";
}else{
$stmt2 = $con->prepare("INSERT INTO reactions (type, message_id)
VALUES ('love', :message_id)");
$stmt2->bindParam(':message_id', $msgid);
  if($stmt2->execute()){
    echo true;
  }
}

?>