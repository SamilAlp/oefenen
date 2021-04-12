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
public function dessert(){
    try{
      // $this->pdo->beginTransaction();
      $stmt = $this->pdo->prepare("SELECT * from dessert");
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
      $stmt = $this->pdo->prepare("SELECT * from frisdranken");
      $stmt->execute();
      $records = $stmt->fetchAll();

      
    }catch(PDOException $e){
      $this->pdo->rollback();
       echo "failed: ". $e->getMessage() . "<br />" . $e->getTraceAsString(); die;
    }
    return $records;
  }

    public function hoofdgerechten(){
    try{
      // $this->pdo->beginTransaction();
      $stmt = $this->pdo->prepare("SELECT * from hoofdgerechten");
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
      $stmt = $this->pdo->prepare("SELECT * from huiswijnen");
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
      $stmt = $this->pdo->prepare("SELECT * from koffiethee");
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
      $stmt = $this->pdo->prepare("SELECT * from mineraalwaters");
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
      $stmt = $this->pdo->prepare("SELECT * from specialbier");
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
      $stmt = $this->pdo->prepare("SELECT * from tapbier");
      $stmt->execute();
      $records = $stmt->fetchAll();

      
    }catch(PDOException $e){
      $this->pdo->rollback();
       echo "failed: ". $e->getMessage() . "<br />" . $e->getTraceAsString(); die;
    }
    return $records;
  }

    public function voordekleintjes(){
    try{
      // $this->pdo->beginTransaction();
      $stmt = $this->pdo->prepare("SELECT * from voordekleintjes");
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
      $stmt = $this->pdo->prepare("SELECT * from voorgerechten");
      $stmt->execute();
      $records = $stmt->fetchAll();

      
    }catch(PDOException $e){
      $this->pdo->rollback();
       echo "failed: ". $e->getMessage() . "<br />" . $e->getTraceAsString(); die;
    }
    return $records;
  }



public function tafel(){
    try{
      // $this->pdo->beginTransaction();
      $stmt = $this->pdo->prepare("SELECT * from tafel");
      $stmt->execute();
      $records = $stmt->fetchAll();

      
    }catch(PDOException $e){
      // $this->pdo->rollback();
       echo "failed: ". $e->getMessage() . "<br />" . $e->getTraceAsString(); die;
    }
    return $records;
  }


public function tafeldetails($id){
    try{
      // $this->pdo->beginTransaction();
      $stmt = $this->pdo->prepare("SELECT * from tafel where id='$id'");
      $stmt->execute();
      $records = $stmt->fetch();
      
    }catch(PDOException $e){
      // $this->pdo->rollback();
       echo "failed: ". $e->getMessage() . "<br />" . $e->getTraceAsString(); die;
    }
    return $records;
  }

  public function klantadd($klant, $telefoon){
    try{
      $this->pdo->beginTransaction();
      $stmt = $this->pdo->prepare("INSERT INTO klant (klantnaam, telefoonnummer)
      VALUES ('$klant', '$telefoon')");
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
      $stmt = $this->pdo->prepare("SELECT * FROM reservering where tafel='$tafel' AND klant_id='$klant_id'");
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
      $stmt = $this->pdo->prepare("SELECT reservering.*, klant.klantnaam from reservering
        LEFT JOIN klant ON reservering.klant_id = klant.klant_id");
      $stmt->execute();
      $records = $stmt->fetchAll();

      
    }catch(PDOException $e){
      // $this->pdo->rollback();
       echo "failed: ". $e->getMessage() . "<br />" . $e->getTraceAsString(); die;
    }
    return $records;
  }

  public function reserveringadd($klant_id, $datum, $tijd, $tafel){
    try{
      $this->pdo->beginTransaction();
      $stmt = $this->pdo->prepare("INSERT INTO reservering (klant_id, datum, tijd, tafel)
      VALUES ('$klant_id', '$datum', '$tijd', '$tafel')");
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


  public function deletereservering($id, $klant_id){
    try{
      // var_dump($id); die;
      // $this->pdo->beginTransaction();
      // delete foregin key of klant first

      $stmt = $this->pdo->prepare("DELETE FROM factuur WHERE reservering_id = '$id'");
      $stmt->execute();
      

      $stmt = $this->pdo->prepare("DELETE FROM etendrinken WHERE reservering_id = '$id'");
      $stmt->execute();
      

      $stmt = $this->pdo->prepare("DELETE FROM reservering WHERE id = '$id'");
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