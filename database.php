<?php

//this Database class is non-static
class Database 
{
	//config
	private $dbName = 'antiques_dbintegration' ; 
	private $dbHost = 'localhost' ;
	private $dbUsername = 'root';
	private $dbUserPassword = 'toor';
	private $db_connection  = null;
	
	public function __construct() {
		//exit('Init function is not allowed');
		self::$dbName = 'antiques_dbintegration' ; 
		self::$dbHost = 'localhost' ;
	 	self::$dbUsername = 'root';
		self::$dbUserPassword = 'toor';

		//establish a connection right while being constructed
		self::$db_connection = connect();
	}
	
	/**
		some basic database operations
	*/
	public function connect()
	{
	   // One connection through whole application
       if ( null == self::$db_connection )
       {      
        try 
        {
          	self::$db_connection =  new PDO( "mysql:host=".self::$dbHost.";"."dbname=".self::$dbName, self::$dbUsername, self::$dbUserPassword);
       		self::$db_connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch(PDOException $e) 
        {
          die($e->getMessage());  
        }
       } 

       return self::$db_connection;
	}
	
	public function disconnect()
	{
		self::$db_connection = null;
	}
	
	public function row_query($sql_query)
	{
		if (!(self::$db_connection))
		{
			self::$db_connection = connect();
		}

		//TODO check syntax here; we should return the rows as an array
		//$q = $db_connection->prepare($sql_query);
		//$q->execute($parameters_array);
		var $rows = $db_connection->query($sql_query);
		self::disconnect();
		return $rows;
	}
}
?>