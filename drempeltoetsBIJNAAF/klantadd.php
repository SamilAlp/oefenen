<?php  
include_once "classdatabase.php";
$naam = $_POST['naam'];
$adres = $_POST['adres'];
$plaats = $_POST['plaats'];
$postcode = $_POST['postcode'];
$telefoon = $_POST['telefoon'];
$pdo = new database("localhost", "drempeltoets", "root", "", "utf8mb4");
//echo "Calling login<br>";

$pdo->klantadd($naam, $adres, $plaats, $postcode, $telefoon);
header('location:klantenoverzicht.php');


?>