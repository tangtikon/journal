<?php ob_start(); ?>
<?php include "header.php" ?>
<?php include "connect.php" ?>
<title>วารสารสาธารณสุขจังหวัดขอนแก่น</title>
<?php include "style_article.php" ?>

<body>
    <br><br><br>
    <div class="text-center">
        <div class="txt_header1">วารสารสำนักงานสาธารณสุขจังหวัดขอนแก่น</div>
    </div><br><br>
    <div class="container mx-auto mt-6">
        <div class="row">
            <?php
            $query = mysqli_query($conn, "select * from article ORDER BY id_arti DESC ") or die(mysqli_error($conn));
            while ($row = mysqli_fetch_array($query)) {
                $id_arti = $row['id_arti'];
                $title_year = $row['title_year'];
                $title_issue = $row['title_issue'];
                $mon_start = $row['mon_start'];
                $mon_end = $row['mon_end'];
                $year = $row['year'];
                $file_image = $row['file_image'];
                $pdf_file = $row['pdf_full_file'];
                $date_publish = $row['date_publish'];
            ?>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <form class="form-inline my-2 my-lg-0" action="page-chapter.php" method="POST" id="myForm">
                                <input type="hidden" name="id" value="<?php echo $id_arti ?>">
                                <input type="hidden" name="txt_ip" value="<?php echo $_SERVER['REMOTE_ADDR']; ?>">
                                <div class="text-center">
                                    <button class="btn-link" type="submit">
                                        <img class="img_article" src="http://localhost/journal-manage/files_image/<?php echo $file_image; ?>" style="width:248px;height:350.8px;" alt="Card image cap">
                                    </button>
                                    <br><br>
                                    <button class="btn-link" type="submit">
                                        <div class="text-center">
                                            <div class="txt_header"><?php echo  "ปีที่ ", $title_year, " ฉบับที่ ", $title_issue; ?></div>
                                            <div class="txt_header"><?php echo  $mon_start, " - ", $mon_end, " ", $year; ?></div>
                                        </div>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>

    <br><br><br><br>
    <?php include "navbar_footer.php" ?>
</body>

</html>