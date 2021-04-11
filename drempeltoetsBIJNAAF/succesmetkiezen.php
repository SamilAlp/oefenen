<?php
include "classdatabase.php";

session_start();

$pdo = new database("localhost", "drempeltoets", "root", "", "utf8mb4");
//echo "Calling login<br>";


if (!isset($_SESSION['counter'])) {
  $_SESSION['counter'] = 20;
}

$id = $_GET['reservatie_id'] ?? '';


if (isset($_POST['pieter'])) {
     // $naam = $_POST['naam'];
      // $id = $_POST['main_id'];
      $kamernummer = $_POST['kamernummer'];
      $reserveringdatumvanaf = $_POST['reserveringdatumvanaf'];
      $reserveringdatumtot = $_POST['reserveringdatumtot'];
      $naam_id = $_POST['naam_id'];
      $naam = $_POST['naam'];
      $records_exist = $pdo->reservatie_exist($naam, $kamernummer, $naam_id);

      // var_dump($records_exist); die;
      if ($records_exist) {
        echo "Reservation does exist";
      }
      else{
        // add reservation
        $reservatie_id = $pdo->reservatieadd($naam_id, $naam, $kamernummer);

        $roomdetails = $pdo->kamerdetails($kamernummer);

        // get difference in days to determine factuurtotal
        $date1 = new DateTime($reserveringdatumvanaf);
        $date2 = new DateTime($reserveringdatumtot);

        $diffInDays = $date2->diff($date1)->format('%a'); 

        // var_dump($roomdetails); die;
        // naam_id is the same like klant_id because it is just a variable name
        $factuur_id = $pdo->factuuradd($reservatie_id, (float)$roomdetails['prijs'] * (int)$diffInDays, $reserveringdatumvanaf, $reserveringdatumtot, $naam_id);
        // var_dump($factuur_id); die;
        $pdo->factuurroomserviceadd($roomdetails['prijs'], $factuur_id);


        $_SESSION['counter']--;
        header("Location: succesmetkiezen.php?reservatie_id=$reservatie_id"); 
        exit; 
      }
    
      // (vraaag deze nog over die naam= klant^)
}


      // var_dump('hi'); die;
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
      <div class="col-lg-12">
        <br><br>
      <h1 class="text-warning text-center" > Uw reservatie </h1>
      <br>
      <table class=" table table-striped table-hover table-bordered">
        <tr class="bg-dark text-white text-center">
          <!-- <th> naam </th> -->
          <th> kamernummer </th>
        </tr>
        <?php  
        include_once "classdatabase.php";

            $pdo = new database("localhost", "drempeltoets", "root", "", "utf8mb4");
            $records=$pdo->reservatie($id);
            foreach($records as $res) {
        ?>

      

        <tr class="text-center">
          <tr style="background: #5F7612;" class="text-center">
          <!-- <td> <?php echo $res['naam'];?> </td> -->
          <td> <?php echo $res['kamernummer'];?> </td>
        </tr>
        <?php
          } 
        ?>
      </table>  
    </div>
  </div>

  <div class="container"> 
      <div class="img1">
        <img src="images/png1.jpg" style="width:70%; float:center;height: 360px;" >
      </div>   
      <p style="font-size: 20px; margin-top: 20px; color: #FFF;" >
       U dit is uw kamer !
       <br>
       <br> 
        <a href="roomservice.php?etendrinken_id=<?php echo $res['id'] ?? ''; ?>"style="font-size: 20px;" calss="text-danger"> Roomservice? via hier!</a>  
       <br>
       <hr style="background: #FFF;">
 
</div>
      <div class="container">
          <div class="col-lg-12">
            <br><br>
          <h1 class="text-warning text-center" > Uw factuur </h1>
          <br>
          <table class=" table table-striped table-hover table-bordered">
            <tr class="bg-dark text-white text-center">
              <th> $ </th>
              <th> Reserveringdatumvanaf </th>
              <th> Reserveringdatumtot </th>
     
              <th> Print factuur uit </th>
            </tr>
            <?php  
            include_once "classdatabase.php";

                $pdo = new database("localhost", "drempeltoets", "root", "", "utf8mb4");
                $factuur = $pdo->factuurByReservatie($id);
                if($factuur) {
            ?>
            <tr style="background: #5F7612;" class="text-center">
              <td> <?php echo $factuur['factuurtotaal'];?> </td>
              <td> <?php echo $factuur['reserveringdatumvanaf'];?> </td>
              <td> <?php echo $factuur['reserveringdatumtot'];?> </td>
              <td> <button onclick="window.print()" class="btn-white"> <a href="succesvoorklant.php?id=<?php echo $factuur['id']; ?>" calss="text-danger"> Print Factuur </a> </button> </td>
              
            </tr>
            <?php
              } 
            ?>
          </table>  
        </div>
      </div> 
      <div class="container"> 
          <div class="img1">
            <img src="images/png1.jpg" style="width:70%; float:center;height: 360px;" >
          </div>   
          <p style="font-size: 22px; margin-top: 20px; color: #FFF;" >
           U heeft gereserveerd voor dit kamermodel!
           <br>
           <br>
           <hr style="background: #FFF;">
           <br>
           <br>
          <!--  <a href="voorkamernummer.php" style="font-size: 20px;" calss="text-danger"> Kies u kamernummer via hier!</a> -->
          </p>  
    </div>
</body>
</html>