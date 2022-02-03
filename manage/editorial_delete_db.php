<?php
include("connect.php") ;

if(!empty($_GET['id']))
{
  $id = $_GET['id'];
  echo $id;
  $sql = "delete from editorial where id='" . $id . "' ";
  $rs = $conn->query($sql);
  if($rs)
  {
    echo '<script> alert("Data Deleted"); </script>';
    header("Location:editorial");
  }
  else {
    echo '<script> alert("Data Not Deleted"); </script>';
  }
}
else{
    echo '<script> alert("Data Not Deleted"); </script>';
}
  ?>
