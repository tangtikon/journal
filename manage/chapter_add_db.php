<?php
include("connect.php") ;
date_default_timezone_set("Asia/Bangkok");
//echo date_default_timezone_get();

if(isset($_POST['submit'])!=""){

  $txt_type = $conn->escape_string($_POST['txt_type']);
  $title = $conn->escape_string($_POST['txt_title']);
  $author = $conn->escape_string($_POST['txt_author']);
  $workplace = $conn->escape_string($_POST['txt_workplace']);
  $keyword = $conn->escape_string($_POST['txt_keyword']);
  $abstract = $conn->escape_string($_POST['txt_abstract']);
  $refer = $conn->escape_string($_POST['txt_refer']);
  $page = $conn->escape_string($_POST['txt_page']);
  $id_article = $conn->escape_string($_POST['id_article']);

  $file_pdf=$_FILES['file_pdf']['name'];
  $temp=$_FILES['file_pdf']['tmp_name'];
  $date = date('Y-m-d H:i:s');

  $date = date_create();
  $file_pdf =strval(date_timestamp_get($date))."-file".substr("$file_pdf", -4);

  

  move_uploaded_file($temp,"files_pdf_chapter/".$file_pdf);

    $query=$conn->query("INSERT INTO chapter (type,title,author,workplace,keyword,abstract,refer,page,file_name,id_article)
     VALUES ('$txt_type','$title','$author','$workplace','$keyword','$abstract','$refer','$page','$file_pdf','$id_article')");
    if($query){
      
      header("Location: chapter?id_article=$id_article"); 
    }
    else{
      die(mysqli_error($conn));
    }
    exit();
}
?>
