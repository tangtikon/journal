<?php
include("connect.php");
date_default_timezone_set("Asia/Bangkok");
//echo date_default_timezone_get();

if (isset($_POST['submit']) != "") {
    $username = $conn->escape_string($_POST['txt_username']);
    $password = $conn->escape_string($_POST['txt_password']);
    $name = $conn->escape_string($_POST['txt_name']);
    $surname = $conn->escape_string($_POST['txt_surname']);

    $rs = $conn->query("select * from member where username ='$username' ");
    while ($row = $rs->fetch_array()) {
    $check =  $row['username'];
    }
    
    if ($check > 0) /* ตรวจสอบว่า Id นี้มีอยู่หรือยัง */ {
        header("Location: user_add_fail");
        echo "ซ้ำ";
        exit();
    } else {
        $query = $conn->query("INSERT INTO member (username,password,name,surname,level) VALUES ('$username','$password','$name','$surname','u')");
        if ($query) {
            header("Location: page-user");
            echo "ไม่ซ้ำ";
        } else {
            die(mysqli_error($conn));
        }
        exit();
    }
}
