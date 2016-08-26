<?php
	require 'student.php';

    $varStudentID = $_POST['studentID'];
    $varPasskey = $_POST['passkey'];
	
    $student = new Student($varStudentID);
	if ($student->isAuthenticated($varStudentID,$varPasskey)){
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