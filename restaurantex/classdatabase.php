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
    // echo $username, $password;
    try{
      $this->pdo->beginTransaction();
            
        $stmt = $this->pdo->prepare("SELECT * FROM admintable where username = :username AND password = PASSWORD(:password)"); 

        $stmt->bindParam(':username',$username);
        $stmt->bindParam(':password',$password);
        $stmt->execute();
        $rowCount = $stmt->rowCount();
        print_r($rowCount);
        if ($rowCount > 0)
        {   
            session_start();
            $_SESSION["username"] = $_POST["username"];
            header("Location: adminoverzicht.php");
        }
        else
        {
            echo "Wrong username or password!";;
        }
    }catch(PDOException $e){
      $this->pdo->rollback();
        echo "failed: ". $e->getMessage();
    }
  }


public function gerechtsoorten(){
    try{
      // $this->pdo->beginTransaction();
      $stmt = $this->pdo->prepare("SELECT * from gerechtsoorten where gerechtcategorien_id = 1");
      $stmt->execute();
      $records = $stmt->fetchAll();

      
    }catch(PDOException $e){
      $this->pdo->rollback();
       echo "failed: ". $e->getMessage() . "<br />" . $e->getTraceAsString(); die;
    }
    return $records;
}


public function voordekleinjtes(){
    try{
      // $this->pdo->beginTransaction();
      $stmt = $this->pdo->prepare("SELECT * from gerechtsoorten where gerechtcategorien_id = 2");
      $stmt->execute();
      $records = $stmt->fetchAll();

      
    }catch(PDOException $e){
      $this->pdo->rollback();
       echo "failed: ". $e->getMessage() . "<br />" . $e->getTraceAsString(); die;
    }
    return $records;
}


public function voorgerechten(){
    try{
      // $this->pdo->beginTransaction();
      $stmt = $this->pdo->prepare("SELECT * from gerechtsoorten where gerechtcategorien_id = 3");
      $stmt->execute();
      $records = $stmt->fetchAll();

      
    }catch(PDOException $e){
      $this->pdo->rollback();
       echo "failed: ". $e->getMessage() . "<br />" . $e->getTraceAsString(); die;
    }
    return $records;
}


public function frisdranken(){
    try{
      // $this->pdo->beginTransaction();
      $stmt = $this->pdo->prepare("SELECT * from gerechtsoorten where gerechtcategorien_id = 4");
      $stmt->execute();
      $records = $stmt->fetchAll();

      
    }catch(PDOException $e){
      $this->pdo->rollback();
       echo "failed: ". $e->getMessage() . "<br />" . $e->getTraceAsString(); die;
    }
    return $records;
}


public function dessert(){
    try{
      // $this->pdo->beginTransaction();
      $stmt = $this->pdo->prepare("SELECT * from gerechtsoorten where gerechtcategorien_id = 5");
      $stmt->execute();
      $records = $stmt->fetchAll();

      
    }catch(PDOException $e){
      $this->pdo->rollback();
       echo "failed: ". $e->getMessage() . "<br />" . $e->getTraceAsString(); die;
    }
    return $records;
}

public function huiswijnen(){
    try{
      // $this->pdo->beginTransaction();
      $stmt = $this->pdo->prepare("SELECT * from gerechtsoorten where gerechtcategorien_id = 6");
      $stmt->execute();
      $records = $stmt->fetchAll();

      
    }catch(PDOException $e){
      $this->pdo->rollback();
       echo "failed: ". $e->getMessage() . "<br />" . $e->getTraceAsString(); die;
    }
    return $records;
}



public function koffiethee(){
    try{
      // $this->pdo->beginTransaction();
      $stmt = $this->pdo->prepare("SELECT * from gerechtsoorten where gerechtcategorien_id = 7");
      $stmt->execute();
      $records = $stmt->fetchAll();

      
    }catch(PDOException $e){
      $this->pdo->rollback();
       echo "failed: ". $e->getMessage() . "<br />" . $e->getTraceAsString(); die;
    }
    return $records;
}



public function mineraalwaters(){
    try{
      // $this->pdo->beginTransaction();
      $stmt = $this->pdo->prepare("SELECT * from gerechtsoorten where gerechtcategorien_id = 8");
      $stmt->execute();
      $records = $stmt->fetchAll();

      
    }catch(PDOException $e){
      $this->pdo->rollback();
       echo "failed: ". $e->getMessage() . "<br />" . $e->getTraceAsString(); die;
    }
    return $records;
}

