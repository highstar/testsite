<?php
/**
 * Created by IntelliJ IDEA.
 * User: wuyufeng
 * Date: 23/02/2018
 * Time: 3:04 PM
 */
// Start the session
session_start();

// If the session vars aren't set, try to set them with a cookie
if (!isset($_SESSION['user_id'])) {
    if (isset($_COOKIE['user_id']) && isset($_COOKIE['username'])) {
        $_SESSION['user_id'] = $_COOKIE['user_id'];
        $_SESSION['username'] = $_COOKIE['username'];
    }
}