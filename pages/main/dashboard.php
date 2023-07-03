<?php 

session_start();

include("../../library/database.php");
include("../../classes/auth.php");

?>

<!-- DOCTYPE -->
<!DOCTYPE html>
<html lang="en">
<head>
    <title>PHP TravelVN | Trang Điều Khiển</title>
    <?php include("../../pages/includes/admin/head.php"); ?>
</head>
<body>
    <?php include("../../pages/includes/load.php"); ?>

    <div class="wrapper">
        <?php include("../../pages/includes/admin/sidebar.php"); ?>
        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Trang Chủ</h1>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xl-3 col-lg-6 col-md-6 col-12">
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>150</h3>
                                <p>Đơn Đặt Hàng</p>
                            </div>
                            <div class="icon">
                                <i class="bx bx-shopping-bag"></i>
                            </div>
                            <a href="#" class="small-box-footer">Xem Chi Tiết <i class="bx bx-right-arrow-circle"></i></a>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-md-6 col-12">
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3>15</h3>
                                <p>Đã Thanh Toán</p>
                            </div>
                            <div class="icon">
                                <i class="bx bx-wallet"></i>
                            </div>
                            <a href="#" class="small-box-footer">Xem Chi Tiết <i class="bx bx-right-arrow-circle"></i></a>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-md-6 col-12">
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3>254</h3>
                                <p>Doanh Thu</p>
                            </div>
                            <div class="icon">
                                <i class="bx bx-dollar"></i>
                            </div>
                            <a href="#" class="small-box-footer">Xem Chi Tiết <i class="bx bx-right-arrow-circle"></i></a>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-md-6 col-12">
                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h3>7</h3>
                                <p>Đánh Giá</p>
                            </div>
                            <div class="icon">
                                <i class="bx bx-edit"></i>
                            </div>
                            <a href="#" class="small-box-footer">Xem Chi Tiết <i class="bx bx-right-arrow-circle"></i></a>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <?php include("../../pages/includes/admin/footer.php"); ?>
    </div>

    <?php include("../../pages/includes/admin/script.php"); ?>
</body>
</html>