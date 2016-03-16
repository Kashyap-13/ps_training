<?php
	include('includes/session.php');
	
	$error_message = array();
	if (isset($_SESSION['errors']) && count($_SESSION['errors']) > 0)
	{
		foreach ($_SESSION['errors'] as $key => $value) {
			$error_message[$key] = $value;	
		}
		unset($_SESSION['errors']);
	}
	include('includes/header.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>User Profile</title>
</head>
<body>
	<!-- Start of container -->
	<div class="container">
		<!-- Start of row -->
		<div class="row form-center">
			<div class="col-md-6 col-md-offset-3 form-style">
				<div class="heading-style">
					<h1 class="text-center"><strong>Login</strong></h1>
				</div>
				<form method="post" action="controllers/login_control.php" class="form-horizontal">
					<!-- start of form-group for User Name -->
					<div class="form-group">
						<label for="user_name" class="col-sm-3 control-label">User Name</label>
						<div class="col-sm-9">
      				<input type="text" class="form-control" id="user_name" name="user_name" placeholder="Enter email or username">
   				 	</div>
					</div>
					<span class="col-sm-12 text-right text-danger"><?php if(isset($error_message['user_name'])){ echo $error_message['user_name']; }?></span>
					<!-- end of form-group for User Name -->
					<!-- start of form-group for Password -->
					<div class="form-group">
    				<label for="password" class="col-sm-3 control-label">Password</label>
    				<div class="col-sm-9">
    				  <input type="password" class="form-control" id="password" name="password" placeholder="Enter password">
    				</div>
  				</div>
  				<span class="col-sm-12 text-right text-danger"><?php if(isset($error_message['password'])){ echo $error_message['password']; }?></span>
  				<!-- end of form-group for Password -->
  				<!-- start of form-group for checkbox -->
  				<div class="form-group">
    				<div class="col-sm-offset-3 col-sm-3">
      				<div class="checkbox">
      	  			<label>
      	  			  <input type="checkbox"> Remember me
      	  			</label>
      				</div>
    				</div>
  				</div>
  				<!-- end of form-group for checkbox -->
  				<!-- start of form-group for Login -->
  				<div class="form-group">
    				<div class="col-sm-offset-3 col-sm-6">
      				<button type="submit" class="btn btn-primary" name="login">Login</button>
      				<a class="btn btn-primary" name="signup" href="register.php">Sign up</a>
    				</div>
  				</div>
  				<!-- end of form-group for Login -->
  				<span class="col-sm-12 text-center text-danger"><?php if(isset($error_message['login_fail'])){ echo $error_message['login_fail']; }?></span>
				</form>
			</div>
		</div>
		<!-- End of row -->
	</div>	
	<!-- End of container -->
</body>
</html>