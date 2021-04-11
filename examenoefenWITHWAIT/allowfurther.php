<?php 
include_once "classdatabase.php";
$id = $_GET['id'];
$pdo = new database("localhost", "examenoefen", "root", "", "utf8mb4");
//echo "Calling login<br>";
$pdo->allowreservatie($id);
header('location:reserveringoverzicht.php');
exit;
?>