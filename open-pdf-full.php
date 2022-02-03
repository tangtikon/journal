<html>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link rel="icon" href="img/icon.png" type="image/icon">
<header></header>
<style>
    body {
        margin: 0;
    }
</style>

<body>
    <?php
    include("connect.php");
    // Store the file name into variable
    $file =  $_POST["openfile_full"];
    $filename = $_POST["openfile_full"];
    $title = $_POST["open_title_full"];

    ?>
    <title><?php echo $title; ?></title>
    <iframe height="100%" width="100%" frameBorder="0" scrolling="0" src="http://localhost/journal-manage/files_pdf/<?php echo $file; ?>"></iframe>
    <?php


    if (!empty($_POST['txt_ip'])) {
        $id_arti = $conn->escape_string($_POST["id_arti"]);
        $txt_ip = $conn->escape_string($_POST['txt_ip']);

        $query = $conn->query("INSERT INTO count_open_full (ip,id_article) VALUES ('$txt_ip','$id_arti')");


        exit();
    }
    ?>
</body>

</html>