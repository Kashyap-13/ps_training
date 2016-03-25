<?php
  include('config/init.php');
  include($siteConfig['include_dir'] . 'session.php');
  include($siteConfig['config_dir'] . 'user_access.php');
 
  if(isset($_SESSION['success']))
  {
    $success_message1 = $_SESSION['success'];
    unset($_SESSION['success']);
  }
  include($siteConfig['include_dir'] . 'header.php');
  // if(!isset($_SESSION['admin']))
  // {
  //    header('location:index.php');
  // }
?>
  <body>
    <?php include($siteConfig['include_dir'] . 'menu.php'); ?>
    <!-- Start of container -->
    <div class="container-fluid">
      <h2>User Details</h2> 
      <span class="text-center text-success"><?php if(isset($success_message1)){echo $success_message1;} ?></span>
        <table class="table table-bordered table-font">
          <thead>
            <tr>
              <th>Firstname</th>
              <th>Lastname</th>
              <th>Email id</th>
              <th>Username</th>
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
              $result = get_row("select count(*) as total_records from user_data where user_role != 1");
             
              $total_records = $result['total_records'];
              $total_pages = ceil($total_records / PAGE_COUNT);
              $current_page = (isset($_GET['page']) && $_GET['page'] > 0) ? $_GET['page']: 1;
             
              $result = get_rows("select id, first_name, last_name, email_id, user_name, address_line1, address_line2, city, zipcode, state, country from user_data where user_role != 1 order by id limit " . (($current_page-1) * PAGE_COUNT) . "," . PAGE_COUNT);  
                
              foreach($result as $rows) 
              {
            ?>
                <tr>
                  <td> <?php echo $rows['first_name']; ?> </td>
                  <td> <?php echo $rows['last_name']; ?> </td>
                  <td> <?php echo $rows['email_id']; ?> </td>
                  <td> <?php echo $rows['user_name']; ?> </td>
                  <td> <?php echo $rows['address_line1']; ?> </td>
                  <td> <?php echo $rows['address_line2']; ?> </td>
                  <td> <?php echo $rows['city']; ?> </td>
                  <td> <?php echo $rows['zipcode']; ?> </td>
                  <td> <?php echo $rows['state']; ?></td>
                  <td> <?php echo $rows['country']; ?></td>
                  <td><a href='<?php echo $siteConfig['site_url'];?>user_edit.php?id= <?php echo $rows['id']; ?>'>  Edit </a></td> 
                  <td><a href='<?php echo $siteConfig['site_url'] . $siteConfig['controller_dir']; ?>admin_control.php?id= <?php echo $rows['id']; ?>' onClick='return comfirm_delete();'>Delete</a></td>
                </tr>
            <?php
              }
            ?>
          </tbody>
        </table>
        <?php
        if ($total_pages > 1)
        {
        ?>  
        <div class="center">
          <ul class = "pagination">
            <?php
              if($current_page > 1)
              {
                $pre_page = $current_page-1;
            ?>
              <li class = "previous"><a href = '<?php echo $siteConfig['site_url'];?>manage_user.php?page=<?php echo $pre_page; ?>'>&larr; Previous</a></li>
            <?php
              }
              
              for($i=1; $i<=$total_pages; $i++)
              {
            ?>
                <li <?= (($current_page == $i) ? 'class="active"': '') ?> ><a href='<?php echo $siteConfig['site_url'];?>manage_user.php?page=<?php echo $i?>'><?php echo $i;?></a></li>
            <?php
              }
              if($total_pages > $current_page)
              {
                $next_page = $current_page+1;
            ?>
            <li class = "next"><a href = '<?php echo $siteConfig['site_url'];?>manage_user.php?page=<?php echo $next_page; ?>'>Next &rarr;</a></li>
            <?php
              }            
            ?>
          </ul>
        </div>
        <?php
        }
        ?>
    </div>
    <!-- End of container -->
  </body>
</html>
