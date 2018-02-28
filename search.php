<?php
/**
 * Created by IntelliJ IDEA.
 * User: wuyufeng
 * Date: 28/02/2018
 * Time: 8:48 PM
 */
$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);



$search_query = "SELECT * FROM articals";
$where_clause = '';
$user_search = $_GET['usersearch'];
$search_words = explode(' ', $user_search);
$search_words = explode(' ', $user_search);

foreach ($search_words as $word) {
    $where_clause .= " description LIKE '%$word%' OR ";
}

if (!empty($where_clause)) {
    $search_query .= " WHERE $where_clause";
}
?>
