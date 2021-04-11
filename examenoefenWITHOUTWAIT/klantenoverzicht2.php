<?php 
session_start();
include 'classdatabase.php';
$pdo = new database("localhost", "examenoefen", "root", "", "utf8mb4");

if(isset($_POST['submit'])){

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
  <link rel="stylesheet" type="text/css" href="stylesearchfor.css.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
<!DOCTYPE html>
<html>
<head>

<form class="example" action="klantenoverzicht2.php" method="GET">
  <input type="text" placeholder="Zoeken bij Plaats/Naam.." name="peter">
  <button type="submit"><i class="fa fa-search"></i></button>
</form>

        <?php
        if (!empty($_GET['peter'])) {
            $peter = trim($_GET['peter']);
            // var_dump($_GET);
            $data = $pdo->zoekplaats($peter);
        ?>


<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
</style>
</head>

<body>
  <div class="container">
      <div class="col-lg-12">
        <br><br>
      <h1 class="text-warning text-center" > Klanten overzicht </h1>
      <br>
      <table class=" table table-striped table-hover table-bordered">
        <tr class="bg-dark text-white text-center">
          <th> id </th>
          <th> naam </th>
          <th> adres </th>
          <th> plaats </th>
          <th> postcode </th>
          <th> telefoon </th>
          <th> Delete user </th>
          <th> Eddit user </th>
        </tr> 
        <?php  
            // $records=$pdo->klant();
            foreach($data as $res) {
        ?>


        <tr class="text-center">
          <td> <?php echo $res['id'];?> </td>
          <td> <?php echo $res['klant'];?> </td>
          <td> <?php echo $res['adres'];?> </td>
          <td> <?php echo $res['plaats'];?> </td>
          <td> <?php echo $res['postcode'];?> </td>
          <td> <?php echo $res['telefoon'];?> </td>
          <td> <button class="btn-danger"> <a href="deleteklant.php?id= <?php echo $res['id']; ?>" class ="text-white">  Delete </a> </button> </td>
          <td> <button class="btn-white"> <a href="updateklant.php?id=<?php echo $res['id']; ?>" calss="text-danger"> Update </a> </button> </td>
        </tr>
        <?php  
        }
        }
        ?>        

      </table>  
    </div>
  </div>



<br>
  <div class="container">
      <div class="col-lg-12">
        <br><br>
      <h1 class="text-warning text-center" > Klanten toevoegen </h1>
      <br>
      <form action="klantadd.php" method="POST">
      <table class=" table table-striped table-hover table-bordered">
        <tr class="bg-dark text-white text-center">

          <th> naam </th>
          <th> adres </th>
          <th> plaats </th>
          <th> postcode </th>
          <th> telefoon </th>
          <th> Add klant </th>
        </tr>
        <?php  
        {
        ?>
        <tr class="text-center">
          <td> <input type="text" id="naam" name="naam" required></td>
          <td> <input type="text" id="adres" name="adres" required></td>
          <td> <input type="text" id="plaats" name="plaats" required></td>
          <td> <input type="text" id="postcode" name="postcode" required></td>
          <td> <input type="text" id="telefoon" name="telefoon" required></td>
          <td> <input type="submit" class="btn-white" value="Add"> </td>
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