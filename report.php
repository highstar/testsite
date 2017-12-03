<html>

<head>
  <title>Report from readers</title>
</head>

<body>

  <h2>Report from readers</h2>

  <?php
    $name = $_POST['name'];
    $email = $_POST['email'];
    $description = $_POST['description'];
    $msg = "$name emails you,and says:$description.\n";
    $to = "stellargao@yahoo.com";
    $subject = "Reader's message";
    mail($to, $subject, $msg, 'From:' . $email);

    echo '感谢提供留言。<br />';
    echo '你的邮箱地址是'.$email.'.<br />';
    echo '你的描述是：'.$description;
  ?>

</body>

</html>
