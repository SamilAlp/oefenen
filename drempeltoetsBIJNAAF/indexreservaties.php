<?php
session_start();
include "classdatabase.php";


$error = $_SESSION['error'] ?? '';
$_SESSION['error'] = '';

if(isset($_POST['submit'])){
// instance van je database class

 }
?>

<!DOCTYPE html>
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
        <img src="images/png1.jpg" style="width:45%; float:center;height: 280px;" >
        <img src="images/png2.jpg" style="width:40%; float:center; height: 280px;">
      </div>   
 </div> 
   
<div style="margin-top: 200px;" class="col-lg-12">     
      <br>
  <form action="onlyklantadd.php" method="POST">

    <table class=" table table-striped table-hover table-bordered">
        
        <tr class="bg-dark text-white text-center">
          <h1 class="text-warning text-center" > Reserveer hier! </h1>
        </tr>
        <?php  
        include_once "classdatabase.php";

            $pdo = new database("localhost", "drempeltoets", "root", "", "utf8mb4");
            // $records=$pdo->jongeren();
            // foreach($records as $res) 
            {
        ?>
        <tr class="text-center">
                          
        <?php
          // $hotelkamers = array(1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20);

          // echo count($hotelkamers);

        ?>
        </tr>
        <?php
          } 
        ?>
      </table>

      <table class=" table table-striped table-hover table-bordered">
        
        <tr class="bg-dark text-white text-center">

          <th> klant </th>
          <th> adres </th>
          <th> plaats </th>
          <th> postcode </th>
          <th> telefoon </th>
          <th> Reservatie </th>
        </tr>
        <?php  
        include_once "classdatabase.php";

            $pdo = new database("localhost", "drempeltoets", "root", "", "utf8mb4");
            // $records=$pdo->jongeren();
            // foreach($records as $res) 
            {
        ?>
        <?php if($error) { ?>
          <p style="background-color: red; color: #fff; text-align: center;"><?php echo $error; ?></p>
        <?php } ?>
        <tr class="text-center"> 
          <td> <input type="text" id="klant" name="klant" placeholder="klant.." required></td>
          <td> <input type="text" id="adres" name="adres" placeholder="adres.." required ></td>
          <td> <input type="text" id="plaats" name="plaats" placeholder="plaats.." required></td>
          <td> <input type="text" id="postcode" name="postcode" placeholder="postcode.." required></td>
          <td> <input type="text" id="telefoon" name="telefoon" placeholder="telefoon.." required></td>
          <td> <input type="submit" class="btn-white" value="Reserveer"> </td>
        <?php
          // $hotelkamers = array(1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20);

          // echo count($hotelkamers);

        ?>
        </tr>
        <?php
          } 
        ?>
      </table>
      </form>   
    </div>
