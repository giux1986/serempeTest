<?php


class Clients extends Dbh{


    public $table   = 'clients';
    public $pk      = 'id';
    public $oby     = "";
    public $tabrows = 0;

    public $name        = '';
    public $code        = '';
    public $picture     = '';
    public $city        = '';
   

    public $Query;


  function setvalues($name, $code,$picture,$city){

      $this->name     = $name;
      $this->code     = $code;
      $this->picture  = $picture;
      $this->city     = $city;
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
      $code     = $this->code;
      $picture  = $this->picture;
      $city     = $this->city;

      $sql      = "INSERT INTO clients (name,code,picture,city) VALUES (?,?,?,?)";
      $results  = $this->connect()->prepare($sql);

      return $results->execute([$name, $code, $picture, $city]);
      
  }
  function update($id){

      $name     = $this->name;
      $code     = $this->code;
      $picture  = $this->picture;
      $city     = $this->city;

      $sql      = "UPDATE clients SET name=?,code=?,picture=?,city=? WHERE id=?";
      $results  = $this->connect()->prepare($sql);

      return $results->execute([$name, $code, $picture, $city, $id]);
      
  }


}


?>