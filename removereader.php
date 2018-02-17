<!DOCTYPE html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Remove a reader</title>
    <link rel="stylesheet" type="text/css" href="mystyle.css" />
</head>
<body>
  <h2>Remove a reader</h2>
<?php
/**
 * Created by IntelliJ IDEA.
 * User: wuyufeng
 * Date: 20/01/2018
 * Time: 9:29 PM
 */
  require_once ('authorize.php');
  require_once ('appvars.php');
  require_once ('connectvars.php');
  if (isset($_GET['id']) && isset($_GET['first_name']) && isset($_GET['last_name']) && isset($_GET['photo'])) {
      // Grab the data from the GET
      $id = $_GET['id'];
      $first_name = $_GET['first_namename'];
      $last_name = $_GET['last_name'];
      $photo = $_GET['photo'];
  }
  else if (isset($_POST['id']) && isset($_POST['first_name']) && isset($_POST['last_name'])) {
      // Grab the data from the POST
      $id = $_POST['id'];
      $first_name = $_POST['first_namename'];
      $last_name = $_POST['last_name'];
  }
  else {
      echo '<p>Sorry, no reader was specified for removal.</p>';
  }

  if (isset($_POST['submit'])) {
      if ($_POST['confirm'] == 'Yes') {
          // Delete the photo image file from the server
          @unlink(PH_UPLOADPATH . $photo);

          // Connect to the database
          $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

          // Delete the data from the database
          $query = "DELETE FROM email_list WHERE id = $id LIMIT 1";

          mysqli_query($dbc, $query);
          mysqli_close($dbc);

          // Confirm success with the user
          echo '<p>The file of ' . $first_name . $last_name . ' was successfully removed.';
      }
      else {
          echo '<p>The file was not removed.</p>';
      }
  }

  else if (isset($id) && isset($first_name) && isset($last_name) && isset($photo)) {
      echo '<p>Are you sure you want to delete the following reader?</p>';
      echo '<p><strong>Name:</strong>' . $first_name . $last_name . '<br /><strong>Photo:</strong>' . $photo;
      echo '<form method="post" action="removereader.php">';
      echo '<input type="radio" name="confirm" value="Yes" /> Yes';
      echo '<input type="radio" name="confirm" value="No" checked="checked"/> No <br />';
      echo '<input type="submit" value="Submit" name="submit" />';

      echo '<input type="hidden" name="id" value="' . $id . '" />';

      echo '<input type="hidden" name="name" value="' . $first_name . $last_name . '" />';
      echo '<input type="hidden" name="photo" value="' . $photo . '" />';
      echo '</form>';
}
  echo '<p><a href="admin.php">&lt;&lt;Back to main page</a></p>';
?>

</body>
</html>