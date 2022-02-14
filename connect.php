 <?php 
 $servername = "localhost";
 $username = "root";
 $password = "";
 $dbname = "chat";

 try {
    $con = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
 } catch(PDOException $e) {
   echo $sql . "<br>" . $e->getMessage();
 }
 
 
 ?>