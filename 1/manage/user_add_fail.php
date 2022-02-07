<!DOCTYPE html>
<html>
<title>เข้าสู่ระบบ</title>
<link rel="icon" href="img/icon1.png" type="image/icon">

<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Sarabun:wght@300&display=swap');

    div.txt1 {

        font-family: 'Sarabun', sans-serif;
        color: #212F3D;
        font-size: 24px;
        font-weight: bold;

    }

    .modal {
        position: absolute;
        float: left;
        left: 50%;
        top: 50%;
        transform: translate(-50%, -50%);
    }
</style>

<body>
    <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-body">
                    <div class="txt1 text-center">
                        ชื่อผู้ใช้ซ้ำโปรดระบุชื่อผู้ใช้ใหม่<br>
                    </div>

                </div>
                <div class="modal-footer">
                    <div class="text-center">
                        <button type="button" class="btn btn-danger btn-lg " onclick="location.href='page-user.php';" data-dismiss="modal">ตกลง</button>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <script type="text/javascript">
        $(window).on('load', function() {
            $('#myModal').modal('show');
        });
    </script>
</body>

</html>