<?php
session_start();

if(empty($_SESSION['username']) || empty($_SESSION['id'])|| empty($_SESSION['user_type'])|| empty($_SESSION['pic']) ){
  header('Location: login.php');
}

?>