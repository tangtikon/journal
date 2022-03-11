<?php

if (!empty($_POST['txt_ip'])) {
    $id_article = $_GET["issue"];
    $txt_ip = $conn->escape_string($_POST['txt_ip']);
    
    date_default_timezone_set('Asia/Bangkok');
    $time_s = date("Y-m-d H:i:s");
    $query = $conn->query("INSERT INTO count_article (ip,date_view,id_for) VALUES ('$txt_ip','$time_s','$id_article')");
}
?>