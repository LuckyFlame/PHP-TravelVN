<?php 

    session_start();
    include("../../library/database.php");
    include("../../classes/auth.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PHP-TravelVN | Trang Tour</title>
    <style>
        .table p {
            margin-bottom: 0 !important;
            padding-bottom: 0 !important;
        }
    </style>
    <?php include("../includes/head_v2.php") ?>
</head>
<body>

    <!-- Loader Start -->
    <div class="loader">
        <div class="shape"></div>
    </div>
    <!-- Loader End -->

    <div class="wrapper">

        <?php include("../includes/admin/header.php") ?>
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
            
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="btn-create">
                                        <a data-id="" data-toggle="modal" data-target="#createModalTour" class="btn btn-success text-white"><i class="bx bx-plus"></i> Tạo Mới</a>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <table id="table-tour" class="table table-bordered table-hover nowrap" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Tựa Đề</th>
                                                <th>Ngày</th>
                                                <th>Hình Ảnh</th>
                                                <th>Hành Động</th>
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
        <?php include("../includes/admin/footer.php") ?>
    </div>

    <?php include("../includes/script_v2.php") ?>
    <script type="text/javascript">
        // DataTable
        $("#table-tour").DataTable({
            
            "language": {
                url : "//cdn.datatables.net/plug-ins/1.13.4/i18n/vi.json",
            },
            "serverSide" : true,
            "autoWidth": true,
            "processing" : true,
            "padding" : true,
            "scrollX" : true,
            "responsive": true,
            "stateSave": true,
            "colReorder": true,
            "ordering": false,
            "order" : [],
            "dom" : "ftip",
            "ajax" : {
                "url" : "../fetch/data_tour.php",
                "type" : "POST",
            },
            "fnCreatedRow" : function(nRow, aData, iDataIndex) {
                $(nRow).attr("id", aData[0]);
            },
            "columnDefs" : [{
                "target" : [0, 4],
                "orderable" : false,
            }],
        });
    </script>
</body>
</html>