<!-- Navbar -->
<div class="navbar-menu">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand">
            <img src="../../assets/img/logo.png" alt="" width="40" height="40" class="logo-img">
            <span class="logo-name">TravelVN</span>
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
                
                <?php 

                if(isset($_SESSION["user"])) {
                    $user = $_SESSION["user"];
                    $get_auth = Auth::Login($user);

                    ?>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="bx bx-user"></i>
                            <?php echo $user ?>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="">Thông Tin</a>
                            <a class="dropdown-item" id="logout-user" href="../../pages/main/logout">Đăng Xuất</a>
                        </div>
                    </li>

                    <?php
                } else {
                    ?>

                    <li class="nav-item">
                        <a href="" class="nav-link nav-button pl-2 pr-2">Đăng Nhập</a>
                    </li>

                    <?php
                }

                ?>
            </ul>
        </div>
    </nav>
</div>
<!-- Navbar End -->