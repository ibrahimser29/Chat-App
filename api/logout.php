<?php
session_start();
session_unset();
session_destroy();
include_once "../connect.php";
$id = $_POST['id'];
$active = false;
$con->query("UPDATE users Set online = '{$active}' WHERE id='{$id}'");
echo true;
?>