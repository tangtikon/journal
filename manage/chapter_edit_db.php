<?php
include("connect.php");
include('check.php');

if (isset($_POST['updatedata']) != "") {
    $id = $_POST['update_id'];
    $txt_type = $conn->escape_string($_POST['txt_type']);
    $txt_title = $conn->escape_string($_POST['txt_title']);
    $txt_author = $conn->escape_string($_POST['txt_author']);
    $txt_workplace = $conn->escape_string($_POST['txt_workplace']);
    $txt_keyword = $conn->escape_string($_POST['txt_keyword']);
    $txt_abstract = $conn->escape_string($_POST['txt_abstract']);
    $txt_refer = $conn->escape_string($_POST['txt_refer']);
    $txt_page = $conn->escape_string($_POST['txt_page']);
    $id_article = $conn->escape_string($_POST['id_article']);

    $date = date('Y-m-d H:i:s');
    $date = date_create();

    //file pdf
    $file_pdf = $_FILES['txt_file']['name'];
    $temp = $_FILES['txt_file']['tmp_name'];


    // echo "txt_abstract", $txt_abstract;

    // echo "ID = ", $id, "txt_title ", $txt_title, "txt_author ", $txt_author, "txt_workplace ", $txt_workplace, "txt_keyword ", $txt_keyword,
    // "txt_abstract ", $txt_abstract, "txt_refer ", $txt_refer, "id_article ", $id_article, "file_pdf ", $file_pdf;

    if (($_FILES['txt_file']['name'] == "")) {
        echo "if file ว่าง <br>";
        if ($txt_abstract == "" && $txt_refer != "" ) {
            echo "txt_abstract == ว่าง <br>";

            $query = $conn->query("UPDATE chapter SET type= '$txt_type', title = '$txt_title' ,author = '$txt_author'
             ,workplace = '$txt_workplace' ,keyword = '$txt_keyword' ,refer = '$txt_refer' ,page = '$txt_page' ,id_article='$id_article' WHERE id='$id'");
        }
        if ($txt_refer == "" && $txt_abstract != "") {
            echo "txt_refer == ว่าง <br>";

            $query = $conn->query("UPDATE chapter SET type= '$txt_type', title = '$txt_title' ,author = '$txt_author'
             ,workplace = '$txt_workplace' ,keyword = '$txt_keyword' ,abstract = '$txt_abstract' ,page = '$txt_page' ,id_article='$id_article' WHERE id='$id'");
        }
        if (($txt_abstract == "") && ($txt_refer == "")) {
            echo "(txt_abstract == )&&(txt_refer ==  ว่าง <br>";

            $query = $conn->query("UPDATE chapter SET type= '$txt_type', title = '$txt_title' ,author = '$txt_author'
             ,workplace = '$txt_workplace' ,keyword = '$txt_keyword' ,page = '$txt_page' ,id_article='$id_article' WHERE id='$id'");
        }
        if (($txt_abstract != "") && ($txt_refer != "")) {
            echo "(txt_abstract != )&&(txt_refer !=  ไม่ว่าง <br>";

            $query = $conn->query("UPDATE chapter SET type= '$txt_type', title = '$txt_title' ,author = '$txt_author'
             ,workplace = '$txt_workplace' ,keyword = '$txt_keyword' ,abstract = '$txt_abstract',refer = '$txt_refer' ,page = '$txt_page' ,id_article='$id_article' WHERE id='$id'");
        }
    } else {
        echo "else file";
        if ($txt_abstract == "" && $txt_refer != "") {
            echo "txt_abstract == ว่าง <br>";
            $file_pdf = strval(date_timestamp_get($date)) . "-full" . substr("$file_pdf", -4);
            $query = $conn->query("UPDATE chapter SET type= '$txt_type', title = '$txt_title' ,author = '$txt_author'
             ,workplace = '$txt_workplace' ,keyword = '$txt_keyword' ,refer = '$txt_refer',file_name = '$file_pdf' ,page = '$txt_page' ,id_article='$id_article' WHERE id='$id'");
        }
        if ($txt_refer == "" && $txt_abstract != "") {
            echo "txt_abstract == ว่าง <br>";
            $file_pdf = strval(date_timestamp_get($date)) . "-full" . substr("$file_pdf", -4);
            $query = $conn->query("UPDATE chapter SET type= '$txt_type', title = '$txt_title' ,author = '$txt_author'
             ,workplace = '$txt_workplace' ,keyword = '$txt_keyword' ,abstract = '$txt_abstract',file_name = '$file_pdf' ,page = '$txt_page' ,id_article='$id_article' WHERE id='$id'");
        }
        if (($txt_abstract == "") && ($txt_refer == "")) {
            echo "(txt_abstract == )&&(txt_refer ==  ว่าง <br>";
            $file_pdf = strval(date_timestamp_get($date)) . "-full" . substr("$file_pdf", -4);
            $query = $conn->query("UPDATE chapter SET type= '$txt_type', title = '$txt_title' ,author = '$txt_author'
             ,workplace = '$txt_workplace' ,keyword = '$txt_keyword',file_name = '$file_pdf' ,page = '$txt_page' ,id_article='$id_article' WHERE id='$id'");
        }
        if (($txt_abstract != "") && ($txt_refer != "")) {
            echo "(txt_abstract != )&&(txt_refer !=)  ไม่ว่าง <br>";
            $file_pdf = strval(date_timestamp_get($date)) . "-full" . substr("$file_pdf", -4);
            $query = $conn->query("UPDATE chapter SET type= '$txt_type', title = '$txt_title' ,author = '$txt_author'
             ,workplace = '$txt_workplace' ,keyword = '$txt_keyword' ,abstract = '$txt_abstract',refer = '$txt_refer',file_name = '$file_pdf' ,page = '$txt_page' ,id_article='$id_article' WHERE id='$id'");
        }
        
    }


    move_uploaded_file($temp, "files_pdf_chapter/" . $file_pdf);

    if ($query) {
        echo '<script> alert("Data Updated"); </script>';
        header("Location: chapter?id_article=$id_article"); 
    } else {
        echo "ไม่ถูกแก้ไข ";

        echo '<script> alert("Data Not Updated"); </script>';
    }
}
