<?php
  include('includes/session.php');

  if (isset($_SESSION['user']))
  {   
    $user = $_SESSION['user'];
  }
  $error_message = array();
  if (isset($_SESSION['errors']) && count($_SESSION['errors']) > 0)
  {
    foreach ($_SESSION['errors'] as $key => $value) {
      $error_message[$key] = $value;  
    }
    unset($_SESSION['errors']);
  }
  include('includes/header.php');

  $result = get_rows("select first_name, last_name, email_id, user_name, password, address_line1, address_line2, city, zipcode, state, country, profile_picture from user_data where id = ?", array($user));
  $row = array();
  foreach ($result as $value) {
    $row = $value;
  }
?>
<!DOCTYPE html>
<html>
<head>
  <title>User Profile</title>
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
</head>
<body>
  <?php include('includes/menu.php'); ?>
  <!-- Start of container -->
  <div class="container">
    <!-- Start of row -->
    <div class="row">
      <div class="heading-style">
          <h1 class="text-center"><strong>My Profile</strong></h1>
      </div>
      <div class="col-md-6">
      <p>Welcome <?php if (isset($_SESSION['fname'])){ echo $_SESSION['fname'];}?></p>
      <div class="picture-container">
        <img src="<?php echo $row['profile_picture']; ?>" alt="No picture" width="200px" height="200px">
      </div>
      <form method="post" action="controllers/profile_control.php" enctype="multipart/form-data">
        <div class="profile_file">
          <input type="file" class="btn" name="fileToUpload" id="fileToUpload">
          <button type="submit" class="btn btn-primary" name="upload" id="upload">Upload photo</button>
        </div>
        <span><?php if(isset($error_message['file_error'])){ echo $error_message['file_error']; }?></span>
        <span><?php if(isset($error_message['file_size'])){ echo $error_message['file_size']; }?></span>
        <span><?php if(isset($error_message['file_invalid'])){ echo $error_message['file_invalid']; }?></span>
      </form>
      </div>
      <?php
        if (isset($_SESSION['user']))
        {  
      ?>
      <div class="col-md-6 form-style">
        <form method="post" action="controllers/profile_control.php" class="form-horizontal">
          <!-- start of form-group for First Name-->
          <div class="form-group">
            <label for="first_name" class="col-sm-3 control-label">First Name</label>
            <div class="col-sm-6">
              <input type="text" class="form-control" id="first_name" name="first_name" placeholder="First Name" value= <?php echo $row['first_name']?> >
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
              <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Last Name" value= <?php echo $row['last_name']?> >
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
              <input type="email" class="form-control" id="email_id" name="email_id" disabled placeholder="Email" value= <?php echo $row['email_id']?> >
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
              <input type="text" class="form-control" id="user_name" name="user_name" disabled placeholder="User Name" value= <?php echo $row['user_name']?> >
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
              <input type="password" class="form-control" id="password" name="password" placeholder="Password">
            </div>
            <div class="col-sm-3">
              <span><?php if(isset($error_message['password'])){ echo $error_message['password']; }?></span>
            </div>
          </div>
          <!-- end of form-group for Password -->
          <!-- start of form-group for Address Line 1-->
          <div class="form-group">
            <label for="address_line1" class="col-sm-3 control-label">Address Line 1</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" id="address_line1" name="address_line1" placeholder="address line 1" value= <?php echo $row['address_line1']?> >
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
                <input type="text" class="form-control" id="address_line2" name="address_line2" placeholder="address line 2" value= <?php echo $row['address_line2']?> >
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
                <input type="text" class="form-control" id="city" name="city" placeholder="City" value= <?php echo $row['city']?> >
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
                <input type="text" class="form-control" id="zipcode" name="zipcode" placeholder="Zipcode" value= <?php echo $row['zipcode']?> >
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
                <input type="text" class="form-control" id="state" name="state" placeholder="State" value= <?php echo $row['state']?> >
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
              <select class="form-control" id="country" name="country">
                <?php
                  echo '<option ' . ((isset($row['country']) && $row['country'] == "India") ? 'selected="selected"': '') . '">' . "India" . '</option>';
                  echo '<option ' . ((isset($row['country']) && $row['country'] == "Pakistan") ? 'selected="selected"': '') . '">' . "Pakistan" . '</option>';
                  echo '<option ' . ((isset($row['country']) && $row['country'] == "Maldives") ? 'selected="selected"': '') . '">' . "Maldives" . '</option>';
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
            <div class="col-sm-offset-4 col-sm-4">
              <button type="submit" class="btn btn-primary" name="update_user" id="update_user"> Edit </button>
              <!-- <button type="submit" class="btn btn-primary" name="save"> Save </button> -->
            </div>
          </div>
          <!-- end of form-group for Register -->
        </form>
      </div>
      <?php
        }
      ?>
    </div>
    <!-- End of row -->
  </div>  
  <!-- End of container -->
</body>
</html>