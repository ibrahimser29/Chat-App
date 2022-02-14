<?php 
session_start();
include_once "../connect.php";
$userid=  $_SESSION['user_id'];
$msg = $_POST["msg"];
$to = $_POST["to"];
$stmt2 = $con->prepare("INSERT INTO messages (message, sender, reciver)
VALUES (:msg, :sender , :to)");
$stmt2->bindParam(':msg', $msg);
$stmt2->bindParam(':sender', $userid);
$stmt2->bindParam(':to', $to);
$stmt2->execute();


?>