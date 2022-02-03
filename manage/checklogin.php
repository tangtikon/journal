<?php
include("connect.php");

$username = ($conn->escape_string($_POST['txt_username']));
$password = ($conn->escape_string($_POST['txt_password']));
if (!empty($username) && !empty($password)) {
  $sql = "select * from member where username='$username' and password='$password'";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    session_start();
    $_SESSION['logStatus'] = 1;
    while ($row = $result->fetch_assoc()) {
      $_SESSION['name'] = $row["name"];
      $_SESSION['surname'] = $row["surname"];
      $level = $row["level"];
    }
    if ($level == 'a' || $level == 'A') {
      header('location:page-admin');
    }
    if ($level == 'u' || $level == 'U') {
      header('location:article');
    }
  } else {
    include("page-login-fail.php");
  }
} else {
  include("page-login-fail.php");
}
