<?php
session_start();
include 'classdatabase.php';

// var_dump($_POST);
    session_start();
    unset($_SESSION["username"]);
    header("Location: medewerkerlogin.php");
  
?>