<?php
	
	if(!isset($_SESSION))     {
		session_start();
	}

	require 'config.php';
	$chkLogin = true;
	
	if(!empty($_POST['studentID'])  || !empty($_POST['passkey']) ){
		$studentID = $_POST['studentID'];
		$passkey = $_POST['passkey'];
		$pdo = Database::connect();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql="SELECT * FROM kioskuser WHERE studId = ? and password = ?";
		$q = $pdo->prepare($sql);
		$q->execute(array($studentID, $passkey));

		$count = $q->rowCount();
		Database::disconnect();
		//echo $count;
		
		if($count==0){
			$chkLogin = false;
			$studentID = null;
			$passkey = null;
		} else {

			$pdo = Database::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql="SELECT * FROM kioskuser WHERE studId = '$studentID' and password = '$passkey'";
			foreach ($pdo->query($sql) as $row) {
				$studentID = $row['studId'];
			}

			Database::disconnect();
			$_SESSION['studentID'] = $studentID;
			$_SESSION['validity'] = 1;
			header("Location: index.php");
		}

	} ?>
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
      <a class="navbar-brand" href="#">UALink</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a href="#">ABOUT</a></li>
        <li><a href="#">CONTACT</a></li>
      </ul>
    </div>
  </div>
</nav>
<div class="container">
 <div class="row">
  <div class="col-sm-3"></div>
  <div class="col-sm-6">
  <?php  if(empty($_SESSION['studentID'])){ ?>
							<span class="help-block">
							<?php 
		
		if($chkLogin == false){
			echo '<div class="alert alert-danger" role="alert"><span class="glyphicon glyphicon-remove"></span><strong>  Failed!  </strong>   Student ID Number and Password mismatched!</div>';
		}

		?>
							</span>	
	<div class="well">
	<div class="row">
		<form class="form-horizontal" role="form" method="post" action="index.php">
				<div class="col-sm-1"></div>
		<div class="col-sm-10">
			<div class="panel-heading">
				<p align="left">LOGIN ACCOUNT</p>
			</div>
			<div class="form-group">
				<div class="col-sm-12 input-group">
					<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
					<input type="text" class="form-control" id="studentID" name="studentID" placeholder="Student ID Number (e.g., 2014-0001-A)">
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-12 input-group">
					<span class="input-group-addon"><i class="glyphicon glyphicon-asterisk"></i></span>
					<input type="password" class="form-control" id="passkey" name="passkey" placeholder="Password">
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-12">
                    <button type="submit" class="btn btn-success btn-block">Login</button>
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
</body>
</html>
					<?php 
	} else {
		header("Location: dashboard.php");
	}

	?>