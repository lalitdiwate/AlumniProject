<?php
session_start();

if(!isset($_SESSION['uid']) ||!isset($_SESSION['utype'])){
  header('Location: login.php');
}

?>