<html>

<head>
  <title>Report from readers</title>
</head>

<body>

  <h2>Report from readers</h2>

  <?php
    $fist_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $description = $_POST['description'];
    $reader_like = $_POST['reader_like'];

    $dbc = mysqli_connect('localhost', 'root', 'stellargao', 'messagedatabase')
        or die('Error connecting to MySQL server.');

    $query = "INSERT INTO reader_message (firs_name, last_name, description, email, reader_like)" .
        "VALUES ('$fist_name', '$last_name', '$description', '$email', '$reader_like')";

    $result = mysqli_query($dbc, $query)
        or die('Error quering database.');

    mysqli_close($dbc);

    echo '感谢提供留言。<br />';
    echo '你的邮箱地址是'.$email.'.<br />';
    echo '你的描述是：'.$description;
  ?>

</body>

</html>
