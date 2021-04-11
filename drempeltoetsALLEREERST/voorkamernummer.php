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

    $pdo = new database("localhost", "drempeltoets", "root", "", "utf8mb4");
    $pdo->InsertTabellen($username, $password);
    echo '<hr>';
   }  
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
 
  <div class style="margin-top: 200px;">    
      <div class="col-lg-12">
        <br><br>

      <br>

<!-- <form style="margin-top: 200px; color: #fff;" method='post'>
  <h3>Aantal kamers: <?= $_SESSION['counter'] ?> </h3>
  <input name='reserve' type="submit" value='Reserveer'>
</form> -->


<!-- <form style="margin-top: 200px; color: #FFF;" method='post'>
  <h3>Aantal kamers: <?= $_SESSION['counter'] ?> </h3>
  <input name='reserve' type="submit" value='Reserveer'>
</form> -->



      <form action="succesmetkiezen.php" method="POST">        
      <table class=" table table-striped table-hover table-bordered">
        <tr class="bg-dark text-white text-center">
          <!-- <th> naam </th> -->
          <th> kamernummer </th>
          <th> Aanvraag </th>
        </tr>
        <?php  
        include_once "classdatabase.php";

            $pdo = new database("localhost", "drempeltoets", "root", "", "utf8mb4");
            // $records=$pdo->jongeren();
            // foreach($records as $res) 
            {

        if (!isset($_SESSION['counter'])) {
          $_SESSION['counter'] = 20;
        }

        if (isset($_POST['pieter'])) {
          $_SESSION['counter']--;
        }              
        ?>      
        <tr class="text-center">
          <h1 class ="text-warning text-center" > Reservering add </h1>
          <!-- <td> <input type="text" id="naam" name="naam" placeholder="naam.." required ></td> -->
          <td> 
            <select name="kamernummer" id="cars" required>
              <option value="">None</option>
              <option value="1">Kamer1 ($60)</option>
              <option value="2">Kamer2 ($50)</option>
              <option value="3">Kamer3 ($20)</option>
              <option value="4">Kamer4 ($30)</option>
              <option value="5">Kamer5 ($50)</option>
              <option value="6">Kamer6 ($80)</option>
              <option value="7">Kamer7 ($50)</option>
              <option value="8">Kamer8 ($50)</option>
              <option value="9">Kamer9 ($50)</option>
              <option value="10">Kamer10 ($50)</option>
              <option value="11">Kamer11 ($70)</option>
              <option value="12">Kamer12 ($30)</option>
              <option value="13">Kamer13 ($40)</option>
              <option value="14">Kamer14 ($50)</option>
              <option value="15">Kamer15 ($50)</option>
              <option value="16">Kamer16 ($50)</option>
              <option value="17">Kamer17 ($50)</option>
              <option value="18">Kamer18 ($50)</option>
              <option value="19">Kamer19 ($50)</option>
              <option value="20">Kamer20 ($50)</option>
            </select>
          </td>
          <td> <input name="pieter" type="submit" value="add!"> </td>
          <h3 style="color: #FFF;">Amount of rooms: <?= $_SESSION['counter'] ?> </h3>
            <label for="cars"></label>
        </tr>       
        <?php
          } 
        ?>
      </table>
      </form>
         
    </div>
  </div> 
  
</body>
</html>

--------------------------------------

<!--           <form action="">
            <label for="cars"></label>
            <select name="cars" id="cars" required>
              <option value="">None</option>
              <option value="Kamer1">Kamer1</option>
              <option value="Kamer1">Kamer2</option>
              <option value="Kamer1">Kamer3</option>
              <option value="Kamer1">Kamer4</option>
              <option value="Kamer1">Kamer5</option>
              <option value="Kamer1">Kamer6</option>
              <option value="Kamer1">Kamer7</option>
              <option value="Kamer1">Kamer8</option>
              <option value="Kamer1">Kamer9</option>
              <option value="Kamer1">Kamer10</option>
              <option value="Kamer1">Kamer11</option>
              <option value="Kamer1">Kamer12</option>
              <option value="Kamer1">Kamer13</option>
              <option value="Kamer1">Kamer14</option>
              <option value="Kamer1">Kamer15</option>
              <option value="Kamer1">Kamer16</option>
              <option value="Kamer1">Kamer17</option>
              <option value="Kamer1">Kamer18</option>
              <option value="Kamer1">Kamer19</option>
              <option value="Kamer1">Kamer20</option>
            </select>
          </form> -->

<!--   <div class="container">
      <div class="col-lg-12">
        <br><br>
      <h1 class="text-warning text-center" > Reservatie overzicht </h1>
      <br>
      <table class=" table table-striped table-hover table-bordered">
        <tr class="bg-dark text-white text-center">
          <th> id </th>
          <th> naam </th>
          <th> kamernummer </th>
          <th> Delete user </th>
          <th> Eddit user </th>
        </tr>
        <?php  
        include_once "classdatabase.php";

            $pdo = new database("localhost", "drempeltoets", "root", "", "utf8mb4");
            $records=$pdo->reservatie();
            foreach($records as $res) {
        ?>
        <tr class="text-center">
          <td> <?php echo $res['id'];?> </td>
          <td> <?php echo $res['naam'];?> </td>
          <td> <?php echo $res['kamernummer'];?> </td>
          <td> <button class="btn-danger"> <a href="deletereservering.php?id= <?php echo $res['id']; ?>" class ="text-white">  Delete </a> </button> </td>
          <td> <button class="btn-white"> <a href="reserveringupdate.php?id=<?php echo $res['id']; ?>" calss="text-danger"> Update </a> </button> </td>
        </tr>
        <?php
          } 
        ?>
      </table>  
    </div>
  </div>
<br>
  <div class="container">
      <div class="col-lg-12">
        <br><br>
      <h1 class="text-warning text-center" > Reservering toevoegen </h1>
      <br>
      <form action="reserveringadd.php" method="POST">
      <table class=" table table-striped table-hover table-bordered">
        <tr class="bg-dark text-white text-center">

          <th> naam </th>
          <th> kamernummer </th>
          <th> Add klantkamer </th>
        </tr>
        <?php  
        include_once "classdatabase.php";

            $pdo = new database("localhost", "drempeltoets", "root", "", "utf8mb4");
            // $records=$pdo->jongeren();
            // foreach($records as $res) 
            {
        ?>
        <tr class="text-center">
          <td> <input type="text" id="naam" name="naam"></td>
          <td> <input type="text" id="kamernummer" name="kamernummer"></td>
          <td> <input type="submit" class="btn-white" value="Add"> </td>
        </tr>
        <?php
          } 
        ?>
      </table>
      </form>   
    </div>
  </div> -->