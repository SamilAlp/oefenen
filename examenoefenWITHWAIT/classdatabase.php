<?php  

class database{
    //properties = variabelen in een class
   private $host;
   private $database_name;
   private $user;
   private $password;
   private $charset; 
   private $pdo;     
 
  // constructor
    public function __construct($host, $database_name, $user, $password, $charset) {
     $this->host = $host;//127.0.0.1";
     $this->database_name = $database_name;//"test";
     $this->user =$user;//"root";
     $this->password = $password;//"";
     $this->charset = $charset;//"utf8mb4";

   try{
    $dsn = 'mysql:host='.$this->host.';dbname='.$this->database_name.';charset='.$this->charset;
    $this->pdo = new PDO($dsn,$this->user, $this->password);
    $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


   } catch (\PDOException $e) {
        echo "Database connection failed <br>". $e->getMessage();
    } 
  }

    public function loginadmin($username, $password){
    echo $username, $password;
    try{
      $this->pdo->beginTransaction();
            
        $stmt = $this->pdo->prepare("SELECT * FROM medewerker where username = :username AND password = PASSWORD(:password)"); 

        $stmt->bindParam(':username',$username);
        $stmt->bindParam(':password',$password);
        $stmt->execute();
        $rowCount = $stmt->rowCount();
        print_r($rowCount);
        if ($rowCount > 0)
        {   
            session_start();
            $_SESSION["username"] = $_POST["username"];
            header("Location: reserveringoverzicht.php");
        }
        else
        {
            echo "Wrong username or password!";;
        }
    }catch(PDOException $e){
      $this->pdo->rollback();
       echo "failed: ". $e->getMessage() . "<br />" . $e->getTraceAsString(); die;
    }
  }

  //   public function justlogout($username, $password){
  //   try{
  //     $this->pdo->beginTransaction();
            
  //           session_start();
  //           unset($_SESSION["username"] = $_POST["username"]);
  //           header("Location: medewerkerlogin.php");    

  //   }catch(PDOException $e){
  //     $this->pdo->rollback();
  //      echo "failed: ". $e->getMessage() . "<br />" . $e->getTraceAsString(); die;
  //   }
  // }
 

    public function reservatiemode($naam, $kamernummer){
    try{
      $this->pdo->beginTransaction();
      $stmt = $this->pdo->prepare("SELECT * from reservatie where naam = $naam AND kamernummer = $kamernummer");
      $stmt->execute();
      $records = $stmt->fetchAll();

      
    }catch(PDOException $e){
      $this->pdo->rollback();
       echo "failed: ". $e->getMessage() . "<br />" . $e->getTraceAsString(); die;
    }
    return $records;
  }

    public function reservatieAll(){
    try{
      // $this->pdo->beginTransaction();
      $stmt = $this->pdo->prepare("SELECT * from reservatie");
      $stmt->execute();
      $records = $stmt->fetchAll();

      
    }catch(PDOException $e){
      $this->pdo->rollback();
       echo "failed: ". $e->getMessage() . "<br />" . $e->getTraceAsString(); die;
    }
    return $records;
  }


  public function disallowreservatie($id){
    try{
      $this->pdo->beginTransaction();
      $stmt = $this->pdo->prepare("UPDATE reservatie SET allow_klant = 0 where id='$id'");
      $stmt->execute();
        
      $this->pdo->commit();
    }catch(PDOException $e){
      $this->pdo->rollback();
       echo "failed: ". $e->getMessage() . "<br />" . $e->getTraceAsString(); die;
    }
  }


  public function allowreservatie($id){
    try{
      $this->pdo->beginTransaction();
      $stmt = $this->pdo->prepare("UPDATE reservatie SET allow_klant = 1 where id='$id'");
      $stmt->execute();
        
      $this->pdo->commit();
    }catch(PDOException $e){
      $this->pdo->rollback();
       echo "failed: ". $e->getMessage() . "<br />" . $e->getTraceAsString(); die;
    }
  }

    public function reservatie($id){
    try{
      // $this->pdo->beginTransaction();
      $stmt = $this->pdo->prepare("SELECT * from reservatie where id='$id'");
      $stmt->execute();
      $records = $stmt->fetch();

      
    }catch(PDOException $e){
      $this->pdo->rollback();
       echo "failed: ". $e->getMessage() . "<br />" . $e->getTraceAsString(); die;
    }
    return $records;
  }

  public function reservatie_exist($naam, $kamernummer, $naam_id){
    try{
      $stmt = $this->pdo->prepare("SELECT * FROM reservatie where naam='$naam' AND kamernummer='$kamernummer' AND naam_id='$naam_id'");
      $stmt->execute();
      $records = $stmt->fetch();
      // var_dump($records); die;
      // $lastInsertId = $this->pdo->lastInsertId();
      // $this->pdo->commit();
      return $records;

    }catch(PDOException $e){
       echo "failed: ". $e->getMessage() . "<br />" . $e->getTraceAsString(); die;
    }
  }

