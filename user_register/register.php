<?php
  include('config/init.php');
	include($siteConfig['include_dir'].'session.php');

	$error_message = array();
	if (isset($_SESSION['errors']) && count($_SESSION['errors']) > 0)
	{
		foreach ($_SESSION['errors'] as $key => $value) {
			$error_message[$key] = $value;	
		}
		unset($_SESSION['errors']);
	}
  $post_data = array();
  if (isset($_SESSION['data']))
  {
    $post_data = $_SESSION['data'];
    unset($_SESSION['data']); 
  }
	include($siteConfig['include_dir'] . 'header.php');
?>
<body>
	<!-- Start of container -->
	<div class="container">
		<!-- Start of row -->
		<div class="row">
			<div class="col-md-8 col-md-offset-2 form-style">
				<div class="heading-style">
					<h1 class="text-center"><strong>Registration</strong></h1>
				</div>
				<form method="post" action="<?php echo $siteConfig['controller_dir']; ?>register_control.php" class="form-horizontal" onsubmit="return validate_form()">
					<span class="col-sm-12 text-center text-danger"><?php if(isset($error_message['dublicate_user'])){ echo $error_message['dublicate_user']; }?></span>
					<!-- start of form-group for First Name-->
					<div class="form-group">
						<label for="first_name" class="col-sm-3 control-label">First Name</label>
						<div class="col-sm-6">
    	  			<input type="text" class="form-control" id="first_name" name="first_name" required placeholder="First Name" value="<?=isset($post_data['first_name']) ? $post_data['first_name']: ''?>">
    	  		</div>
    	  		<div class="col-sm-3">
    	  			<span class="text-danger"><?php if(isset($error_message['first_name'])){ echo $error_message['first_name']; }?></span>
   				 	</div>
					</div>
					<!-- end of form-group for First Name-->
					<!-- start of form-group for Last Name-->
					<div class="form-group">
						<label for="last_name" class="col-sm-3 control-label">Last Name</label>
						<div class="col-sm-6">
    	  			<input type="text" class="form-control" id="last_name" name="last_name" required placeholder="Last Name" value="<?=isset($post_data['last_name']) ? $post_data['last_name']: ''?>">
   				 	</div>
   				 	<div class="col-sm-3">
    	  			<span class="text-danger"><?php if(isset($error_message['last_name'])){ echo $error_message['last_name']; }?></span>
   				 	</div>
					</div>
					<!-- end of form-group for Last Name-->
					<!-- start of form-group for Email -->
					<div class="form-group">
						<label for="email_id" class="col-sm-3 control-label">Email</label>
						<div class="col-sm-6">
    	  			<input type="email" class="form-control" id="email_id" name="email_id" required placeholder="Email" value="<?=isset($post_data['email_id']) ? $post_data['email_id']: ''?>">
   				 	</div>
   				 	<div class="col-sm-3">
    	  			<span class="text-danger"><?php if(isset($error_message['email_id'])){ echo $error_message['email_id']; }?></span>
   				 	</div>
					</div>
					<!-- end of form-group for Email -->
					<!-- start of form-group for User Name -->
					<div class="form-group">
						<label for="user_name" class="col-sm-3 control-label">User Name</label>
						<div class="col-sm-6">
    	  			<input type="text" class="form-control" id="user_name" name="user_name" required placeholder="User Name" value="<?=isset($post_data['user_name']) ? $post_data['user_name']: ''?>">
   				 	</div>
   				 	<div class="col-sm-3">
    	  			<span class="text-danger"><?php if(isset($error_message['user_name'])){ echo $error_message['user_name']; }?></span>
   				 	</div>
					</div>
					<!-- end of form-group for User Name -->
					<!-- start of form-group for Password -->
					<div class="form-group">
    				<label for="password" class="col-sm-3 control-label">Password</label>
    				<div class="col-sm-6">
    				  <input type="password" class="form-control" id="password" name="password" required placeholder="Password" value="<?=isset($post_data['password']) ? $post_data['password']: ''?>">
    				</div>
    				<div class="col-sm-3">
    	  			<span class="text-danger"><?php if(isset($error_message['password'])){ echo $error_message['password']; }?></span>
   				 	</div>
  				</div>
  				<!-- end of form-group for Password -->
  				<!-- start of form-group for Confirm Password -->
					<div class="form-group">
    				<label for="confirm_password" class="col-sm-3 control-label">Confirm Password</label>
    				<div class="col-sm-6">
    				  <input type="password" class="form-control" id="confirm_password" name="confirm_password" required placeholder="Confirm Password" value="<?=isset($post_data['confirm_password']) ? $post_data['confirm_password']: ''?>">
    				</div>
    				<div class="col-sm-3">
    	  			<span class="text-danger">
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
    	     	    <input type="text" class="form-control" id="address_line1" name="address_line1" required placeholder="address line 1" value="<?=isset($post_data['address_line1']) ? $post_data['address_line1']: ''?>">
    	     	</div>
    	     	<div class="col-sm-3">
    	  			<span class="text-danger"><?php if(isset($error_message['address_line1'])){ echo $error_message['address_line1']; }?></span>
   				 	</div>
    	    </div>
    	    <!-- end of form-group for Address Line 1 -->
    	    <!-- start of form-group for Address Line 2 -->
  				<div class="form-group">
    	     	<label for="address_line2" class="col-sm-3 control-label">Address Line 2</label>
    	     	<div class="col-sm-6">
    	     	    <input type="text" class="form-control" id="address_line2" name="address_line2" required placeholder="address line 2" value="<?=isset($post_data['address_line2']) ? $post_data['address_line2']: ''?>">
    	     	</div>
    	     	<div class="col-sm-3">
    	  			<span class="text-danger"><?php if(isset($error_message['address_line2'])){ echo $error_message['address_line2']; }?></span>
   				 	</div>
    	    </div>
    	    <!-- end of form-group for Address Line 2 -->
    	    <!-- start of form-group for City -->
  				<div class="form-group">
    	     	<label for="city" class="col-sm-3 control-label">City</label>
    	     	<div class="col-sm-6">
    	     	    <input type="text" class="form-control" id="city" name="city" required placeholder="City" value="<?=isset($post_data['city']) ? $post_data['city']: ''?>">
    	     	</div>
    	     	<div class="col-sm-3">
    	  			<span class="text-danger"><?php if(isset($error_message['city'])){ echo $error_message['city']; }?></span>
   				 	</div>
    	    </div>
    	    <!-- end of form-group for City -->
    	    <!-- start of form-group for Zipcode -->
  				<div class="form-group">
    	     	<label for="zipcode" class="col-sm-3 control-label">Zipcode</label>
    	     	<div class="col-sm-6">
    	     	    <input type="text" class="form-control" id="zipcode" name="zipcode" required placeholder="Zipcode" value="<?=isset($post_data['zipcode']) ? $post_data['zipcode']: ''?>">
    	     	</div>
    	     	<div class="col-sm-3">
    	  			<span class="text-danger"><?php if(isset($error_message['zipcode'])){ echo $error_message['zipcode']; }?></span>
   				 	</div>
    	    </div>
    	    <!-- end of form-group for Zipcode -->
    	    <!-- start of form-group for State -->
  				<div class="form-group">
    	     	<label for="state" class="col-sm-3 control-label">State</label>
    	     	<div class="col-sm-6">
    	     	    <input type="text" class="form-control" id="state" name="state" required placeholder="State" value="<?=isset($post_data['state']) ? $post_data['state']: ''?>">
    	     	</div>
    	     	<div class="col-sm-3">
    	  			<span class="text-danger"><?php if(isset($error_message['state'])){ echo $error_message['state']; }?></span>
   				 	</div>
    	    </div>
    	    <!-- end of form-group for State -->
    	    <!-- start of form-group for Country -->
  				<div class="form-group">
    	     	<label for="country" class="col-sm-3 control-label">Country</label>
    	     	<div class="col-sm-6">
    	     	  <select class="form-control" id="country" name="country" required>
    	          <option value="" selected="selected">Select country</option>
    	          <?php
                  echo '<option ' . ((isset($post_data['country']) && $post_data['country'] == "India") ? 'selected="selected"': '') . '">' . "India" . '</option>';
                  echo '<option ' . ((isset($post_data['country']) && $post_data['country'] == "Pakistan") ? 'selected="selected"': '') . '">' . "Pakistan" . '</option>';
                  echo '<option ' . ((isset($post_data['country']) && $post_data['country'] == "Maldives") ? 'selected="selected"': '') . '">' . "Maldives" . '</option>';
                ?>
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
    	  			<button type="submit" class="btn btn-primary" name="register">Register</button>
    	  			<a class="btn btn-primary" name="login" href="<?php echo $siteConfig['site_url']; ?>index.php">Login</a>
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