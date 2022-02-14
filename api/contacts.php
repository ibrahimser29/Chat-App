<?php 
$id = $_POST["id"];
$user_id = $_POST["user_id"];
include_once "../connect.php";
$stmt = $con->prepare("SELECT * FROM contacts WHERE user1_id = :user_id && contact_id = :contact_id");
$stmt->bindParam(':user_id', $user_id);
$stmt->bindParam(':contact_id', $id);
$stmt->execute();
if($stmt->rowCount() > 0){
  echo "alreay added";
}else{
  $stmt2 = $con->prepare("INSERT INTO contacts (user1_id, contact_id)
VALUES (:user_id, :contact_id)");
$stmt2->bindParam(':user_id', $user_id);
$stmt2->bindParam(':contact_id', $id);
$stm3 = $con->prepare("SELECT * FROM contacts WHERE user1_id = :user_id && contact_id = :contact_id");
  if($stmt2->execute()){
    echo true;
  }
}

?>