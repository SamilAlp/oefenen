<?php


	   // $i = 20;

	   // if(isset($_GET['submit'])){
	   // $i--;

	   // echo $i. "<br>";
	   // }
?>

<input type="submit" name="submit" value="submit">

<!-- // session_start();

// 	$num = 20;
// 	if (isset($_POST['submit'])) {
// 	  echo $num;
// 	  $num--;
// 	}

//     $_SESSION["numbers"] = 20;

// 	if (isset($_SESSION['numbers'])) {
//     echo "Rooms over : " . $_SESSION["numbers"] . ".";
//     $_SESSION["numbers"]--;
// 	}
//     $hotelkamers = 21;
//     if(isset($_POST['submit'])){

//        $hotelkamers--;

//        }
//     echo ($hotelkamers);     -->   

	
 <!-- <form method="POST">

// 	<input type="submit" class="btn btn-success"  value="submit" name="submit">
// </form>
// </body>
// </html> -->

<?php  
session_start();

 if (!isset($_POST['min'])) {
     $_SESSION['int'] = 20; // Reset counter
}
?>

 

<form method='post'>
    <input name='min' type="submit" value='Reserveer kamer'>
    <h3><em>Aantal kamers :<?php echo $_SESSION['int']-- ?>: </em></h3>
</form>


