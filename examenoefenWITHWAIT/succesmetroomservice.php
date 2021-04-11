<?php
include "classdatabase.php";

session_start();

$pdo = new database("localhost", "examenoefen", "root", "", "utf8mb4");
//echo "Calling login<br>";

$id = $_GET['reservatie_id'] ?? '';

// var_dump($_POST); die;
/*if (isset($_POST['pieter'])) {
      $id = $_POST['reservatie_id'];
      $eten = $_POST['eten'];
      $drinken = $_POST['drinken'];
      // $pdo->roomserviceadd($id, $eten, $drinken);
      // var_dump($id); die;
      $record_id = $pdo->roomserviceadd($id, $eten, $drinken);
      // var_dump($record_id); die;
      header("Location: pleasewait.php?reservatie_id=$id" );
      // header("Location: succesmetroomservice.php?reservatie_id=$record_id" );
      // header("Location: succesmetroomservice.php?reservatie_id=$id" );
      // echo "['reservatie_id']". $reservatie_id;
}*/

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
      <div class="col-lg-12">
        <br><br>
      <h1 class="text-warning text-center" > Uw reservatie </h1>
      <br>
        <table class=" table table-striped table-hover table-bordered">
          <tr class="bg-dark text-white text-center">
            
            <th> Maaltijd </th>
            <th> Drinken </th>
          </tr>
          <?php  
          include_once "classdatabase.php";

              $pdo = new database("localhost", "examenoefen", "root", "", "utf8mb4");
              $records=$pdo->roomserviceByReservatie($id);

              // var_dump($records); die;
              // $database = $_POST['id'];
              foreach($records as $res) {
                $order_date = $res['order_date'];
          ?>

          <tr class="text-center">
            <tr style="background: #5F7612;" class="text-center">
            <td> <?php echo $res['eten_quantity'] ? '(' . $res['eten_quantity'] . ')' : ''; ?> <?php echo $res['eten'];?> </td>
            <td> <?php echo $res['drinken_quantity'] ? '(' . $res['drinken_quantity'] . ')' : '' ;?> <?php echo $res['drinken']; ?>  </td>
          </tr>
          <?php
            } 
          ?>
        </table>  
      </div>
  </div>

  <div class="container"> 
      <div class="img1">
        <!-- <img src="images/png1.jpg" style="width:70%; float:center;height: 360px;" > -->
      </div>   
      <p style="font-size: 20px; margin-top: 20px; color: #FFF;" >
      Nog bestellen?
       <br>
       <br>

        <a href="roomservice.php?reorder=yes&reservatie_id=<?php echo $id; ?>" style="font-size: 20px;" calss="text-danger"> Reorder!</a>  
       <br>
        <a href="restaurantofbar.php?reorder=yes&reservatie_id=<?php echo $id; ?>" style="font-size: 20px;" calss="text-danger"> Choose again!</a>  
       <br>
       <hr style="background: #FFF;">
 <br>
        <a href="totaalfactuuretendrinken.php?reservatie_id=<?php echo $id; ?>" style="font-size: 20px;" calss="text-danger"> Klaar met bestellen? Bekijk hier uw totale factuur!</a>  
       <br>       
</div>
<!--       <div class="container">
          <div class="col-lg-12">
            <br><br>
          <h1 class="text-warning text-center" > Uw factuur </h1>
          <br>
          <table class=" table table-striped table-hover table-bordered">
            <tr class="bg-dark text-white text-center">
              <th> Factuur </th>
              <th> Order Date </th>
     
              <th> Print factuur uit </th>
            </tr>
            <?php  
            include_once "classdatabase.php";

                $pdo = new database("localhost", "examenoefen", "root", "", "utf8mb4");
                $res=$pdo->factuurByReservatie($id);
                if($res) {
            ?>
            <tr style="background: #5F7612;" class="text-center">
              <td> <?php echo $res['factuurtotaal'];?> </td>
              <td> <?php echo $order_date;?> </td>
              <td> <button onclick="window.print()" class="btn-white"> <a href="succesvoorklant.php?id=<?php echo $res['id']; ?>" calss="text-danger"> Print Factuur </a> </button> </td>
              
            </tr>
            <?php
              } 
            ?>
          </table>  
        </div>
      </div>  -->
</body>
</html>