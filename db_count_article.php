<?php

if (!empty($_POST['txt_ip'])) {
    $id_article = $_POST["id"];
    $txt_ip = $conn->escape_string($_POST['txt_ip']);
    
    $query = $conn->query("INSERT INTO count_article (ip,id_for) VALUES ('$txt_ip','$id_article')");
}
?>