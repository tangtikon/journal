<?php include('check.php');
include("connect.php");
$check_level = $_SESSION['level'];

if ($check_level == 'u' || $check_level == 'U') {

    header('location:checklogout.php');
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge"> -->
    <link rel="icon" href="img/icon.png" type="image/icon">
    <!--ห้ามลบ-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>

    <script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>
    <!-- <scrip src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"> -->
    <!-- </script> -->

    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.3/css/bootstrap.min.css" /> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/js/dataTables.bootstrap4.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/css/dataTables.bootstrap4.min.css" />

    <!-- Bootstrap Font Icon CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet">


</head>

<?php
include('navbar_admin.php');
include('style.php');

?>

<title>จัดการผู้ใช้งาน</title>

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

                <form method="POST" action="user_add_db.php" enctype="multipart/form-data" name="form" id="add" novalidate>

                    <div class="modal-body">

                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" name="txt_username" class="form-control" placeholder="Username" required>

                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="text" name="txt_password" class="form-control" placeholder="Password" required>

                        </div>
                        <div class="form-group">
                            <label>ชื่อ</label>
                            <input type="text" name="txt_name" class="form-control" placeholder="ชื่อ" required>

                        </div>
                        <div class="form-group">
                            <label>นามสกุล</label>
                            <input type="text" name="txt_surname" class="form-control" placeholder="นามสกุล" required>

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

                <form action="user_edit_db.php" method="POST" id="up" enctype="multipart/form-data" novalidate>
                    <div class="modal-body">
                        <input type="hidden" name="update_id" id="update_id">

                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" name="txt_username" id="txt_username" class="form-control" placeholder="Username" required>
                            <div class="valid-feedback">
                                ถูกต้อง
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="text" name="txt_password" id="txt_password" class="form-control" placeholder="Password" required>
                            <div class="valid-feedback">
                                ถูกต้อง
                            </div>
                        </div>
                        <div class="form-group">
                            <label>ชื่อ</label>
                            <input type="text" name="txt_name" id="txt_name" class="form-control" placeholder="ชื่อ" required>
                            <div class="valid-feedback">
                                ถูกต้อง
                            </div>
                        </div>
                        <div class="form-group">
                            <label>นามสกุล</label>
                            <input type="text" name="txt_surname" id="txt_surname" class="form-control" placeholder="นามสกุล" required>
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
            <h2 class="d-flex justify-content-center">จัดการผู้ใช้</h2>
            <div class="card-body">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#studentaddmodal">
                    เพิ่มผู้ใช้
                </button>
            </div>
            <?php

            $rs = $conn->query("SELECT * FROM member WHERE level = 'u' OR 'U' ");

            ?>
            <div class="table-responsive">
                <table id="MyTable" class="table table-striped " style="width:100%">
                    <thead class="thead-light">
                        <tr>
                            <th class="hide-on-screen">id</th>
                            <th>USERNAME</th>
                            <th>PASSWORD</th>
                            <th>ชื่อ</th>
                            <th>นามสกุล</th>

                            <th>แก้ไข</th>
                            <th>ลบ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($row = $rs->fetch_array()) {
                            $id = $row['id'];
                            $username = $row['username'];
                            $password = $row['password'];
                            $name = $row['name'];
                            $surname = $row['surname'];

                        ?>
                            <tr>
                                <td class="hide-on-screen"><?php echo $id; ?></td>
                                <td><?php echo $username; ?></td>
                                <td><?php echo $password; ?></td>
                                <td><?php echo $name; ?></td>
                                <td><?php echo $surname; ?></td>


                                <td>
                                    <button type="button" class="btn btn-lg btn-warning editbtn"><i class="bi bi-pencil-square"></i></button>
                                </td>
                                <td>
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
                window.location = "user_delete_db.php?id=" + id;
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
                $('#txt_username').val(data[1]);
                $('#txt_password').val(data[2]);
                $('#txt_name').val(data[3]);
                $('#txt_surname').val(data[4]);


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