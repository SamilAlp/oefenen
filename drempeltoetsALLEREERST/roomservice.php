<?php
include "classdatabase.php";

session_start();

if(isset($_POST['submit'])){
// instance van je database class

}

?>



<!DOCTYPE html>
<html>
 <head>
  <title></title>
   </head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <meta charset="utf-8">
  <!-- Somehow I got an error, so I comment the title, just uncomment to show -->
  <!-- <title>Responsive Navigation Bar</title> -->
  <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="mainstyle.css">
<body style="background: #091047">
    <nav>
      <ul>
        <li class="logo">Hotel Der Tuin</li>
        <li class="items"><a href="index.php">Website overview </a></li>
        <li class="items"><a href="advise.php">Advise</a></li>
        <li class="items"><a href="indexreservaties.php">Reservaties</a></li>
        <li class="items"><a href="contact.php">Contact</a></li>
       <!--  <li class="items"> <a href="loginCustomer.php"> <button class="btn btn-primary" type="submit"> Login </button></a><li>   -->
      </ul>
    </nav>
    <div class="container"> 
        <div class="img1">
          <img src="images/png1.jpg" style="width:45%; float:center;height: 280px;" >
          <img src="images/png2.jpg" style="width:40%; float:center; height: 280px;">
        </div>  
    </div>
  <div class style="margin-top: 200px;">    
      <div class="col-lg-12">
        <br><br>
      <br>
      <form action="succesmetroomservice.php" method="POST">        
      <table class=" table table-striped table-hover table-bordered">
        <tr class="bg-dark text-white text-center">
          <th> Drinken </th>
          <th> Warm eten </th>
          <th> Aanvraag </th>
        </tr>
    
        <tr class="text-center">
          <h1 class ="text-warning text-center" > Roomservice bestellen! </h1>
          <!-- <td> <input type="text" id="naam" name="naam" placeholder="naam.." required ></td> -->
           <td> 
            <select name="drinken" id="cars" required>
              <option value="">None</option>
              <option value="Fanta">Fanta ($4)</option>
              <option value="Water">Water ($5)</option>
              <option value="Fanta">Fanta ($5)</option>
              <option value="Sprite">Sprite ($5)</option>
            </select>
          </td>
          <td> 
            <select name="eten" id="cars" required>
              <option value="">None</option>
              <option value="Vis">Vis ($20)</option>
              <option value="Vispesto">VisPesto ($25)</option>
              <option value="Pasta">Pasta ($15)</option>
              <option value="Pesto">Pesto ($20)</option>
            </select>
          </td>
          <td> <input name="pieter" type="submit" value="Bestellen!"> </td>
        </tr>       
      </table>
      </form>
         
    </div>
  </div> 
  
</body>
</html>
