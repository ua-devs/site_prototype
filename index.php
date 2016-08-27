<?php
	//require 'config.php';
session_start();
$chkLogin = 0;
if ( !empty($_GET['chkLogin'])) {
	$chkLogin= $_REQUEST['chkLogin'];
}

?>
<?php
if ( empty($_SESSION['varStudentID'])) { ?>
<?php include '_head.php';  ?>


<div class="container">
	<div class="row">
		<div class="col-sm-3"></div>
		<div class="col-sm-6">

			<div class="well">
				<div class="row">
					<form class="form-horizontal" role="form" method="post" action="chkStudentID.php" autocomplete="false">
						<div class="col-sm-1"></div>
						<div class="col-sm-10">
							<div class="row">
								<p align="center"><img src="images/logoua-blk.png" class="img-responsive" alt="Republic of the Philippines | University of Antique"/></p>
								<hr />
								<h1><p align="left">Log into UALink Account</p></h1>
								<hr />
							</div>
							<span class="help-block">
								<?php 
								// if($chkLogin == 1){
								if($chkLogin){
									echo '<div class="alert alert-danger" role="alert"><span class="glyphicon glyphicon-remove"></span><strong>  Failed!  </strong>   Student ID Number and Password mismatched!</div>';
								}
								?>
							</span>	
							<div class="form-group">
								<div class="col-sm-12 input-group">
									<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
									<input type="text" class="form-control" id="studentID" name="studentID" placeholder="Student ID Number (e.g., 2014-0001-A)" required>
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-12 input-group">
									<span class="input-group-addon"><i class="glyphicon glyphicon-asterisk"></i></span>
									<input type="password" class="form-control" id="passkey" name="passkey" placeholder="Password" required>
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-12">
									<button type="submit" class="btn btn-success btn-block"><span class="glyphicon glyphicon-log-in"></span> Login</button>
								</div>
							</div>
						</div>
					</form>
					<div class="col-sm-1"></div>
				</div>
			</div>
		</div>
		<div class="col-sm-3"></div>
	</div>
</div>
<?php
require '_footer.php';
?>

<?php
} else {

	header( 'Location: dashboard.php' );
}
?>
