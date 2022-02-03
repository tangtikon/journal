<?php
include("connect.php");


if (isset($_POST['updatedata']) != "") {
    $id = $_POST['update_id'];
    $name_surname = $conn->escape_string($_POST['txt_name']);
    $rank = $conn->escape_string($_POST['txt_rank']);
    $workplace = $conn->escape_string($_POST['txt_workplace']);
    $role_main = $conn->escape_string($_POST['txt_rolemain']);
    $role_sec = $conn->escape_string($_POST['txt_rolesec']);

    $file_name = $_FILES['txt_file']['name'];
    $temp = $_FILES['txt_file']['tmp_name'];
    $date = date('Y-m-d H:i:s');

    $date = date_create();
    if ($_FILES['txt_file']['name'] == "") {
        $query = $conn->query("UPDATE editorial SET name_surname = '$name_surname' ,rank='$rank' ,workplace='$workplace' ,role_main='$role_main',role_sec='$role_sec'  WHERE id='$id'");
    } else {
        $file_name = strval(date_timestamp_get($date)) . "photo" . substr("$file_name", -4);
        $query = $conn->query("UPDATE editorial SET name_surname = '$name_surname' ,rank='$rank' ,workplace='$workplace' ,role_main='$role_main',role_sec='$role_sec'  ,photo = '$file_name'  WHERE id='$id'");
    }

    move_uploaded_file($temp, "file_editorial/" . $file_name);

    if ($query) {
        echo '<script> alert("Data Updated"); </script>';
        header("Location:editorial.php");
    } else {
        echo "ไม่ถูกแก้ไข ";

        echo '<script> alert("Data Not Updated"); </script>';
    }
}
