<?php  
include_once "classdatabase.php";
$factuur = $_POST['factuur'];
$reserveringdatumvanaf = $_POST['reserveringdatumvanaf'];
$reserveringdatumtot = $_POST['reserveringdatumtot'];
$klant = $_POST['klant'];
$pdo = new database("localhost", "examenoefen", "root", "", "utf8mb4");
//echo "Calling login<br>";

$pdo->factuuradd($factuur, $reserveringdatumvanaf, $reserveringdatumtot, $klant);
header('location:factuuroverzicht.php');