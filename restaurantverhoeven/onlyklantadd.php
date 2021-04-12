<?php 

session_start();
include_once "classdatabase.php";

$_SESSION['error'] = '';

$klant = $_POST['klant'];
// $adres = $_POST['adres'];
// $plaats = $_POST['plaats'];
// $postcode = $_POST['postcode'];
$telefoon = $_POST['telefoon'];
$pdo = new database("localhost", "restaurantverhoeven", "root", "", "utf8mb4");
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
	// $record_id = $pdo->klantadd($klant, $adres, $plaats, $postcode, $telefoon);
	$record_id = $pdo->klantadd($klant, $telefoon);
	header("Location: tafelnummer.php?klant_id=$record_id&klant=$klant");
	exit;	
}
?>