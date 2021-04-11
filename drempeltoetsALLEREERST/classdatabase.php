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
        echo "failed: ". $e->getMessage();
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
  //       echo "failed: ". $e->getMessage();
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
        echo "failed: ". $e->getMessage();
    }
    return $records;
  }

    public function reservatie(){
    try{
      $this->pdo->beginTransaction();
      $stmt = $this->pdo->prepare("SELECT * from reservatie");
      $stmt->execute();
      $records = $stmt->fetchAll();

      
    }catch(PDOException $e){
      $this->pdo->rollback();
        echo "failed: ". $e->getMessage();
    }
    return $records;
  }

  public function reservatieadd( $kamernummer){
    try{
      $this->pdo->beginTransaction();
      $stmt = $this->pdo->prepare("INSERT INTO reservatie (id, kamernummer)
      VALUES ('', '$kamernummer')");
      $stmt->execute();
      // $records = $stmt->fetchAll();
      $this->pdo->commit();

    }catch(PDOException $e){
      $this->pdo->rollback();
        echo "failed: ". $e->getMessage();
    }
  }

  public function deletereservatie($id){
    try{
      $this->pdo->beginTransaction();
      $stmt = $this->pdo->prepare("DELETE FROM reservatie WHERE id = $id");
      $stmt->execute();
      
      $this->pdo->commit();

    }catch(PDOException $e){
      $this->pdo->rollback();
        echo "failed: ". $e->getMessage();
    }
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
        echo "failed: ". $e->getMessage();
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
        echo "failed: ". $e->getMessage();
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
        echo "failed: ". $e->getMessage();
    }
    return $records;
  }

  public function klantadd($klant, $adres, $plaats, $postcode, $telefoon){
    try{
      $this->pdo->beginTransaction();
      $stmt = $this->pdo->prepare("INSERT INTO klant (id, klant, adres, plaats, postcode, telefoon)
      VALUES ('', '$klant', '$adres', '$plaats', '$postcode', '$telefoon')");
      $stmt->execute();
      // $records = $stmt->fetchAll();
      $this->pdo->commit();

    }catch(PDOException $e){
      $this->pdo->rollback();
        echo "failed: ". $e->getMessage();
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
        echo "failed: ". $e->getMessage();
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
        echo "failed: ". $e->getMessage();
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
        echo "failed: ". $e->getMessage();
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
        echo "failed: ". $e->getMessage();
    }
    return $records;
  }


public function factuur(){
    try{
      $this->pdo->beginTransaction();
      $stmt = $this->pdo->prepare("SELECT * from factuur");
      $stmt->execute();
      $records = $stmt->fetchAll();

      
    }catch(PDOException $e){
      $this->pdo->rollback();
        echo "failed: ". $e->getMessage();
    }
    return $records;
  }

    public function roomservice($id){
    try{
      $this->pdo->beginTransaction();
      $stmt = $this->pdo->prepare("SELECT * from etendrinken where id=$id");
      $stmt->execute();
      $records = $stmt->fetchAll();

      
    }catch(PDOException $e){
      $this->pdo->rollback();
        echo "failed: ". $e->getMessage();
    }
    return $records;
  }

   public function roomserviceadd($drinken, $eten, $etendrinken_id){
    try{
      $this->pdo->beginTransaction();
      $stmt = $this->pdo->prepare("INSERT INTO etendrinken (id, drinken, eten, etendrinken_id)
      VALUES ('', '$drinken', '$eten', '$etendrinken_id')");
      $stmt->execute();
      // $records = $stmt->fetchAll();
      $this->pdo->commit();

    }catch(PDOException $e){
      $this->pdo->rollback();
        echo "failed: ". $e->getMessage();
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
        echo "failed: ". $e->getMessage();
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
        echo "failed: ". $e->getMessage();
    }
  }

  public function factuuradd($factuur, $reserveringdatumvanaf, $reserveringdatumtot, $klant){
    try{
      $this->pdo->beginTransaction();
      $stmt = $this->pdo->prepare("INSERT INTO factuur (id, factuur, reserveringdatumvanaf, reserveringdatumtot, klant)
      VALUES ('', '$factuur', '$reserveringdatumvanaf', '$reserveringdatumtot', '$klant')");
      $stmt->execute();
      // $records = $stmt->fetchAll();
      $this->pdo->commit();

    }catch(PDOException $e){
      $this->pdo->rollback();
        echo "failed: ". $e->getMessage();
    }
    return $records;
  }

  public function factuurdelete($id){
    try{
      $this->pdo->beginTransaction();
      $stmt = $this->pdo->prepare("DELETE FROM factuur WHERE id = $id");
      $stmt->execute();
      
      $this->pdo->commit();

    }catch(PDOException $e){
      $this->pdo->rollback();
        echo "failed: ". $e->getMessage();
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
        echo "failed: ". $e->getMessage();
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
        echo "failed: ". $e->getMessage();
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
  //       echo "failed: ". $e->getMessage();
  //   }
  //   return $records;
  // } 

 // $stmt->execute( array( "%$zoek%" ) ); // and then pass the value to replace it

public function zoekplaats($zoek){
    try{
      // you don't need a database transaction for this kind of queries
      // $this->pdo->beginTransaction();
    
      // this is the correct way of using prepared statement: put a placeholder
      $stmt = $this->pdo->prepare( "SELECT * from klant WHERE plaats LIKE '%".$zoek."%' OR naam LIKE '%".$zoek."%';");
      $stmt->execute(); // and then pass the value to replace it 
      // Since you're selecting data you MUST collect it and returned out
      // or this method is just pointless
      return $stmt->fetchAll();

    }catch(PDOException $e){
        // $this->pdo->rollback();
        echo "failed: ". $e->getMessage();
    }
}


// public function zoekklant($zoekklant){
//     try{
//       // you don't need a database transaction for this kind of queries
//       // $this->pdo->beginTransaction();
    
//       // this is the correct way of using prepared statement: put a placeholder
//       $stmt = $this->pdo->prepare( "SELECT * from klant WHERE naam LIKE ?" );
//       $stmt->execute( array( "%$zoekklant%" ) ); // and then pass the value to replace it
 
//       // Since you're selecting data you MUST collect it and returned out
//       // or this method is just pointless
//       return $stmt->fetchAll();

//     }catch(PDOException $e){
//         // $this->pdo->rollback();
//         echo "failed: ". $e->getMessage();
//     }
// }



// public function zoekplaats($args = []){
//     try{
//       $this->pdo->beginTransaction();
//       $stmt = $this->pdo->prepare("SELECT * from klant WHERE LIKE '%".$plaats."%' ");
//       $stmt->execute();
//       // $records = $stmt->fetchAll();

//     }catch(PDOException $e){
//       $this->pdo->rollback();
//         echo "failed: ". $e->getMessage();
//     }
//     // return $records;
//   }

}

?>