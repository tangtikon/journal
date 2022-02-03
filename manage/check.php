<?php
session_start();
if($_SESSION['logStatus'] != 1){
  header("location:page-login");
  exit();
}
 ?>
