<?php 
include_once "classdatabase.php";
$id = $_GET['id'];
$klant_id = $_GET['klant_id'];
$pdo = new database("localhost", "examenoefen", "root", "", "utf8mb4");
//echo "Calling login<br>";
$pdo->deletereservatiebar($id, $klant_id);
header('location:reserveringoverzicht.php');
exit;
?>