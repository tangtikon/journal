<?php
include("connect.php") ;
include('check.php');
if(!empty($_GET['id_arti']))
{
  $id = $_GET['id_arti'];
  echo $id;
  $sql = "delete from article where id_arti='" . $id . "' ";
  echo  $sql;
  $rs = $conn->query($sql);
  if($rs)
  {
    echo '<script> alert("Data Deleted"); </script>';
    header("Location:article");
    
  }
  else {
    echo '<script> alert("Data Not Deleted"); </script>';
    header("Location:article");
  }
}
else{
    echo '<script> alert("Data Not Deleted "); </script>';
    header("Location:article");
}
