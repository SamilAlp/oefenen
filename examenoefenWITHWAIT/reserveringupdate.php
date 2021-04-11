<?php  
include "classdatabase.php";
$id = $_GET['id'];
$pdo = new database("localhost", "examenoefen", "root", "", "utf8mb4");

if(isset($_POST['submit'])){

	$id = $_POST["id"];
	$naam = $_POST['naam'];
    $kamernummer = $_POST['kamernummer'];

    //echo "Calling login<br>";
    //die("Post ID: $id");
    
    $pdo->updatereservering($id, $naam, $kamernummer);
    header('location:reserveringoverzicht.php');
}	

$records= $pdo->selectreservatietable($id);
$naam=$records[0]["naam"];
$kamernummer=$records[0]["kamernummer"];

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

				<label><font color="blue">Voornaam:</font></label>
				<input type="text" name="naam" class="form-control" placeholder="naam" value="<?php echo $naam; ?>"> <br>

				<label><font color="blue"> Achternaam:</font> </label>
				<input type="text" name="kamernummer" class="form-control" placeholder="kamernummer" value="<?php echo $kamernummer; ?>"> <br>
				
				<input type="hidden" name="id" value="<?php echo $id; ?>">

				<button class="btn btn-success" type="sumbit" name="submit"> Wijzig gegevens </button>
			</div>
		</form>
	</div>
</body>
</html>