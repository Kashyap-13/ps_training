<?php
	include('../config/init.php');
	include('../' . $siteConfig['include_dir'] . 'session.php');
	include('../' . $siteConfig['config_dir'] . 'database.php');
	include('../' . $siteConfig['include_dir'] . 'function.php');
	if(isset($_POST['update_user']))
	{
		foreach ($_POST as $key => $value)
		{
			$$key = trim($value);	
		}
		$_SESSION['errors'] = array();
		if (! validate_string($first_name))
		{
			$_SESSION['errors']['first_name'] = "Please enter valid first name";	
		}
		if (! validate_string($last_name))
		{
			$_SESSION['errors']['last_name'] = "Please enter valid last name";	
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
		if (count($_SESSION['errors']) == 0)
		{
			$id = $_SESSION['user'];
			if (!empty($password))
			{
				if (strlen($password) < '6')
				{
					$_SESSION['errors']['password'] = "Password must be of 6 digit";
				}
				else
				{
					$password = md5(sha1(md5($_POST['password'] . $salt)));
	
					$result1 = execute_query("UPDATE user_data SET first_name = ?, last_name = ?, password = ?, address_line1 = ?, address_line2 = ?, city = ?, zipcode = ?, state = ?, country = ? where id = ?", array($first_name, $last_name, $password, $address_line1, $address_line2, $city, $zipcode, $state, $country, $id));
					$_SESSION['fname'] = $first_name;
					$_SESSION['success'] = "Profile updated successfully";
				}			
			}
			else
			{
				$result1 = execute_query("UPDATE user_data SET first_name = ?, last_name = ?, address_line1 = ?, address_line2 = ?, city = ?, zipcode = ?, state = ?, country = ? where id = ?", array($first_name, $last_name, $address_line1, $address_line2, $city, $zipcode, $state, $country, $id));
				$_SESSION['fname'] = $first_name;
				$_SESSION['success'] = "Profile updated successfully";
			}
			header('location:' . $siteConfig['site_url'] . 'myprofile.php');
		}
		else
		{
			header('location:' . $siteConfig['site_url'] . 'myprofile.php');
		}
	}
	if(isset($_POST['upload']))
	{
		$_SESSION['errors'] = array();
		$imageFileType = pathinfo($_FILES["fileToUpload"]["name"],PATHINFO_EXTENSION);
		
		$target_file = dirname(getcwd()) . "/" . $siteConfig['image_dir'] . $siteConfig['profile_pic_dir'] . md5($_SESSION['fname'] . $_SESSION['user']) . "." . $imageFileType;
		//$target_file = "/var/www/ps_training/user_register/image/profile_picture/" . md5($_SESSION['fname'] . $_SESSION['user']) . "." . $imageFileType;
		//echo $target_file;
		//exit;

		if (($_FILES["fileToUpload"]["type"] == "image/gif") || ($_FILES["fileToUpload"]["type"] == "image/png") || ($_FILES["fileToUpload"]["type"] == "image/jpeg") || ($_FILES["fileToUpload"]["type"] == "image/pjpeg"))
		{
			if ($_FILES["fileToUpload"]["error"] > 0)
			{
				$_SESSION['errors']['file_error'] = "Return Code: " . $_FILES["file"]["error"];
				//echo '<script>alert("Return Code: " . $_FILES["file"]["error"]);</script>';
				header('location:' . $siteConfig['site_url'] . 'myprofile.php');
			}
			else
			{
				if($_FILES["fileToUpload"]["size"] > 500000)
				{
					$_SESSION['errors']['file_size'] = "Sorry, your file is too large.";
					//echo '<script>alert("Sorry, your file is too large.");</script>';
					header('location:' . $siteConfig['site_url'] . 'myprofile.php');
				}
				else
				{
					if (file_exists($target_file))
					{
						unlink("../image/profile_picture/" . md5($_SESSION['fname'] . $_SESSION['user']) . "." . $imageFileType);
						//$_SESSION['errors']['file_repeat'] = "Sorry, file already exists.";
						//echo '<script>alert("Sorry, file already exists.");</script>';
						//header('location: ../myprofile.php');
					}
					move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
					$path = "image/profile_picture/" . md5($_SESSION['fname'] . $_SESSION['user']) . "." . $imageFileType;
					$id = $_SESSION['user'];
					$name = $_FILES["fileToUpload"]["name"];
					$result = execute_query("UPDATE user_data SET profile_picture = ? where id = ? ",array($path, $id));
					$_SESSION['profile_success'] = "Profile picture updated successfully";
					//echo '<script>alert("The file '. basename( $_FILES["fileToUpload"]["name"]). ' has been uploaded.")</script>'; 
					header('location:' . $siteConfig['site_url'] . 'myprofile.php');
				}
			}
		}
		else
		{
			$_SESSION['errors']['file_invalid'] = "File is not an image.";
			//echo '<script>alert("File is not an image.");</script>';
			header('location:' . $siteConfig['site_url'] . 'myprofile.php');
		}
		//header('location: ../myprofile.php');
	}
?>	
