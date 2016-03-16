<?php
	include('includes/session.php');
	if (isset($_SESSION['user']))
  {   
    unset($_SESSION['user']); 
    unset($_SESSION['fname']);
    header('location:login.php');
  }
  if (isset($_SESSION['admin']))
  {   
    unset($_SESSION['admin']);
    unset($_SESSION['fname']);
    header('location:login.php');
  }
  else
  {
    header('location:login.php');
  }
?>