<?php
  include('includes/session.php');
  include('includes/header.php');
  if(!isset($_SESSION['admin']))
  {
     header('location:login.php');
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <title>User Profile</title>
    <script src="js/user.js"></script>
  </head>
  <body>
    <?php include('includes/menu.php'); ?>
    <!-- Start of container -->
    <div class="container-fluid">
      <h2>User Details</h2>  
        <table class="table table-bordered table-font">
          <thead>
            <tr>
              <th>Firstname</th>
              <th>Lastname</th>
              <th>Email id</th>
              <th>Username</th>
              <th>Password</th>
              <th>Address</th>
              <th>Address</th>
              <th>City</th>
              <th>Zipcode</th>
              <th>State</th>
              <th>Country</th>
              <th colspan="2">Operation</th>
            </tr>
          </thead>
          <tbody>
            <?php
              $result = get_rows("select id, first_name, last_name, email_id, user_name, password, address_line1, address_line2, city, zipcode, state, country from user_data");
              foreach($result as $rows) 
              {
                echo "<tr>";
                echo "<td>" . $rows['first_name'] . "</td>";
                echo "<td>" . $rows['last_name'] . "</td>";
                echo "<td>" . $rows['email_id'] . "</td>";
                echo "<td>" . $rows['user_name'] . "</td>";
                echo "<td>" . $rows['password'] . "</td>";
                echo "<td>" . $rows['address_line1'] . "</td>";
                echo "<td>" . $rows['address_line2'] . "</td>";
                echo "<td>" . $rows['city'] . "</td>";
                echo "<td>" . $rows['zipcode'] . "</td>";
                echo "<td>" . $rows['state'] . "</td>";
                echo "<td>" . $rows['country'] . "</td>";
                echo "<td><a href='user_edit.php?id=" . $rows['id'] . "'>". "Edit" . "</a></td>";
                echo "<td><a href='controllers/admin_control.php?id=" . $rows['id'] . "' onClick='return comfirm_delete();''>" . "Delete" . "</a></td>";
                echo "</tr>";
              }
            ?>
          </tbody>
        </table>
    </div>
    <!-- End of container -->
  </body>
</html>
