<?php  
include_once "classdatabase.php";
$naam = $_POST['naam'];
$kamernummer = $_POST['kamernummer'];
$pdo = new database("localhost", "examenoefen", "root", "", "utf8mb4");
//echo "Calling login<br>";

$pdo->reservatieadd($naam, $kamernummer);
header('location:reserveringoverzicht.php');
?>