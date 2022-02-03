<?php
include('header.php');
include('editorial_add_db.php');
?>

<title>ทีมบรรณาธิการ</title>
<style>
    img {

        border-radius: 50%;
        padding: 5px;
        /* width: 150px; */
    }
</style>

<body>
    <!--ADD-->
    <div class="modal fade" id="studentaddmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">เพิ่มข้อมูล</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form method="POST" enctype="multipart/form-data" name="form" id="add" novalidate>

                    <div class="modal-body">
                        <div class="form-group">
                            <label>ชื่อนาม-สกุล</label>
                            <input type="text" name="txt_name_surname" class="form-control" placeholder="ชื่อนาม-สกุล" required>
                            <div class="valid-feedback">
                                ถูกต้อง
                            </div>
                        </div>

                        <div class="form-group">
                            <label>ตำแหน่งหลัก</label>
                            <input type="text" name="txt_rank" class="form-control" placeholder="ตำแหน่ง">
                        </div>

                        <div class="form-group">
                            <label>สถานที่ทำงาน</label>
                            <input type="text" name="txt_workplace" class="form-control" placeholder="สถานที่ทำงาน">
                        </div>

                        <div class="form-group">
                            <label>เลือกหมวดตำแหน่งหน้าที่หลัก</label>
                            <select class="form-select" aria-label="Default select example" name="txt_rolemain" required="required">
                                <option value="">--เลือกหน้าที่--</option>
                                <option value="ที่ปรึกษา">ที่ปรึกษา</option>
                                <option value="บรรณาธิการ">บรรณาธิการ</option>
                                <option value="กองบรรณาธิการ">กองบรรณาธิการ</option>
                                <option value="ฝ่ายจัดการ">ฝ่ายจัดการ</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>ตำแหน่งหน้าที่เพิ่มเติม</label>
                            <input type="text" name="txt_rolesec" class="form-control" placeholder="หน้าที่">
                        </div>

                        <div class="form-group">
                            <label>ภาพ (แนะนำขนาดกว้างxสูงควรจะเท่ากันหรือใกล้เคียง)</label>
                            <input type="file" name="txt_file" class="form-control">
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
                    <h5 class="modal-title" id="exampleModalLabel">แก้ไข</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="editorial_edit_db.php" method="POST" id="up" enctype="multipart/form-data" novalidate>
                    <input type="hidden" name="update_id" id="update_id">

                    <div class="modal-body">
                        <div class="form-group">
                            <label>ชื่อนาม-สกุล</label>
                            <input type="text" name="txt_name" id="txt_name" class="form-control" placeholder="ชื่อนาม-สกุล" required>
                            <div class="valid-feedback">
                                ถูกต้อง
                            </div>
                        </div>

                        <div class="form-group">
                            <label>ตำแหน่งงาน</label>
                            <input type="text" name="txt_rank" id="txt_rank" class="form-control" placeholder="ตำแหน่ง">
                        </div>

                        <div class="form-group">
                            <label>สถานที่ทำงาน</label>
                            <input type="text" name="txt_workplace" id="txt_workplace" class="form-control" placeholder="สถานที่ทำงาน">
                        </div>

                        <div class="form-group">
                            <label>เลือกหมวดตำแหน่งหน้าที่หลัก</label>
                            <select class="form-select" aria-label="Default select example" name="txt_rolemain" required="required">
                                <option value="">--เลือกหน้าที่--</option>
                                <option value="ที่ปรึกษา">ที่ปรึกษา</option>
                                <option value="บรรณาธิการ">บรรณาธิการ</option>
                                <option value="กองบรรณาธิการ">กองบรรณาธิการ</option>
                                <option value="ฝ่ายจัดการ">ฝ่ายจัดการ</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>ตำแหน่งหน้าที่เพิ่มเติม</label>
                            <input type="text" name="txt_rolesec" id="txt_rolesec" class="form-control" placeholder="หน้าที่">
                        </div>

                        <div class="form-group">
                            <label>ภาพ (แนะนำขนาดกว้างxสูงควรจะเท่ากันหรือใกล้เคียง)</label>
                            <input type="file" name="txt_file" id="txt_file" class="form-control">
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
            <h2 class="d-flex justify-content-center">ทีมบรรณาธิการ</h2>
            <div class="card-body">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#studentaddmodal">
                    เพิ่มข้อมูล
                </button>
            </div>
            <?php
            $rs = $conn->query("SELECT * FROM editorial ");
            ?>
            <div class="table-responsive">
                <table id="MyTable" class="table table-striped " style="width:100%">
                    <thead class="thead-light">
                        <tr>
                            <th class="hide-on-screen">id</th>
                            <th>ชื่อ-นามสกุล</th>
                            <th>ตำแหน่ง</th>
                            <th>สถานที่ทำงาน</th>
                            <th>หมวดหน้าที่</th>
                            <th>หน้าที่เพิ่มเติม</th>
                            <th>ภาพ</th>
                            <th>แก้ไข</th>
                            <th>ลบ</th>


                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($row = $rs->fetch_array()) {
                            $id =  $row['id'];
                            $name_surname = $row['name_surname'];
                            $rank = $row['rank'];
                            $workplace = $row['workplace'];
                            $role_main = $row['role_main'];
                            $role_sec = $row['role_sec'];
                            $img = $row['photo'];
                        ?>
                            <tr>
                                <td class="hide-on-screen"><?php echo $id; ?></td>
                                <td style="width: 10%"><?php echo $name_surname; ?></td>
                                <td style="width: 10%"><?php echo $rank; ?></td>
                                <td style="width: 10%"><?php echo $workplace; ?></td>
                                <td style="width: 10%"><?php echo $role_main; ?></td>
                                <td style="width: 10%"><?php echo $role_sec; ?></td>
                                <?php if (strlen($img) == 15) { ?>
                                    <td style="width: 5%"> ไม่มีภาพ </td>
                                <?php } ?>
                                <?php if (strlen($img) >= 19) { ?>
                                    <td style="width: 5%"><img src="http://localhost/manage/file_editorial/<?php echo $img; ?>" style="width:50px;height:50px;"></td>
                                <?php } ?>
                                <td style="width: 2%">
                                    <button type="button" class="btn btn-lg btn-warning editbtn"><i class="bi bi-pencil-square"></i></button>
                                </td>
                                <td style="width: 2%">
                                    <button button type="button" class="btn btn-lg btn-danger" href="#" onclick="javascript:del('<?php echo $id; ?>');"> <i class="bi bi-trash-fill"></i> </button>
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
                window.location = "editorial_delete_db.php?id=" + id;
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
                $('#txt_name').val(data[1]);
                $('#txt_rank').val(data[2]);
                $('#txt_workplace').val(data[3]);
                $('#txt_rolemain').val(data[4]);
                $('#txt_rolesec').val(data[5]);

                var file_data = $("#txt_file").prop("files")[0];

                var form_data = new FormData();

                form_data.append('file', form_data);
                console.log("data = ", (data));
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


                "order": [
                    [0, 'desc']
                ],
                pageLength: 10,
                lengthMenu: [
                    [10, 20, 30, -1],
                    [10, 20, 30, 'ทั้งหมด'],

                ]
            });




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