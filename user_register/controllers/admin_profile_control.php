<?php
	include('../config/init.php');
	include('../' . $siteConfig['include_dir'] . 'session.php');
	include('../' . $siteConfig['config_dir'] . 'database.php');
	include('../' . $siteConfig['config_dir'] . 'user_access.php');
	include('../' . $siteConfig['include_dir'] . 'function.php');
	if(!isset($_SESSION['admin']))
  {
  	header('location:' . $siteConfig['site_url'] . 'index.php');
  }
	if(isset($_POST['update_user']))
	{
		foreach ($_POST as $key => $value)
		{
			$$key = trim($value);	
		}
		$_SESSION['errors'] = array();
		$_SESSION['success'] = array();
		if (! validate_string($first_name))
		{
			$_SESSION['errors']['first_name'] = "Please enter valid first name";	
		}
		if (! validate_string($last_name))
		{
			$_SESSION['errors']['last_name'] = "Please enter valid last name";	
		}
		if (!validate_email($email_id))
		{
			$_SESSION['errors']['email_id'] = "Please enter valid email id";	
		}
		if (! validate_alphanumeric($user_name))
		{
			$_SESSION['errors']['user_name'] = "Please enter valid user name";	
		}
		if (empty($address_line1))
		{
			$_SESSION['errors']['address_line1'] = "Please enter address line1";	
		}
		if (empty($address_line2))
		{
			$_SESSION['errors']['address_line2'] = "Please enter address line2";	
		}
		if (! validate_string($city))
		{
			$_SESSION['errors']['city'] = "Please enter valid city";	
		}
		if (! validate_zipcode($zipcode))
		{
			$_SESSION['errors']['zipcode'] = "Please enter valid zipcode";	
		}
		if (! validate_string($state))
		{
			$_SESSION['errors']['state'] = "Please enter valid state";	
		}
		if (empty($country))
		{
			$_SESSION['errors']['country'] = "Please select country";	
		}
		$result = get_row("select user_name, email_id from user_data where (user_name = ? or email_id = ?) and id != ?",array($user_name, $email_id, $user_id));
		if($result != null) 
		{
  	 	if($result['user_name'] == $user_name && $result['email_id'] == $email_id)
			{
				$_SESSION['errors']['dublicate_user'] = "User already exists";
			}
			else if($result['user_name'] == $user_name)
			{
				$_SESSION['errors']['dublicate_user'] = "User name already exists";
			}
			else
			{
				$_SESSION['errors']['dublicate_user'] = "Email id already exists";
			}
  	 	header('location:' . $siteConfig['site_url'] . 'user_edit.php');
  	}	
		if (count($_SESSION['errors']) == 0)
		{
			if (!empty($password))
			{
				if (strlen($password) < '6')
				{
					$_SESSION['errors']['password'] = "Password must be of 6 digit";	
					header('location:' . $siteConfig['site_url'] . 'user_edit.php?id=' . $user_id . '');
				}
				else
				{
					$password = md5(sha1(md5($_POST['password'] . $salt)));
	
					$result1 = execute_query("UPDATE user_data SET first_name = ?, last_name = ?, email_id = ?, user_name = ?, password = ?, address_line1 = ?, address_line2 = ?, city = ?, zipcode = ?, state = ?, country = ? where id = ?", array($first_name, $last_name, $email_id, $user_name, $password, $address_line1, $address_line2, $city, $zipcode, $state, $country, $user_id)); 
					//$_SESSION['fname'] = $first_name;
					$_SESSION['success'] = "Profile updated successfully";
					header('location:' . $siteConfig['site_url'] . 'manage_user.php');
				}
			}
			else
			{
				$result1 = execute_query("UPDATE user_data SET first_name = ?, last_name = ?, email_id = ?, user_name = ?,address_line1 = ?, address_line2 = ?, city = ?, zipcode = ?, state = ?, country = ? where id = ?", array($first_name, $last_name, $email_id, $user_name, $address_line1, $address_line2, $city, $zipcode, $state, $country, $user_id));
				//$_SESSION['fname'] = $first_name;
				$_SESSION['success'] = "Profile updated successfully";
				header('location:' . $siteConfig['site_url'] . 'manage_user.php');
			}			
		}
		else
		{
			header('location:' . $siteConfig['site_url'] . 'user_edit.php?id=' . $user_id . '');
		}
	}
	if(isset($_POST['upload']))
	{
		$id = $_POST['user_id'];
		$_SESSION['errors'] = array();
		$result = get_rows("select first_name from user_data where id = ?", array($id));
		$row = array();
    foreach ($result as $value) {
    		$data = $value;
    }
    $fname = $data['first_name'];
		$imageFileType = pathinfo($_FILES["fileToUpload"]["name"],PATHINFO_EXTENSION);
		//echo $imageFileType;
		$target_file = "/var/www/ps_training/user_register/image/profile_picture/" .  md5($fname . $id) . "." . $imageFileType;
		
		if (($_FILES["fileToUpload"]["type"] == "image/gif") || ($_FILES["fileToUpload"]["type"] == "image/png") || ($_FILES["fileToUpload"]["type"] == "image/jpeg") || ($_FILES["fileToUpload"]["type"] == "image/pjpeg"))
		{
			if ($_FILES["fileToUpload"]["error"] > 0)
			{
				$_SESSION['errors']['file_error'] = "Return Code: " . $_FILES["file"]["error"];
				//header('location: ../user_edit.php?id=' . $id .'');
				//echo '<script>alert("Return Code: " . $_FILES["file"]["error"]);</script>';
			}
			else
			{
				if($_FILES["fileToUpload"]["size"] > 500000)
				{
					$_SESSION['errors']['file_size'] = "Sorry, your file is too large.";
					//header('location: ../user_edit.php?id=' . $id .'');
					//echo '<script>alert("Sorry, your file is too large.");</script>';
				}
				else
				{
					if (file_exists("../image/profile_picture/" . md5($fname . $id) . "." . $imageFileType))
					{
						unlink("../image/profile_picture/" . md5($fname . $id) . "." . $imageFileType);
						//$_SESSION['errors']['file_repeat'] = "Sorry, file already exists.";
						//echo '<script>alert("Sorry, file already exists.");</script>';
						//header('location: ../myprofile.php');
					}
					move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
					$path = "image/profile_picture/" . md5($fname . $id) . "." . $imageFileType;
					$id = $_POST['user_id'];
					$name = $_FILES["fileToUpload"]["name"];
					$result = execute_query("UPDATE user_data SET profile_picture = ? where id = ?",array($path, $id));
					$_SESSION['profile_success'] = "Profile picture updated successfully";
					//echo($result);
					//echo '<pre>';
					//print_r($_FILES);
					//exit;
					//echo '<script>alert("The file '. basename( $_FILES["fileToUpload"]["name"]). ' has been uploaded.")</script>'; 
					header('location:' . $siteConfig['site_url'] . 'user_edit.php?id=' . $id .'');
				}
			}
			header('location:' . $siteConfig['site_url'] . 'user_edit.php?id=' . $id .'');
		}
		else
		{
			$_SESSION['errors']['file_invalid'] = "File is not an image.";
			//echo '<script>alert("File is not an image.");</script>';
			header('location:' . $siteConfig['site_url'] . 'user_edit.php?id=' . $id .'');
		}
	}
?>
