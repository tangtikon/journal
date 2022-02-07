<?php
include("connect.php");
date_default_timezone_set("Asia/Bangkok");
//echo date_default_timezone_get();

if (isset($_POST['updatedata']) != "") {
    $id = $_POST['update_id'];
    $username = $conn->escape_string($_POST['txt_username']);
    $password = $conn->escape_string($_POST['txt_password']);
    $name = $conn->escape_string($_POST['txt_name']);
    $surname = $conn->escape_string($_POST['txt_surname']);


    $query = $conn->query("UPDATE member SET username = '$username' ,password = '$password'
    ,name = '$name' ,surname = '$surname',level = 'a'  WHERE id='$id'");
    echo $query;
    if ($query) {
        header("Location: page-admin.php");
    } else {
        die(mysqli_error($conn));
    }
    exit();

    
}
