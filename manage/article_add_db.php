<?php
include("connect.php");
date_default_timezone_set("Asia/Bangkok");
//echo date_default_timezone_get();

if (isset($_POST['submit']) != "") {
  $title_year = $conn->escape_string($_POST['txt_title_year']);
  $title_issue = $conn->escape_string($_POST['txt_title_issue']);
  $mon_start = $conn->escape_string($_POST['txt_mon_start']);
  $mon_end = $conn->escape_string($_POST['txt_mon_end']);
  $year = $conn->escape_string($_POST['txt_year']);
  $date_publish = $conn->escape_string($_POST['txt_date_publish']);

  $date = date('Y-m-d H:i:s');
  $date = date_create();

  //file pdf
  $file_pdf = $_FILES['file_pdf']['name'];
  $temp = $_FILES['file_pdf']['tmp_name'];

  $file_pdf = strval(date_timestamp_get($date)) . "-full" . substr("$file_pdf", -4);
  move_uploaded_file($temp, "files_pdf/" . $file_pdf);

  //file photo
  $file_photo = $_FILES['file_image']['name'];
  $temp = $_FILES['file_image']['tmp_name'];

  $file_photo = strval(date_timestamp_get($date)) . "-photo" . substr("$file_photo", -4);
  move_uploaded_file($temp, "files_image/" . $file_photo);



  $query = $conn->query("INSERT INTO article (title_year,title_issue,mon_start,mon_end,year,file_image,pdf_full_file)
   VALUES ('$title_year','$title_issue','$mon_start','$mon_end','$year','$file_photo','$file_pdf')");
  echo $query;
  if ($query) {
    header("Location: article");
  } else {
    die(mysqli_error($conn));
  }
  exit();
}
