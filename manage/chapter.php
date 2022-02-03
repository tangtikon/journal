<?php
include('header.php');
include('chapter_add_db.php');

?>

<title>บทย่อย</title>

<body>
    <!--ADD-->
    <div class="modal fade" id="studentaddmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form method="POST" enctype="multipart/form-data" name="form" id="add" novalidate>

                    <div class="modal-body">
                        <div class="form-group">
                            <select class="form-select" aria-label="Default select example" id="txt_type" name="txt_type" required="required">
                                <!-- <option selected>เลือกประเภทบทความ</option> -->
                                <option value="">--เลือกประเภทบทความ--</option>
                                <option value="นิพนธ์ต้นฉบับ">นิพนธ์ต้นฉบับ</option>
                                <option value="บทความพิเศษ">บทความพิเศษ</option>
                                <option value="บทความทั่วไป">บทความทั่วไป</option>
                                <option value="รายงานผู้ป่วย">รายงานผู้ป่วย</option>
                                <option value="บทความวิชาการ">บทความวิชาการ</option>
                                <option value="บทความปริทัศน์">บทความปริทัศน์</option>
                                <option value="Editorial Note">Editorial Note</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>ชื่อบท</label>
                            <input type="text" name="txt_title" class="form-control" placeholder="ชื่อบท" rows="3" required>
                            <div class="valid-feedback">
                                ถูกต้อง
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>ชื่อ-นามสกุล</label>
                                    <input type="text" name="txt_author" class="form-control" placeholder="ชื่อ นามสกุล" required>
                                    <div class="valid-feedback">
                                        ถูกต้อง
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>สถานที่ทำงาน</label>
                                    <input type="text" name="txt_workplace" class="form-control" placeholder="สถานที่ทำงาน" required>
                                    <div class="valid-feedback">
                                        ถูกต้อง
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>คำสำคัญ</label>
                            <input type="text" name="txt_keyword" class="form-control" placeholder="คำสำคัญ" rows="3">
                            <div class="valid-feedback">
                                ถูกต้อง
                            </div>
                        </div>

                        <div class="form-group">
                            <label>บทคัดย่อ</label>
                            <textarea type="text" name="txt_abstract" class="form-control" placeholder="บทคัดย่อ" rows="20"></textarea>
                            <div class="valid-feedback">
                                ถูกต้อง
                            </div>
                        </div>

                        <div class="form-group">
                            <label>อ้างอิง</label>
                            <textarea type="text" name="txt_refer" class="form-control" placeholder="เอกสารอ้างอิง" rows="20"></textarea>
                            <div class="valid-feedback">
                                ถูกต้อง
                            </div>
                        </div>

                        <div class="form-group">
                            <label>หน้าแรก-หน้าสุดท้าย</label>
                            <input type="text" name="txt_page" class="form-control" placeholder="เลขหน้า-เลขหน้า" rows="3" required>
                            <div class="valid-feedback">
                                ถูกต้อง
                            </div>
                        </div>


                        <div class="form-group">
                            <label>ไฟล์PDF</label>
                            <input type="file" name="file_pdf" class="form-control" required>
                            <div class="valid-feedback">
                                ถูกต้อง
                            </div>
                        </div>

                        <div class="form-group">
                            <input type="hidden" name="id_article" value="<?php echo $_GET['id_article']; ?>" class="form-control" required>
                        </div>


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
                        <button type="submit" name="submit" class="btn btn-primary">บันทึก</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <!-- EDIT-->
    <div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">แก้ไขวารสาร</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="chapter_edit_db.php" method="POST" id="up" enctype="multipart/form-data" novalidate>
                    <div class="modal-body">
                        <input type="hidden" name="update_id" id="update_id">

                        <div class="form-group">
                            <select class="form-select" aria-label="Default select example" id="txt_type" name="txt_type" required="required">
                                <option value="">--เลือกประเภทบทความ--</option>
                                <option value="นิพนธ์ต้นฉบับ">นิพนธ์ต้นฉบับ</option>
                                <option value="บทความพิเศษ">บทความพิเศษ</option>
                                <option value="บทความทั่วไป">บทความทั่วไป</option>
                                <option value="รายงานผู้ป่วย">รายงานผู้ป่วย</option>
                                <option value="บทความวิชาการ">บทความวิชาการ</option>
                                <option value="บทความปริทัศน์">บทความปริทัศน์</option>
                                <option value="Editorial Note">Editorial Note</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>ชื่อบท</label>
                            <input type="text" name="txt_title" id="txt_title" class="form-control" placeholder="ชื่อบท" rows="3" required>
                            <div class="valid-feedback">
                                ถูกต้อง
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>ชื่อ-นามสกุล</label>
                                    <input type="text" name="txt_author" id="txt_author" class="form-control" placeholder="ชื่อ นามสกุล" required>
                                    <div class="valid-feedback">
                                        ถูกต้อง
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>สถานที่ทำงาน</label>
                                    <input type="text" name="txt_workplace" id="txt_workplace" class="form-control" placeholder="สถานที่ทำงาน" required>
                                    <div class="valid-feedback">
                                        ถูกต้อง
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>คำสำคัญ</label>
                            <input type="text" name="txt_keyword" id="txt_keyword" class="form-control" placeholder="คำสำคัญ" rows="3" required>
                            <div class="valid-feedback">
                                ถูกต้อง
                            </div>
                        </div>

                        <div class="form-group">
                            <label>บทคัดย่อ</label>
                            <textarea type="text" name="txt_abstract" id="txt_abstract" class="form-control" placeholder="บทคัดย่อ" rows="20"></textarea>
                            <div class="valid-feedback">
                                ถูกต้อง
                            </div>
                        </div>

                        <div class="form-group">
                            <label>อ้างอิง</label>
                            <textarea type="text" name="txt_refer" id="txt_refer" class="form-control" placeholder="เอกสารอ้างอิง" rows="20"></textarea>
                            <div class="valid-feedback">
                                ถูกต้อง
                            </div>
                        </div>

                        <div class="form-group">
                            <label>หน้าแรก-หน้าสุดท้าย</label>
                            <input type="text" name="txt_page" class="form-control" id="txt_page" placeholder="เลขหน้า-เลขหน้า" rows="3" required>
                            <div class="valid-feedback">
                                ถูกต้อง
                            </div>
                        </div>

                        <div class="form-group">
                            <input type="hidden" name="id_article" value="<?php echo $_GET['id_article']; ?>" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>ไฟล์PDF</label>
                            <input type="file" name="txt_file" class="form-control" id="txt_file">
                            <div class="valid-feedback">
                                ถูกต้อง
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
                        <button type="submit" name="updatedata" class="btn btn-primary">บันทึกการแก้ไข</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <!--view-->
    <div class="modal fade" id="viewmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">ดูข้อมูลทั้งหมด</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="chapter_edit_db.php" method="POST" id="up" enctype="multipart/form-data" novalidate>
                    <div class="modal-body">
                        <input type="hidden" name="update_id" id="update_id">

                        <div class="form-group">
                            <label>ประเภทบทความ</label>
                            <input type="text" name="txt_type" id="txt_type_view" class="form-control" placeholder="ชื่อบท" rows="3" disabled>
                            <div class="valid-feedback">
                                ถูกต้อง
                            </div>
                        </div>

                        <div class="form-group">
                            <label>ชื่อบท</label>
                            <input type="text" name="txt_title" id="txt_title_view" class="form-control" placeholder="ชื่อบท" rows="3" disabled>
                            <div class="valid-feedback">
                                ถูกต้อง
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>ชื่อ-นามสกุล</label>
                                    <input type="text" name="txt_author_view" id="txt_author_view" class="form-control" placeholder="ชื่อ นามสกุล" disabled>
                                    <div class="valid-feedback">
                                        ถูกต้อง
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>สถานที่ทำงาน</label>
                                    <input type="text" name="txt_workplace_view" id="txt_workplace_view" class="form-control" placeholder="สถานที่ทำงาน" disabled>
                                    <div class="valid-feedback">
                                        ถูกต้อง
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>คำสำคัญ</label>
                            <input type="text" name="txt_keyword_view" id="txt_keyword_view" class="form-control" placeholder="คำสำคัญ" rows="3" disabled>
                            <div class="valid-feedback">
                                ถูกต้อง
                            </div>
                        </div>

                        <div class="form-group">
                            <label>บทคัดย่อ</label>
                            <textarea type="text" name="txt_abstract_view" id="txt_abstract_view" class="form-control" placeholder="บทคัดย่อ" rows="20" disabled></textarea>
                            <div class="valid-feedback">
                                ถูกต้อง
                            </div>
                        </div>

                        <div class="form-group">
                            <label>อ้างอิง</label>
                            <textarea type="text" name="txt_refer_view" id="txt_refer_view" class="form-control" placeholder="เอกสารอ้างอิง" rows="20" disabled></textarea>
                            <div class="valid-feedback">
                                ถูกต้อง
                            </div>
                        </div>

                        <div class="form-group">
                            <label>หน้าแรก-หน้าสุดท้าย</label>
                            <input type="text" name="txt_page_view" class="form-control" id="txt_page_view" placeholder="เลขหน้า-เลขหน้า" rows="3" disabled>
                            <div class="valid-feedback">
                                ถูกต้อง
                            </div>
                        </div>

                        <div class="form-group">
                            <input type="hidden" name="id_article_view" value="<?php echo $_GET['id_article']; ?>" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>ไฟล์PDF</label>
                            <input type="text" name="txt_file_view" class="form-control" id="txt_file_view" disabled>
                            <div class="valid-feedback">
                                ถูกต้อง
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ออก</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <!--MAIN-->
    <div class="container d-flex justify-content-center">
        <div class="col col-lg-15"><br>
            <?php
            $id = $_GET['id_article'];
            $rs = $conn->query("SELECT * FROM article where id_arti = $id");
            while ($row = $rs->fetch_array()) {
                $id_arti = $row['id_arti'];
                $title_year = $row['title_year'];
                $title_issue = $row['title_issue'];
                $mon_start = $row['mon_start'];
                $mon_end = $row['mon_end'];
                $year = $row['year'];
            }
            ?>
            <h2 class="d-flex justify-content-center"><?php echo "ปีที่: ", $title_year, " ฉบับที่: ", $title_issue, " ", $mon_start, " - ", $mon_end, " ", $year  ?></h2>
            <div class="card-body">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#studentaddmodal">
                    เพิ่มข้อมูล
                </button>
            </div>
            <div class="table-responsive">
                <table id="MyTable" class="table table-striped " style="width:100%">
                    <thead class="thead-light">
                        <tr>
                            <th class="hide-on-screen">id</th>
                            <th>ประเภท</th>
                            <th>ชื่อบท</th>
                            <th>ผู้แต่ง</th>
                            <th>สถานที่ทำงาน</th>
                            <th class="hide-on-screen">คำสำคัญ</th>
                            <th class="hide-on-screen">บทคัดย่อ</th>
                            <th class="hide-on-screen">เอกสารอ้างอิง</th>
                            <th>หน้า</th>
                            <th class="hide-on-screen">id_article</th>
                            <th>ไฟล์ pdf</th>
                            <th>แก้ไข</th>
                            <th>ลบ</th>
                            <th>ดูข้อมูลทั้งหมด</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $id_arti = $_GET['id_article'];
                        $rs = $conn->query("SELECT * FROM chapter WHERE  id_article= $id_arti ORDER BY id DESC");
                        while ($row = $rs->fetch_array()) {
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
                            <tr>
                                <td class="hide-on-screen"><?php echo $id; ?></td>
                                <td><?php echo $type; ?></td>
                                <td><?php echo $title; ?></td>
                                <td><?php echo $author; ?></td>
                                <td><?php echo $workplace; ?></td>

                                <td class="hide-on-screen"><?php echo $keyword; ?></td>
                                <td class="hide-on-screen"><?php echo $abstract; ?></td>
                                <td class="hide-on-screen"><?php echo $refer; ?></td>
                                <td><?php echo $page; ?></td>
                                <td class="hide-on-screen"><?php echo $id_article; ?></td>
                                <td><a href="http://localhost/manage/files_pdf_chapter/<?php echo $file_name; ?>" target="_blank"><?php echo $file_name; ?></a></td>




                                <td>
                                    <button type="button" class="btn btn-lg btn-warning editbtn"><i class="bi bi-pencil-square"></i></button>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-lg btn-danger" href="#" onclick="javascript:del('<?php echo $id, '&id_article=', $id_article; ?>');"> <i class="bi bi-trash-fill"></i> </button>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-lg btn-dark viewbtn"><i class="bi bi-eye"></i></button>
                                </td>

                            </tr>
                        <?php
                        } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        function del(id) {
            if (confirm("ยืนยันการลบข้อมูล")) {

                window.location = "chapter_delete_db.php?id=" + id;
            } else {
                return false;
            }
        }
    </script>

    <!--view-->
    <script>
        $(document).ready(function() {

            $('.viewbtn').on('click', function(event) {
                $('#viewmodal').modal('show');
                $tr = $(this).closest('tr');
                var data = $tr.children("td").map(function() {
                    return $(this).text();
                }).get();

                $('#update_id').val(data[0]);
                // var update_id = data[0];
                // var update_id = $('#update_id').val(data[0]);
                $('#txt_type_view').val(data[1]);
                $('#txt_title_view').val(data[2]);
                $('#txt_author_view').val(data[3]);
                $('#txt_workplace_view').val(data[4]);
                $('#txt_keyword_view').val(data[5]);
                $('#txt_abstract_view').val(data[6]);
                $('#txt_refer_view').val(data[7]);
                // tinymce.get("txt_abstract").setContent(data[6]);
                // tinymce.get("txt_refer").setContent(data[7]);
                $('#txt_page_view').val(data[8]);
                $('#id_article_view').val(data[9]);
                $('#txt_file_view').val(data[10]);
        
            });
        });
    </script>


    <!--edit-->
    <script>
        $(document).ready(function() {

            $('.editbtn').on('click', function(event) {
                $('#editmodal').modal('show');
                $tr = $(this).closest('tr');
                var data = $tr.children("td").map(function() {
                    return $(this).text();
                }).get();

                $('#update_id').val(data[0]);
                // var update_id = data[0];
                // var update_id = $('#update_id').val(data[0]);
                $('#txt_type').val(data[1]);
                $('#txt_title').val(data[2]);
                $('#txt_author').val(data[3]);
                $('#txt_workplace').val(data[4]);
                $('#txt_keyword').val(data[5]);
                $('#txt_abstract').val(data[6]);
                $('#txt_refer').val(data[7]);
                // tinymce.get("txt_abstract").setContent(data[6]);
                // tinymce.get("txt_refer").setContent(data[7]);
                $('#txt_page').val(data[8]);


                $('#id_article').val(data[9]);

                var file_data = $("#txt_file").prop("files")[0];

                var form_data = new FormData();

                form_data.append('file', form_data);
                console.log("data = ", data);


            });
        });
    </script>

    <script type="text/javascript">
        $(function() {
            $("#add").on("submit", function() {
                var form = $(this)[0];
                if (form.checkValidity() === false) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');
            });
        });
        $(function() {
            $("#up").on("submit", function() {
                var form = $(this)[0];
                if (form.checkValidity() === false) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            var t = $('#MyTable').DataTable({
                "bInfo": false,

                // "columnDefs": [{
                //     "searchable": false,
                //     "orderable": false,
                //     "targets": 0
                // }],
                "order": [
                    [0, 'desc']
                ],
                pageLength: 5,
                lengthMenu: [
                    [5, 10, 20, -1],
                    [5, 10, 20, 'ทั้งหมด'],

                ]
            });

            // t.on('order.dt search.dt', function() {
            //     t.column(0, {
            //         search: 'applied',
            //         order: 'applied'
            //     }).nodes().each(function(cell, i) {
            //         cell.innerHTML = i + 1;
            //     });
            // }).draw();


        });
    </script>

    <script type="text/javascript">
        $.extend(true, $.fn.dataTable.defaults, {
            "language": {
                "sProcessing": "กำลังดำเนินการ...",
                "sLengthMenu": "แสดง_MENU_ แถว",
                "sZeroRecords": "ไม่พบข้อมูล",
                "sInfo": "แสดง _START_ ถึง _END_ จาก _TOTAL_ แถว",
                "sInfoEmpty": "แสดง 0 ถึง 0 จาก 0 แถว",
                "sInfoFiltered": "(กรองข้อมูล _MAX_ ทุกแถว)",
                "sInfoPostFix": "",
                "sSearch": "ค้นหา:",
                "sUrl": "",
                "oPaginate": {
                    "sFirst": "เริ่มต้น",
                    "sPrevious": "ก่อนหน้า",
                    "sNext": "ถัดไป",
                    "sLast": "สุดท้าย"
                }
            }
        });
        $('.MyTable').DataTable();
    </script>

</body>

</html>