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
		if (!$Session_StudentID || empty($Session_StudentID)) {
			header("Location: index.php?chkLogin=no_access");
		}
		$_SESSION['varStudentID']= $Session_StudentID;
		$this->studentID = $Session_StudentID;
		$this->db = new Database();
		$this->getName();
	}

	public function getName()
	{
		if (!($this->studentID)) die("Student ID required!");
		$sql0="SELECT studID, studLname, studFname, studMname FROM studpersonalinfotbl WHERE studID = '$this->studentID'"; 
		$results = $this->getData($sql0);

		foreach ($results as $row) {
			$this->lastname = $row['studLname'];
			$this->firstname = $row['studFname'];
			$this->middlename = $row['studMname'];
		}
		$this->fullname = " $this->lastname, $this->firstname $this->middlename";
		return $this->fullname;		
	}

	# Student's School information
	public function getGrades()
	{
		$sql = "SELECT o.syear AS vSchoolYear, o.semno AS vSemester,
							c.subjname AS vSubjectName, c.subjtitle AS vSubjectTitle,
							s.subjfgrade as vSubjectGrade, s.subjcomp AS vSubjectCompletion, s.creditearned AS vSubjectEarned
							FROM studidsubjid s, subjcodtbl c, subjectsoffered o
							WHERE studid = '$this->studentID' AND s.subjid = o.subjectid AND o.subjectcode = c.subjcod
							ORDER BY o.syear, o.semno";
		return $this->getData($sql);
	}

	public function getAppraisal()
	{
		$sql = "SELECT studid AS vStudentID, sy AS vSchoolYear, term AS vSemester, fund AS vFund, account AS vAccount, round(amount,2) AS vAmount FROM tblstudappraisal WHERE studid = '$this->studentID' ORDER BY sy, term, fund, account";
		return $this->getData($sql);
	}

	public function getPayments()
	{
		$sql = "Select studid AS vStudentID, sy AS vSchoolYear, term AS vSemester, orno AS vORno, fund AS vFund, account AS vAccount, round(amount,2) as vAmount from tblstudpayment  where studid = '$this->studentID' order by sy, term, fund, account";
		return $this->getData($sql);
	}

	# Utility methods
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

	private function getData($q){
		# a method for running queries using our $db property and returns the resultset, which is empty if invalid
		if (!$q) return array();
		return $this->db->row_query($q);
	}
}

?>