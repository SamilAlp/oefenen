<?php 
session_start();
include 'classdatabase.php';

// var_dump($_POST);

if(isset($_POST['submit'])){
// instance van je database class

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
          <a class nav-item nav-link2 style="margin-top: 8px; margin-left: 230px; font-size: 18px;" href="reserveringoverzicht.php">Reservatie&nbsp;overzicht</a>
          <a class nav-item nav-link style="margin-top: 8px; margin-left: 270px; font-size: 18px;" href="klantenoverzicht.php">Klanten&nbsp;overzicht</a>
          <a class nav-item nav-link disabled style="margin-top: 8px; margin-left: 300px; font-size: 18px;" href="factuuroverzicht.php">Factuur&nbsp;overzicht</a>
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
          <th> Allow Customer </th>
        </tr>
        <?php  
        include_once "classdatabase.php";

            $pdo = new database("localhost", "examenoefen", "root", "", "utf8mb4");
            $records=$pdo->reservatieAll();
            foreach($records as $res) {
        ?>
        <tr class="text-center">
          <td> <?php echo $res['id'];?> </td>
          <td> <?php echo $res['naam'];?> </td>
          <td> <?php echo $res['kamernummer'];?> </td>
          <td> <button class="btn-danger"> <a href="deletereservering.php?id=<?php echo $res['id']; ?>&klant_id=<?php echo $res['naam_id'];?>" class ="text-white">  Delete </a> </button> </td>
          <td> <button class="btn-white"> <a href="reserveringupdate.php?id=<?php echo $res['id']; ?>" calss="text-danger"> Update </a> </button> </td>
          <td>
            <?php if(!$res['allow_klant']) { ?>
            <button class="btn-white"> <a href="allowfurther.php?id=<?php echo $res['id']; ?>" calss="text-danger"> Allow further! </a> </button>
            <?php } ?>
          </td>
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
      <h1 class="text-warning text-center" > Reservatie Bar overzicht </h1>
      <br>
      <table class=" table table-striped table-hover table-bordered">
        <tr class="bg-dark text-white text-center">
          <th> id </th>
          <th> naam </th>
          <th> Delete user </th>
          <th> Eddit user </th>
          <th> Allow Customer </th>
        </tr>
        <?php  
        include_once "classdatabase.php";

            $pdo = new database("localhost", "examenoefen", "root", "", "utf8mb4");
            $records=$pdo->reservatieBarAll();
            foreach($records as $res) {
        ?>
        <tr class="text-center">
          <td> <?php echo $res['id'];?> </td>
          <td> <?php echo $res['naam'];?> </td>
          <td> <button class="btn-danger"> <a href="deletereserveringbar.php?id=<?php echo $res['id']; ?>&klant_id=<?php echo $res['naam_id'];?>" class ="text-white">  Delete </a> </button> </td>
          <td> <button class="btn-white"> <a href="reserveringupdate.php?id=<?php echo $res['id']; ?>" calss="text-danger"> Update </a> </button> </td>
          <td>
            <?php if(!$res['allow_klant']) { ?>
            <button class="btn-white"> <a href="allowfurtherbar.php?id=<?php echo $res['id']; ?>" calss="text-danger"> Allow further! </a> </button>
            <?php } ?>
          </td>
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
      <table class="table table-striped table-hover table-bordered">
        <tr class="bg-dark text-white text-center">

          <th> naam </th>
          <th> kamernummer </th>
          <th> Add klantkamer </th>
        </tr>
        <?php  
        include_once "classdatabase.php";

            $pdo = new database("localhost", "examenoefen", "root", "", "utf8mb4");
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