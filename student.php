<?php
//session_start(); 
require 'database.php';

class Student 
{
	private $db;
	private $StudentID;
	public $userNo;
	public $lastname;
	public $firstname;
	public $middlename;
	
	function __construct($Session_StudentID) {
		//exit('Init function is not allowed');
		if (!$Session_StudentID) die("Invalid Session StudentID");
		$this->StudentID = $Session_StudentID;
		$this->db = new Database();
	}

	public function isAuthenticated($studentID,$studentPassKey)
	{
		$sql="SELECT * FROM kioskuser u WHERE u.studid = ? AND u.password = ?"; 
		return ($this->db->count($sql,array($studentID,$studentPassKey)) == 1);
	}	

	public function logout()
	{
		$db->disconnect();
	}
	
	public function getName()
	{
		if (!($this->Session_StudentID)) die("Student ID required!");
		$sql0="SELECT studID, studLname, studFname, studMname FROM studpersonalinfotbl WHERE studID = '$Session_StudentID'"; 
		$results = $db->row_query($sql0);
		foreach ($results as $row) {
			$this->lastname = $row['studLname'];
			$this->firstname = $row['studFname'];
			$this->middlename = $row['studMname'];
		}
		return getFullName();
		
	}

	public function getFullName()
	{
		return $this->firstname + ' ' + $this->middlename + ' ' + $this->lastname;
	}
}

?>