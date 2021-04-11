<?php
session_start();
include "classdatabase.php";

$_SESSION['error'] = '';

$pdo = new database("localhost", "examenoefen", "root", "", "utf8mb4");
//echo "Calling login<br>";


$reservatie_id = $_SESSION['reservatie_id'] ?? '';
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

      $pdo->allowreservatie($id);

      if(empty($eten_id) && empty($drinken_id)) {
        $_SESSION['error'] = 'Please make a selection';
        header("Location: roomservice.php?reservatie_id=$reservatie_id&error=yes");
        exit;
      }
      $order_date = date('Y-m-d H:i:s');
      $factuurtotaal = (float)$drinken_record['prijs'] + (float)$eten_record['prijs'];
      $klant_id = $reservatie['naam_id'];

      // if($reorder) {
        $eten_exists= [];
        $drinken_exists= [];
        
        // get factuur
        $factuur_record = $pdo->factuurByReservatie($reservatie_id);
        if(!$factuur_record) {
          $pdo->factuuradd($id, 0, '', '', $klant_id);
        }


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

        $factuur_record = $pdo->factuurByReservatie($reservatie_id);
        
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

      // }


      // var_dump($record_id); die;
      // header("Location: pleasewait.php?reservatie_id=$reservatie_id" );
      // header("Location: succesmetroomservice.php?reservatie_id=$record_id" );
      // header("Location: succesmetroomservice.php?reservatie_id=$id" );
      // echo "['reservatie_id']". $reservatie_id;
  header("Location: succesmetroomservice.php?reservatie_id=$reservatie_id"); 
  exit; 
}

// go to 
if($reservatie['allow_klant']) {
  header("Location: succesmetroomservice.php?reservatie_id=$reservatie_id"); 
  exit; 
}

?>