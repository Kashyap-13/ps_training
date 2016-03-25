<?php
  include($siteConfig['include_dir'].'session.php');
  if (isset($_SESSION['user']))
  {   
    $user = $_SESSION['user'];
    $fname = $_SESSION['fname'];
  }
?>
	<nav class="navbar navbar-inverse">
  	<div class="container-fluid">
  		<ul class="nav navbar-nav">
    		<li><a href="#"><span class="glyphicon glyphicon-home"></span> Home</a></li>
        <?php
          if(isset($_SESSION['admin']))
          {
        ?>
          <li><a href="<?php echo $siteConfig['site_url']; ?>manage_user.php"><span class="glyphicon glyphicon-cog"></span> Manage user</a></li> 
        <?php
          }
        ?>
  		</ul>
   		<ul class="nav navbar-nav navbar-right">
    		<li class="active"><a href="#"><span class="glyphicon glyphicon-user"></span> 
        <?php
          if(isset($_SESSION['admin']))
          {
            echo  $_SESSION['fname'];
          }
          else if(isset($_SESSION['user'])) 
          {
            echo $fname;
          }
        ?>
        </a></li>
    		<li><a href="<?php echo $siteConfig['site_url']; ?>logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
  		</ul>
  	</div>
	</nav>