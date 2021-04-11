<?php  
include_once "classdatabase.php";
$drinken = $_POST['drinken'];
$eten = $_POST['eten'];
$pdo = new database("localhost", "drempeltoets", "root", "", "utf8mb4");
//echo "Calling login<br>";

$pdo->roomserviceadd($drinken, $eten);
header('location:succesmetroomservice.php');
?>