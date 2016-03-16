<?php
	include('../includes/session.php');
	include('../config/database.php');
	
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
	if (!filter_var($email_id, FILTER_VALIDATE_EMAIL))
	{
		$_SESSION['errors']['email_id'] = "Please enter valid email id";	
	}
	if ((!preg_match("/^[A-Za-z0-9_]+$/", $user_name)) || empty($user_name))
	{
		$_SESSION['errors']['user_name'] = "Please enter valid user name";	
	}
	if (empty($password))
	{
		$_SESSION['errors']['password'] = "Please enter password";	
	}
	if (empty($confirm_password))
	{
		$_SESSION['errors']['confirm_password'] = "Please enter password again";	
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
	if ($password != $confirm_password)
	{
		$_SESSION['errors']['match'] = "These passwords don't match. Try again?";	
	}
	$result = get_rows("select email_id, user_name from user_data");
	foreach ($result as $row) 
	{
   	if($row['email_id'] == $email_id || $row['user_name'] == $user_name)
   	{
   		$_SESSION['errors']['dublicate_user'] = "User Already Exists";
   		break;
   	}
  }
	if (count($_SESSION['errors']) == 0)
	{
		$salt = "abs$rg$@^$29f146546fd&(!)!#@";
		$password = md5(sha1(md5($_POST['password'] . $salt)));
		//$role = '2';
		$result1 = execute_query("insert into user_data(user_role, first_name, last_name, email_id, user_name, password, address_line1, address_line2, city, zipcode, state, country) values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)", array(2, $first_name, $last_name, $email_id, $user_name, $password, $address_line1, $address_line2, $city, $zipcode, $state, $country));
		$result = get_rows("select id from user_data where email_id = ?", array($email_id));
		
		$row = array();
    foreach ($result as $value) {
      $data = $value;
    }
    $_SESSION['user'] = $data['id'];
    $_SESSION['fname'] = $first_name;
		//$_SESSION['user'] = $user_name;
		//$_SESSION['user_email'] = $email_id;
		header('Location:../myprofile.php');
	}
	else
	{
		//$_SESSION['data'] = $_POST;	
		header('location: ../register.php');
	}
?>	
