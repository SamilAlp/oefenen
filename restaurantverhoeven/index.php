<?php
include "classdatabase.php";

session_start();

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
<body style="background: #6E6E6E">
  <nav>
    <ul>
      <li class="logo">Restaurant Ex</li>
      <li class="items"><a href="index.php">Website overview </a></li>
      <li class="items"><a href="advise.php">Advise</a></li>
      <li class="items"><a href="indexreservaties.php">Reservaties</a></li>
      <li class="items"><a href="contact.php">Contact</a></li>
     <!--  <li class="items"> <a href="loginCustomer.php"> <button class="btn btn-primary" type="submit"> Login </button></a><li>   -->
    </ul>
  </nav>
    <h1 class="text-warning text-center" > Bekijk onze menu!</h1>
  <div class="container menu-box">
      <div class="col-lg-12">
        <br><br>
      <h1 class="text-warning text-center" > Desserts</h1>
      <br>
      <table class=" table table-striped table-hover table-bordered">
        <tr class="bg-dark text-white text-center">
<!--           <th> Id </th> -->
          <th> Dessert soorten </th>
          <th> prijs </th>
        </tr>
        <?php  
        include_once "classdatabase.php";

            $pdo = new database("localhost", "restaurantverhoeven", "root", "", "utf8mb4");
            $records=$pdo->dessert();
            foreach($records as $res) {
        ?>
        <tr class="text-center">
 <!--          <td> <?php echo $res['id'];?> </td>  -->
          <td> <?php echo $res['dessert_soorten'];?> </td>
          <td> &euro;<?php echo $res['prijs'];?> </td>

          
        </tr>
        <?php
          } 
        ?>
      </table>  
    </div>
  </div>

   <div class="container menu-box">
      <div class="col-lg-12">
        <br><br>
      <h1 class="text-warning text-center" > Frisdranken</h1>
      <br>
      <table class=" table table-striped table-hover table-bordered">
        <tr class="bg-dark text-white text-center">
<!--           <th> Id </th> -->
          <th> Frisdranken soorten </th>
          <th> prijs </th>
        </tr>
        <?php  
        include_once "classdatabase.php";

            $pdo = new database("localhost", "restaurantverhoeven", "root", "", "utf8mb4");
            $records=$pdo->frisdranken();
            foreach($records as $res) {
        ?>
        <tr class="text-center">
 <!--          <td> <?php echo $res['id'];?> </td>  -->
          <td> <?php echo $res['frisdranken_soorten'];?> </td>
          <td> &euro;<?php echo $res['prijs'];?> </td>
          
        </tr>
        <?php
          } 
        ?>
      </table>  
    </div>
  </div>

    <div class="container menu-box">
      <div class="col-lg-12">
        <br><br>
      <h1 class="text-warning text-center" > Hoofdgerechten</h1>
      <br>
      <table class=" table table-striped table-hover table-bordered">
        <tr class="bg-dark text-white text-center">
<!--           <th> Id </th> -->
          <th> Hoofdgerechten soorten </th>
          <th> prijs </th>
        </tr>
        <?php  
        include_once "classdatabase.php";

            $pdo = new database("localhost", "restaurantverhoeven", "root", "", "utf8mb4");
            $records=$pdo->hoofdgerechten();
            foreach($records as $res) {
        ?>
        <tr class="text-center">
 <!--          <td> <?php echo $res['id'];?> </td>  -->
          <td> <?php echo $res['hoofdgerechten_soorten'];?> </td>
          <td> &euro;<?php echo $res['prijs'];?> </td>
          
        </tr>
        <?php
          } 
        ?>
      </table>  
    </div>
  </div>

   <div class="container menu-box">
      <div class="col-lg-12">
        <br><br>
      <h1 class="text-warning text-center" > Huiswijnen</h1>
      <br>
      <table class=" table table-striped table-hover table-bordered">
        <tr class="bg-dark text-white text-center">
<!--           <th> Id </th> -->
          <th> Huiswijnen soorten </th>
          <th> prijs </th>
        </tr>
        <?php  
        include_once "classdatabase.php";

            $pdo = new database("localhost", "restaurantverhoeven", "root", "", "utf8mb4");
            $records=$pdo->huiswijnen();
            foreach($records as $res) {
        ?>
        <tr class="text-center">
 <!--          <td> <?php echo $res['id'];?> </td>  -->
          <td> <?php echo $res['huiswijnen_soorten'];?> </td>
          <td> &euro;<?php echo $res['prijs'];?> </td>
          
        </tr>
        <?php
          } 
        ?>
      </table>  
    </div>
  </div>


     <div class="container menu-box">
      <div class="col-lg-12">
        <br><br>
      <h1 class="text-warning text-center" > KoffieThee</h1>
      <br>
      <table class=" table table-striped table-hover table-bordered">
        <tr class="bg-dark text-white text-center">
