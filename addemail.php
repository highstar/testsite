<?php
/**
 * Created by IntelliJ IDEA.
 * User: wuyufeng
 * Date: 08/12/2017
 * Time: 10:39 PM
 */

  require_once ('appvars.php');
  require_once ('connectvars.php');

  if (isset($_POST['submit'])) {
    // Grab the reader data from the POST
      $fist_name = trim($_POST['first_name']);
      $last_name = $_POST['last_name'];
      $email = $_POST['email'];
      $photo = $_FILES['photo']['name'];
      $photo_type = $_FILES['photo']['type'];
      $photo_size = $_FILES['photo']['size'];

      if (!empty($fist_name) && !empty($last_name) && !empty($photo)) {
          if ((($photo_type == 'image/gif') || ($photo_type == 'image/jpeg') || ($photo_type == 'image/png')) && ($photo_size > 0) && ($photo_size <= PH_MAXFILESIZE)) {
              if ($_FILES['file']['error'] == 0) {
                  // Move the fiel to the target upload folder
                  $target = PH_UPLOADPATH . time() . $photo;
                  if (move_uploaded_file($_FILES['photo']['tmp_name'], $target)) {
                      // Connect to the database
                      $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

                      // Write the data to the database
                      $query = "INSERT INTO email_list VALUES ('$firstname', '$lastname', '$email', '$photo', 0)";
                      mysqli_query($dbc, $query)
                      or die('Error quering database.');

                      // Confirm success with the reader
                      echo '<p>Thanks for your joining!</p>';
                      echo '<p><strong>Firstname:</strong>' . $fist_name . '<br />';
                      echo '<strong>Lastname:</strong>' . $last_name . '<br />';
                      echo '<strong>Email:</strong>' . $email . '<br />';
                      echo '<img src="' . PH_UPLOADPATH . $PHOTO . '" alt="Reader image" /></p>';
                      echo '<p><a href="index.php">&lt;&lt;Back to main page.</a></p>';

                      mysqli_close($dbc);
                  }
                  else {
                      echo '<p>Sorry, there was a problem uploading your photo image.</p>';
                  }
              }
          }
          else {
            echo '<p>The photo must be a GIF, JPEG, or PNG image file no greater than ' . (PH_MAXFILESIZE / 1024) . ' KB in size.</p>';
          }
          // Try to delete the temporary photo image file
          @unlink($_FILES['photo']['tmp_name']);
      }
      else {
          echo '<p>Please enter all of the information to add your information.</p>';
      }
  }
    ?>