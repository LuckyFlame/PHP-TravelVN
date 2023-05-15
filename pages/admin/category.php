<?php 
    session_start();

    include("/xampp/htdocs/php-travelvn/library/database.php");
    include("/xampp/htdocs/php-travelvn/classes/auth.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PHP-TravelVN | Trang Thể Loại</title>
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
                            <h1>Thể Loại</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Trang Chủ</a></li>
                                <li class="breadcrumb-item active">Thể Loại</li>
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
                                <div class="card-body">
                                    <table id="table-category" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Thể Loại</th>
                                                <th>Nội Dung</th>
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
        <?php include("../includes/admin/footer.php") ?>
    </div>
    <?php include("../includes/script_v2.php") ?>
    <script type="text/javascript">
        (function($) {
            $("#table-category").DataTable({
                "language": {
                    url : "//cdn.datatables.net/plug-ins/1.13.4/i18n/vi.json",
                },
                "serverSide" : true,
                "autoWidth": false,
                "processing" : false,
                "padding" : true,
                "order" : [],
                "ajax" : {
                    "url" : "../fetch/data_category.php",
                    "type" : "POST",
                },
                "fnCreatedRow" : function(nRow, aData, iDataIndex) {
                    $(nRow).attr("id", aData[0]);
                },
                "columnDefs" : [{
                    "target" : [0, 3],
                    "orderable" : false,
                }],
            });
        })(jQuery);

    </script>

</body>
</html>