<?php  
include "classdatabase.php";
$id = $_GET['id'];
$pdo = new database("localhost", "drempeltoets", "root", "", "utf8mb4");

if(isset($_POST['submit'])){

	$id = $_POST["id"];
	$factuur = $_POST['factuur'];
    $reserveringdatumvanaf = $_POST['reserveringdatumvanaf'];
    $reserveringdatumtot = $_POST['reserveringdatumtot'];
	$klant = $_POST['klant'];

    //echo "Calling login<br>";
    //die("Post ID: $id");
    
   
    $pdo->updatefactuur($id, $factuur, $reserveringdatumvanaf, $reserveringdatumtot, $klant);
    header('location:factuuroverzicht.php');
}	

$records=$pdo->selectfactuurtable($id);
$factuur=$records[0]["factuur"];
$reserveringdatumvanaf=$records[0]["reserveringdatumvanaf"];
$reserveringdatumtot=$records[0]["reserveringdatumtot"];
$klant=$records[0]["klant"];
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
</head>
<body>
	<div class="col-lg-6 m-auto">
		<form method="POST" action="">
			<br><br><div class="card" style="color: #FFF;">
				<div class="card-header bg-dark">
					<h1 class="text-white"> Update medewerker</h1>
				</div>

				<label><font color="blue">factuur:</font></label>
				<input type="text" name="factuur" class="form-control" placeholder="factuur" value="<?php echo $factuur; ?>"> <br>

				<label><font color="blue"> reserveringdatumvanaf:</font> </label>
				<input type="text" name="reserveringdatumvanaf" class="form-control" placeholder="reserveringdatumvanaf" value="<?php echo $reserveringdatumvanaf; ?>"> <br>
				
				<label><font color="blue">reserveringdatumtot:</font></label>
				<input type="text" name="reserveringdatumtot" class="form-control" placeholder="reserveringdatumtot" value="<?php echo $reserveringdatumtot; ?>"> <br>

				<label><font color="blue">klant:</font></label>
				<input type="text" name="klant" class="form-control" placeholder="klant" value="<?php echo $klant; ?>"> <br>

				<input type="hidden" name="id" value="<?php echo $id; ?>">

				<button class="btn btn-success" type="sumbit" name="submit"> Wijzig gegevens </button>
			</div>
		</form>
	</div>
</body>
</html>