public function specialbier(){
    try{
      // $this->pdo->beginTransaction();
      $stmt = $this->pdo->prepare("SELECT * from gerechtsoorten where gerechtcategorien_id = 9");
      $stmt->execute();
      $records = $stmt->fetchAll();

      
    }catch(PDOException $e){
      $this->pdo->rollback();
       echo "failed: ". $e->getMessage() . "<br />" . $e->getTraceAsString(); die;
    }
    return $records;
}



public function tapbier(){
    try{
      // $this->pdo->beginTransaction();
      $stmt = $this->pdo->prepare("SELECT * from gerechtsoorten where gerechtcategorien_id = 10");
      $stmt->execute();
      $records = $stmt->fetchAll();

      
    }catch(PDOException $e){
      $this->pdo->rollback();
       echo "failed: ". $e->getMessage() . "<br />" . $e->getTraceAsString(); die;
    }
    return $records;
}
// public function huiswijn(){
//     try{
//       // $this->pdo->beginTransaction();
//       $stmt = $this->pdo->prepare("SELECT * from gerechtsoorten where gerechtcategorien_id = 6");
//       $stmt->execute();
//       $records = $stmt->fetchAll();

      
//     }catch(PDOException $e){
//       $this->pdo->rollback();
//        echo "failed: ". $e->getMessage() . "<br />" . $e->getTraceAsString(); die;
//     }
//     return $records;
// }



public function tafels(){
    try{
      // $this->pdo->beginTransaction();
      $stmt = $this->pdo->prepare("SELECT * from tafels");
      $stmt->execute();
      $records = $stmt->fetchAll();

      
    }catch(PDOException $e){
      // $this->pdo->rollback();
       echo "failed: ". $e->getMessage() . "<br />" . $e->getTraceAsString(); die;
    }
    return $records;
  }


public function lastreservation($klant_id){
    try{
      // $this->pdo->beginTransaction();
      $stmt = $this->pdo->prepare("SELECT * from reserveringen where klant_id='$klant_id' ORDER BY id desc LIMIT 1");
      $stmt->execute();
      $records = $stmt->fetch();
      
    }catch(PDOException $e){
      // $this->pdo->rollback();
       echo "failed: ". $e->getMessage() . "<br />" . $e->getTraceAsString(); die;
    }
    return $records;
  }



