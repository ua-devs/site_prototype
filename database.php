<?php

//this Database class is non-static
class Database 
{
	#config local PC
	// private $dbName = 'antiques_dbintegration' ; 
	// private $dbHost = 'localhost' ;
	// private $dbUsername = 'root';
	// private $dbUserPassword = '';
	// private $db_connection  = null;

	#config for AntiquesPride.edu.ph
	private $dbName = 'antiques_dbintegration' ; 
	private $dbHost = 'localhost' ;
	private $dbUsername = 'root';
	private $dbUserPassword = 'toor';
	private $db_connection  = null;

	
	public function __construct() {
		//exit('Init function is not allowed');
		//establish a connection right while being constructed
		$this->db_connection = $this->connect();
	}
	
	/**
	* Basic Connect and Disconnect
	*/
	public function connect()
	{
		#Config for Heroku ClearDB (mysql addon).
		#Just comment these out when moving to AntiquesPride; the default values above will be used.
		$url = parse_url(getenv("CLEARDB_DATABASE_URL"));
		$this->dbName = substr($url["path"], 1); 
		$this->dbHost = $url["host"];
		$this->dbUsername = $url["user"];
		$this->dbUserPassword = $url["pass"];

	   // One connection through whole application
		if ( null == $this->db_connection )
		{      
			try 
			{
				$this->db_connection =  new PDO( "mysql:host=".$this->dbHost.";"."dbname=".$this->dbName, $this->dbUsername, $this->dbUserPassword);
				$this->db_connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			}
			catch(PDOException $e) 
			{
				die($e->getMessage());  
			}
		} 

		return $this->db_connection;
	}
	public function disconnect()
	{
		$this->db_connection = null;
	}



	/**
	* 	Utility for just getting database rows. 
	*/
	public function row_query($sql_query)
	{
		$this->connect();
		//we return the rows as PDOStatement
		// $rows = $this->db_connection->query($sql_query);
		
		//we return the rows as an array
		$query = $this->db_connection->prepare($sql_query);
		$query->execute();
		$rows = $query->fetchAll();
		
		$this->disconnect();
		if (count($rows)==0) return array(); #return an empty array
		#otherwise
		return $rows;
	}

	/**
	* 	Utility for just getting a quick row count.
	*/
	public function count($sql_query, $parameters_array)
	{
		$this->connect();
		$q = $this->db_connection->prepare($sql_query);
		$q->execute($parameters_array);
		return $q->rowCount();
	}

	/**
	* 	Utility for executing sql scripts such as Create and Insert
	*/
	public function exec($sql_script){
		$this->connect();
		try {
			$this->db_connection->exec($sql_script);
		}
		catch (PDOException $e)
		{
			echo $e->getMessage();
			die();
		}
	}
}
?>