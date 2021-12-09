<?php


class Cities extends Dbh{


    public $table   = 'cities';
    public $pk      = 'id';
    public $oby     = "";
    public $tabrows = 0;

    public $name        = '';
   

    public $Query;


  function setvalues($name){

      $this->name     = $name;
  }

  public function FetchAll(){
        return $this->Query->fetchAll(PDO::FETCH_OBJ);
  }

  public function Single(){
      return $this->Query->fetch(PDO::FETCH_OBJ);
  }


  public function Query($query, $param = []){
    if(empty($param)){
     $this->Query = $this->connect()->prepare($query);
     return $this->Query->execute();
    } else {

     $this->Query = $this->connect()->prepare($query);
     return $this->Query->execute($param);
    }

  }

  
  public function CountRows(){
      return $this->Query->rowCount();
  }



  function insert(){

      $name     = $this->name;

      $sql      = "INSERT INTO cities (name) VALUES (?)";
      $results  = $this->connect()->prepare($sql);

      return $results->execute([$name]);
      
  }
  function update($id){

      $name     = $this->name;

      $sql      = "UPDATE cities SET name=? WHERE id=?";
      $results  = $this->connect()->prepare($sql);

      return $results->execute([$name, $id]);
      
  }


}


?>