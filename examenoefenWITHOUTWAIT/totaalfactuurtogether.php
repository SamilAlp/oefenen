<?php
include "classdatabase.php";

session_start();

$pdo = new database("localhost", "examenoefen", "root", "", "utf8mb4");
//echo "Calling login<br>";

// $id = $_GET['reservatie_bar_id'] ?? '';
$klant_id = $_GET['klant_id'] ?? '';
$factuurTogether = $pdo->factuurTogether($klant_id);

$klantdetails = $klant_id ? $pdo->klantdetails($klant_id) : [];
$klant_name = $klantdetails ? $klantdetails['klant'] : '';

?>

<!DOCTYPE html>
<html>
 <head>
  <title></title>
   </head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> 
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

<body style="background: #6E6E6E">
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
            <?php  
              if($factuurTogether['factuurtotaalrestaurant'] && $factuurTogether['order_date_restaurant']) {
            ?>
      <div class="container">
          <div class="col-lg-12">
            <br><br>
          <h1 class="text-warning text-center" > Uw factuur Restaurant </h1>
          <br>
          <table class=" table table-striped table-hover table-bordered">
            <tr class="bg-dark text-white text-center">
              <th> Total Factuur </th>
              <th> Order Date </th>
     
              <th> Print factuur uit </th>
            </tr>
            <tr style="background: #5F7612;" class="text-center">
              <td> <?php echo $factuurTogether['factuurtotaalrestaurant'];?> </td>
              <td> <?php echo $factuurTogether['order_date_restaurant'];?> </td>
              <td> <button onclick="window.print()" class="btn-white"> <a href="succesvoorklant.php?id=<?php echo $factuurTogether['last_reservatie_id']; ?>" calss="text-danger"> Print Factuur </a> </button> </td>
              
            </tr>
          </table> 
        <br>
        <a href="restaurantofbar.php?reservatie_id=<?php echo $factuurTogether['last_reservatie_id']; ?>&naam=<?php echo $klant_name; ?>&naam_id=<?php echo $klant_id; ?>" style="font-size: 20px;" calss="text-danger"> Go back to choose your preference</a>  
        <br>
        <hr style="background: #FFF;">  
        </div>
      </div> 
            <?php
              } 
            ?>



            <?php  
              if($factuurTogether['factuurtotaalbar'] && $factuurTogether['order_date_bar']) {
            ?>
      <div class="container">
          <div class="col-lg-12">
            <br><br>
          <h1 class="text-warning text-center" > Uw factuur Bar </h1>
          <br>
          <table class=" table table-striped table-hover table-bordered">
            <tr class="bg-dark text-white text-center">
              <th> Total Factuur </th>
              <th> Order Date </th>
     
              <th> Print factuur uit </th>
            </tr>
            <tr style="background: #5F7612;" class="text-center">
              <td> <?php echo $factuurTogether['factuurtotaalbar'];?> </td>
              <td> <?php echo $factuurTogether['order_date_bar'];?> </td>
              <td> <button onclick="window.print()" class="btn-white"> <a href="succesvoorklant.php?id=<?php echo $factuurTogether['last_reservatie_bar_id']; ?>" calss="text-danger"> Print Factuur </a> </button> </td>
              
            </tr>
          </table> 
        <br>
        <a href="restaurantofbar.php?reservatie_bar_id=<?php echo $factuurTogether['last_reservatie_bar_id']; ?>&naam=<?php echo $klant_name; ?>&naam_id=<?php echo $klant_id; ?>" style="font-size: 20px;" calss="text-danger"> Go back to choose your preference</a>  
        <br>
        <hr style="background: #FFF;">  
        </div>
      </div> 
            <?php
              } 
            ?>

      <div class="container">
          <div class="col-lg-12">
            <br><br>
          <h1 class="text-warning text-center" > Total factuur </h1>
          <br>
          <table class=" table table-striped table-hover table-bordered">
            <tr class="bg-dark text-white text-center">
              <th> Total Factuur </th>
              <th> Order Date </th>
     
              <th> Print factuur uit </th>
            </tr>
            <?php  
              if($factuurTogether['factuurtotaalrestaurant'] || $factuurTogether['factuurtotaalbar']) {
            ?>
            <tr style="background: #5F7612;" class="text-center">
              <td> <?php echo (float)$factuurTogether['factuurtotaalrestaurant'] + (float)$factuurTogether['factuurtotaalbar'] ;?> </td>
              <td> <?php echo $factuurTogether['order_date_bar'] ? $factuurTogether['order_date_bar'] : $factuurTogether['order_date_restaurant'];?> </td>
              <td> <button onclick="window.print()" class="btn-white"> <a href="succesvoorklant.php?id=<?php echo $factuurTogether['last_reservatie_bar_id']; ?>" calss="text-danger"> Print Factuur </a> </button> </td>
              
            </tr>
            <?php
              } 
            ?>
          </table> 
        <br>
        <a href="indexreservaties.php" style="font-size: 20px;" calss="text-danger"> Look further on the menu</a>  
        <br>
        <hr style="background: #FFF;">  
        </div>
      </div> 

</body>
</html>
