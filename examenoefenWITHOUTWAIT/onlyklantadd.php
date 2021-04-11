<?php 

session_start();
include_once "classdatabase.php";

$_SESSION['error'] = '';

$klant = $_POST['klant'];
$adres = $_POST['adres'];
$plaats = $_POST['plaats'];
$postcode = $_POST['postcode'];
$telefoon = $_POST['telefoon'];
$pdo = new database("localhost", "examenoefen", "root", "", "utf8mb4");
//echo "Calling login<br>";

// validate phone
if(strlen($telefoon) != 10) {
	$_SESSION['error'] = 'Telefoon should be 10 numbers';
	header("Location: indexreservaties.php?error=yes");
	exit;
} elseif(substr($telefoon, 0, 2) != '06') {
	$_SESSION['error'] = 'Telefoon should be begin with 06';
	header("Location: indexreservaties.php?error=yes");
	exit;
}
else
{
	$record_id = $pdo->klantadd($klant, $adres, $plaats, $postcode, $telefoon);
	// header("Location: voorkamernummer.php?naam_id=$record_id&naam=$klant");
	header("Location: restaurantofbar.php?naam_id=$record_id&naam=$klant");
	exit;	
}
?>