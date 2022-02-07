<?php include "header.php" ?>
<?php include "connect.php" ?>
<?php include "style_text.php" ?>
<title>ทีมบรรณาธิการ</title>
<style>
    table,
    th,
    td {
        height: 50px;
    }
</style>

<body>
    <br>

    <div class="container mx-auto mt-6">
        <div class="row">
            <div class="txt_header1 text-center">ทีมบรรณาธิการ</div>
            <br><br><br><br>
            <div class="txt_header text-center">ที่ปรึกษา</div><br>
            <?php
            $query = mysqli_query($conn, "select * from editorial WHERE role_main LIKE 'ที่ปรึกษา' ORDER BY id ASC ") or die(mysqli_error($conn));
            while ($row = mysqli_fetch_array($query)) {
                $name_surname = $row['name_surname'];
                $rank = $row['rank'];
                $workplace = $row['workplace'];
                $role_main = $row['role_main'];
                $role_sec = $row['role_sec'];
                $photo = $row['photo'];

            ?>
                <div class="col-md-3">
                    <div class="card" style="width: 18rem;">
                        <div class="card-body">
                            <div class="text-center">
                                <img class="ed" src="manage/file_editorial/<?php echo $photo; ?>" style="width:200px;height:200px;" alt="Card image cap">
                                <br><br>
                                <div class="text-center">
                                    <div class="txt_content1"><?php echo  $name_surname; ?></div>
                                    <div class="txt_content2"><?php echo  $rank; ?></div>
                                    <div class="txt_content2"><?php echo  $workplace; ?></div>
                                </div>
                            </div>
                        </div>
                    </div><br><br><br><br>
                </div>
            <?php } ?>

            <div class="txt_header text-center">บรรณาธิการ</div><br>
            <?php
            $query = mysqli_query($conn, "select * from editorial WHERE role_main LIKE 'บรรณาธิการ' ORDER BY id ASC ") or die(mysqli_error($conn));
            while ($row = mysqli_fetch_array($query)) {
                $name_surname = $row['name_surname'];
                $rank = $row['rank'];
                $workplace = $row['workplace'];
                $role_main = $row['role_main'];
                $role_sec = $row['role_sec'];
                $photo = $row['photo'];

            ?>
                <div class="col-md-4">
                    <div class="card" style="width: 22rem;">
                        <div class="card-body">
                            <div class="text-center">
                                <img class="ed" src="manage/file_editorial/<?php echo $photo; ?>" style="width:200px;height:200px;" alt="Card image cap">
                                <br><br>
                                <div class="text-center">
                                    <div class="txt_content1"><?php echo  $role_sec; ?></div><br>
                                    <div class="txt_content1"><?php echo  $name_surname; ?></div>
                                    <div class="txt_content2"><?php echo  $rank; ?></div>
                                    <div class="txt_content2"><?php echo  $workplace; ?></div>


                                </div>
                            </div>
                        </div>
                    </div><br><br><br><br>
                </div>
            <?php } ?>

            <div class="txt_header text-center">กองบรรณาธิการ</div><br><br>
            <div class="row justify-content-md-center">
                <div class="col-md-10">
                    <table style="width:100%">
                        <?php
                        $query = mysqli_query($conn, "select * from editorial WHERE role_main LIKE 'กองบรรณาธิการ' ORDER BY id ASC ") or die(mysqli_error($conn));
                        while ($row = mysqli_fetch_array($query)) {
                            $name_surname = $row['name_surname'];
                            $rank = $row['rank'];
                            $workplace = $row['workplace'];
                            $role_main = $row['role_main'];
                            $role_sec = $row['role_sec'];
                            $photo = $row['photo'];
                        ?>
                            <tr>
                                <td style="width: 40%">
                                    <div class="txt_content3"><?php echo  $name_surname; ?></div>
                                </td>
                                <td style="width: 60%">
                                    <div class="txt_content3"><?php echo  $workplace; ?></div>
                                </td>
                            </tr>
                        <?php } ?>
                    </table><br><br><br><br>

                </div>
            </div>


            <div class="txt_header text-center">ฝ่ายจัดการ</div><br>
            <div class="row justify-content-md-center">
                <div class="col-md-10">
                    <table style="width:100%">
                        <?php
                        $query = mysqli_query($conn, "select * from editorial WHERE role_main LIKE 'ฝ่ายจัดการ' ORDER BY id ASC ") or die(mysqli_error($conn));
                        while ($row = mysqli_fetch_array($query)) {
                            $name_surname = $row['name_surname'];
                            $rank = $row['rank'];
                            $workplace = $row['workplace'];
                            $role_main = $row['role_main'];
                            $role_sec = $row['role_sec'];
                            $photo = $row['photo'];
                        ?>
                            <tr>
                                <td style="width: 40%">
                                    <div class="txt_content3"><?php echo  $name_surname; ?></div>
                                </td>
                                <td style="width: 40%">
                                    <div class="txt_content3"><?php echo  $workplace; ?></div>
                                </td>
                                <td style="width: 50%">
                                    <div class="txt_content3"><?php echo  $role_sec; ?></div>
                                </td>
                            </tr>
                        <?php } ?>
                    </table><br><br><br><br>
                </div>
            </div>

        </div>
    </div>
    <br><br><br><br>
    <?php include "navbar_footer.php" ?>
</body>

</html>