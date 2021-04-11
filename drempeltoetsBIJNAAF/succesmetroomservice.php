<?php
include "classdatabase.php";

session_start();

$pdo = new database("localhost", "drempeltoets", "root", "", "utf8mb4");
//echo "Calling login<br>";

$id = $_GET['etendrinken_id'] ?? '';

// var_dump($_POST); die;
if (isset($_POST['pieter'])) {
      $id = $_POST['etendrinken_id'];
      $eten = $_POST['eten'];
      $drinken = $_POST['drinken'];
      // $pdo->roomserviceadd($id, $eten, $drinken);
      // var_dump($id); die;
      $record_id = $pdo->roomserviceadd($id, $eten, $drinken);
      // var_dump($record_id); die;
      // header("Location: succesmetroomservice.php?etendrinken_id=$id" );
      header("Location: succesmetroomservice.php?etendrinken_id=$record_id" );
      // echo "['etendrinken_id']". $etendrinken_id;
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
            
            <th> Drinken </th>
            <th> Maaltijd </th>
          </tr>
          <?php  
          include_once "classdatabase.php";

              $pdo = new database("localhost", "drempeltoets", "root", "", "utf8mb4");
              $records=$pdo->roomservice($id);

              // var_dump($records); die;
              // $database = $_POST['id'];
              foreach($records as $res) {
              $id = $res['id'];
          ?>

          <tr class="text-center">
            <tr style="background: #5F7612;" class="text-center">
            <td> <?php echo $res['drinken'];?> </td>
            <td> <?php echo $res['eten'];?> </td>
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
       Roomservice onder weg naar u kamer!
       <br>
       <br>
        <a href="bedankt.php" style="font-size: 20px;" calss="text-danger"> Doorgaan!</a>  
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
              <th> Factuur </th>
     
              <th> Print factuur uit </th>
            </tr>
            <?php  
            include_once "classdatabase.php";

                $pdo = new database("localhost", "drempeltoets", "root", "", "utf8mb4");
                $records=$pdo->factuur();
                foreach($records as $res) {
            ?>
            <tr style="background: #5F7612;" class="text-center">
              <td> <?php echo $res['factuur'];?> </td>

      <!--         <td> <button class="btn-danger"> <a href="deletefactuur.php?id= <?php echo $res['id']; ?>" class ="text-white">  Delete </a> </button> </td>

              <td> <button class="btn-white"> <a href="updatefactuur.php?id=<?php echo $res['id']; ?>" calss="text-danger"> Update </a> </button> </td> -->

              <td> <button onclick="window.print()" class="btn-white"> <a href="succesvoorklant.php?id=<?php echo $res['id']; ?>" calss="text-danger"> Print Factuur </a> </button> </td>
              
            </tr>
            <?php
              } 
            ?>
          </table>  
        </div>
      </div> 
<!--       <div class="container"> 
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
           <a href="voorkamernummer.php" style="font-size: 20px;" calss="text-danger"> Kies u kamernummer via hier!</a>
          </p>  
    </div> -->
</body>
</html>