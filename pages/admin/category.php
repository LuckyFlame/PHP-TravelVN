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
                                <div class="card-header">
                                    <div class="btn-create">
                                        <a data-id="" data-toggle="modal" data-target="#createModal" class="btn btn-success text-white"><i class="bx bx-plus"></i> Tạo Mới</a>
                                    </div>
                                </div>
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
    <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="../admin/category" id="form-create-category" class="form form-modal-design" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tạo Mới</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><i class="bx bx-x"></i></span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="field-modal">
                            <label class="form-label">Thể Loại</label>
                            <input type="text" class="form-control" name="category">
                        </div>
                        <div class="field-modal-textarea">
                            <label class="form-label">Nội Dung</label>
                            <textarea name="content" rows="4" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                        <button type="submit" name="action" value="create_category" class="btn btn-primary">Lưu Thay Đổi</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="../admin/category" id="form-update-category" class="form form-modal-design" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Cập Nhật</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><i class="bx bx-x"></i></span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="field-modal d-none">
                            <label class="form-label">Id</label>
                            <input type="text" class="form-control" name="id" id="id">
                        </div>
                        <div class="field-modal">
                            <label class="form-label">Thể Loại</label>
                            <input type="text" class="form-control" name="category" id="get_single_category" value="">
                        </div>
                        <div class="field-modal-textarea">
                            <label class="form-label">Nội Dung</label>
                            <textarea name="content" rows="4" class="form-control" id="get_single_content"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                        <button type="submit" name="action" value="update_category" class="btn btn-primary">Lưu Thay Đổi</button>
                    </div>
                </form>
            </div>
        </div>
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
                // "dom": 'ftip',
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

            $("#form-create-category").validate({
                rules : {
                    category : {
                        required : true,
                        rangelength : [3, 25],
                    },
                    content : {
                        required : true,
                        // rangelength : [6, 30],
                        minlength : 6
                    },
                }, 
                messages: {
                    category : {
                        required : "*Bạn Chưa Nhập Thể Loại",
                        rangelength: "*Thể Loại Chỉ Nhận Từ 3 Đến 25 Ký Tự"
                    },
                    content : {
                        required : "*Bạn Chưa Nhập Nội Dung",
                        // rangelength : "*Mật Khẩu Chỉ Nhận Từ 6 Đến 30 Ký Tự"
                        minlength : "*Nội Dung Phải Từ 6 Ký Tự Trở Lên"
                    }
                },
                submitHandler: function(form) {
                    // form.submit();
                    // console.log($(form).serializeArray());
                    $.ajax({
                        type : "POST",
                        url : "../action/category_action.php",
                        data : $(form).serializeArray(),
                        success: function (data) {
                            my_table = $("#table-category").DataTable();
                            my_table.draw();
                            $("#createModal").modal("hide");
                            $("#form-create-category").trigger("reset");
                        }
                    });
                }
            });

            $("#table-category").on("click", ".edit-category", function(e) {
                var table = $("#table-category").DataTable();
                var id = $(this).data("id");
                var trid = $(this).closest('tr').attr('id');

                $("#updateModal").modal("show");

                $.ajax({
                    url : "../single/get_category.php",
                    data : {id : id},
                    type : "POST",
                    success : function(data) {
                        var json = JSON.parse(data);

                        $("#get_single_category").val(json.category);
                        $("#get_single_content").val(json.content);
                        $('#id').val(id);
                    }
                });

            });

            $("#table-category").on("click", ".delete-category", function(e) {
                var table = $("#table-category").DataTable();

                e.preventDefault();

                var id = $(this).data("id");

                if(confirm("Bạn có muốn xóa thể loại này không?")) {
                    $.ajax({
                        url : "../action/category_action.php",
                        data : {id : id, action : "delete_category"},
                        type : "POST",
                        success : function(data) {
                            $("#table-category #"+id).remove();
                        }
                    });
                }
            });

            $("#form-update-category").validate({
                rules : {
                    category : {
                        required : true,
                        rangelength : [3, 25],
                    },
                    content : {
                        required : true,
                        // rangelength : [6, 30],
                        minlength : 6
                    },
                }, 
                messages: {
                    category : {
                        required : "*Bạn Chưa Nhập Thể Loại",
                        rangelength: "*Thể Loại Chỉ Nhận Từ 3 Đến 25 Ký Tự"
                    },
                    content : {
                        required : "*Bạn Chưa Nhập Nội Dung",
                        // rangelength : "*Mật Khẩu Chỉ Nhận Từ 6 Đến 30 Ký Tự"
                        minlength : "*Nội Dung Phải Từ 6 Ký Tự Trở Lên"
                    }
                },
                submitHandler: function(form) {
                    
                    // form.submit();
                    // console.log($(form).serializeArray());

                    $.ajax({
                        type : "POST",
                        url : "../action/category_action.php",
                        data : $(form).serializeArray(),
                        success: function (data) {
                            my_table = $("#table-category").DataTable();

                            // my_table.draw();
                            my_table.ajax.reload();
                            $("#updateModal").modal("hide");

                        }
                    });
                }
            });
        })(jQuery);
    </script>

</body>
</html>