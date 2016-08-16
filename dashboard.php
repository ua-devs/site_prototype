<?php
require 'config.php';

	
	if(!empty($_SESSION['varStudentID'])){

	$studID = $_SESSION['varStudentID'];
	$pdo = Database::connect();
	$sql0="SELECT studID, studLname, studFname, studMname FROM studpersonalinfotbl WHERE studID = '$studID'"; 
	foreach ($pdo->query($sql0) as $row) {
	$varLastname = $row['studLname'];
	$varFirstname = $row['studFname'];
	$varMiddlename = $row['studMname'];
	Database::disconnect();
	}
	
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>UALink</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>
 <nav class="navbar navbar-inverse">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="http://antiquespride.edu.ph/ualink">UALink</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
	    <li><a href="#">Contact</a></li>
        <li><a href="#">Help</a></li>
      </ul>
	  	           <ul class="nav navbar-nav navbar-right">
           
            

			<li><a href="logout.php">Logout</a></li>
          </ul>
    </div>
  </div>
</nav>
<div class="container">
<div class="row">
	<dl class="dl-horizontal">
  <dt>Student ID :</dt>
  <dd><?php echo "$studID"; ?></dd>
  <dt>Full name :</dt>
  <dd><?php echo "$varLastname" . ", " . "$varFirstname" . " $varMiddlename"; ?></dd>
</dl>
</div>
<div class="row">
<ul class="nav nav-tabs">
  <li class="active"><a data-toggle="tab" href="#grade">Grades</a></li>
  <li><a data-toggle="tab" href="#appraisal">Appraisal</a></li>
  <li><a data-toggle="tab" href="#payment">Payment</a></li>
</ul>

<div class="tab-content">
  <div id="grade" class="tab-pane fade in active">
<table class="table table-hover table-striped table-bordered">
		              <thead>
		                <tr>
		                  <th>School Year</th>
						  <th>Semester</th>
		                  <th>Subject Name</th>
						  <th>Subject Title</th>
						  <th>Subject Grade</th>
						  <th>Subject Completion</th>
						  <th>Credits Earned</th>
		                </tr>
		              </thead>
		              <tbody>
	<?php
   		$pdo = Database::connect();
		$sql = "SELECT o.syear AS vSchoolYear, o.semno AS vSemester,
		c.subjname AS vSubjectName, c.subjtitle AS vSubjectTitle,
		s.subjfgrade as vSubjectGrade, s.subjcomp AS vSubjectCompletion, s.creditearned AS vSubjectEarned
		FROM studidsubjid s, subjcodtbl c, subjectsoffered o
		WHERE studid = '$studID' AND s.subjid = o.subjectid AND o.subjectcode = c.subjcod
		ORDER BY o.syear, o.semno";
	
	foreach ($pdo->query($sql) as $row) {
		echo '<tr>';
		echo '<td>' . $row['vSchoolYear'];
		echo '<td>' . $row['vSemester'];
		echo '<td>' . $row['vSubjectName'];
		echo '<td>' . $row['vSubjectTitle'];
		echo '<td>' . $row['vSubjectGrade'];
		echo '<td>' . $row['vSubjectCompletion'];
		echo '<td>' . $row['vSubjectEarned'];
		echo '<tr>';
	}
	
	Database::disconnect();
	?>
	 </tbody>
	            </table>
			</div>
  <div id="appraisal" class="tab-pane fade">
				
				
<table class="table table-hover table-striped table-bordered">
		              <thead>
		                <tr>
		                  <th>School Year</th>
		                  <th>Semester</th>
						  <th>Fund</th>
						  <th>Account</th>
						  <th>Amount</th>
						 
		                </tr>
		              </thead>
		              <tbody>
	<?php
   		$pdo = Database::connect();
		$sql2 = "SELECT studid AS vStudentID, sy AS vSchoolYear, term AS vSemester, fund AS vFund, account AS vAccount, round(amount,2) AS vAmount FROM tblstudappraisal WHERE studid = '$studID' ORDER BY sy, term, fund, account";
	
	foreach ($pdo->query($sql2) as $row) {
		echo '<tr>';
		echo '<td>' . $row['vSchoolYear'];
		echo '<td>' . $row['vSemester'];
		echo '<td>' . $row['vFund'];
		echo '<td>' . $row['vAccount'];
		echo '<td>' . $row['vAmount'];
		echo '<tr>';
	}
	
	Database::disconnect();
	?>
	 </tbody>
	            </table>
			</div>
			
			 <div id="payment" class="tab-pane fade">
				
				
<table class="table table-hover table-striped table-bordered">
		              <thead>
		                <tr>
		                  <th>School Year</th>
						  <th>Semester</th>
		                  <th>O.R. Number</th>
						  <th>Fund</th>
						  <th>Account</th>
						  <th>Amount</th>
		                </tr>
		              </thead>
		              <tbody>
	<?php
   		$pdo = Database::connect();
		$sql3 = "Select studid AS vStudentID, sy AS vSchoolYear, term AS vSemester, orno AS vORno, fund AS vFund, account AS vAccount, round(amount,2) as vAmount
	 from tblstudpayment  where studid = '$studID'
	 order by sy, term, fund, account";
	
	foreach ($pdo->query($sql3) as $row) {
		echo '<tr>';
		echo '<td>' . $row['vSchoolYear'];
		echo '<td>' . $row['vSemester'];
		echo '<td>' . $row['vORno'];
		echo '<td>' . $row['vFund'];
		echo '<td>' . $row['vAccount'];
		echo '<td>' . $row['vAmount'];
		echo '<tr>';
	}
	
	Database::disconnect();
	?>
	 </tbody>
	            </table>
			</div>
			</div>
</div>
    <footer class="container-fluid text-center">
        <p>Maintained by: UA Management Information System Office || Developed by: GJ.Paglingayen (ITKenyo / UA Devs) and LA.Bermejo (UA Devs)</p>
    </footer>
</body>
</html>
<?php

 }else{
    
 header( 'Location: index.php' );
      
}?>