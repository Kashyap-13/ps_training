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
	<script src="js/user.js"></script>
</head>
<body>
	<!-- Start of container -->
	<div class="container">
		<!-- Start of row -->
		<div class="row">
			<div class="col-md-8 col-md-offset-2 form-style">
				<div class="heading-style">
					<h1 class="text-center"><strong>Registration</strong></h1>
				</div>
				<form method="post" action="controllers/register_control.php" class="form-horizontal">
					<span class="col-sm-12 text-center text-danger"><?php if(isset($error_message['dublicate_user'])){ echo $error_message['dublicate_user']; }?></span>
					<!-- start of form-group for First Name-->
					<div class="form-group">
						<label for="first_name" class="col-sm-3 control-label">First Name</label>
						<div class="col-sm-6">
    	  			<input type="text" class="form-control" id="first_name" name="first_name" placeholder="First Name" onblur="validate_fname()">
    	  		</div>
    	  		<div class="col-sm-3">
    	  			<span><?php if(isset($error_message['first_name'])){ echo $error_message['first_name']; }?></span>
   				 	</div>
					</div>
					<!-- end of form-group for First Name-->
					<!-- start of form-group for Last Name-->
					<div class="form-group">
						<label for="last_name" class="col-sm-3 control-label">Last Name</label>
						<div class="col-sm-6">
    	  			<input type="text" class="form-control" id="last_name" name="last_name" placeholder="Last Name" onblur="validate_lname()">
   				 	</div>
   				 	<div class="col-sm-3">
    	  			<span><?php if(isset($error_message['last_name'])){ echo $error_message['last_name']; }?></span>
   				 	</div>
					</div>
					<!-- end of form-group for Last Name-->
					<!-- start of form-group for Email -->
					<div class="form-group">
						<label for="email_id" class="col-sm-3 control-label">Email</label>
						<div class="col-sm-6">
    	  			<input type="email" class="form-control" id="email_id" name="email_id" placeholder="Email">
   				 	</div>
   				 	<div class="col-sm-3">
    	  			<span><?php if(isset($error_message['email_id'])){ echo $error_message['email_id']; }?></span>
   				 	</div>
					</div>
					<!-- end of form-group for Email -->
					<!-- start of form-group for User Name -->
					<div class="form-group">
						<label for="user_name" class="col-sm-3 control-label">User Name</label>
						<div class="col-sm-6">
    	  			<input type="text" class="form-control" id="user_name" name="user_name" placeholder="User Name" onblur="validate_uname()">
   				 	</div>
   				 	<div class="col-sm-3">
    	  			<span><?php if(isset($error_message['user_name'])){ echo $error_message['user_name']; }?></span>
   				 	</div>
					</div>
					<!-- end of form-group for User Name -->
					<!-- start of form-group for Password -->
					<div class="form-group">
    				<label for="password" class="col-sm-3 control-label">Password</label>
    				<div class="col-sm-6">
    				  <input type="password" class="form-control" id="password" name="password" placeholder="Password" onblur="validate_password()">
    				</div>
    				<div class="col-sm-3">
    	  			<span><?php if(isset($error_message['password'])){ echo $error_message['password']; }?></span>
   				 	</div>
  				</div>
  				<!-- end of form-group for Password -->
  				<!-- start of form-group for Confirm Password -->
					<div class="form-group">
    				<label for="confirm_password" class="col-sm-3 control-label">Confirm Password</label>
    				<div class="col-sm-6">
    				  <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Confirm Password" onblur="validate_confirmp()">
    				</div>
    				<div class="col-sm-3">
    	  			<span>
    	  				<?php 
    	  					if(isset($error_message['confirm_password'])){ 
    	  						echo $error_message['confirm_password']; 
    	  					} 
    	  					else if(isset($error_message['match'])){ 
    	  						echo $error_message['match']; 
    	  					}
    	  				?>
    	  			</span>
   				 	</div>
  				</div>
  				<!-- end of form-group for Confirm Password -->
  				<!-- start of form-group for Address Line 1-->
  				<div class="form-group">
    	     	<label for="address_line1" class="col-sm-3 control-label">Address Line 1</label>
    	     	<div class="col-sm-6">
    	     	    <input type="text" class="form-control" id="address_line1" name="address_line1" placeholder="address line 1" onblur="validate_address1()">
    	     	</div>
    	     	<div class="col-sm-3">
    	  			<span><?php if(isset($error_message['address_line1'])){ echo $error_message['address_line1']; }?></span>
   				 	</div>
    	    </div>
    	    <!-- end of form-group for Address Line 1 -->
    	    <!-- start of form-group for Address Line 2 -->
  				<div class="form-group">
    	     	<label for="address_line2" class="col-sm-3 control-label">Address Line 2</label>
    	     	<div class="col-sm-6">
    	     	    <input type="text" class="form-control" id="address_line2" name="address_line2" placeholder="address line 2" onblur="validate_address2()">
    	     	</div>
    	     	<div class="col-sm-3">
    	  			<span><?php if(isset($error_message['address_line2'])){ echo $error_message['address_line2']; }?></span>
   				 	</div>
    	    </div>
    	    <!-- end of form-group for Address Line 2 -->
    	    <!-- start of form-group for City -->
  				<div class="form-group">
    	     	<label for="city" class="col-sm-3 control-label">City</label>
    	     	<div class="col-sm-6">
    	     	    <input type="text" class="form-control" id="city" name="city" placeholder="City" onblur="validate_city()">
    	     	</div>
    	     	<div class="col-sm-3">
    	  			<span><?php if(isset($error_message['city'])){ echo $error_message['city']; }?></span>
   				 	</div>
    	    </div>
    	    <!-- end of form-group for City -->
    	    <!-- start of form-group for Zipcode -->
  				<div class="form-group">
    	     	<label for="zipcode" class="col-sm-3 control-label">Zipcode</label>
    	     	<div class="col-sm-6">
    	     	    <input type="text" class="form-control" id="zipcode" name="zipcode" placeholder="Zipcode" onblur="validate_zipcode()">
    	     	</div>
    	     	<div class="col-sm-3">
    	  			<span><?php if(isset($error_message['zipcode'])){ echo $error_message['zipcode']; }?></span>
   				 	</div>
    	    </div>
    	    <!-- end of form-group for Zipcode -->
    	    <!-- start of form-group for State -->
  				<div class="form-group">
    	     	<label for="state" class="col-sm-3 control-label">State</label>
    	     	<div class="col-sm-6">
    	     	    <input type="text" class="form-control" id="state" name="state" placeholder="State" onblur="validate_state()">
    	     	</div>
    	     	<div class="col-sm-3">
    	  			<span><?php if(isset($error_message['state'])){ echo $error_message['state']; }?></span>
   				 	</div>
    	    </div>
    	    <!-- end of form-group for State -->
    	    <!-- start of form-group for Country -->
  				<div class="form-group">
    	     	<label for="country" class="col-sm-3 control-label">Country</label>
    	     	<div class="col-sm-6">
    	     	  <select class="form-control" id="country" name="country" required>
    	          <option value="" selected="selected">Select country</option>
    	          <option>India</option>
    	          <option>Pakistan</option>
    	          <option>Maldives</option>
    	        </select>
    	     	</div>
    	     	<div class="col-sm-3">
    	  			<span><?php if(isset($error_message['country'])){ echo $error_message['country']; }?></span>
   				 	</div>
    	    </div>
    	    <!-- end of form-group for Country -->
    	    <!-- start of form-group for Register -->
    	    <div class="form-group">
    				<div class="col-sm-offset-4 col-sm-6">
    	  			<button type="submit" class="btn btn-primary" name="register" onclick="validate_form()">Register</button>
    	  			<a class="btn btn-primary" name="login" href="login.php">Login</a>
    				</div>
  				</div>
  				<!-- end of form-group for Register -->
				</form>
			</div>
		</div>
		<!-- End of row -->
	</div>	
	<!-- End of container -->
</body>
</html>