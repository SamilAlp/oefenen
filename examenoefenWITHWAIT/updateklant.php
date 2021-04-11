<?php  
include "classdatabase.php";
$id = $_GET['id'];
$pdo = new database("localhost", "examenoefen", "root", "", "utf8mb4");

if(isset($_POST['submit'])){

	$id = $_POST["id"];
	$naam = $_POST['naam'];
    $adres = $_POST['adres'];
    $plaats = $_POST['plaats'];
	$postcode = $_POST['postcode'];
	$telefoon = $_POST['telefoon'];

    //echo "Calling login<br>";
    //die("Post ID: $id");
    
   
    $pdo->updateklant($id, $naam, $adres, $plaats, $postcode, $telefoon);
    header('location:klantenoverzicht.php');
}	

$records=$pdo->selectklanttable($id);
$naam=$records[0]["naam"];
$adres=$records[0]["adres"];
$plaats=$records[0]["plaats"];
$postcode=$records[0]["postcode"];
$telefoon=$records[0]["telefoon"];
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

				<label><font color="blue">naam:</font></label>
				<input type="text" name="naam" class="form-control" placeholder="naam" value="<?php echo $naam; ?>"> <br>

				<label><font color="blue"> adres:</font> </label>
				<input type="text" name="adres" class="form-control" placeholder="adres" value="<?php echo $adres; ?>"> <br>
				
				<label><font color="blue">plaats:</font></label>
				<input type="text" name="plaats" class="form-control" placeholder="plaats" value="<?php echo $plaats; ?>"> <br>

				<label><font color="blue">postcode:</font></label>
				<input type="text" name="postcode" class="form-control" placeholder="postcode" value="<?php echo $postcode; ?>"> <br>

				<label><font color="blue">telefoon:</font></label>
				<input type="text" name="telefoon" class="form-control" placeholder="telefoon" value="<?php echo $telefoon; ?>"> <br>

				<input type="hidden" name="id" value="<?php echo $id; ?>">

				<button class="btn btn-success" type="sumbit" name="submit"> Wijzig gegevens </button>
			</div>
		</form>
	</div>
</body>
</html>