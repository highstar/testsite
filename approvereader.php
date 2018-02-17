<?php
/**
 * Created by IntelliJ IDEA.
 * User: wuyufeng
 * Date: 14/02/2018
 * Time: 10:27 AM
 */
  require_once('authorize.php');
  require_once('appvars.php');
  require_once('connectvars.php');

  if (isset($_POST['submit'])) {
      if ($_POST['confirm'] == 'Yes') {
          // Connect to the database
          $dhc = mysqli_query(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

          // Approve the reader by setting the approved column in the database
          $query = "UPDATE item_list SET approved = 1 WHERE id ='$id'";
          mysqli_query($dbc, $query);
          mysqli_close($dbc);

          // Cofirm success with the user
          echo '<p>The reader ' . $first_name . $last_name . ' was successfully approved.';
      }
      else {
          echo '<p class = "error">Sorry, there was a problem approving the high score.</p>';
      }
  }
  echo '<p><a href="admin.php">&lt;&lt; Back to admin page</a></p>';
?>