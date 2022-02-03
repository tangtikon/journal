<?php
include("connect.php") ;
date_default_timezone_set("Asia/Bangkok");
//echo date_default_timezone_get();

if(isset($_POST['submit'])!=""){

  $name_surname = $conn->escape_string($_POST['txt_name_surname']);
  $rank = $conn->escape_string($_POST['txt_rank']); 
  $workplace = $conn->escape_string($_POST['txt_workplace']);
  $role_main = $conn->escape_string($_POST['txt_rolemain']);
  $role_sec = $conn->escape_string($_POST['txt_rolesec']);
  
  $file_name=$_FILES['txt_file']['name'];
  $temp=$_FILES['txt_file']['tmp_name'];
  $date = date('Y-m-d H:i:s');

  $date = date_create();
  $file_name =strval(date_timestamp_get($date))."photo".substr("$file_name", -4);

  

  move_uploaded_file($temp,"file_editorial/".$file_name);

    $query=$conn->query("INSERT INTO editorial (name_surname,rank,workplace,role_main,role_sec,photo) VALUES ('$name_surname','$rank','$workplace','$role_main','$role_sec','$file_name')");
    if($query){
      
      header("Location: editorial"); 
    }
    else{
      die(mysqli_error($conn));
    }
    exit();
}
