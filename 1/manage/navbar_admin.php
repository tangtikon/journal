<?php ob_start(); 
if($_SESSION['logStatus'] != 1){
  header("location:page-login.php");
  exit();
}
?>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Sarabun:wght@300&display=swap');

    .navbar a {
        font-weight: 400 !important;
        font-size: 20px !important;
        color: #F4F6F7 !important;
        font-family: 'Sarabun', sans-serif;

    }

    div.nav_a {
        font-family: 'Sarabun', sans-serif;
        color: #283747;
        font-size: 16px;
        font-weight: bold;
    }
</style>

<nav class="navbar navbar-expand-sm navbar-dark" style="background-color: #0B5345 ;">
    <!-- <div class="col col-1"></div> -->
    <div class="container-fluid">
        <a class="navbar-brand" href="#"><img src="img/icon1.png" style="width:50px;height:50px;"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="page-user.php">จัดการผู้ใช้งาน</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="page-admin.php">จัดการแอดมิน</a>
                </li>



            </ul>
        </div>
    </div>
    <!-- This is what is not working well -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <?php $name = $_SESSION['name'];
                $surname = $_SESSION['surname'];
                echo $name, " ", $surname; ?>
            </a>

            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                
                <a class="dropdown-item" href="checklogout.php">
                    <div class="nav_a">
                        ออกจากระบบ
                    </div>
                </a>

            </div>
        </li>
    </ul>

</nav>