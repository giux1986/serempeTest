<?php


class Users extends Dbh{


    public $table   = 'users';
    public $pk      = 'uid';
    public $oby     = "";
    public $tabrows = 0;

    public $username        = '';
    public $password        = '';
   

    public $Query;


    function setvalues($username, $password){

      $this->username = $username;
      $this->password = $password;
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

      $username     = $this->username;
      $password = encryptdata($this->password);

      $sql = "INSERT INTO users (username,password) VALUES (?,?)";
      $results = $this->connect()->prepare($sql);
      return $results->execute([$username, $password]);
      
  }
  function update($id){

      $username     = $this->username;
      $password     = $this->password;

      if($password!=""){
        $password     = encryptdata($password);
        $sql      = "UPDATE users SET username=?,password=? WHERE uid=?";
      
        $results  = $this->connect()->prepare($sql);

        return $results->execute([$username, $password, $id]);
      }
      else{
        $sql      = "UPDATE users SET username=? WHERE uid=?";
      
        $results  = $this->connect()->prepare($sql);

        return $results->execute([$username, $id]);
      }
      
  }



  



}


?>