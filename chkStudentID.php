<?php
	require 'student.php';

    $varStudentID = $_POST['studentID'];
    $varPasskey = $_POST['passkey'];
	
	#let's define a student
    $student = new Student($varStudentID);
    #then let's check if he's in the db
	if ($student->isAuthenticated($varStudentID,$varPasskey)){
		#Student is ok! let's save the ID into the SESSION
		$_SESSION['varStudentID']= $varStudentID;
		#Note that we can save the $student object into the SESSION but in case we become traffic-heavy or Student contains unserializable properties (like its $db property), they will come out in unexpected form, and it's better to requery the Student (store only the ID) in the next page (see http://stackoverflow.com/questions/132194/php-storing-objects-inside-the-session)
		header("Location: dashboard.php");
	}
	else {
		header("Location: index.php?chkLogin=1");
	}

	//require 'config.php';
	// $pdo = Database::connect();
	// $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	// $sql="SELECT * FROM kioskuser u WHERE u.studid = ? AND u.password = ?"; 
 	//    $q = $pdo->prepare($sql);
	// $q->execute(array($varStudentID,$varPasskey));
	
	// $count = $q->rowCount();
	
	// if($count == 1){
	// $sql1="SELECT u.userNo FROM kioskuser u WHERE u.studid = '$varStudentID' AND u.password = '$varPasskey'"; 
	// foreach ($pdo->query($sql1) as $row) {
	// $userNo = $row['u.userNo'];
	// }
	// $_SESSION['varStudentID']= $varStudentID;
	// $_SESSION['varPasskey']= $varPasskey;
	// $_SESSION['varUserNo'] = $userNo;
	// Database::disconnect();
	
	// header("Location: dashboard.php");
	// }
	// else {
	// $_SESSION['varStudentID']= null;
	// $_SESSION['varPasskey']= null;
	// $_SESSION['varUserID'] = null;
	// Database::disconnect();
	// header("Location: index.php?chkLogin=1");
	// }
?>