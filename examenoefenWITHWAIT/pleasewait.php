<?php
session_start();
include "classdatabase.php";

$_SESSION['error'] = '';

$pdo = new database("localhost", "examenoefen", "root", "", "utf8mb4");
//echo "Calling login<br>";


$reservatie_id = $_GET['reservatie_id'] ?? '';
$reorder = $_GET['reorder'] ?? '';

$reservatie = $pdo->reservatie($reservatie_id);

$id = $_GET['reservatie_id'] ?? '';

// var_dump($_POST); die;
if (isset($_POST['pieter'])) {
      $id = $_POST['reservatie_id'];
      $eten_id = $_POST['eten'];
      // get eten details by id
      $eten_record = $pdo->etendetails($eten_id);
      $eten = $eten_record['naam'] ?? '';
      $eten_quantity = $eten ? 1 : 0;

      $drinken_id = $_POST['drinken'];
      // get drinken details by id
      $drinken_record = $pdo->drinkendetails($drinken_id);
      $drinken = $drinken_record['naam'] ?? '';
      $drinken_quantity = $drinken ? 1 : 0;

      if(empty($eten_id) && empty($drinken_id)) {
        $_SESSION['error'] = 'Please make a selection';
        header("Location: roomservice.php?reservatie_id=$reservatie_id&error=yes");
        exit;
      }
      $order_date = date('Y-m-d H:i:s');
      $factuurtotaal = (float)$drinken_record['prijs'] + (float)$eten_record['prijs'];
      $klant_id = $reservatie['naam_id'];

      if($reorder) {
        $eten_exists= [];
        $drinken_exists= [];
        
        // get factuur
        $factuur_record = $pdo->factuurByReservatie($reservatie_id);

        if($eten_id) {
          // check if eten_id exists on reservation and update quantity
          $eten_exists = $pdo->etenExistsOnReservatie($eten_id, $reservatie_id);
          if($eten_exists) {
            // update eten quantity in etendrinken
            $pdo->roomserviceupdateeten($eten_exists['id'], $eten_exists['eten_quantity'] + 1);

            // update factuur
            $newfactuurtotaal = $factuur_record['factuurtotaal'] + (float)$eten_record['prijs'];
            $pdo->factuurupdate($reservatie_id, $newfactuurtotaal);
          }
          else {
            // add new eten
            $record_id = $pdo->roomserviceaddetenonly($id, $eten, $eten_id, $eten_quantity, $order_date);
            // update factuur
            $newfactuurtotaal = $factuur_record['factuurtotaal'] + (float)$eten_record['prijs'];
            $pdo->factuurupdate($reservatie_id, $newfactuurtotaal);
          }

        }
        
        if($drinken_id) {
          // check if drinken_id exists on reservation and update quantity
          $drinken_exists = $pdo->drinkenExistsOnReservatie($drinken_id, $reservatie_id);
          if($drinken_exists) {
            // update drinken quantity in etendrinken
            $pdo->roomserviceupdatedrinken($drinken_exists['id'], $drinken_exists['drinken_quantity'] + 1);

            // update factuur
            $newfactuurtotaal = $factuur_record['factuurtotaal'] + (float)$drinken_record['prijs'];
            $pdo->factuurupdate($reservatie_id, $newfactuurtotaal);
          }
          else {
            // add new eten
            $record_id = $pdo->roomserviceadddrinkenonly($id, $drinken, $drinken_id, $drinken_quantity, $order_date);
            // update factuur
            $newfactuurtotaal = $factuur_record['factuurtotaal'] + (float)$drinken_record['prijs'];
            $pdo->factuurupdate($reservatie_id, $newfactuurtotaal);
          }
        }

      } else {
        $record_id = $pdo->roomserviceadd($id, $eten, $drinken, $eten_id, $drinken_id, $eten_quantity, $drinken_quantity, $order_date);
        $pdo->factuuradd($id, $factuurtotaal, '', '', $klant_id);
      }


      // var_dump($record_id); die;
      header("Location: pleasewait.php?reservatie_id=$reservatie_id" );
      // header("Location: succesmetroomservice.php?reservatie_id=$record_id" );
      // header("Location: succesmetroomservice.php?reservatie_id=$id" );
      // echo "['reservatie_id']". $reservatie_id;
}

// go to 
if($reservatie['allow_klant']) {
  header("Location: succesmetroomservice.php?reservatie_id=$reservatie_id"); 
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
    window.location.href="pleasewait.php?reservatie_id=<?php echo $reservatie_id; ?>";
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
