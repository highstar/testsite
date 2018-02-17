<?php
/**
 * Created by IntelliJ IDEA.
 * User: wuyufeng
 * Date: 12/02/2018
 * Time: 10:37 PM
 */
// User name and password for authentication
$username = 'stellargao';
$password = 'rol';

if (!isset($_SERVER['PHP_AUTH_USER']) || !isset($_SERVER['PHP_AUTH_PW']) || ($_SERVER['PHP_AUTH_USER'] != $username) || ($_SERVER['PHP_AUTH_PW'] != $password)) {
    // The user name/password are incorrect so send the authentication headers
    header('HTTP/1.1 401 Unauthorized');
    header('WWW-Authenticate:Basic realm="reader list"');
    exit('<h2>Reader List</h2>Sorry,you must enter a valid user name and password to access this page.');
}
?>