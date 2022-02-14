<?php 
session_start();
if(isset($_SESSION['user_id'])){
  header("chats.php");
}
include_once "../connect.php";

$email = htmlspecialchars(trim($_POST['email']));
$pass =  htmlspecialchars(trim($_POST['password']));
if(!empty($email) && !empty($pass)){
   
    $stmt = $con->prepare("SELECT id FROM users where email = :email && password = :pass");
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':pass', $pass);
    $stmt->execute();
    if($stmt->rowCount() > 0){
        $user_id = $con->query("SELECT id FROM users WHERE email = '{$email}'")->fetchColumn();
        $active = true;
        $con->query("UPDATE users Set online = '{$active}' WHERE id='{$user_id}'");
          $_SESSION['user_id'] = $user_id;
           echo true;
        
        
      }else{
        echo "failed";
      }      
   
    }else{
    echo "All inputs are required";
    }
?>