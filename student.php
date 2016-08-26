<?php
session_start(); 
require 'database.php';

class Student 
{
	private $db;
	public $studentID;
	public $userNo;
	public $lastname;
	public $firstname;
	public $middlename;
	public $fullname;
	
	function __construct($Session_StudentID) {
		//exit('Init function is not allowed');
		if (!$Session_StudentID) {
			header("Location: index.php?chkLogin=1");
		}

		$this->studentID = $Session_StudentID;
		$this->db = new Database();
	}

	public function isAuthenticated($studentID,$studentPassKey)
	{
		//TODO ISSUE: password is being stored in db as plaintext! This should be saved as a hash!
		$sql="SELECT * FROM kioskuser u WHERE u.studid = ? AND u.password = ?"; 
		return ($this->db->count($sql,array($studentID,$studentPassKey)) == 1);
	}	

	public function logout()
	{
		$db->disconnect();
	}
	
	public function getName()
	{
		if (!($this->studentID)) die("Student ID required!");
		$sql0="SELECT studID, studLname, studFname, studMname FROM studpersonalinfotbl WHERE studID = '$this->studentID'"; 
		$results = $this->db->row_query($sql0);
		foreach ($results as $row) {
			$this->lastname = $row['studLname'];
			$this->firstname = $row['studFname'];
			$this->middlename = $row['studMname'];
		}
		$this->fullname = "$this->firstname $this->middlename $this->lastname";
		return $this->fullname;		
	}
}

?>