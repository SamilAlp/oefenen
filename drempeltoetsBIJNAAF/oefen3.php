<?php
// session_start();

// if (!isset($_SESSION['counter'])) {
//   $_SESSION['counter'] = 20;
// }

// if (isset($_POST['reserve'])) {
//   $_SESSION['counter']--;
//   // Change discord.php to the file name of this file
//   header('Location: oefen3.php');
//   exit;
// }

// $message = "rooms almost sold out!";
// if ($_SESSION['counter'] === 10) {

// echo "<script type='text/javascript'>alert('$message');</script>";
// }

function search($array, $key, $value)
{
    $results = array();

    if (is_array($array))
    {
        if (isset($array[$key]) && $array[$key] == $value)
            $results[] = $array;

        foreach ($array as $subarray)
            $results = array_merge($results, search($subarray, $key, $value));
    }

    return $results;
}


?>

<!-- <form method='post'>
	<h3>Aantal kamers: <?= $_SESSION['counter'] ?> </h3>
	<input name='reserve' type="submit" value='Reserveer'>
</form> -->