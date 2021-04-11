<?php 
include_once "classdatabase.php";
$id = $_GET['id'];
$pdo = new database("localhost", "drempeltoets", "root", "", "utf8mb4");
//echo "Calling login<br>";
$pdo->factuurdelete($id);
header('location:factuuroverzicht.php');
?>