<?php 
    session_start();

    include("/xampp/htdocs/php-travelvn/library/database.php");
    include("/xampp/htdocs/php-travelvn/classes/auth.php");

    if(isset($_SESSION["user"])) {
        if(!empty($_GET["id"])) {
            $user = $_SESSION["user"];
            $id = $_GET["id"];

            if($id != str_replace("=", "", base64_encode($user))) {
                die("*Lỗi Khác ID Đăng Nhập Mà Bạn Đăng Nhập");
            } else {
    
            }
        } else {
            die("*Lỗi Bỏ Trống ID");
        }
    }
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP-TravelVN | Thông Tin</title>
    <?php 
        include("../includes/head.php");
    ?>
</head>
<body>

    <!-- Loader Start -->
    <div class="loader">
        <div class="shape"></div>
    </div>
    <!-- Loader End -->

    <?php 
        include("../includes/user/header.php");
    ?>

    <!-- Section Profile -->
    <section class="section section-profile">
        <div class="container rounded bg-light mt-5">
            <div class="row">
                <div class="col-md-4 border-right">
                    <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                        <img src="https://cdn-icons-png.flaticon.com/512/149/149071.png" alt="" class="rounded-circle mt-5" width="90">
                        <span class="h5 font-weight-bold mt-1 mb-1">user1234</span>
                        <span class="">user1234@gmail.com</span>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="p-3 py-5">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <a href="" class="d-flex flex-row align-items-center link back">
                                <i class="bx bx-horizontal-left mr-1 mb-1"></i>
                                <h6>Trở về trang chủ</h6>
                            </a>
                            <h6>Cập Nhật Thông Tin</h6>
                        </div>
                        <form class="form" id="form-profile">
                            <div class="row">
                                <div class="col-md-6 mt-3 pr-md-1">
                                    <input type="text" class="input" placeholder="Họ Tên">
                                </div>
                                <div class="col-md-6 mt-3 pl-md-1">
                                    <input type="text" class="input" placeholder="Email">
                                </div>
                                <div class="col-md-6 mt-3 pr-md-1">
                                    <input type="text" class="input" placeholder="Số Điện Thoại">
                                </div>
                                <div class="col-md-6 mt-3 pl-md-1">
                                    <input type="text" class="input input-datepicker" placeholder="Ngày Sinh">
                                </div>
                                <div class="col-md-6 mt-3 pr-md-1">
                                    <div class="select-menu">
                                        <div class="select-button">
                                            <span class="select-title">Giới Tính</span>
                                            <i class="bx bx-chevron-down"></i>
                                            <input type="text" class="input-gender" value="" hidden>
                                        </div>
                                        <ul class="select-option" role-style="none">
                                            <li>
                                                <span class="option-title">Nam</span>
                                            </li>
                                            <li>
                                                <span class="option-title">Nữ</span>
                                            </li>
                                            <li>
                                                <span class="option-title">Khác</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-5 text-right">
                                <button class="btn btn-primary profile-button">Lưu Thông Tin</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Section Profile End -->

    <?php 
        include("../includes/script.php");
    ?>
</body>
</html>