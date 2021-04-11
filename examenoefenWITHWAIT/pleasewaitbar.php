<?php
session_start();
include "classdatabase.php";

$_SESSION['error'] = '';

$pdo = new database("localhost", "examenoefen", "root", "", "utf8mb4");
//echo "Calling login<br>";


$reservatie_bar_id = $_GET['reservatie_bar_id'] ?? '';
$reorder = $_GET['reorder'] ?? '';

$reservatie = $pdo->reservatieBar($reservatie_bar_id);

$id = $_GET['reservatie_bar_id'] ?? '';

// var_dump($_POST); die;
if (isset($_POST['pieter'])) {
      $id = $_POST['reservatie_bar_id'];
      $bar_id = $_POST['bar'];
      // get bar details by id
      $bar_record = $pdo->bardetails($bar_id);
      $bar = $bar_record['naam'] ?? '';
      $bar_quantity = $bar ? 1 : 0;

      $snack_id = $_POST['snack'];
      // get snack details by id
      $snack_record = $pdo->snackdetails($snack_id);
      $snack = $snack_record['naam'] ?? '';
      $snack_quantity = $snack ? 1 : 0;


      if(empty($bar_id) && empty($snack_id)) {
        $_SESSION['error'] = 'Please make a selection';
        header("Location: barchoose.php?reservatie_bar_id=$reservatie_bar_id&reorder=$reorder&error=yes");
        exit;
      }
      $order_date = date('Y-m-d H:i:s');
      $factuurtotaal = (float)$snack_record['prijs'] + (float)$bar_record['prijs'];
      $klant_id = $reservatie['naam_id'];

      if($reorder) {
        $bar_exists= [];
        $snack_exists= [];
        
        // get factuur
        $factuur_record = $pdo->factuurBarByReservatie($reservatie_bar_id);


        if($bar_id) {
          // check if bar_id exists on reservation bar and update quantity
          $bar_exists = $pdo->barExistsOnReservatieBar($bar_id, $reservatie_bar_id);
          if($bar_exists) {
            // update bar quantity in etendrinken
            $pdo->roomserviceupdatebar($bar_exists['id'], $bar_exists['bar_quantity'] + 1);

            // update factuur
            $newfactuurtotaal = $factuur_record['factuurtotaal'] + (float)$bar_record['prijs'];
            $pdo->factuurbarupdate($reservatie_bar_id, $newfactuurtotaal);
          }
          else {
            // add new bar
            $record_id = $pdo->roomserviceaddbaronly($id, $bar, $bar_id, $bar_quantity, $order_date);
            // update factuur
            $newfactuurtotaal = $factuur_record['factuurtotaal'] + (float)$bar_record['prijs'];
            $pdo->factuurbarupdate($reservatie_bar_id, $newfactuurtotaal);
          }
        }

        // get new factuur
        $factuur_record = $pdo->factuurBarByReservatie($reservatie_bar_id);
        
        if($snack_id) {
          // check if snack_id exists on reservation and update quantity
          $snack_exists = $pdo->snackExistsOnReservatieBar($snack_id, $reservatie_bar_id);
          if($snack_exists) {
            // update snack quantity in barorders
            $pdo->roomserviceupdatesnack($snack_exists['id'], $snack_exists['snack_quantity'] + 1);

            // update factuur
            $newfactuurtotaal = $factuur_record['factuurtotaal'] + (float)$snack_record['prijs'];
            $pdo->factuurbarupdate($reservatie_bar_id, $newfactuurtotaal);
          }
          else {
            // add new snack
            $record_id = $pdo->roomserviceaddsnackonly($id, $snack, $snack_id, $snack_quantity, $order_date);
            // update factuur
            $newfactuurtotaal = $factuur_record['factuurtotaal'] + (float)$snack_record['prijs'];
            $pdo->factuurbarupdate($reservatie_bar_id, $newfactuurtotaal);
          }
        }

      } else {
        $record_id = $pdo->roomservicebaradd($id, $bar, $snack, $bar_id, $snack_id, $bar_quantity, $snack_quantity, $order_date);
        $pdo->factuurbaradd($id, $factuurtotaal, $klant_id);

      }


      // var_dump($record_id); die;
      header("Location: pleasewaitbar.php?reservatie_bar_id=$reservatie_bar_id" );
      exit;
}

// go to 
if($reservatie['allow_klant']) {
  header("Location: succesmetroomservicebar.php?reservatie_bar_id=$reservatie_bar_id"); 
  exit; 
}


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

<script>  
  $(document).ready(function()
  {
    setInterval(function(){
    window.location.href="pleasewaitbar.php?reservatie_bar_id=<?php echo $reservatie_bar_id; ?>";
      // refresh();  
    }, 3000); 
  }); 
</script> 

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
  <div class="container"> 
      <div class="img1">
        <img src="images/png01.jpg" style="width:25%; float:center;height: 280px;" >
        <img src="images/png01.jpg" style="width:40%; float:center; height: 280px;">
        <img src="images/pn11.jpg" style="width:25%; float:center; height: 280px;">
      </div>   
      <p style="font-size: 22px; margin-top: 40px; color: #FFF;" >
      Ur request has been made! Please wait till the ober arrives.
      </p> 
</div>
</body>
</html>
