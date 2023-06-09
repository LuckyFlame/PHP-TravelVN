<?php 

session_start();

include("../../library/database.php");
include("../../classes/auth.php");
include("../../classes/location.php");

$list_location = Location::Read();

?>

<!-- DOCTYPE -->
<!DOCTYPE html>
<html lang="en">
<head>
    <title>PHP TravelVN | Trang Tour</title>
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
                            <h1>Sản Phẩm</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Trang Chủ</a></li>
                                <li class="breadcrumb-item active">Sản Phẩm</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Main content -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <div>
                                        <a data-id="" data-toggle="modal" data-target="#AddModalTour" class="btn btn-success text-white">
                                            <i class="bx bx-plus"></i> Tạo Mới
                                        </a>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <table id="table-tour" class="table table-bordered table-hover nowrap datatables">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Tựa Đề</th>
                                                <th>Giá Tiền</th>
                                                <th>Hình Ảnh</th>
                                                <th>Số Ngày</th>
                                                <th>Số Chỗ</th>
                                                <th>Thao Tác</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <?php include("../../pages/includes/admin/footer.php"); ?>
    </div>

    <?php include("../../pages/includes/modal/tour.php"); ?>
    <?php include("../../pages/includes/admin/script.php"); ?>
</body>
</html>