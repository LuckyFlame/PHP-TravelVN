<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP-TravelVN | Trang Chủ</title>
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

    <!-- Header Start -->
    <header class="header">
        <nav class="navbar navbar-expand-md navbar-light bg-light">
            <a class="navbar-brand">
                <img src="/php-travelvn/assets/images/logo.png" alt="" width="40" height="40">
                <span class="logo-title">TravelVN</span>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a href="" class="nav-link">Trang Chủ</a>
                    </li>
                    <li class="nav-item">
                        <a href="" class="nav-link">Khách Sạn</a>
                    </li>
                    <li class="nav-item">
                        <a href="" class="nav-link">Dịch Vụ</a>
                    </li>
                    <li class="nav-item">
                        <a href="" class="nav-link">Sự Kiện</a>
                    </li>
                    <li class="nav-item">
                        <a href="" class="nav-link">Liên Hệ</a>
                    </li>
                    <li class="nav-item">
                        <a href="./login.html" class="nav-link nav-button">Đăng Nhập</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <!-- Header End -->

    <?php 
        include("../includes/script.php");
    ?>
</body>
</html>