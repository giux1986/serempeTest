<?php



class Dbh{

	private $servername;
	private $username;
	private $password;
	private $dbname;
	protected $db;


	protected function connect(){


		$this->servername = "localhost";
		$this->username   = "root";
		$this->password   = "root";
		$this->dbname     = "serempe";

		
		
		try {

			$dsn = "mysql:host=".$this->servername.";dbname=".$this->dbname.";port:3308";
		    $conn = new PDO($dsn, $this->username, $this->password);
		    // set the PDO error mode to exception
		    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		    return $conn;
		    }
		catch(PDOException $e)
		    {
		    echo "Connection failed: " . $e->getMessage();
		    }






	}



}








?>