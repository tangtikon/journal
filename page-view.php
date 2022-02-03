<?php
include('header.php');
include('connect.php');
include('style_view.php');
?>

<body>
    <?php
    $id_chapter = $_POST["id"];
    $id_article = $_POST["id_article"];

    $query = mysqli_query($conn, "select * from chapter where id = $id_chapter  ") or die(mysqli_error($conn));
    while ($row = mysqli_fetch_array($query)) {
        $id = $row['id'];
        $title = $row['title'];
        $author = $row['author'];
        $workplace = $row['workplace'];
        $keyword = $row['keyword'];
        $abstract = $row['abstract'];
        $refer = $row['refer'];
        $file_name = $row['file_name'];
        $id_article = $row['id_article'];
    ?>
        <title><?php echo $title; ?></title>

    <?php } ?>


    <br><br>
    <div class="container">
        <div class="row">
            <div class="txt_header"><?php echo $title; ?><br></div>
            <div class="col col-lg-7">
                <br><br>
                <div class="txt_head1">ผู้แต่ง</div><br>
                <div class="txt_content"><?php echo $author; ?></div>
                <div class="txt_content"><?php echo $workplace; ?></div><br><br>
                <div class="txt_head1">คำสำคัญ</div><br>
                <div class="txt_content"><?php echo $keyword; ?></div><br><br>
                <div class="txt_head1">บทคัดย่อ</div><br>
                <div class="txt_content"><?php echo  nl2br($abstract); ?></div><br><br>
                <div class="txt_head1">อ้างอิง</div><br>
                <div class="txt_content"><?php echo nl2br($refer); ?></div>
            </div>

            <div class="col col-lg-5">
                <div class="text-center">
                    <?php $query2 = mysqli_query($conn, "select * from article where id_arti=$id_article ") or die(mysqli_error($conn));
                    while ($row = mysqli_fetch_array($query2)) {
                        $img = $row['file_image'];
                        $pdf_file = $row['pdf_full_file'];
                        $date_publish = $row['date_publish'];
                    } ?>
                    <br><br>
                    <img class="img_view" src="http://localhost/journal-manage/files_image/<?php echo $img; ?>" style="width:300px;height:397px;" alt="Card image cap"><br><br>

                    <form class="form-inline my-2 my-lg-0" action="open-pdf" method="POST" id="myForm" target="_blank">
                        <input type="hidden" name="id_ch" value="<?php echo $id ?>">
                        <input type="hidden" name="openfile" value="<?php echo $file_name ?>">
                        <input type="hidden" name="txt_ip" value="<?php echo $_SERVER['REMOTE_ADDR']; ?>">
                        <input type="hidden" name="open_title" value="<?php echo $title ?>">
                        <div class="text-center d-grid gap-2 col-7 mx-auto">
                            <button class="btn btn-download color-text " type="submit">
                                <i class="bi bi-file-pdf-fill" style="font-size:20px;color:white"></i> PDF
                        </div>
                    </form>
                    <br><br>

                    <div class="card text-center" style="max-width: 18rem;">
                        <div class="card-header">
                            <div class="txt_header1">วันที่เผยแพร่</div>
                        </div>
                        <div class="card-body">
                            <div class="txt_content"><?php echo $date_publish; ?></div>
                        </div>
                    </div>
                    <br>
                    <div class="d-flex justify-content-center">
                        <div id="container" style="height:200px;width: 400px;"></div>
                    </div>
                    <br><br>
                </div>

                <div class="card" style="max-width: 22rem;">
                    <div class="card-header">
                        <div class="txt_header1">LICENSE</div>
                    </div>
                    <div class="card-body">
                        <div class="txt_content2">บทความที่ได้รับการตีพิมพ์เป็นลิขสิทธิ์ของสำนักงานสาธารณสุขจังหวัดขอนแก่น กระทรวงสาธารณสุข<br><br>
                            ข้อความที่ปรากฏในบทความแต่ละเรื่องในวารสารวิชาการเล่มนี้เป็นความคิดเห็นส่วนตัวของผู้เขียนแต่ละท่านไม่เกี่ยวข้องกับสำนักงานสาธารณสุขจังหวัดขอนแก่น
                            และบุคลากรท่านอื่นๆในสำนักงานฯ แต่อย่างใด ความรับผิดชอบองค์ประกอบทั้งหมดของบทความแต่ละเรื่องเป็นของผู้เขียนแต่ละท่าน หากมีความผิดพลาดใดๆ
                            ผู้เขียนแต่ละท่านจะรับผิดชอบบทความของตนเองแต่ผู้เดียว</div>
                    </div>
                </div>
            </div>

        </div>
    </div>




    <br><br><br><br>
    <?php include "navbar_footer.php" ?>
    <?php include "chart_chapter.php" ?>

</body>

</html>