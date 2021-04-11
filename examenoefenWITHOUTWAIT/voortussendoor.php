<?php

include_once "classdatabase.php";
session_start();

if (!isset($_SESSION['counter'])) {
  $_SESSION['counter'] = 20;
}

if (isset($_POST['reserve'])) {
  $_SESSION['counter']--;
  // Change discord.php to the file name of this file
  header('Location: succesmetkiezen.php');
  exit;
}

$message = "rooms almost sold out!";
if ($_SESSION['counter'] === 10) {

echo "<script type='text/javascript'>alert('$message');</script>";
}
?>