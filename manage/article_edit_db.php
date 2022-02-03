<?php
include("connect.php");
include('check.php');

if (isset($_POST['updatedata']) != "") {
    $id = $_POST['update_id'];
    $title_year = $conn->escape_string($_POST['txt_title_year']);
    $title_issue = $conn->escape_string($_POST['txt_title_issue']);
    $mon_start = $conn->escape_string($_POST['txt_mon_start']);
    $mon_end = $conn->escape_string($_POST['txt_mon_end']);
    $year = $conn->escape_string($_POST['txt_year']);

    $date = date('Y-m-d H:i:s');
    $date = date_create();
    
    //file pdf
    $file_pdf = $_FILES['file_pdf']['name'];
    $temp1 = $_FILES['file_pdf']['tmp_name'];

    
    
    //file photo
    $file_photo = $_FILES['file_image']['name'];
    $temp2 = $_FILES['file_image']['tmp_name'];


    // echo "ID = ",$id,"title_year ",$title_year,"title_issue ",$title_issue,"mon_start ",$mon_start,"mon_end ",$mon_end,"year ",$year
    // ,"file_pdf ",$file_pdf,"file_photo ",$file_photo;

    if (($_FILES['file_pdf']['name'] != "")) {
        echo "if file_pdf";
        $file_pdf = strval(date_timestamp_get($date)) . "-full" . substr("$file_pdf", -4);
        $query = $conn->query("UPDATE article SET title_year = '$title_year' ,title_issue = '$title_issue'
         ,mon_start = '$mon_start' ,mon_end = '$mon_end',year = '$year' ,pdf_full_file = '$file_pdf'  WHERE id_arti='$id'");
    }
    if (($_FILES['file_image']['name'] != "")){
        $file_photo = strval(date_timestamp_get($date)) . "-photo" . substr("$file_photo", -4);
        echo "if file_image";
        $file_pdf = strval(date_timestamp_get($date)) . "-full" . substr("$file_pdf", -4);
        $query = $conn->query("UPDATE article SET title_year = '$title_year' ,title_issue = '$title_issue'
         ,mon_start = '$mon_start' ,mon_end = '$mon_end',year = '$year' ,file_image = '$file_photo'  WHERE id_arti='$id'");
    }
    if (($_FILES['file_image']['name'] != "")&&($_FILES['file_pdf']['name'] != "")){
        echo "if 3";
        $file_pdf = strval(date_timestamp_get($date)) . "-full" . substr("$file_pdf", -4);
        $file_photo = strval(date_timestamp_get($date)) . "-photo" . substr("$file_photo", -4);
        $query = $conn->query("UPDATE article SET title_year = '$title_year' ,title_issue = '$title_issue'
         ,mon_start = '$mon_start' ,mon_end = '$mon_end',year = '$year'  ,file_image = '$file_photo' ,pdf_full_file = '$file_pdf' WHERE id_arti='$id'");
    }
    if (($_FILES['file_image']['name'] == "")&&($_FILES['file_pdf']['name'] == "")){
        echo "if 4";

        $query = $conn->query("UPDATE article SET title_year = '$title_year' ,title_issue = '$title_issue'
         ,mon_start = '$mon_start' ,mon_end = '$mon_end',year = '$year'  WHERE id_arti='$id'");
    }


    move_uploaded_file($temp1, "files_pdf/" . $file_pdf);
    move_uploaded_file($temp2, "files_image/" . $file_photo);




    

    if ($query) {
        echo '<script> alert("Data Updated"); </script>';
        header("Location:article.php");
    } else {
        echo "ไม่ถูกแก้ไข ";

        echo '<script> alert("Data Not Updated"); </script>';
    }
}
