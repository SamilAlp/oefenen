<?php
include "classdatabase.php";

session_start();

$pdo = new database("localhost", "examenoefen", "root", "", "utf8mb4");
//echo "Calling login<br>";


if (!isset($_SESSION['counter'])) {
  $_SESSION['counter'] = 20;
}

  if (isset($_POST['pieter'])) {
      $naam = $_POST['naam'];
      $kamernummer = $_POST['kamernummer'];
      $pdo->reservatieadd($naam, $kamernummer);
      $_SESSION['counter']--;
      header("Location: succesmetkiezen.php");
  }


$message = "rooms almost sold out!";
if ($_SESSION['counter'] === 10) {

echo "<script type='text/javascript'>alert('$message');</script>";
}

?>


<!DOCTYPE>
<html>
 <head>
  <title></title>
   </head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <meta charset="utf-8">
  <!-- Somehow I got an error, so I comment the title, just uncomment to show -->
  <!-- <title>Responsive Navigation Bar</title> -->
  <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="mainstyle.css">
<body style="background: #091047">
  <nav>
    <ul>
      <li class="logo">Hotel Der Tuin</li>
      <li class="items"><a href="index.php">Website overview </a></li>
      <li class="items"><a href="advise.php">Advise</a></li>
      <li class="items"><a href="indexreservaties.php">Reservaties</a></li>
      <li class="items"><a href="contact.php">Contact</a></li>
     <!--  <li class="items"> <a href="loginCustomer.php"> <button class="btn btn-primary" type="submit"> Login </button></a><li>   -->
    </ul>
  </nav>


  <div class="container"> 
      <div class="img1">
        <img src="images/png1.jpg" style="width:70%; float:center;height: 360px;" >
      </div>   
      <p style="font-size: 20px; margin-top: 20px; color: #FFF;" >
       Danku voor uw bestelling.. Room service komt eraan
       <br>
       <br>
        <a href="roomservice.php" style="font-size: 20px;" calss="text-danger"> Bekijk onze website verder via hier!</a>  
       <br>
  </div>
</body>
</html>