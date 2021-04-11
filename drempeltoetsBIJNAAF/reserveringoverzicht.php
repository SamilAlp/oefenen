<?php 
session_start();
include 'classdatabase.php';

// var_dump($_POST);

if(isset($_POST['submit'])){
// instance van je database class

$fieldnames = array(
  'username' ,
  'password' 
  );

$error = false;

  foreach ($fieldnames as $fieldname) {
     if (!isset($_POST[$fieldname]) || empty($_POST[$fieldname])){
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
    $pdo->loginadmin($username, $password);
    echo '<hr>';
   }else{
    echo "An error occured due to incorrect userinput. Please fix your error and try again.";
   }
}
?>

<!DOCTYPE html>
<html>
 <head>
  <title></title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="adminpage.css">
 </head>
<body>  
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <span class="navbar-toggler-icon"></span>
     <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
       <div class="navbar-nav">
          <a class style="margin-top: 8px; margin-left: 230px; font-size: 18px;" ="nav-item nav-link" href="reserveringoverzicht.php">Reservatie&nbsp;overzicht</a>
          <a class style="margin-top: 8px; margin-left: 270px; font-size: 18px;" ="nav-item nav-link" href="klantenoverzicht.php">Klanten&nbsp;overzicht</a>
          <a class style="margin-top: 8px; margin-left: 300px; font-size: 18px;"="nav-item nav-link disabled" href="factuuroverzicht.php">Factuur&nbsp;overzicht</a>
          <a href="medewerkerlogout.php">
          <button style="margin-left: 200px;" class="btn btn-primary" type="submit">Logout</button>
          </a>
       </div>
     </div>
  </nav>
  <div class="container">
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
          <td> <input type="text" id="naam" name="naam" required></td>
          <td> <input type="text" id="kamernummer" name="kamernummer" required></td>
          <td> <input type="submit" class="btn-white" value="Add" required> </td>
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