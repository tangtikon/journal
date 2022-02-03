<!DOCTYPE html>
<html>
<title>เข้าสู่ระบบ</title>


<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <link rel="icon" href="img/icon.png" type="image/icon">
   <!--ห้ามลบ-->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>

   <script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>
   <!-- <scrip src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"> -->
   <!-- </script> -->

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.3/css/bootstrap.min.css" />


   <!-- Bootstrap Font Icon CSS -->
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet">


</head>
<style>
   .btn-download,
   .btn-download:active,
   .btn-download:visited {
      background-color: #117864 !important;
   }

   .color-text {
      color: #ffffff;
      font-weight: bold;
   }

   .btn-download:hover {
      background-color: #F4D03F !important;
      transition: all 1s ease;
      -webkit-transition: all 1s ease;
      -moz-transition: all 1s ease;
      -o-transition: all 1s ease;
      -ms-transition: all 1s ease;
   }

   .btn-link {
      border: none;
      outline: none;
      background: none;
      cursor: pointer;
      color: none;
      padding: 0;
      text-decoration: none;
      font-family: none;
      font-size: none;
      text-align: left;
   }

   .card {
      margin: 0 auto;
      /* Added */
      float: none;
      /* Added */
      margin-bottom: 10px;
      /* Added */
      border-top: 0;
      border-bottom: 0;
      border-left: 0;
      border-right: 0;

   }
</style>

<body>
   <br><br><br>
   <div class="container">
      <div class="row d-flex justify-content-center">
         <div class="text-center">
            <img src="img/Logo.png" style="width:516px;height:102px;">
         </div>
         <br>

         <div class="col-md-4">
            <br><br>
            <div class="card">
               <div class="card-body">
                  <form class="form-horizontal" action="checklogin" method="post">

                     <div class="form-group">
                        <div class="col col-offset-6">
                           <input class="form-control" type="text" id="txt_username" name="txt_username" placeholder="ชื่อผู้ใช้" required="true">
                        </div>
                     </div>

                     <div class="form-group">
                        <div class="col col-offset-6">
                           <input class="form-control" type="password" id="txt_password" name="txt_password" placeholder="รหัสผ่าน" required="true">
                        </div>
                     </div>

                     <div class="form-group text-center">
                        <div class="col col-offset-6">
                           <input type="hidden" id="id" name="id" value="">
                           <button class="btn btn-block btn-download color-text " id="bt">ยืนยัน</button>
                        </div>
                     </div>
                     
                  </form>
               </div>
            </div>
         </div>
      </div>
</body>

</html>