<?php
include('header.php');
include('connect.php');
?>

<?php include "style_chapter.php" ?>

<body>
   <?php include "db_count_article.php" ?>
   <div class="container justify-content-lg-center">
      <div class="col"><br>


         <?php
         $id_article = $_POST["id"];
         $query = mysqli_query($conn, "select id_arti,title_year,title_issue,mon_start,mon_end,year,file_image,pdf_full_file,date_publish from article where id_arti=$id_article ORDER BY id_arti") or die(mysqli_error($conn));
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
            <title><?php echo "ปีที่ ", $title_year, " ฉบับที่ ", $title_issue, " : ", $mon_start, " - ", $mon_end, " ", $year ?></title>

            <div class="text-center"><br>
               <div class="txt_header"><?php echo "ปีที่ ", $title_year, " ฉบับที่ ", $title_issue, " : ", $mon_start, " - ", $mon_end, " ", $year ?> </div>
               <br>
               <a href="#"><img class="img_chapter" src="manage/files_image/<?php echo $file_image ?>" style="width:354.2px;height:501.1px;"></a><br><br>
               <div class="txt_type">เผยแพร่แล้ว: <?php echo $date_publish ?></div>
               <br><br>
            </div>

            <div class="card" style="max-width: 50rem;">
               <div class="card-header">
                  <div class="txt_head1">ฉบับเต็ม</div>
               </div>
               <div class="card-body text-dark">
                  <form class="form-inline my-2 my-lg-0" action="open-pdf-full.php" method="POST" id="myForm" target="_blank">
                     <input type="hidden" name="id_arti" value="<?php echo $id_article ?>">
                     <input type="hidden" name="openfile_full" value="<?php echo $pdf_file ?>">
                     <input type="hidden" name="txt_ip" value="<?php echo $_SERVER['REMOTE_ADDR']; ?>">
                     <input type="hidden" name="open_title_full" value="<?php echo "ปีที่ ", $title_year, " ฉบับที่ ", $title_issue, " : ", $mon_start, " - ", $mon_end, " ", $year ?>">
                     <div class="text-center d-grid gap-2 col-3 mx-auto">
                        <button class="btn btn-download color-text w-8 p-1" type="submit">
                           <i class="bi bi-file-pdf-fill" style="font-size:20px;color:white"></i> PDF
                        </button>
                     </div>
                  </form>
               </div>
            </div><br>

         <?php } ?>

         <?php
         $query = mysqli_query($conn, "select id,type,title,author,workplace,keyword,abstract,refer,page,file_name,id_article
          from chapter WHERE id_article=$id_article ORDER BY id ASC") or die(mysqli_error($conn));
         while ($row = mysqli_fetch_array($query)) {
            $id = $row['id'];
            $type = $row['type'];
            $title = $row['title'];
            $author = $row['author'];
            $workplace = $row['workplace'];
            $keyword = $row['keyword'];
            $abstract = $row['abstract'];
            $refer = $row['refer'];
            $page = $row['page'];
            $file_name = $row['file_name'];
            $id_article = $row['id_article'];
         ?>

            <div class="card" style="max-width: 50rem;">
               <div class="card-header">
                  <form class="form-inline my-2 my-lg-0" action="page-view.php" method="POST" id="myForm">
                     <input type="hidden" name="id" value="<?php echo $id ?>">
                     <input type="hidden" name="id_article" value="<?php echo $id_article ?>">
                     <button class="btn-link" type="submit">
                        <div class="txt_head1"><?php echo $title ?></div>
                     </button>
                  </form>
               </div>
               <div class="card-body">
                  <div class="txt_content"><?php echo $author ?></div>
                  <div class="txt_type">
                     <?php echo $type ?>
                  </div>
                  <form class="form-inline my-2 my-lg-0" action="open-pdf.php" method="POST" id="myForm" target="_blank">
                     <input type="hidden" name="id_ch" value="<?php echo $id ?>">
                     <input type="hidden" name="openfile" value="<?php echo $file_name ?>">
                     <input type="hidden" name="txt_ip" value="<?php echo $_SERVER['REMOTE_ADDR']; ?>">
                     <input type="hidden" name="open_title" value="<?php echo $title ?>">
                     <div class="text-center d-grid gap-2 col-3 mx-auto">
                        <button class="btn btn-download color-text w-8 p-1" type="submit">
                           <i class="bi bi-file-pdf-fill" style="font-size:20px;color:white"></i> PDF
                        </button>
                     </div>
                  </form>

               </div>
               <div class="card-footer">
                  <div class="txt_page">
                     หน้า: <?php echo $page ?>
                  </div>
               </div>
            </div>

         <?php } ?>


         <br><br><br>
         <?php
         $query = mysqli_query($conn, "select YEAR(date_view),MONTH(date_view),count(id) 
         from count_article WHERE id_for=$id_article ") or die(mysqli_error($conn));

         while ($row = mysqli_fetch_array($query)) {
            $count = $row['count(id)'];
         }
         ?>
         <div class="container mx-auto mt-6">
            <div class="row">
               <div class="card chart" style="max-width: 30rem;">
                  <div class="txt_content text-center">
                     จำนวนเข้าชมบทความนี้ทั้งหมด: <?php echo $count; ?> ครั้ง
                     <div class="d-flex justify-content-center">
                        <div id="container" style="height: 300px;width: 500px;"></div>
                     </div>
                  </div>
               </div>


               <?php
               $query = mysqli_query($conn, "select count(id) from count_open_full WHERE id_article=$id_article ") or die(mysqli_error($conn));

               while ($row = mysqli_fetch_array($query)) {
                  $count_full = $row['count(id)'];
               } ?>
               <div class="card chart" style="max-width: 30rem;">
                  <div class="txt_content text-center">
                     จำนวนเข้าดาวน์โหลดฉบับเต็ม: <?php echo $count_full; ?> ครั้ง
                     <div class="d-flex justify-content-center">
                        <div id="container_full" style="height: 300px;width: 700px;"></div>
                     </div>
                  </div>
               </div>
            </div>
         </div>

      </div>
   </div>

   <br><br><br>
   <?php include "navbar_footer.php" ?>
   <?php include "chart_article.php" ?>
   <?php include "chart_article_download.php" ?>
</body>

</html>