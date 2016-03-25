<?php
  include('config/init.php');
	include($siteConfig['include_dir'].'session.php');
	if (isset($_SESSION['user']))
  {   
    unset($_SESSION['user']); 
    unset($_SESSION['fname']);
    header('location:' . $siteConfig['site_url'] . 'index.php');
  }
  if (isset($_SESSION['admin']))
  {   
    unset($_SESSION['admin']);
    unset($_SESSION['fname']);
    header('location:' . $siteConfig['site_url'] . 'index.php');
  }
  else
  {
    header('location:' . $siteConfig['site_url'] . 'index.php');
  }
?>