<!--           <th> Id </th> -->
          <th> KoffieThee soorten </th>
          <th> prijs </th>
        </tr>
        <?php  
        include_once "classdatabase.php";

            $pdo = new database("localhost", "restaurantverhoeven", "root", "", "utf8mb4");
            $records=$pdo->koffiethee();
            foreach($records as $res) {
        ?>
        <tr class="text-center">
 <!--          <td> <?php echo $res['id'];?> </td>  -->
          <td> <?php echo $res['koffiethee_soorten'];?> </td>
          <td> &euro;<?php echo $res['prijs'];?> </td>
          
        </tr>
        <?php
          } 
        ?>
      </table>  
    </div>
  </div>

   <div class="container menu-box">
      <div class="col-lg-12">
        <br><br>
      <h1 class="text-warning text-center" > Mineraal waters</h1>
      <br>
      <table class=" table table-striped table-hover table-bordered">
        <tr class="bg-dark text-white text-center">
<!--           <th> Id </th> -->
          <th> Mineraal water soorten </th>
          <th> prijs </th>
        </tr>
        <?php  
        include_once "classdatabase.php";

            $pdo = new database("localhost", "restaurantverhoeven", "root", "", "utf8mb4");
            $records=$pdo->mineraalwaters();
            foreach($records as $res) {
        ?>
        <tr class="text-center">
 <!--          <td> <?php echo $res['id'];?> </td>  -->
          <td> <?php echo $res['mineraalwaters_soorten'];?> </td>
          <td> &euro;<?php echo $res['prijs'];?> </td>
          
        </tr>
        <?php
          } 
        ?>
      </table>  
    </div>
  </div>

     <div class="container menu-box">
      <div class="col-lg-12">
        <br><br>
      <h1 class="text-warning text-center" > Specialbier</h1>
      <br>
      <table class=" table table-striped table-hover table-bordered">
        <tr class="bg-dark text-white text-center">
<!--           <th> Id </th> -->
          <th> Specialbier soorten </th>
          <th> prijs </th>
        </tr>
        <?php  
        include_once "classdatabase.php";

            $pdo = new database("localhost", "restaurantverhoeven", "root", "", "utf8mb4");
            $records=$pdo->specialbier();
            foreach($records as $res) {
        ?>
        <tr class="text-center">
 <!--          <td> <?php echo $res['id'];?> </td>  -->
          <td> <?php echo $res['specialbier_soorten'];?> </td>
          <td> &euro;<?php echo $res['prijs'];?> </td>
          
        </tr>
        <?php
          } 
        ?>
      </table>  
    </div>
  </div>

  <div class="container menu-box">
      <div class="col-lg-12">
        <br><br>
      <h1 class="text-warning text-center" > Tapbier</h1>
      <br>
      <table class=" table table-striped table-hover table-bordered">
        <tr class="bg-dark text-white text-center">
<!--           <th> Id </th> -->
          <th> tapbier soorten </th>
          <th> prijs </th>
        </tr>
        <?php  
        include_once "classdatabase.php";

            $pdo = new database("localhost", "restaurantverhoeven", "root", "", "utf8mb4");
            $records=$pdo->tapbier();
            foreach($records as $res) {
        ?>
        <tr class="text-center">
 <!--          <td> <?php echo $res['id'];?> </td>  -->
          <td> <?php echo $res['tapbier_soorten'];?> </td>
          <td> &euro;<?php echo $res['prijs'];?> </td>
          
        </tr>
        <?php
          } 
        ?>
      </table>  
    </div>
  </div>

  <div class="container menu-box">
      <div class="col-lg-12">
        <br><br>
      <h1 class="text-warning text-center" > Voordekleintjes</h1>
      <br>
      <table class=" table table-striped table-hover table-bordered">
        <tr class="bg-dark text-white text-center">
<!--           <th> Id </th> -->
          <th> Voordekleintjes soorten </th>
          <th> prijs </th>
        </tr>
        <?php  
        include_once "classdatabase.php";

            $pdo = new database("localhost", "restaurantverhoeven", "root", "", "utf8mb4");
            $records=$pdo->voordekleintjes();
            foreach($records as $res) {
        ?>
        <tr class="text-center">
 <!--          <td> <?php echo $res['id'];?> </td>  -->
          <td> <?php echo $res['voordekleintjes_soorten'];?> </td>
          <td> &euro;<?php echo $res['prijs'];?> </td>
          
        </tr>
        <?php
        } 
        ?>
      </table>  
    </div>
  </div>

  <div class="container menu-box">
      <div class="col-lg-12">
        <br><br>
      <h1 class="text-warning text-center" > Voorgerechten</h1>
      <br>
      <table class=" table table-striped table-hover table-bordered">
        <tr class="bg-dark text-white text-center">
<!--           <th> Id </th> -->
          <th> voorgerechten soorten </th>
          <th> prijs </th>
        </tr>
        <?php  
        include_once "classdatabase.php";

            $pdo = new database("localhost", "restaurantverhoeven", "root", "", "utf8mb4");
            $records=$pdo->voorgerechten();
            foreach($records as $res) {
        ?>
        <tr class="text-center">
 <!--          <td> <?php echo $res['id'];?> </td>  -->
          <td> <?php echo $res['voorgerechten_soorten'];?> </td>
          <td> &euro;<?php echo $res['prijs'];?> </td>
          
        </tr>
        <?php
          } 
        ?>
      </table>  
    </div>
  </div>


</body>
</html>
