<?php
/**
 * Created by IntelliJ IDEA.
 * User: wuyufeng
 * Date: 22/12/2017
 * Time: 10:11 PM
 */
  if (isset($_POST['submit'])) {
      $from = 'stellargao@yahoo.com';
      $subject = $_POST['subject'];
      $text = $_POST['admin_mail'];
      $output_form = false;

      if (empty($subject) && empty($text)) {
          echo 'You forgot the email subject and body text.<br />';
          $output_form = true;
      }

      if (empty($subject) && (!empty($text))) {
          echo 'You forgot the email subject.<br />';
          $output_form = true;
      }

      if ((!empty($subject)) && empty($text)) {
          echo 'You forgot the body text.<br />';
          $output_form = true;
      }

      if (!empty($subject) && (!empty($text))) {
          $dbc = mysqli_connect('localhost', 'root', 'stellargao', 'item_store')
          or die('Error connecting to MySQL server.');

          $query = "SELECT * FROM email_list";
          $result = mysqli_query($dbc, $query)
          or die('Error querying database.');

          while ($row = mmysqli_fetch_array($result)) {
              $first_name = $row['first_name'];
              $last_name = $row['last_name'];

              $msg = "Dear $first_name $last_name,\n $text";

              $to = $row['email'];

              mail($to, $subject, $msg, 'From:' . $from);
              echo 'Email sent to: ' . $to . '<br/>';
          }
          mysqli_close($dbc);
      }
  }
  else {
      $output_form = true;
  }

   if ($output_form) {
?>
       <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
           <label for="subject">Subject of email：</label><br/>
           <input type="text" id="subject" name="subject" size="30" value="<?php echo $subject; ?>"/><br/>
           <label for="admin_mail">Body of email：</label><br/>
           <textarea id="admin_mail" name="admin_mail" rows="8" cols="40"><?php echo $text; ?></textarea><br/>
           <input type="submit" value=" 通知网友" name="submit"/>
       </form>
<?php
  }
?>

