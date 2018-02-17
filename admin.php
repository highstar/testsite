<?php
require_once ('authorize.php');
require_once('appvars.php');
require_once("connectvars.php");

// Connect to the database
$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

// Retrieve the reader data from MySQL
$query = "SELECT * FROM email_list ORDER BY first_name ASC";
$data = mysqli_query($dbc, $query);

// Loop through the array of reader data, formatting it as HTML

echo '<table>';
echo '<tr><th>Firstname</th><th>Lastname</th><th>Action</th></tr>';

while ($row = mysqli_fetch_array($data)) {

    // Display the reader data
    echo '<tr><td><strong>' . $row['last_name'] .  $row['first_name'] . '</strong></td>';
    echo '<td><a href="removereader.php?id=' . $row['id'] . '&amp;firstname=' . $row['first_name'] .
        '&amp;lastname=' . $row['last_name'] . '&amp;photo=' . '">Remove</a>';
    if ($row['approved']=='0') {
        echo '/ <a href="approvereader.php?id=' . $row['id'] . '&amp;firstname=' . $row['first_name'] . '&amp;lastname=' . $row['last_name'] . '">Approve</a>';
    }
    echo '</td></tr>';
}

echo '</table>';

mysqli_close($dbc);

?>