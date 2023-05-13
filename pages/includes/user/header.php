<!-- Header Start -->
<header class="header">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand">
            <img src="/php-travelvn/assets/img/logo.png" alt="" width="40" height="40">
            <span class="logo-title">TravelVN</span>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a href="/php-travelvn/pages/user/index" class="nav-link">Trang Chủ</a>
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
                <?php 
                    if(isset($_SESSION["user"])) {
                        $user = $_SESSION["user"];
                        $getAuth = Auth::ByUsername($user);
                        ?>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="bx bx-user"></i>
                                    <?php echo $user ?>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                    <a class="dropdown-item" href="/php-travelvn/pages/user/profile<?php echo "?id=" . str_replace("=", "", base64_encode($user)); ?>">Thông Tin</a>
                                    <a class="dropdown-item" href="/php-travelvn/pages/logout">Đăng Xuất</a>
                                </div>
                            </li>
                        <?php
                    } else {
                        ?>
                            <li class="nav-item">
                                <a href="/php-travelvn/pages/login" class="nav-link nav-button pl-2 pr-2">Đăng Nhập</a>
                            </li>
                        <?php
                    }
                ?>
            </ul>
        </div>
    </nav>
</header>
<!-- Header End -->