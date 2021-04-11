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

    $pdo = new database("localhost", "examenoefen", "root", "", "utf8mb4");
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
	    	  <a class style="margin-top: 8px; margin-left: 230px; font-size: 18px;" ="nav-item nav-link" href="adminoverzicht.php">Overzicht&nbsp;website</a>
	    	  <a class style="margin-top: 8px; margin-left: 270px; font-size: 18px;" ="nav-item nav-link" href="jongerenactiviteit.php">Klanten&nbsp;overzicht</a>
	    	  <a class style="margin-top: 8px; margin-left: 300px; font-size: 18px;"="nav-item nav-link disabled" href="jongerenoverzicht.php">&nbsp;overzicht</a>
	    	  <a href="medewerkerlogout.php">
			    <button style="margin-left: 200px;" class="btn btn-primary" type="submit">Logout</button>
			    </a>
	     </div>
	   </div>
	</nav>
</body>
</html>