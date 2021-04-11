<?php
session_start(); //> This is required for php to initialize a session

$mystartingnumber = 20; //> This is your starting number

//> $_SESSION is the special array that PHP uses 
//> reading/writing keys from/to this array makes you able to store and fetch data from the session

//> We have to inizialize our sesison data. So if my number is not in the session we are going to put the starting value
if (!isset($_SESSION['myactualnumber'])) {
    $_SESSION['myactualnumber'] = $mystartingnumber;
}

//> We just have to replicate your decreasing logic here now
if (isset($_POST['submit'])) {
    echo $_SESSION['myactualnumber'];
    $_SESSION['myactualnumber']--;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  //> A POST request has sent to this page
}

?>

<form method='POST'>
    <input name='min' type="submit" value='Reserve'>
    <h3>Rooms:<em><?php echo $_SESSION['myactualnumber']-- ?> </em></h3>
</form