<?php
include('header.php');
include('article_add_db.php');
?>

<title>วารสาร</title>

<body>
    <!--ADD-->
    <div class="modal fade" id="studentaddmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
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
                            <label>ปีที่</label>
                            <input type="number" name="txt_title_year" class="form-control" placeholder="ระบุตัวเลข" required>
                            <div class="valid-feedback">
                                ถูกต้อง
                            </div>
                        </div>

                        <div class="form-group">
                            <label>ฉบับที่</label>
                            <input type="number" name="txt_title_issue" class="form-control" placeholder="ระบุตัวเลข" required>
                            <div class="valid-feedback">
                                ถูกต้อง
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="mon_start">ตั้งแต่เดือน</label>
                            <select class="form-select" aria-label="Default select example" id="mon_start" name="txt_mon_start">
                                <option selected>เลือก</option>
                                <option value="มกราคม">มกราคม</option>
                                <option value="กุมภาพันธ์">กุมภาพันธ์</option>
                                <option value="มีนาคม">มีนาคม</option>
                                <option value="เมษายน">เมษายน</option>
                                <option value="พฤษภาคม">พฤษภาคม</option>
                                <option value="มิถุนายน">มิถุนายน</option>
                                <option value="กรกฎาคม">กรกฎาคม</option>
                                <option value="สิงหาคม">สิงหาคม</option>
                                <option value="กันยายน">กันยายน </option>
                                <option value="ตุลาคม">ตุลาคม</option>
                                <option value="พฤศจิกายน">พฤศจิกายน </option>
                                <option value="ธันวาคม">ธันวาคม</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="mon_end">ถึงเดือนเดือน</label>
                            <select class="form-select" aria-label="Default select example" id="mon_end" name="txt_mon_end">
                                <option selected>เลือก</option>
                                <option value="มกราคม">มกราคม</option>
                                <option value="กุมภาพันธ์">กุมภาพันธ์</option>
                                <option value="มีนาคม">มีนาคม</option>
                                <option value="เมษายน">เมษายน</option>
                                <option value="พฤษภาคม">พฤษภาคม</option>
                                <option value="มิถุนายน">มิถุนายน</option>
                                <option value="กรกฎาคม">กรกฎาคม</option>
                                <option value="สิงหาคม">สิงหาคม</option>
                                <option value="กันยายน">กันยายน </option>
                                <option value="ตุลาคม">ตุลาคม</option>
                                <option value="พฤศจิกายน">พฤศจิกายน </option>
                                <option value="ธันวาคม">ธันวาคม</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>ปี พ.ศ.</label>
                            <input type="text" name="txt_year" class="form-control" required>
                            <div class="valid-feedback">
                                ถูกต้อง
                            </div>
                        </div>

                        <div class="form-group">
                            <label>วันที่เผยแพร่</label>
                            <input type="date" name="txt_date_publish" class="form-control" required>
                            <div class="valid-feedback">
                                ถูกต้อง
                            </div>
                        </div>

                        <div class="form-group">
                            <label>ภาพปก</label>
                            <input type="file" name="file_image" class="form-control" required>
                            <div class="valid-feedback">
                                ถูกต้อง
                            </div>
                        </div>

                        <div class="form-group">
                            <label>ไฟล์PDFฉบับเต็ม</label>
                            <input type="file" name="file_pdf" class="form-control" required>
                            <div class="valid-feedback">
                                ถูกต้อง
                            </div>
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
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">แก้ไขวารสาร</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="article_edit_db.php" method="POST" id="up" enctype="multipart/form-data" novalidate>
                    <div class="modal-body">
                        <input type="hidden" name="update_id" id="update_id">

                        <div class="form-group">
                            <label>ปีที่</label>
                            <input type="number" name="txt_title_year" id="txt_title_year" class="form-control" placeholder="ระบุตัวเลข" required>
                            <div class="valid-feedback">
                                ถูกต้อง
                            </div>
                        </div>

                        <div class="form-group">
                            <label>ฉบับที่</label>
                            <input type="number" name="txt_title_issue" id="txt_title_issue" class="form-control" placeholder="ระบุตัวเลข" required>
                            <div class="valid-feedback">
                                ถูกต้อง
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="mon_start">ตั้งแต่เดือน</label>
                            <select class="form-select" aria-label="Default select example" id="txt_mon_start" name="txt_mon_start">
                                <option selected>เลือก</option>
                                <option value="มกราคม">มกราคม</option>
                                <option value="กุมภาพันธ์">กุมภาพันธ์</option>
                                <option value="มีนาคม">มีนาคม</option>
                                <option value="เมษายน">เมษายน</option>
                                <option value="พฤษภาคม">พฤษภาคม</option>
                                <option value="มิถุนายน">มิถุนายน</option>
                                <option value="กรกฎาคม">กรกฎาคม</option>
                                <option value="สิงหาคม">สิงหาคม</option>
                                <option value="กันยายน">กันยายน </option>
                                <option value="ตุลาคม">ตุลาคม</option>
                                <option value="พฤศจิกายน">พฤศจิกายน </option>
                                <option value="ธันวาคม">ธันวาคม</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="mon_end">ถึงเดือนเดือน</label>
                            <select class="form-select" aria-label="Default select example" id="txt_mon_end" name="txt_mon_end">
                                <option selected>เลือก</option>
                                <option value="มกราคม">มกราคม</option>
                                <option value="กุมภาพันธ์">กุมภาพันธ์</option>
                                <option value="มีนาคม">มีนาคม</option>
                                <option value="เมษายน">เมษายน</option>
                                <option value="พฤษภาคม">พฤษภาคม</option>
                                <option value="มิถุนายน">มิถุนายน</option>
                                <option value="กรกฎาคม">กรกฎาคม</option>
                                <option value="สิงหาคม">สิงหาคม</option>
                                <option value="กันยายน">กันยายน </option>
                                <option value="ตุลาคม">ตุลาคม</option>
                                <option value="พฤศจิกายน">พฤศจิกายน </option>
                                <option value="ธันวาคม">ธันวาคม</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>ปี พ.ศ.</label>
                            <input type="text" name="txt_year" class="form-control" id="txt_year" required>
                            <div class="valid-feedback">
                                ถูกต้อง
                            </div>
                        </div>

                        <div class="form-group">
                            <label>วันที่เผยแพร่</label>
                            <input type="date" name="txt_date_publish" class="form-control" id="txt_date_publish" required>
                            <div class="valid-feedback">
                                ถูกต้อง
                            </div>
                        </div>

                        <div class="form-group">
                            <label>ภาพปก</label>
                            <input type="file" name="file_image" class="form-control" id="file_image">
                            <div class="valid-feedback">
                                ถูกต้อง
                            </div>
                        </div>

                        <div class="form-group">
                            <label>ไฟล์PDFฉบับเต็ม</label>
                            <input type="file" name="file_pdf" class="form-control" id="file_pdf">
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

    <!--MAIN-->

    <div class="container d-flex justify-content-center">
        <div class="col col-lg-12"><br>
            <h2 class="d-flex justify-content-center">วารสาร</h2>
            <div class="card-body">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#studentaddmodal">
                    เพิ่มข้อมูล
                </button>
            </div>
            <?php

            $rs = $conn->query("SELECT * FROM article ORDER BY id_arti DESC");

            ?>
            <div class="table-responsive">
                <table id="MyTable" class="table table-striped " style="width:100%">
                    <thead class="thead-light">
                        <tr>
                            <th class="hide-on-screen">id</th>
                            <th>ปีที่</th>
                            <th>ฉบับที่</th>
                            <th>เดือนที่เริ่มต้น</th>
                            <th>เดือนที่สุดท้าย</th>
                            <th>ปี พ.ศ.</th>
                            <th>วันที่เผยแพร่</th>

                            <th class="hide-on-screen">ภาพปก</th>
                            <th class="hide-on-screen">ไฟล์PDFฉบับเต็ม</th>

                            <th>ภาพปก</th>
                            <th>ไฟล์PDFฉบับเต็ม</th>

                            <th>แก้ไข</th>
                            <th>ลบ</th>
                            <th>จัดการบทความ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($row = $rs->fetch_array()) {
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
                            <tr>
                                <td class="hide-on-screen"><?php echo $id_arti; ?></td>
                                <td><?php echo $title_year; ?></td>
                                <td><?php echo $title_issue; ?></td>
                                <td><?php echo $mon_start; ?></td>
                                <td><?php echo $mon_end; ?></td>
                                <td><?php echo $year; ?></td>
                                <td><?php echo $date_publish; ?></td>
                                <td class="hide-on-screen"><?php echo $file_image; ?></td>
                                <td class="hide-on-screen"><?php echo $pdf_file; ?></td>

                                <td><img src="files_image/<?php echo $file_image; ?>" style="width:45px;height:66.75px;"></td>
                                <td><a href="files_pdf/<?php echo $pdf_file; ?>" target="_blank"><?php echo $pdf_file; ?></a></td>

                                <td>
                                    <button type="button" class="btn btn-lg btn-warning editbtn"><i class="bi bi-pencil-square"></i></button>
                                </td>
                                <td>
                                    <button button type="button" class="btn btn-lg btn-danger" href="#" onclick="javascript:del('<?php echo $id_arti; ?>');"> <i class="bi bi-trash-fill"></i> </button>
                                </td>
                                <td style="width: 15%">
                                    <form class="form-inline my-2 my-lg-0" action="chapter.php?id_article=<?php echo $id_arti ?>" method="POST" id="myForm">
                                        <!-- <input type="hidden" name="id" value="<?php echo $id_arti ?>"> -->
                                        <button class="btn btn-lg btn-info" type="submit"><i class="bi bi-list-ul"></i></button>
                                    </form>
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
                window.location = "article_delete_db.php?id_arti=" + id;
            } else {
                return false;
            }
        }
    </script>

    <script>
        $(document).ready(function() {
            $('.editbtn').on('click', function(event) {
                $('#editmodal').modal('show');
                $tr = $(this).closest('tr');
                var data = $tr.children("td").map(function() {
                    return $(this).text();
                }).get();
                $('#update_id').val(data[0]);
                $('#txt_title_year').val(data[1]);
                $('#txt_title_issue').val(data[2]);
                $('#txt_mon_start').val(data[3]);
                $('#txt_mon_end').val(data[4]);
                $('#txt_year').val(data[5]);
                $('#txt_date_publish').val(data[6]);

                console.log("data = ", (data));

               
                var file_image = $("#file_image").prop("files");
                var file_pdf = $("#file_pdf").prop("files");

                var form_data = new FormData();
                console.log("data = ", (file_pdf));
                form_data.append('file', form_data);
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