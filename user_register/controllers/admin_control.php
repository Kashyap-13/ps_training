<?php
	include('../includes/session.php');
	include('../config/database.php');
	if(isset($_SESSION['admin'])
	{
		$id= $_GET['id'];
		$result = execute_query("DELETE FROM user_data where id = ?",array($id));
		header('location: ../manage_user.php');
	}
	else
	{
		header('location:login.php');
	}
?>