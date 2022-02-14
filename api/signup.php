<?php 
session_start();
if(isset($_SESSION['user_id'])){
  header("chats.php");
}
include_once "../connect.php";
 

$fname = htmlspecialchars(trim($_POST['fname']));
$lname = htmlspecialchars(trim($_POST['lname']));
$email = htmlspecialchars(trim($_POST['email']));
$pass =  htmlspecialchars(trim($_POST['password']));
$confirm = htmlspecialchars(trim($_POST['confirm_password']));
if(!empty($fname) && !empty($lname) && !empty($email) && !empty($pass) && !empty($confirm)){
    if(filter_var($email,FILTER_VALIDATE_EMAIL)){
        $stmt = $con->prepare("SELECT email FROM users where email = :email");
        $stmt->bindParam(':email', $email);
          $stmt->execute();
          if($stmt->rowCount() > 0){
            echo "email must be unique";
          } else{
              if(isset($_FILES['image'])){
                $img_name = $_FILES['image']['name'];
                $img_type = $_FILES['image']['type'];
                $tmp_name = $_FILES['image']['tmp_name'];
                $img_exp = explode('.',$img_name);
                $img_ext = end($img_exp);
                $ext = ['png','jpeg','jpg'];
                if(in_array($img_ext,$ext)){
                 $time = time();
                 $new_name = $time.$img_name;
                 
                 if(move_uploaded_file($tmp_name,"../images/".$new_name)){
                    
                    $stmt = $con->prepare("INSERT INTO users (fname, lname, email,password,image)
                    VALUES (:firstname, :lastname, :email, :pass , :image)");
                    $stmt->bindParam(':firstname', $fname);
                    $stmt->bindParam(':lastname', $lname);
                    $stmt->bindParam(':email', $email);
                      $stmt->bindParam(':pass', $pass);
                      $stmt->bindParam(':image', $new_name);
                      if($stmt->execute()){
                          $user_id = $con->query("SELECT id FROM users WHERE email = '{$email}'")->fetchColumn();
                          $_SESSION['user_id'] = $user_id;
                          $active = true;
                          $con->query("UPDATE users Set online = '{$active}' WHERE id='{$user_id}'");
                          echo true;
                      }else{
                      echo "Registration failed";
                      }
                 }else{
                   echo "error while uploading the image";
                 }
                }
              }
             
          }
    }else{
        echo "email not valid";
    }
}else{
    echo "All inputs are required";
}
/*
$stmt = $con->prepare("INSERT INTO users (fname, lname, email,pass)
  VALUES (:firstname, :lastname, :email, :pass)");
  $stmt->bindParam(':firstname', $fname);
  $stmt->bindParam(':lastname', $lname);
  $stmt->bindParam(':email', $email);
  $stmt->bindParam(':pass', $password);
  if($stmt->execute()){
      echo "Registered successfully";
  }else{
      echo "Registration failed";
  }
*/
?>