public function tafeldetails($id){
    try{
      // $this->pdo->beginTransaction();
      $stmt = $this->pdo->prepare("SELECT * from tafels where id='$id'");
      $stmt->execute();
      $records = $stmt->fetch();
      
    }catch(PDOException $e){
      // $this->pdo->rollback();
       echo "failed: ". $e->getMessage() . "<br />" . $e->getTraceAsString(); die;
    }
    return $records;
  }

  public function aantaldetails($aantal){
    try{
      // $this->pdo->beginTransaction();
      $stmt = $this->pdo->prepare("INSERT INTO reserveringen (aantal)
      VALUES ('$aantal')");
      $stmt->execute();
      $records = $stmt->fetch();
      
    }catch(PDOException $e){
      // $this->pdo->rollback();
       echo "failed: ". $e->getMessage() . "<br />" . $e->getTraceAsString(); die;
    }
    return $records;
  }



  public function bestellingen($code, $naam, $reservering_id, $menuitem_id, $geserveerd, $aantal){
    try{
      $this->pdo->beginTransaction();
      $stmt = $this->pdo->prepare("INSERT INTO bestellingen (code, naam, reservering_id, menuitem_id, geserveerd)
      VALUES ('$code', '$naam', '$reservering_id', '$menuitem_id', '$geserveerd')");

      $this->aantaldetails($aantal);

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

  public function klantadd($naam, $telefoon, $email){
    try{
      $this->pdo->beginTransaction();
      $stmt = $this->pdo->prepare("INSERT INTO klant (naam, telefoon, email)
      VALUES ('$naam', '$telefoon', '$email')");
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

public function loginbarman($username, $password){
    // echo $username, $password;
    try{
      $this->pdo->beginTransaction();
            
        $stmt = $this->pdo->prepare("SELECT * FROM barman where username = :username AND password = PASSWORD(:password)"); 

        $stmt->bindParam(':username',$username);
        $stmt->bindParam(':password',$password);
        $stmt->execute();
        $rowCount = $stmt->rowCount();
        print_r($rowCount);
        if ($rowCount > 0)
        {   
            session_start();
            $_SESSION["username"] = $_POST["username"];
            header("Location: barmanoverzicht.php");
        }
        else
        {
            echo "Wrong username or password!";;
        }
    }catch(PDOException $e){
      $this->pdo->rollback();
        echo "failed: ". $e->getMessage();
    }
  }

  public function loginkok($username, $password){
    // echo $username, $password;
    try{
      $this->pdo->beginTransaction();
            
        $stmt = $this->pdo->prepare("SELECT * FROM kok where username = :username AND password = PASSWORD(:password)"); 

        $stmt->bindParam(':username',$username);
        $stmt->bindParam(':password',$password);
        $stmt->execute();
        $rowCount = $stmt->rowCount();
        print_r($rowCount);
        if ($rowCount > 0)
        {   
            session_start();
            $_SESSION["username"] = $_POST["username"];
            header("Location: kokoverzicht.php");
        }
        else
        {
            echo "Wrong username or password!";;
        }
    }catch(PDOException $e){
      $this->pdo->rollback();
        echo "failed: ". $e->getMessage();
    }
  }

  public function loginwaiter($username, $password){
    // echo $username, $password;
    try{
      $this->pdo->beginTransaction();
            
        $stmt = $this->pdo->prepare("SELECT * FROM waiter where username = :username AND password = PASSWORD(:password)"); 

        $stmt->bindParam(':username',$username);
        $stmt->bindParam(':password',$password);
        $stmt->execute();
        $rowCount = $stmt->rowCount();
        print_r($rowCount);
        if ($rowCount > 0)
        {   
            session_start();
            $_SESSION["username"] = $_POST["username"];
            header("Location: waiteroverzicht.php");
        }
        else
        {
            echo "Wrong username or password!";;
        }
    }catch(PDOException $e){
      $this->pdo->rollback();
        echo "failed: ". $e->getMessage();
    }
  }

// public function kamerdetails($id){
//     try{
//       // $this->pdo->beginTransaction();
//       $stmt = $this->pdo->prepare("SELECT * from kamer where id='$id'");
//       $stmt->execute();
//       $records = $stmt->fetch();
      
//     }catch(PDOException $e){
//       // $this->pdo->rollback();
//        echo "failed: ". $e->getMessage() . "<br />" . $e->getTraceAsString(); die;
//     }
//     return $records;
//   }



    public function reservering($id){
    try{
      // $this->pdo->beginTransaction();
      $stmt = $this->pdo->prepare("SELECT * from reservering where id='$id'");
      $stmt->execute();
      $records = $stmt->fetch();

      
    }catch(PDOException $e){
      $this->pdo->rollback();
       echo "failed: ". $e->getMessage() . "<br />" . $e->getTraceAsString(); die;
    }
    return $records;
  }

  public function reservering_exist($tafel, $klant_id){
    try{
      $stmt = $this->pdo->prepare("SELECT * FROM reserveringen where tafel='$tafel' AND klant_id='$klant_id'");
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

  public function reserveringAll(){
    try{
      // $this->pdo->beginTransaction();
      $stmt = $this->pdo->prepare("SELECT reserveringen.*, klant.naam from reserveringen
        LEFT JOIN klant ON reserveringen.klant_id = klant.id");
      $stmt->execute();
      $records = $stmt->fetchAll();

      
    }catch(PDOException $e){
      // $this->pdo->rollback();
       echo "failed: ". $e->getMessage() . "<br />" . $e->getTraceAsString(); die;
    }
    return $records;
  }

  //   public function aantallen(){
  //   try{
  //     // $this->pdo->beginTransaction();
  //     $stmt = $this->pdo->prepare("SELECT reserveringen.*, reserveringen.tafel, reserveringen.aantal_k
  //     oproepgerechtenfrom reserveringen ");
  //     $stmt->execute();
  //     $records = $stmt->fetchAll();

      
  //   }catch(PDOException $e){
  //     // $this->pdo->rollback();
  //      echo "failed: ". $e->getMessage() . "<br />" . $e->getTraceAsString(); die;
  //   }
  //   return $records;
  // }

  public function taffelNummer(){
    try{
      // $this->pdo->beginTransaction();
      $stmt = $this->pdo->prepare("SELECT waiter.*, reserveringen.tafel, reserveringen.aantal_k
      oproepgerechtenfrom reserveringen ");
      $stmt->execute();
      $records = $stmt->fetchAll();

      
    }catch(PDOException $e){
      // $this->pdo->rollback();
       echo "failed: ". $e->getMessage() . "<br />" . $e->getTraceAsString(); die;
    }
    return $records;
  }

  public function registerAll(){
    try{
      // $this->pdo->beginTransaction();
      $stmt = $this->pdo->prepare("SELECT * from klant");
      $stmt->execute();
      $records = $stmt->fetchAll();

      
    }catch(PDOException $e){
      $this->pdo->rollback();
       echo "failed: ". $e->getMessage() . "<br />" . $e->getTraceAsString(); die;
    }
    return $records;
  }  

  public function selectmenu($id){
    try{
      // $this->pdo->beginTransaction();
      $stmt = $this->pdo->prepare("SELECT * from gerechtsoorten WHERE id='$id'");
      $stmt->execute();
      $records = $stmt->fetch();

      
    }catch(PDOException $e){
      $this->pdo->rollback();
       echo "failed: ". $e->getMessage() . "<br />" . $e->getTraceAsString(); die;
    }
    return $records;
  }  
  public function addmenu($category_id, $naam, $code, $prijs){
    try{
      $this->pdo->beginTransaction();
      $stmt = $this->pdo->prepare("INSERT INTO gerechtsoorten (code, naam, gerechtcategorien_id, prijs)
      VALUES ('$code', '$naam', '$category_id', '$prijs')");
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
  public function updatemenu($id, $naam, $code, $prijs){
    try{
      $this->pdo->beginTransaction();
      $stmt = $this->pdo->prepare("UPDATE gerechtsoorten SET naam='$naam', code='$code', prijs='$prijs' 
        WHERE id='$id'");
      $stmt->execute();
      $this->pdo->commit();

    }catch(PDOException $e){
      $this->pdo->rollback();
       echo "failed: ". $e->getMessage() . "<br />" . $e->getTraceAsString(); die;
    }
  }

  public function reserveringadd($klant_id, $datum, $tijd, $tafel, $aantal_k){
    try{
      $this->pdo->beginTransaction();
      $stmt = $this->pdo->prepare("INSERT INTO reserveringen (klant_id, datum, tijd, tafel, aantal_k)
      VALUES ('".$klant_id."', '".$datum."', '".$tijd."', '".$tafel."', '".$aantal_k."')");
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


  public function menudelete($id){
    try{

      $stmt = $this->pdo->prepare("DELETE FROM gerechtsoorten WHERE id = '$id'");
      $stmt->execute();

      session_start();
      $_SESSION['showAlert'] = 'block';
      $_SESSION['message'] = 'Items are removed from <b>cart</b>!';


    }catch(PDOException $e){
      // $this->pdo->rollback();
       echo "failed: ". $e->getMessage() . "<br />" . $e->getTraceAsString(); die;
        die;
    }
  }

  public function oproepgerechten(){
    try{
      // $this->pdo->beginTransaction();
      $stmt = $this->pdo->prepare("SELECT * from gerechtsoorten");
      $stmt->execute();
      $records = $stmt->fetchAll();
      
    }catch(PDOException $e){
      // $this->pdo->rollback();
       echo "failed: ". $e->getMessage() . "<br />" . $e->getTraceAsString(); die;
    }
    return $records;
  }


  public function deletereservering($id, $klant_id){
    try{
      // var_dump($id); die;
      // $this->pdo->beginTransaction();
      // delete foregin key of klant first

      $stmt = $this->pdo->prepare("DELETE FROM factuur WHERE reservering_id = '$id'");
      $stmt->execute();
      

      $stmt = $this->pdo->prepare("DELETE FROM etendrinken WHERE reservering_id = '$id'");
      $stmt->execute();
      

      $stmt = $this->pdo->prepare("DELETE FROM reserveringen WHERE id = '$id'");
      $stmt->execute();

      // $stmt = $this->pdo->prepare("DELETE FROM klant WHERE id = '$klant_id'");
      // $stmt->execute();
      
      // $this->pdo->commit();

    }catch(PDOException $e){
      // $this->pdo->rollback();
       echo "failed: ". $e->getMessage() . "<br />" . $e->getTraceAsString(); die;
        die;
    }
  }



}

?>