  public function reservatieadd($naam_id, $naam, $kamernummer){
    try{
      $this->pdo->beginTransaction();
      $stmt = $this->pdo->prepare("INSERT INTO reservatie (naam_id, naam, kamernummer)
      VALUES ('$naam_id', '$naam', '$kamernummer')");
      $stmt->execute();
      // $records = $stmt->fetchAll();
      $lastInsertId = $this->pdo->lastInsertId();
      $this->pdo->commit();
      return $lastInsertId;

    }catch(PDOException $e){
      $this->pdo->rollback();
       echo "failed: ". $e->getMessage() . "<br />" . $e->getTraceAsString(); die;
    }
  }


  public function deletereservatie($id, $klant_id){
    try{
      // var_dump($id); die;
      // $this->pdo->beginTransaction();
      // delete foregin key of klant first
      $stmt = $this->pdo->prepare("DELETE FROM klant WHERE id = '$klant_id'");
      $stmt->execute();

      $stmt = $this->pdo->prepare("DELETE FROM reservatie WHERE id = '$id'");
      $stmt->execute();
      
      // $this->pdo->commit();

    }catch(PDOException $e){
      // $this->pdo->rollback();
       echo "failed: ". $e->getMessage() . "<br />" . $e->getTraceAsString(); die;
        die;
    }
  }


  public function reservatieBarAll(){
    try{
      // $this->pdo->beginTransaction();
      $stmt = $this->pdo->prepare("SELECT * from reservatie_bar");
      $stmt->execute();
      $records = $stmt->fetchAll();

      
    }catch(PDOException $e){
      $this->pdo->rollback();
       echo "failed: ". $e->getMessage() . "<br />" . $e->getTraceAsString(); die;
    }
    return $records;
  }

  public function disallowreservatiebar($id){
    try{
      $this->pdo->beginTransaction();
      $stmt = $this->pdo->prepare("UPDATE reservatie_bar SET allow_klant = 0 where id='$id'");
      $stmt->execute();
        
      $this->pdo->commit();
    }catch(PDOException $e){
      $this->pdo->rollback();
       echo "failed: ". $e->getMessage() . "<br />" . $e->getTraceAsString(); die;
    }
  }

  public function allowreservatiebar($id){
    try{
      $this->pdo->beginTransaction();
      $stmt = $this->pdo->prepare("UPDATE reservatie_bar SET allow_klant = 1 where id='$id'");
      $stmt->execute();
        
      $this->pdo->commit();
    }catch(PDOException $e){
      $this->pdo->rollback();
       echo "failed: ". $e->getMessage() . "<br />" . $e->getTraceAsString(); die;
    }
  }

  public function reservatiebar_exist($naam, $naam_id){
    try{
      $stmt = $this->pdo->prepare("SELECT * FROM reservatie_bar where naam='$naam' AND naam_id='$naam_id'");
      $stmt->execute();
      $records = $stmt->fetch();
      return $records;

    }catch(PDOException $e){
       echo "failed: ". $e->getMessage() . "<br />" . $e->getTraceAsString(); die;
    }
  }

  public function reservatiebaradd($naam_id, $naam){
    try{
      $this->pdo->beginTransaction();
      $stmt = $this->pdo->prepare("INSERT INTO reservatie_bar (naam_id, naam)
      VALUES ('$naam_id', '$naam')");
      $stmt->execute();
      // $records = $stmt->fetchAll();
      $lastInsertId = $this->pdo->lastInsertId();
      $this->pdo->commit();
      return $lastInsertId;

    }catch(PDOException $e){
      $this->pdo->rollback();
       echo "failed: ". $e->getMessage() . "<br />" . $e->getTraceAsString(); die;
    }
  }
  public function deletereservatiebar($id, $klant_id){
    try{
      // var_dump($id); die;
      // $this->pdo->beginTransaction();
      // delete foregin key of klant first
      $stmt = $this->pdo->prepare("DELETE FROM klant WHERE id = '$klant_id'");
      $stmt->execute();

      $stmt = $this->pdo->prepare("DELETE FROM reservatie_bar WHERE id = '$id'");
      $stmt->execute();
      
      // $this->pdo->commit();

    }catch(PDOException $e){
      // $this->pdo->rollback();
       echo "failed: ". $e->getMessage() . "<br />" . $e->getTraceAsString(); die;
        die;
    }
  }


  public function reservatieBar($id){
    try{
      // $this->pdo->beginTransaction();
      $stmt = $this->pdo->prepare("SELECT * from reservatie_bar where id='$id'");
      $stmt->execute();
      $records = $stmt->fetch();

      
    }catch(PDOException $e){
      $this->pdo->rollback();
       echo "failed: ". $e->getMessage() . "<br />" . $e->getTraceAsString(); die;
    }
    return $records;
  }
  public function updatereservering($id, $naam, $kamernummer){
    try{
      $this->pdo->beginTransaction();
      // $password=md5($password);
      //echo "update account set username='$username', password='$password' where id=$id";
      $stmt = $this->pdo->prepare("update reservatie set naam='$naam', kamernummer='$kamernummer' where id=$id");
      $stmt->execute();
        
      $this->pdo->commit();
    }catch(PDOException $e){
      $this->pdo->rollback();
       echo "failed: ". $e->getMessage() . "<br />" . $e->getTraceAsString(); die;
    }
  }



  public function selectreservatietable($id){
    try{
      $this->pdo->beginTransaction();
      $stmt = $this->pdo->prepare("SELECT * from reservatie WHERE id=$id");
      $stmt->execute();
      $records= $stmt->fetchAll();
      
    }catch(PDOException $e){
      $this->pdo->rollback();
       echo "failed: ". $e->getMessage() . "<br />" . $e->getTraceAsString(); die;
    }
      return $records;
  }

  public function klant(){
    try{
      $this->pdo->beginTransaction();
      $stmt = $this->pdo->prepare("SELECT * from klant");
      $stmt->execute();
      $records = $stmt->fetchAll();

      
    }catch(PDOException $e){
      $this->pdo->rollback();
       echo "failed: ". $e->getMessage() . "<br />" . $e->getTraceAsString(); die;
    }
    return $records;
  }

  public function klantadd($klant, $adres, $plaats, $postcode, $telefoon){
    try{
      $this->pdo->beginTransaction();
      $stmt = $this->pdo->prepare("INSERT INTO klant (klant, adres, plaats, postcode, telefoon)
      VALUES ('$klant', '$adres', '$plaats', '$postcode', '$telefoon')");
      $stmt->execute();
      // $records = $stmt->fetchAll();
      $lastInsertId = $this->pdo->lastInsertId();
      $this->pdo->commit();

      return $lastInsertId;

    }catch(PDOException $e){
      $this->pdo->rollback();
       echo "failed: ". $e->getMessage() . "<br />" . $e->getTraceAsString(); die;
    }
    return $records;
  }

  public function deleteklant($id){
    try{
      $this->pdo->beginTransaction();
      $stmt = $this->pdo->prepare("DELETE FROM klant WHERE id = $id");
      $stmt->execute();
      
      $this->pdo->commit();

    }catch(PDOException $e){
      $this->pdo->rollback();
       echo "failed: ". $e->getMessage() . "<br />" . $e->getTraceAsString(); die;
    }
  }

public function updateklant($id, $naam, $adres, $plaats, $postcode, $telefoon){
    try{
      $this->pdo->beginTransaction();
      // $password=md5($password);
      //echo "update account set username='$username', password='$password' where id=$id";
      $stmt = $this->pdo->prepare("update klant set naam='$naam', adres='$adres', plaats='$plaats', postcode='$postcode', telefoon='$telefoon' where id=$id");
      $stmt->execute();
        
      $this->pdo->commit();
    }catch(PDOException $e){
      $this->pdo->rollback();
       echo "failed: ". $e->getMessage() . "<br />" . $e->getTraceAsString(); die;
    }
  }


public function selectklanttable($id){
    try{
      $this->pdo->beginTransaction();
      $stmt = $this->pdo->prepare("SELECT * from klant WHERE id=$id");
      $stmt->execute();
      $records= $stmt->fetchAll();
      
    }catch(PDOException $e){
      $this->pdo->rollback();
       echo "failed: ". $e->getMessage() . "<br />" . $e->getTraceAsString(); die;
    }
      return $records;
  }

public function factuurtotale(){
    try{
      $this->pdo->beginTransaction();
      $stmt = $this->pdo->prepare("SELECT * from factuurroomservice AND factuur where id=$id");
      $stmt->execute();
      $records = $stmt->fetchAll();

      
    }catch(PDOException $e){
      $this->pdo->rollback();
       echo "failed: ". $e->getMessage() . "<br />" . $e->getTraceAsString(); die;
    }
    return $records;
  }



public function kamerdetails($id){
    try{
      // $this->pdo->beginTransaction();
      $stmt = $this->pdo->prepare("SELECT * from kamer where id='$id'");
      $stmt->execute();
      $records = $stmt->fetch();
      
    }catch(PDOException $e){
      // $this->pdo->rollback();
       echo "failed: ". $e->getMessage() . "<br />" . $e->getTraceAsString(); die;
    }
    return $records;
  }


public function kamer(){
    try{
      // $this->pdo->beginTransaction();
      $stmt = $this->pdo->prepare("SELECT * from kamer");
      $stmt->execute();
      $records = $stmt->fetchAll();

      
    }catch(PDOException $e){
      // $this->pdo->rollback();
       echo "failed: ". $e->getMessage() . "<br />" . $e->getTraceAsString(); die;
    }
    return $records;
  }

public function etendetails($id){
    try{
      // $this->pdo->beginTransaction();
      $stmt = $this->pdo->prepare("SELECT * from eten where id='$id'");
      $stmt->execute();
      $records = $stmt->fetch();
      
    }catch(PDOException $e){
      // $this->pdo->rollback();
       echo "failed: ". $e->getMessage() . "<br />" . $e->getTraceAsString(); die;
    }
    return $records;
  }

public function klantdetails($id){
    try{
      // $this->pdo->beginTransaction();
      $stmt = $this->pdo->prepare("SELECT * from klant where id='$id'");
      $stmt->execute();
      $records = $stmt->fetch();
      
    }catch(PDOException $e){
      // $this->pdo->rollback();
       echo "failed: ". $e->getMessage() . "<br />" . $e->getTraceAsString(); die;
    }
    return $records;
  }
public function eten(){
    try{
      // $this->pdo->beginTransaction();
      $stmt = $this->pdo->prepare("SELECT * from eten");
      $stmt->execute();
      $records = $stmt->fetchAll();

      
    }catch(PDOException $e){
      // $this->pdo->rollback();
       echo "failed: ". $e->getMessage() . "<br />" . $e->getTraceAsString(); die;
    }
    return $records;
  }

public function snackdetails($id){
    try{
      // $this->pdo->beginTransaction();
      $stmt = $this->pdo->prepare("SELECT * from barsnacks where id='$id'");
      $stmt->execute();
      $records = $stmt->fetch();
      
    }catch(PDOException $e){
      // $this->pdo->rollback();
       echo "failed: ". $e->getMessage() . "<br />" . $e->getTraceAsString(); die;
    }
    return $records;
  }
public function snack(){
    try{
      // $this->pdo->beginTransaction();
      $stmt = $this->pdo->prepare("SELECT * from barsnacks");
      $stmt->execute();
      $records = $stmt->fetchAll();

      
    }catch(PDOException $e){
      // $this->pdo->rollback();
       echo "failed: ". $e->getMessage() . "<br />" . $e->getTraceAsString(); die;
    }
    return $records;
  }

public function drinkendetails($id){
    try{
      // $this->pdo->beginTransaction();
      $stmt = $this->pdo->prepare("SELECT * from drinken where id='$id'");
      $stmt->execute();
      $records = $stmt->fetch();
      
    }catch(PDOException $e){
      // $this->pdo->rollback();
       echo "failed: ". $e->getMessage() . "<br />" . $e->getTraceAsString(); die;
    }
    return $records;
  }
public function drinken(){
    try{
      // $this->pdo->beginTransaction();
      $stmt = $this->pdo->prepare("SELECT * from drinken");
      $stmt->execute();
      $records = $stmt->fetchAll();

      
    }catch(PDOException $e){
      // $this->pdo->rollback();
       echo "failed: ". $e->getMessage() . "<br />" . $e->getTraceAsString(); die;
    }
    return $records;
  }

public function bardetails($id){
    try{
      // $this->pdo->beginTransaction();
      $stmt = $this->pdo->prepare("SELECT * from bar where id='$id'");
      $stmt->execute();
      $records = $stmt->fetch();
      
    }catch(PDOException $e){
      // $this->pdo->rollback();
       echo "failed: ". $e->getMessage() . "<br />" . $e->getTraceAsString(); die;
    }
    return $records;
  }
public function bar(){
    try{
      // $this->pdo->beginTransaction();
      $stmt = $this->pdo->prepare("SELECT * from bar");
      $stmt->execute();
      $records = $stmt->fetchAll();

      
    }catch(PDOException $e){
      // $this->pdo->rollback();
       echo "failed: ". $e->getMessage() . "<br />" . $e->getTraceAsString(); die;
    }
    return $records;
  }


public function factuur(){
    try{
      // $this->pdo->beginTransaction();
      $stmt = $this->pdo->prepare("SELECT factuur.id, factuur.factuurtotaal,
      factuur.reserveringdatumvanaf, factuur.reserveringdatumtot, factuur.klant_id, klant.klant,
      etendrinken.order_date 
      from factuur
      INNER JOIN klant ON factuur.klant_id = klant.id
      INNER JOIN etendrinken ON factuur.reservatie_id = etendrinken.reservatie_id
      GROUP BY factuur.id");
      $stmt->execute();
      $records = $stmt->fetchAll();

      
    }catch(PDOException $e){
      // $this->pdo->rollback();
       echo "failed: ". $e->getMessage() . "<br />" . $e->getTraceAsString(); die;
    }
    return $records;
  }

public function factuurBar(){
    try{
      // $this->pdo->beginTransaction();
      $stmt = $this->pdo->prepare("SELECT factuur_bar.id, factuur_bar.factuurtotaal,
      factuur_bar.klant_id, klant.klant,
      barorders.order_date 
      from factuur_bar
      INNER JOIN klant ON factuur_bar.klant_id = klant.id
      INNER JOIN barorders ON factuur_bar.reservatie_bar_id = barorders.reservatie_bar_id
      GROUP BY factuur_bar.id");
      $stmt->execute();
      $records = $stmt->fetchAll();

      
    }catch(PDOException $e){
      // $this->pdo->rollback();
       echo "failed: ". $e->getMessage() . "<br />" . $e->getTraceAsString(); die;
    }
    return $records;
  }


   public function roomserviceaddetenonly($id, $eten, $eten_id, $eten_quantity, $order_date){
    try{
      $this->pdo->beginTransaction();

      $stmt = $this->pdo->prepare("INSERT INTO etendrinken (reservatie_id, eten, eten_id, eten_quantity, order_date)
      VALUES ('$id', '$eten', '$eten_id', '$eten_quantity', '$order_date')");
      $stmt->execute();
      // $records = $stmt->fetchAll();
      $lastInsertId = $this->pdo->lastInsertId();
      // var_dump($lastInsertId); die;
      $this->pdo->commit();
      return $lastInsertId;

    }catch(PDOException $e){
      $this->pdo->rollback();
       echo "failed: ". $e->getMessage() . "<br />" . $e->getTraceAsString(); die;
    }
  }



   public function roomserviceaddbaronly($id, $bar, $bar_id, $bar_quantity, $order_date){
    try{
      $this->pdo->beginTransaction();

      $stmt = $this->pdo->prepare("INSERT INTO barorders (reservatie_bar_id, bar, bar_id, bar_quantity, order_date)
      VALUES ('$id', '$bar', '$bar_id', '$bar_quantity', '$order_date')");
      $stmt->execute();
      // $records = $stmt->fetchAll();
      $lastInsertId = $this->pdo->lastInsertId();
      // var_dump($lastInsertId); die;
      $this->pdo->commit();
      return $lastInsertId;

    }catch(PDOException $e){
      $this->pdo->rollback();
       echo "failed: ". $e->getMessage() . "<br />" . $e->getTraceAsString(); die;
    }
  }
   public function roomserviceaddsnackonly($id, $snack, $snack_id, $snack_quantity, $order_date){
    try{
      $this->pdo->beginTransaction();

      $stmt = $this->pdo->prepare("INSERT INTO barorders (reservatie_bar_id, snack, snack_id, snack_quantity, order_date)
      VALUES ('$id', '$snack', '$snack_id', '$snack_quantity', '$order_date')");
      $stmt->execute();
      // $records = $stmt->fetchAll();
      $lastInsertId = $this->pdo->lastInsertId();
      // var_dump($lastInsertId); die;
      $this->pdo->commit();
      return $lastInsertId;

    }catch(PDOException $e){
      $this->pdo->rollback();
       echo "failed: ". $e->getMessage() . "<br />" . $e->getTraceAsString(); die;
    }
  }

   public function roomserviceadddrinkenonly($id, $drinken, $drinken_id, $drinken_quantity, $order_date){
    try{
      $this->pdo->beginTransaction();

      $stmt = $this->pdo->prepare("INSERT INTO etendrinken (reservatie_id, drinken, drinken_id, drinken_quantity, order_date)
      VALUES ('$id', '$drinken', '$drinken_id', '$drinken_quantity', '$order_date')");
      $stmt->execute();
      // $records = $stmt->fetchAll();
      $lastInsertId = $this->pdo->lastInsertId();
      // var_dump($lastInsertId); die;
      $this->pdo->commit();
      return $lastInsertId;

    }catch(PDOException $e){
      $this->pdo->rollback();
       echo "failed: ". $e->getMessage() . "<br />" . $e->getTraceAsString(); die;
    }
  }

public function barExistsOnReservatieBar($bar_id, $reservatie_bar_id){
    try{
      // $this->pdo->beginTransaction();
      $stmt = $this->pdo->prepare("SELECT * from barorders WHERE bar_id='$bar_id' AND reservatie_bar_id='$reservatie_bar_id'");
      $stmt->execute();
      $records = $stmt->fetch();

      
    }catch(PDOException $e){
      // $this->pdo->rollback();
       echo "failed: ". $e->getMessage() . "<br />" . $e->getTraceAsString(); die;
    }
    return $records;
  }

public function snackExistsOnReservatieBar($snack_id, $reservatie_bar_id){
    try{
      // $this->pdo->beginTransaction();
      $stmt = $this->pdo->prepare("SELECT * from barorders WHERE snack_id='$snack_id' AND reservatie_bar_id='$reservatie_bar_id'");
      $stmt->execute();
      $records = $stmt->fetch();

      
    }catch(PDOException $e){
      // $this->pdo->rollback();
       echo "failed: ". $e->getMessage() . "<br />" . $e->getTraceAsString(); die;
    }
    return $records;
  }

public function etenExistsOnReservatie($eten_id, $reservatie_id){
    try{
      // $this->pdo->beginTransaction();
      $stmt = $this->pdo->prepare("SELECT * from etendrinken WHERE eten_id='$eten_id' AND reservatie_id='$reservatie_id'");
      $stmt->execute();
      $records = $stmt->fetch();

      
    }catch(PDOException $e){
      // $this->pdo->rollback();
       echo "failed: ". $e->getMessage() . "<br />" . $e->getTraceAsString(); die;
    }
    return $records;
  }

public function drinkenExistsOnReservatie($drinken_id, $reservatie_id){
    try{
      // $this->pdo->beginTransaction();
      $stmt = $this->pdo->prepare("SELECT * from etendrinken WHERE drinken_id='$drinken_id' AND reservatie_id='$reservatie_id'");
      $stmt->execute();
      $records = $stmt->fetch();

      
    }catch(PDOException $e){
      // $this->pdo->rollback();
       echo "failed: ". $e->getMessage() . "<br />" . $e->getTraceAsString(); die;
    }
    return $records;
  }

  public function roomserviceupdateeten($etendrinken_id, $new_eten_quantity){
    try{
      $this->pdo->beginTransaction();
      $stmt = $this->pdo->prepare("UPDATE etendrinken set eten_quantity='$new_eten_quantity' where id='$etendrinken_id'");
      $stmt->execute();
        
      $this->pdo->commit();
    }catch(PDOException $e){
      $this->pdo->rollback();
       echo "failed: ". $e->getMessage() . "<br />" . $e->getTraceAsString(); die;
    }
  }

  public function roomserviceupdatebar($bar_id, $new_bar_quantity){
    try{
      $this->pdo->beginTransaction();
      $stmt = $this->pdo->prepare("UPDATE barorders set bar_quantity='$new_bar_quantity' where id='$bar_id'");
      $stmt->execute();
        
      $this->pdo->commit();
    }catch(PDOException $e){
      $this->pdo->rollback();
       echo "failed: ". $e->getMessage() . "<br />" . $e->getTraceAsString(); die;
    }
  }
  public function roomserviceupdatesnack($snack_id, $new_snack_quantity){
    try{
      $this->pdo->beginTransaction();
      $stmt = $this->pdo->prepare("UPDATE barorders set snack_quantity='$new_snack_quantity' where id='$snack_id'");
      $stmt->execute();
        
      $this->pdo->commit();
    }catch(PDOException $e){
      $this->pdo->rollback();
       echo "failed: ". $e->getMessage() . "<br />" . $e->getTraceAsString(); die;
    }
  }

  public function roomserviceupdatedrinken($etendrinken_id, $new_drinken_quantity){
    try{
      $this->pdo->beginTransaction();
      $stmt = $this->pdo->prepare("UPDATE etendrinken set drinken_quantity='$new_drinken_quantity' where id='$etendrinken_id'");
      $stmt->execute();
        
      $this->pdo->commit();
    }catch(PDOException $e){
      $this->pdo->rollback();
       echo "failed: ". $e->getMessage() . "<br />" . $e->getTraceAsString(); die;
    }
  }

  public function factuurupdate($reservatie_id, $newfactuurtotaal){
    try{
      $this->pdo->beginTransaction();
      $stmt = $this->pdo->prepare("UPDATE factuur set factuurtotaal='$newfactuurtotaal' where reservatie_id='$reservatie_id'");
      $stmt->execute();
        
      $this->pdo->commit();
    }catch(PDOException $e){
      $this->pdo->rollback();
       echo "failed: ". $e->getMessage() . "<br />" . $e->getTraceAsString(); die;
    }
  }

  public function factuurbarupdate($reservatie_bar_id, $newfactuurtotaal){
    try{

      $this->pdo->beginTransaction();
      $stmt = $this->pdo->prepare("UPDATE factuur_bar set factuurtotaal='$newfactuurtotaal' where reservatie_bar_id='$reservatie_bar_id'");
      $stmt->execute();
        
      $this->pdo->commit();
    }catch(PDOException $e){
      $this->pdo->rollback();
       echo "failed: ". $e->getMessage() . "<br />" . $e->getTraceAsString(); die;
    }
  }


public function factuurByReservatie($reservatie_id){
    try{
      // $this->pdo->beginTransaction();
      $stmt = $this->pdo->prepare("SELECT * from factuur WHERE reservatie_id='$reservatie_id'");
      $stmt->execute();
      $records = $stmt->fetch();

      
    }catch(PDOException $e){
      // $this->pdo->rollback();
       echo "failed: ". $e->getMessage() . "<br />" . $e->getTraceAsString(); die;
    }
    return $records;
  }


public function factuurTogether($klant_id){
    try{
      $last_reservatie_id = '';
      $factuurtotaalrestaurant = '';
      $order_date_restaurant = '';

      $last_reservatie_bar_id = '';
      $factuurtotaalbar = '';
      $order_date_bar = '';


      // fetch last reservation by klant_id
      $stmt = $this->pdo->prepare("SELECT * from reservatie WHERE naam_id='$klant_id' ORDER BY id DESC LIMIT 1");
      $stmt->execute();
      $lastReservation = $stmt->fetch();

      if($lastReservation) {
        // fetch factuurtotaal
        $last_reservatie_id = $lastReservation['id'];
        $stmt = $this->pdo->prepare("SELECT * from factuur WHERE reservatie_id='$last_reservatie_id' ORDER BY id DESC LIMIT 1");
        $stmt->execute();
        $last_reservatie_factuur = $stmt->fetch();
        $factuurtotaalrestaurant = $last_reservatie_factuur ? $last_reservatie_factuur['factuurtotaal'] : '';

        // get order date restaurant
        $stmt = $this->pdo->prepare("SELECT * from etendrinken WHERE reservatie_id='$last_reservatie_id' ORDER BY id DESC LIMIT 1");
        $stmt->execute();
        $last_reservatie_etendrinken = $stmt->fetch();
        $order_date_restaurant = $last_reservatie_etendrinken ? $last_reservatie_etendrinken['order_date'] : '';
      }

      // fetch last reservation bar by klant_id
      $stmt = $this->pdo->prepare("SELECT * from reservatie_bar WHERE naam_id='$klant_id' ORDER BY id DESC LIMIT 1");
      $stmt->execute();
      $lastReservationBar = $stmt->fetch();

      if($lastReservationBar) {
        // fetch factuurtotaal
        $last_reservatie_bar_id = $lastReservationBar['id'];
        $stmt = $this->pdo->prepare("SELECT * from factuur_bar WHERE reservatie_bar_id='$last_reservatie_bar_id' ORDER BY id DESC LIMIT 1");
        $stmt->execute();
        $last_reservatie_factuur_bar = $stmt->fetch();
        $factuurtotaalbar = $last_reservatie_factuur_bar ? $last_reservatie_factuur_bar['factuurtotaal'] : '';

        // get order date bar
        $stmt = $this->pdo->prepare("SELECT * from barorders WHERE reservatie_bar_id='$last_reservatie_bar_id' ORDER BY id DESC LIMIT 1");
        $stmt->execute();
        $last_reservatie_barorders = $stmt->fetch();
        $order_date_bar = $last_reservatie_barorders ? $last_reservatie_barorders['order_date'] : '';
      }

      return array(
        "last_reservatie_id" => $last_reservatie_id,
        "factuurtotaalrestaurant" => $factuurtotaalrestaurant,
        "order_date_restaurant" => $order_date_restaurant,
        "last_reservatie_bar_id" => $last_reservatie_bar_id,
        "factuurtotaalbar" => $factuurtotaalbar,
        "order_date_bar" => $order_date_bar,
      );
      
    }catch(PDOException $e){
      // $this->pdo->rollback();
       echo "failed: ". $e->getMessage() . "<br />" . $e->getTraceAsString(); die;
    }
    return $records;
  }

public function factuurBarByReservatie($reservatie_bar_id){
    try{
      // $this->pdo->beginTransaction();
      $stmt = $this->pdo->prepare("SELECT * from factuur_bar WHERE reservatie_bar_id='$reservatie_bar_id'");
      $stmt->execute();
      $records = $stmt->fetch();

      
    }catch(PDOException $e){
      // $this->pdo->rollback();
       echo "failed: ". $e->getMessage() . "<br />" . $e->getTraceAsString(); die;
    }
    return $records;
  }

    public function roomserviceByReservatie($reservatie_id){
    try{
      // $this->pdo->beginTransaction();
      $stmt = $this->pdo->prepare("SELECT * from etendrinken where reservatie_id='$reservatie_id'");
      $stmt->execute();
      $records = $stmt->fetchAll();

      // var_dump($records); die;

      return $records;
      
    }catch(PDOException $e){
      // $this->pdo->rollback();
       echo "failed: ". $e->getMessage() . "<br />" . $e->getTraceAsString(); die;
    }
  }

    public function barByReservatie($reservatie_bar_id){
    try{
      // $this->pdo->beginTransaction();
      $stmt = $this->pdo->prepare("SELECT * from barorders where reservatie_bar_id='$reservatie_bar_id'");
      $stmt->execute();
      $records = $stmt->fetchAll();

      // var_dump($records); die;

      return $records;
      
    }catch(PDOException $e){
      // $this->pdo->rollback();
       echo "failed: ". $e->getMessage() . "<br />" . $e->getTraceAsString(); die;
    }
  }

    public function roomservice($id){
    try{
      $this->pdo->beginTransaction();
      $stmt = $this->pdo->prepare("SELECT * from etendrinken where id=$id");
      $stmt->execute();
      $records = $stmt->fetchAll();

      return $records;
      
    }catch(PDOException $e){
      $this->pdo->rollback();
       echo "failed: ". $e->getMessage() . "<br />" . $e->getTraceAsString(); die;
    }
  }

   public function roomserviceadd($id, $eten, $drinken, $eten_id, $drinken_id, $eten_quantity, $drinken_quantity, $order_date){
    try{
      $this->pdo->beginTransaction();

      $drinken_id = $drinken_id ? $drinken_id : 0;
      $eten_id = $eten_id ? $eten_id : 0;

      $stmt = $this->pdo->prepare("INSERT INTO etendrinken (reservatie_id, drinken, eten, eten_id, drinken_id, eten_quantity, drinken_quantity, order_date)
      VALUES ('$id', '$drinken', '$eten', '$eten_id', '$drinken_id', '$eten_quantity', '$drinken_quantity', '$order_date')");
      $stmt->execute();
      // $records = $stmt->fetchAll();
      $lastInsertId = $this->pdo->lastInsertId();
      // var_dump($lastInsertId); die;
      $this->pdo->commit();
      return $lastInsertId;

    }catch(PDOException $e){
      $this->pdo->rollback();
       echo "failed: ". $e->getMessage() . "<br />" . $e->getTraceAsString(); die;
    }
  }

   public function roomservicebaradd($id, $bar, $snack, $bar_id, $snack_id, $bar_quantity, $snack_quantity, $order_date){
    try{
      $this->pdo->beginTransaction();

      $bar_id = $bar_id ? $bar_id : 0;
      $snack_id = $snack_id ? $snack_id : 0;

      $stmt = $this->pdo->prepare("INSERT INTO barorders (reservatie_bar_id, snack, bar, bar_id, snack_id, bar_quantity, snack_quantity, order_date)
      VALUES ('$id', '$snack', '$bar', '$bar_id', '$snack_id', '$bar_quantity', '$snack_quantity', '$order_date')");
      $stmt->execute();
      // $records = $stmt->fetchAll();
      $lastInsertId = $this->pdo->lastInsertId();
      // var_dump($lastInsertId); die;
      $this->pdo->commit();
      return $lastInsertId;

    }catch(PDOException $e){
      $this->pdo->rollback();
       echo "failed: ". $e->getMessage() . "<br />" . $e->getTraceAsString(); die;
    }
  }

    public function roomservicevoor(){
    try{
      $this->pdo->beginTransaction();
      $stmt = $this->pdo->prepare("SELECT * from etendrinken");
      $stmt->execute();
      $records = $stmt->fetchAll();

      
    }catch(PDOException $e){
      $this->pdo->rollback();
       echo "failed: ". $e->getMessage() . "<br />" . $e->getTraceAsString(); die;
    }
    return $records;
  }

  public function factuurroomservice(){
    try{
      // $stmt = $this->pdo->prepare("SELECT * from factuurroomservice");
      $stmt = $this->pdo->prepare(
        "SELECT frs.id, frs.factuur, f.klant
        -- SELECT frs.id, frs.factuur, frs.factuurdatum, f.klant
        FROM factuurroomservice AS frs
            INNER JOIN factuur AS f USING(factuur)"
      );
      $stmt->execute();
      return $stmt->fetchAll();
      // SELECT * from factuur 
      // where factuur 
      // FROM join factuurroomservice 
      // factuur.id factuurroomservice.hotelkamer_id
      
    }catch(PDOException $e){
       echo "failed: ". $e->getMessage() . "<br />" . $e->getTraceAsString(); die;
    }
  }

  public function factuuradd($reservatie_id, $factuurtotaal, $reserveringdatumvanaf, $reserveringdatumtot, $klant_id){

    try{
      $this->pdo->beginTransaction();
      $stmt = $this->pdo->prepare("INSERT INTO factuur (reservatie_id, factuurtotaal, reserveringdatumvanaf, reserveringdatumtot, klant_id)
      VALUES ('$reservatie_id', '$factuurtotaal', '$reserveringdatumvanaf', '$reserveringdatumtot', '$klant_id')");
      $stmt->execute();
      // $records = $stmt->fetchAll();
      $lastInsertId = $this->pdo->lastInsertId();
      $this->pdo->commit();
      return $lastInsertId;

    }catch(PDOException $e){
      $this->pdo->rollback();
       echo "failed: ". $e->getMessage() . "<br />" . $e->getTraceAsString(); die;
    }
    // return $records;
  }

  public function factuurbaradd($reservatie_bar_id, $factuurtotaal, $klant_id){

    try{
      $this->pdo->beginTransaction();
      $stmt = $this->pdo->prepare("INSERT INTO factuur_bar (reservatie_bar_id, factuurtotaal, klant_id)
      VALUES ('$reservatie_bar_id', '$factuurtotaal', '$klant_id')");
      $stmt->execute();
      // $records = $stmt->fetchAll();
      $lastInsertId = $this->pdo->lastInsertId();
      $this->pdo->commit();
      return $lastInsertId;

    }catch(PDOException $e){
      $this->pdo->rollback();
       echo "failed: ". $e->getMessage() . "<br />" . $e->getTraceAsString(); die;
    }
    // return $records;
  }

  public function factuurroomserviceadd($factuur, $factuur_id){
    try{
      $this->pdo->beginTransaction();
      $stmt = $this->pdo->prepare("INSERT INTO factuur (factuur, factuur_id)
      VALUES ('$factuur', '$factuur_id')");
      $stmt->execute();
      // $records = $stmt->fetchAll();
      // $lastInsertId = $this->pdo->lastInsertId();
      $this->pdo->commit();
      // return $lastInsertId;

    }catch(PDOException $e){
      $this->pdo->rollback();
       echo "failed: ". $e->getMessage() . "<br />" . $e->getTraceAsString(); die;
    }
    // return $records;
  }

  public function factuurdelete($id){
    try{
      $this->pdo->beginTransaction();
      $stmt = $this->pdo->prepare("DELETE FROM factuur WHERE id = $id");
      $stmt->execute();
      
      $this->pdo->commit();

    }catch(PDOException $e){
      $this->pdo->rollback();
       echo "failed: ". $e->getMessage() . "<br />" . $e->getTraceAsString(); die;
    }
  }

  public function updatefactuur($id, $factuur, $reserveringdatumvanaf, $reserveringdatumtot, $klant){
    try{
      $this->pdo->beginTransaction();
      // $password=md5($password);
      //echo "update account set username='$username', password='$password' where id=$id";
      $stmt = $this->pdo->prepare("update factuur set factuur='$factuur', reserveringdatumvanaf='$reserveringdatumvanaf', reserveringdatumtot='$reserveringdatumtot', klant='$klant' where id=$id");
      $stmt->execute();
        
      $this->pdo->commit();
    }catch(PDOException $e){
      $this->pdo->rollback();
       echo "failed: ". $e->getMessage() . "<br />" . $e->getTraceAsString(); die;
    }
  }


  public function selectfactuurtable($id){
    try{
      $this->pdo->beginTransaction();
      $stmt = $this->pdo->prepare("SELECT * from factuur WHERE id=$id");
      $stmt->execute();
      $records= $stmt->fetchAll();
      
    }catch(PDOException $e){
      $this->pdo->rollback();
       echo "failed: ". $e->getMessage() . "<br />" . $e->getTraceAsString(); die;
    }
      return $records;
  }


  // public function zoekplaatsselect($plaats){
  //   try{
  //     $this->pdo->beginTransaction();
  //     $stmt = $this->pdo->prepare("SELECT * from klant WHERE id=$id");
  //     $stmt->execute();
  //     // $records = $stmt->fetchAll();
  //     $this->pdo->commit();

  //   }catch(PDOException $e){
  //     $this->pdo->rollback();
  //      echo "failed: ". $e->getMessage() . "<br />" . $e->getTraceAsString(); die;
  //   }
  //   return $records;
  // } 

 // $stmt->execute( array( "%$zoek%" ) ); // and then pass the value to replace it

public function zoekplaats($zoek){
    try{
      // you don't need a database transaction for this kind of queries
      // $this->pdo->beginTransaction();
    
      // this is the correct way of using prepared statement: put a placeholder
      $stmt = $this->pdo->prepare( "SELECT * from klant WHERE plaats LIKE '%".$zoek."%' OR klant LIKE '%".$zoek."%';");
      $stmt->execute(); // and then pass the value to replace it 
      // Since you're selecting data you MUST collect it and returned out
      // or this method is just pointless
      return $stmt->fetchAll();

    }catch(PDOException $e){
        // $this->pdo->rollback();
       echo "failed: ". $e->getMessage() . "<br />" . $e->getTraceAsString(); die;
    }
}


public function zoekklant($zoekklant){
    try{
      // you don't need a database transaction for this kind of queries
      // $this->pdo->beginTransaction();
    
      // this is the correct way of using prepared statement: put a placeholder
      $stmt = $this->pdo->prepare( "SELECT * from klant WHERE naam LIKE ?" );
      $stmt->execute( array( "%$zoekklant%" ) ); // and then pass the value to replace it
 
      // Since you're selecting data you MUST collect it and returned out
      // or this method is just pointless
      return $stmt->fetchAll();

    }catch(PDOException $e){
        // $this->pdo->rollback();
       echo "failed: ". $e->getMessage() . "<br />" . $e->getTraceAsString(); die;
    }
}



// public function zoekplaats($args = []){
//     try{
//       $this->pdo->beginTransaction();
//       $stmt = $this->pdo->prepare("SELECT * from klant WHERE LIKE '%".$plaats."%' ");
//       $stmt->execute();
//       // $records = $stmt->fetchAll();

//     }catch(PDOException $e){
//       $this->pdo->rollback();
//        echo "failed: ". $e->getMessage() . "<br />" . $e->getTraceAsString(); die;
//     }
//     // return $records;
//   }

}

?>