<?php

//this Database class is non-static
class Database 
{
	//config
	private $dbName = 'antiques_dbintegration' ; 
	private $dbHost = 'localhost' ;
	private $dbUsername = 'root';
	//private $dbUserPassword = 'toor';
	private $dbUserPassword = '';
	private $db_connection  = null;
	
	public function __construct() {
		//exit('Init function is not allowed');
		$this->dbName = 'antiques_dbintegration' ; 
		$this->dbHost = 'localhost' ;
	 	$this->dbUsername = 'root';
		//$this->dbUserPassword = 'toor';
		$this->dbUserPassword = '';

		//establish a connection right while being constructed
		$this->db_connection = $this->connect();
	}
	
	/**
		some basic database operations
	*/
	public function connect()
	{
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
	
	public function row_query($sql_query)
	{
		$this->connect();

		//TODO check syntax here; we should return the rows as an array

		$rows = $this->db_connection->query($sql_query);
		$this->disconnect();
		if (count($rows)==0) return array(); #return an empty array
		#otherwise
		return $rows;
	}

	public function count($sql_query, $parameters_array)
	{
		$this->connect();
		$q = $this->db_connection->prepare($sql_query);
		$q->execute($parameters_array);
		return $q->rowCount();
	}
}
?>