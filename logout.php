<?php
session_start();
unset($_SESSION['id']);
unset($_SESSION['user_name']);
unset($_SESSION['user_type']);
unset($_SESSION['pic']);
 
session_destroy();

// setcookie("user", "", time() -(3600 * 24));
// setcookie("id", "", time() -(3600 * 24));
header('Location: login.php');
?>