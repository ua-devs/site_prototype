<?php
	require 'student.php';
	# Note that Student.php already contains session_start(). 
	# ALso its constructor contains the 'empty' check to redirect to login if no studentID
	# We only need to instantiate it and present its data here in dashboard.
	$student = new Student($_SESSION['varStudentID']);

	#If we had not redirected at this point, it means student is valid. Let's retireve his info, so w can display it in the HTML.
	$student->getGrades();
	$student->getAppraisals();
	$studentID->getPayments(); 
?>

<?php	
	#begin HTML client-side code
	include '_head.php';  
?>

<div class="well">
	<h1 class="pull-left"><span class="glyphicon glyphicon-user"></span> </h1>
	<h1> Student ID: <b><?php echo $student->studentID ?></b></h1>
	<p><b><?php echo "$student->fullname"; ?></b> 
		<small><a href="logout.php">(Not you?)</a></small>
	</p>
</div>
<div class="container">

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
							// $pdo = Database::connect();
							// $sql = "SELECT o.syear AS vSchoolYear, o.semno AS vSemester,
							// c.subjname AS vSubjectName, c.subjtitle AS vSubjectTitle,
							// s.subjfgrade as vSubjectGrade, s.subjcomp AS vSubjectCompletion, s.creditearned AS vSubjectEarned
							// FROM studidsubjid s, subjcodtbl c, subjectsoffered o
							// WHERE studid = '$studID' AND s.subjid = o.subjectid AND o.subjectcode = c.subjcod
							// ORDER BY o.syear, o.semno";

							// foreach ($pdo->query($sql) as $row) {
							// 	echo '<tr>';
							// 	echo '<td>' . $row['vSchoolYear'];
							// 	echo '<td>' . $row['vSemester'];
							// 	echo '<td>' . $row['vSubjectName'];
							// 	echo '<td>' . $row['vSubjectTitle'];
							// 	echo '<td>' . $row['vSubjectGrade'];
							// 	echo '<td>' . $row['vSubjectCompletion'];
							// 	echo '<td>' . $row['vSubjectEarned'];
							// 	echo '<tr>';
							// }

							// Database::disconnect();
						if(count($student->grades)){
							foreach ($student->getGrades() as $row) {
								echo "<tr>";
								echo "<td>" . $row['vSchoolYear'] . "</td>";
								echo "<td>" . $row['vSemester'] . "</td>";
								echo "<td>" . $row['vSubjectName'] . "</td>";
								echo "<td>" . $row['vSubjectTitle'] . "</td>";
								echo "<td>" . $row['vSubjectGrade'] . "</td>";
								echo "<td>" . $row['vSubjectCompletion'] . "</td>";
								echo "<td>" . $row['vSubjectEarned'] . "</td>";
								echo "<tr>";	
							}
						}
						else {
							echo "<tr><td>No data yet.</td></tr>";
						}

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
							// $pdo = Database::connect();
							// $sql2 = "SELECT studid AS vStudentID, sy AS vSchoolYear, term AS vSemester, fund AS vFund, account AS vAccount, round(amount,2) AS vAmount FROM tblstudappraisal WHERE studid = '$studID' ORDER BY sy, term, fund, account";

							// foreach ($pdo->query($sql2) as $row) {
							// 	echo '<tr>';
							// 	echo '<td>' . $row['vSchoolYear'];
							// 	echo '<td>' . $row['vSemester'];
							// 	echo '<td>' . $row['vFund'];
							// 	echo '<td>' . $row['vAccount'];
							// 	echo '<td>' . $row['vAmount'];
							// 	echo '<tr>';
							// }

							// Database::disconnect();
						if(count($student->appraisals)){
							foreach ($student->getAppraisals() as $row) {
								echo "<tr>";
								echo "<td>" . $row['vSchoolYear'] . "</td>";
								echo "<td>" . $row['vSemester'] . "</td>";
								echo "<td>" . $row['vFund'] . "</td>";
								echo "<td>" . $row['vAccount'] . "</td>"; 
								echo "<td>" . $row['vAmount'] . "</td>"; 
								echo "</tr>";
						}
						else {
							echo "<tr><td>No data yet.</td></tr>";
						}

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
							// $pdo = Database::connect();
							// $sql3 = "Select studid AS vStudentID, sy AS vSchoolYear, term AS vSemester, orno AS vORno, fund AS vFund, account AS vAccount, round(amount,2) as vAmount
							// from tblstudpayment  where studid = '$studID'
							// order by sy, term, fund, account";

							// foreach ($pdo->query($sql3) as $row) {
							// 	echo '<tr>';
							// 	echo '<td>' . $row['vSchoolYear'];
							// 	echo '<td>' . $row['vSemester'];
							// 	echo '<td>' . $row['vORno'];
							// 	echo '<td>' . $row['vFund'];
							// 	echo '<td>' . $row['vAccount'];
							// 	echo '<td>' . $row['vAmount'];
							// 	echo '<tr>';
							// }

							// Database::disconnect();
						
						if(count($student->payments)){
							foreach ($student->getPayments() as $row) {
								echo "<tr>";
								echo "<td>" . $row['vSchoolYear'] . "</td>";
								echo "<td>" . $row['vSemester'] . "</td>";
								echo "<td>" . $row['vORno'] . "</td>";
								echo "<td>" . $row['vFund'] . "</td>";
								echo "<td>" . $row['vAccount'] . "</td>";
								echo "<td>" . $row['vAmount'] . "</td>";
								echo "</tr>";
							}	
						}
						else {
							echo "<tr><td>No data yet.</td></tr>";
						}						

						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>

<?php
	require '_footer.php';
?>