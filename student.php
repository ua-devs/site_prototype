<?php
//session_start(); 
require 'database.php';

class Student 
{
	//TODO check if this is correct instantiation syntax
	private Database $db;
	private $Session_StudentID = '';
	public $userNo;
	public $lastname;
	public $firstname;
	public $middlename;
	
	public function __construct($Session_StudentID) {
		//exit('Init function is not allowed');
		self::$Session_StudentID = $Session_StudentID;
		self::$db = new Database();
	}

	public function authenticate($studentID,$studentPassKey)
	{
			$sql1="SELECT * FROM kioskuser u WHERE u.studid = '$studentID' AND u.password = '$studentPassKey'"; 
			$results = $db->row_query($sql1);
			foreach ($results as $row) {
				self::$userNo = $row['u.userNo'];
			}
	}	
	
	public function getName()
	{
		if (!(self::$Session_StudentID)) die("Student ID required!");
		$sql0="SELECT studID, studLname, studFname, studMname FROM studpersonalinfotbl WHERE studID = '$Session_StudentID'"; 
		$results = $db->row_query($sql0);
		foreach ($results as $row) {
			self::$lastname = $row['studLname'];
			self::$firstname = $row['studFname'];
			self::$middlename = $row['studMname'];
		}
		return getFullName();
		
	}

	public function getFullName()
	{
		return self::firstname + ' ' + self::middlename + ' ' + self::lastname;
	}
}
?>