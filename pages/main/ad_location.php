<?php 

session_start();

include("../../library/database.php");
include("../../classes/auth.php");

?>

<!-- DOCTYPE -->
<!DOCTYPE html>
<html lang="en">
<head>
    <title>PHP TravelVN | Trang Khu Vực</title>
    <?php include("../../pages/includes/admin/head.php"); ?>
    <!-- Leaflet -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.css">
    <!-- End Leaflet -->
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
                            <h1>Khu Vực</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Trang Chủ</a></li>
                                <li class="breadcrumb-item active">Khu Vực</li>
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
                                        <a data-id="" data-toggle="modal" data-target="#AddModalLocation" class="btn btn-success text-white">
                                            <i class="bx bx-plus"></i> Tạo Mới
                                        </a>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <table id="table-location" class="table table-bordered table-hover nowrap datatables">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Khu Vực</th>
                                                <th>Ký Tự</th>
                                                <th>Thành Phố</th>
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

    <?php include("../../pages/includes/modal/location.php"); ?>
    <!-- Script -->
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>
    <!-- End Script -->
    <?php include("../../pages/includes/admin/script.php"); ?>
</body>
</html>