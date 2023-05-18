<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button">
                <i class="bx bx-menu"></i>
            </a>
        </li>
    </ul>
</nav>

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <img src="../../assets/img/logo.png" alt="" class="brand-image logo-img img-circle elevation-3" width="60" height="60">
        <span class="brand-text font-weight-light logo-text">TravelVN</span>
    </a>
    <div class="sidebar">

        <?php
        if(isset($_SESSION["admin"])) {
            $admin = $_SESSION["admin"];
            $getAuth = Auth::ByUsername($admin);
            ?>
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="../../assets/img/user2-160x160.jpg" class="img-circle elevation-2" alt="">
                </div>
                <div class="info">
                    <a href="#" class="d-block"><?php echo $admin ?></a>
                </div>
            </div>
            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <li class="nav-header">Tổng Quan</li>
                    <li class="nav-item">
                        <a href="../../pages/admin/index" class="nav-link">
                            <i class="nav-icon bx bxs-dashboard"></i>
                            <p>Trang Chủ</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon bx bx-user"></i>
                            <p>Tài Khoản</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon bx bx-calendar-check"></i>
                            <p>Lịch Trình</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="../../pages/admin/category" class="nav-link">
                            <i class="nav-icon bx bx-category"></i>
                            <p>Thể Loại</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon bx bx-notepad"></i>
                            <p>Sản Phẩm</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon bx bx-edit-alt"></i>
                            <p>Đánh Giá</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon bx bx-wallet"></i>
                            <p>Hóa Đơn</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon bx bx-chart"></i>
                            <p>Biểu Đồ</p>
                        </a>
                    </li>
                    <li class="nav-header">Thiết Lập</li>
                    <li class="nav-item">
                        <a href="../../pages/logout_v2" class="nav-link">
                            <i class="nav-icon bx bx-log-out"></i>
                            <p>Đăng Xuất</p>
                        </a>
                    </li>
                </ul>
            </nav>
            <?php
        } else {
            header("Location: ../../pages/login");
            exit();
        }
        ?>
    </div>
</aside>