<?php
require 'config.php';
	$chkLogin = 0;
	if ( !empty($_GET['chkLogin'])) {
		$chkLogin= $_REQUEST['chkLogin'];
	}
	
?>
<?php
 if ( empty($_SESSION['varStudentID'])) { ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>UALink</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
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

    </div>
  </div>
</nav>
<div class="container">
 <div class="row">
  <div class="col-sm-3"></div>
  <div class="col-sm-6">

							<span class="help-block">
							<?php 
		
		if($chkLogin == 1){
			echo '<div class="alert alert-danger" role="alert"><span class="glyphicon glyphicon-remove"></span><strong>  Failed!  </strong>   Student ID Number and Password mismatched!</div>';
		}

		?>
							</span>	
	<div class="well">
	<div class="row">
		<form class="form-horizontal" role="form" method="post" action="chkStudentID.php">
				<div class="col-sm-1"></div>
		<div class="col-sm-10">
			<div class="row">
				<p align="center"><img src="images/logoua-blk.png" class="img-responsive"/></p>
				<hr />
				<h3><p align="left">Log into UALink Account</p></h3>
				<hr />
			</div>
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
    <footer class="container-fluid text-center">
        <p>Maintained by: UA Management Information System Office || Developed by: GJ.Paglingayen (ITKenyo / UA Devs) and LA.Bermejo (UA Devs)</p>
    </footer>
</body>
</html>
<?php
 } else {
	 
 header( 'Location: dashboard.php' );
 }
 ?>
