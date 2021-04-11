<?php
include "classdatabase.php";

session_start();

if(isset($_POST['submit'])){
// instance van je database class

$fieldnames = array("username", "password");

$error = false;

  foreach ($fieldnames as $fieldname) {
    if (isset($_POST[$fieldname]) || empty($_POST[$fieldname])) {
       $error = true;
    }
  //   if(!empty($_POST[$fieldnames])){
  //   echo "<br> Plz fill the required fields in!";
  // }
  }
   if (!$error) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $pdo = new database("localhost", "examenoefen", "root", "", "utf8mb4");
    $pdo->InsertTabellen($username, $password);
    echo '<hr>';
   }
 }
?>

<!DOCTYPE html>
<html>
  <?php
  echo '<script>alert("U made a reservation!")</script>';  
  ?>
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
      <h1 class="text-warning text-center" > Uw factuur </h1>
      <br>
      <table class=" table table-striped table-hover table-bordered">
        <tr class="bg-dark text-white text-center">
          <th> Factuur </th>
          <th> Reserveringdatumvanaf </th>
          <th> Reserveringdatumtot </th>
 
          <th> Print factuur uit </th>
        </tr>
        <?php  
        include_once "classdatabase.php";

            $pdo = new database("localhost", "examenoefen", "root", "", "utf8mb4");
            $records=$pdo->factuur();
            foreach($records as $res) {
        ?>
        <tr style="background: #5F7612;" class="text-center">
          <td> <?php echo $res['factuur'];?> </td>
          <td> <?php echo $res['reserveringdatumvanaf'];?> </td>
          <td> <?php echo $res['reserveringdatumtot'];?> </td>

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
  <div class="container"> 
      <div class="img1">
        <img src="images/png11.jpg" style="width:70%; float:center;height: 360px;" >
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
</div>
</body>
</html>