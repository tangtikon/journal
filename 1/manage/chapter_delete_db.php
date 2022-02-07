<?php
include("connect.php") ;
include('check.php');
if(!empty($_GET['id']))
{
  $id = $_GET['id'];
  $id_article = $_GET['id_article'];
  $sql = "delete from chapter where id='" . $id . "' ";
  echo  "id_article=",$id_article;
  echo  "id=",$id;
  $rs = $conn->query($sql);
  if($rs)
  {
    echo '<script> alert("Data Deleted"); </script>';
    header("Location: chapter.php?id_article=$id_article"); 
    echo $id_article;
    
  }
  else {
    echo '<script> alert("Data Not Deleted"); </script>';
   header("Location: chapter.php?id_article=$id_article"); 
	echo $id_article;
  }
}
else{
    echo '<script> alert("Data Not Deleted "); </script>';
    header("Location: chapter.php?id_article=$id_article"); 
}
