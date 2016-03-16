<?php
	include('../includes/session.php');
	include('../config/database.php');
	
	if(isset($_POST['update_user']))
	{
		foreach ($_POST as $key => $value)
		{
			$$key = trim($value);	
		}
		$_SESSION['errors'] = array();
		if ((!preg_match("/^[a-zA-Z ]*$/", $first_name)) || empty($first_name))
		{
			$_SESSION['errors']['first_name'] = "Please enter valid first name";
		}
		if ((!preg_match("/^[a-zA-Z ]*$/", $last_name)) || empty($last_name))
		{
			$_SESSION['errors']['last_name'] = "Please enter valid last name";
		}
		if ((!preg_match("/^[0-9a-zA-Z. ]+$/", $address_line1)) || empty($address_line1))
		{
			$_SESSION['errors']['address_line1'] = "Please enter address line1";
		}
		if ((!preg_match("/^[0-9a-zA-Z. ]+$/", $address_line2)) || empty($address_line2))
		{
			$_SESSION['errors']['address_line2'] = "Please enter address line2";	
		}
		if ((!preg_match("/^[a-zA-Z ]*$/", $city)) || empty($city))
		{
			$_SESSION['errors']['city'] = "Please enter valid city";
		}
		if ((!preg_match("/^[0-9]{6}$/", $zipcode)) || empty($zipcode))
		{
			$_SESSION['errors']['zipcode'] = "Please enter valid zipcode";	
		}
		if ((!preg_match("/^[a-zA-Z ]*$/", $state)) || empty($state))
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
				$salt = "abs$rg$@^$29f146546fd&(!)!#@";
				$password = md5(sha1(md5($_POST['password'] . $salt)));

				$result1 = execute_query("UPDATE user_data SET first_name = ?, last_name = ?, password = ?, address_line1 = ?, address_line2 = ?, city = ?, zipcode = ?, state = ?, country = ? where id = ?", array($first_name, $last_name, $password, $address_line1, $address_line2, $city, $zipcode, $state, $country, $id));
			}
			else
			{
				$result1 = execute_query("UPDATE user_data SET first_name = ?, last_name = ?, address_line1 = ?, address_line2 = ?, city = ?, zipcode = ?, state = ?, country = ? where id = ?", array($first_name, $last_name, $address_line1, $address_line2, $city, $zipcode, $state, $country, $id));
			}
			header('Location:../myprofile.php');
		}
		else
		{
			header('Location:../myprofile.php');
		}
	}
	if(isset($_POST['upload']))
	{
		$_SESSION['errors'] = array();
		if ((($_FILES["fileToUpload"]["type"] == "image/gif") || ($_FILES["fileToUpload"]["type"] == "image/png") || ($_FILES["fileToUpload"]["type"] == "image/jpeg") || ($_FILES["fileToUpload"]["type"] == "image/pjpeg")) && ($_FILES["fileToUpload"]["size"] < 20000))
		{
			if ($_FILES["fileToUpload"]["error"] > 0)
			{
				$_SESSION['errors']['file_error'] = "Return Code: " . $_FILES["file"]["error"];
				//echo '<script>alert("Return Code: " . $_FILES["file"]["error"]);</script>';
				header('location: ../myprofile.php');
			}
			else
			{
				if($_FILES["fileToUpload"]["size"] > 500000)
				{
					$_SESSION['errors']['file_size'] = "Sorry, your file is too large.";
					//echo '<script>alert("Sorry, your file is too large.");</script>';
					header('location: ../myprofile.php');
				}
				else
				{
					if (file_exists("../image/profile_picture/" . md5($_SESSION['fname'] . $_SESSION['user'])))
					{
						unlink("../image/profile_picture/" . md5($_SESSION['fname'] . $_SESSION['user']));
						//$_SESSION['errors']['file_repeat'] = "Sorry, file already exists.";
						//echo '<script>alert("Sorry, file already exists.");</script>';
						//header('location: ../myprofile.php');
					}
					move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], "/var/www/ps_training/user_register/image/profile_picture/" . md5($_SESSION['fname'] . $_SESSION['user']));
					$path = "image/profile_picture/" . md5($_SESSION['fname'] . $_SESSION['user']);
					$id = $_SESSION['user'];
					$name = $_FILES["fileToUpload"]["name"];
					$result = execute_query("UPDATE user_data SET profile_picture = ? where id = ? ",array($path, $id));
					//echo '<script>alert("The file '. basename( $_FILES["fileToUpload"]["name"]). ' has been uploaded.")</script>'; 
					header('location: ../myprofile.php');
				}
			}
		}
		else
		{
			$_SESSION['errors']['file_invalid'] = "File is not an image.";
			//echo '<script>alert("File is not an image.");</script>';
			header('location: ../myprofile.php');
		}
		//header('location: ../myprofile.php');
	}
?>	
