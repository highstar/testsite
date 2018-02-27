<?php
/**
 * Created by IntelliJ IDEA.
 * User: wuyufeng
 * Date: 08/12/2017
 * Time: 10:39 PM
 */

  require_once ('appvars.php');
  require_once ('connectvars.php');

  // Connect to the database
  $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

  if (isset($_POST['submit'])) {
    // Grab the profile data from the POST
      $username = mysqli_real_escape_string($dbc, trim($_POST['username']));
      $password1 =  mysqli_real_escape_string($dbc, trim($_POST['password1']));
      $password2 =  mysqli_real_escape_string($dbc, trim($_POST['password2']));
      $photo =  mysqli_real_escape_string($dbc, trim($_FILES['photo']['name']));
      $photo_type =  mysqli_real_escape_string($dbc, trim($_FILES['photo']['type']));
      $photo_size =  mysqli_real_escape_string($dbc, trim($_FILES['photo']['size']));

      if (!empty($username) && !empty($password1) && !empty($password2) && ($password1 == $password2) && !empty($photo)) {
          // Make sure someone isn't already registered using this username

          $query = "SELECT * FROM user_list WHERE username = '$username'";

          $data = mysqli_query($dbc, $query);

          if (mysqli_num_rows($data) == 0) {

              if ((($photo_type == 'image/gif') || ($photo_type == 'image/jpeg') || ($photo_type == 'image/png')) && ($photo_size > 0) && ($photo_size <= PH_MAXFILESIZE)) {
                  if ($_FILES['file']['error'] == 0) {
                      // Move the file to the target upload folder
                      $target = PH_UPLOADPATH . time() . $photo;

                      if (move_uploaded_file($_FILES['photo']['tmp_name'], $target)) {

                          // The username is unique, and the photo is right, so insert the data into the database
                          $query = "INSERT INTO user_list (username, password1, join_date, photo) VALUES ('$username', SHA('$password1'), NOW(), '$photo')";

                          mysqli_query($dbc, $query)
                          or die('Error quering database.');

                          // Confirm success with the user
                          echo '<p>Thanks for your joining!Your new account has been successfully created. You\'re now ready to log in and ' .
                              '<a href="editprofile.php">edit your profile</a>.</p>';
                          echo '<p><a href="index.php">&lt;&lt;Back to main page.</a></p>';

                          mysqli_close($dbc);
                          exit();
                      } else {
                          echo '<p>Sorry, there was a problem uploading your photo image.</p>';
                      }
                  }
              } else {
                  echo '<p>The photo must be a GIF, JPEG, or PNG image file no greater than ' . (PH_MAXFILESIZE / 1024) . ' KB in size.</p>';
              }
              // Try to delete the temporary photo image file
              @unlink($_FILES['photo']['tmp_name']);
          } else {
              // An account already exists for this username, so display an error message
              echo '<p class="error">An account already exists for this username. Please use a different address.</p>';
              $username = "";
          }
      }
          else {
              echo '<p>Please enter all of the sign-up data.</p>';
          }
          }

          mysqli_close($dbc);
    ?>

<p>Please enter your username and desired password to sign up to my site.</p>
<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
    <fieldset>
        <legend>Registration Info</legend>
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" value="<?php if (!empty($username)) echo $username; ?>" /><br />
        <label for="password1">Password:</label>
        <input type="password" id="password1" name="password1" /><br />
        <label for="password2">Password(retype):</label>
        <input type="password" id="password2" name="password2" /><br />
        <label for="photo">Photo:</label>
        <input type="file" id="photo" name="photo" /><br />
    </fieldset>
    <input type="submit" value="Sigh up" name="submit"/>
</form>
