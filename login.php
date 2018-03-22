<?php
/**
 * Created by IntelliJ IDEA.
 * User: wuyufeng
 * Date: 19/02/2018
 * Time: 2:00 PM
 */
  require_once ('connectvars.php');

  // Start the session
  session_start();
  // Clear the error message
  $error_msg = "";

  // If the user isn't logged in, try to log them in
  if (!isset($_SESSION['user_id'])) {
      if (isset($_POST['submit'])) {
          // Connect to the database
          $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

          // Grab the user-entered log-in data
          $user_username = mysqli_real_escape_string($dbc, trim($_POST['username']));
          $user_password = mysqli_real_escape_string($dbc, trim($_POST['password']));

          // Check the CAPTCHA pass-phrase for verification
          $user_pass_phrase = sha1($_POST['verify']);
          if ($_SESSION['pass_phrase'] == $user_pass_phrase) {

          }
          else {
              echo '<p class="error">Please enter the verification pass-phrase exactly as shown.</p>';
          }

          if (!empty($user_username) && preg_match('/^\1\d{8}$/', $user_username) && !empty($user_password)) {
              // Look up the username and password in the database
              $query = "SELECT user_id, username FROM user_list WHERE username = '$user_username' AND " .
                  "password = SHA($user_password)";
              $data = mysqli_query($dbc, $query);

              if (mysqli_num_rows($data == 1)) {
                  // The log-in is OK so set the user ID and username session vars (and cookies),
                  // and redirect to the home page
                  $row = mysqli_fetch_array($data);
                  $_SESSION['user_id'] = $row['user_id'];
                  $_SESSION['username'] = $row['username'];

                  setcookie('user_id', $row['user_id'], time() + (60 *60 *24 *30)); // expires in 30 days
                  setcookie('username', $row['username'], time() + (60 *60 *24 *30)); // expires in 30 days
                  $home_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/index.php';
                  header('Location: ' . $home_url);
              }
              else {
                  // The username/password are incorrect so set an error message
                  $error_msg = 'Sorry, you must enter a valid username/phone number and password to log in.' .
                      'If you are\'t a registered member, please <a href="signup.php">sign up</a>.';
              }
              }
              else {
                // The username/password weren't entered so set an error message
                  $error_msg = 'Sorry, you must enter your username and password to log in.';
              }
      }
  }
  // If the cookie is empty, show any error message and the log-in form; otherwise confirm the log-in
  if (empty($_SESSION['user_id'])) {
      echo '<p class="error">' . $error_msg . '</p>';
  }
  else {
      // Confirm the successful log in
      echo('<p class="login">You are logged in as ' . $_SESSION['username'] . ' . </p>');
  }
  ?>
