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

    <!-- Create Category -->
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
                            <textarea name="content" rows="4" class="form-control tinymce _tmce-content-category-create"></textarea>
                            <textarea name="content" rows="4" class="form-control _getTmce-content-category-create" hidden></textarea>
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

    <!-- Update Category -->
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
                            <input type="text" class="form-control" name="id" id="single_edit_id">
                        </div>
                        <div class="field-modal">
                            <label class="form-label">Thể Loại</label>
                            <input type="text" class="form-control" name="category" id="single_edit_category" value="">
                        </div>
                        <div class="field-modal-textarea">
                            <label class="form-label">Nội Dung</label>
                            <textarea name="content" rows="4" name="content" id="single_edit_content" class="form-control _tmce-content-category-update"></textarea>
                            <textarea name="content" rows="4" class="form-control _getTmce-content-category-update" hidden></textarea>

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

    <!-- View Category -->
    <div class="modal fade" id="viewModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="../admin/category" id="form-view-category" class="form form-modal-design" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Xem Thông Tin</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><i class="bx bx-x"></i></span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="field-modal d-none">
                            <label class="form-label">Id</label>
                            <input type="text" class="form-control" name="id" id="single_view_id" readonly>
                        </div>
                        <div class="field-modal">
                            <label class="form-label">Thể Loại</label>
                            <input type="text" class="form-control" name="category" id="single_view_category" value="" readonly>
                        </div>
                        <div class="field-modal-textarea">
                            <label class="form-label">Nội Dung</label>
                            <textarea name="content" rows="4" class="form-control _tmce-content-category-view" id="single_view_content"></textarea>
                        </div>
                        <div class="field-modal">
                            <label class="form-label">Ngày Tạo</label>
                            <input type="text" class="form-control" name="category" id="single_view_create_at" value="" readonly>
                        </div>
                        <div class="field-modal">
                            <label class="form-label">Ngày Cập Nhật</label>
                            <input type="text" class="form-control" name="category" id="single_view_update_at" value="" readonly>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php include("../includes/script_v2.php") ?>
    <script type="text/javascript">
        (function($) {
            // DataTable
            $("#table-category").DataTable({
                "language": {
                    url : "//cdn.datatables.net/plug-ins/1.13.4/i18n/vi.json",
                },
                "serverSide" : true,
                "autoWidth": false,
                "processing" : true,
                "padding" : true,
                "order" : [],
                "dom" : "ftip",
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

            // Create Category
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

            // Find Category
            $("#table-category").on("click", ".edit-category", function(e) {
                var table = $("#table-category").DataTable();
                var id = $(this).data("id");
                // var trid = $(this).closest('tr').attr('id');

                $("#updateModal").modal("show");

                $.ajax({
                    url : "../action/category_action.php",
                    data : {id : id, action : "find_category"},
                    type : "POST",
                    success : function(data) {
                        var json = JSON.parse(data);

                        $('#single_edit_id').val(id);
                        $("#single_edit_category").val(json.category);

                        // Content
                        tinymce.get("single_edit_content").setContent(json.content);
                        $("#single_edit_content").val(json.content);
                    }
                });
            });

            // View Category
            $("#table-category").on("click", ".view-category", function(e) {
                var table = $("#table-category").DataTable();
                var id = $(this).data("id");
                // var trid = $(this).closest('tr').attr('id');

                $("#viewModal").modal("show");

                $.ajax({
                    url : "../action/category_action.php",
                    data : {id : id, action : "find_category"},
                    type : "POST",
                    success : function(data) {
                        var json = JSON.parse(data);

                        $('#single_view_id').val(id);
                        $("#single_view_category").val(json.category);

                        tinymce.get("single_view_content").setContent(json.content);
                        $("#single_view_content").val(json.content);

                        $("#single_view_create_at").val(json.create_at);
                        $("#single_view_update_at").val(json.update_at);
                    }
                });

            });

            // Delete Category
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

            // Update Category
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

            // TinyMCE Create
            tinymce.init({
                selector: "textarea._tmce-content-category-create",
                width : "100%",
                height : "300",
                mode : "textareas",
                // editor_selector : "mceEditor",
                // editor_deselector : "mceNoEditor",
                statubar : true,
                menubar : true,
                element_format : 'html',
                block_unsupported_drop : false,
                language : 'vi',
                // Remove Logo and Upgrade and Resize
                branding: false,
                promotion: false,
                resize: false,
                //
                menubar : 'view | insert | format | tools',
                // formats: {
                //     bold: {
                //         inline: 'b'
                //     },
                //     italic: {
                //         inline: 'i'
                //     },
                //     underline: {
                //         inline: 'u'
                //     },
                //     div: {
                //         block: 'div',
                //         wrapper: true
                //     },
                //     // blockquote: { block: 'blockquote', classes: 'col', wrapper: true },
                // },
                setup : function(editor, ed) {
                    editor.on('init keydown change', function(e) {
                        document.querySelector("._getTmce-content-category-create").innerHTML = editor.getContent();
                    });
                }
            });

            // TinyMCE Update
            tinymce.init({
                selector: "textarea._tmce-content-category-update",
                width : "100%",
                height : "300",
                mode : "textareas",
                // editor_selector : "mceEditor",
                // editor_deselector : "mceNoEditor",
                statubar : true,
                menubar : true,
                element_format : 'html',
                block_unsupported_drop : false,
                language : 'vi',
                // Remove Logo and Upgrade and Resize
                branding: false,
                promotion: false,
                resize: false,
                //
                menubar : 'view | insert | format | tools',
                // formats: {
                //     bold: {
                //         inline: 'b'
                //     },
                //     italic: {
                //         inline: 'i'
                //     },
                //     underline: {
                //         inline: 'u'
                //     },
                //     div: {
                //         block: 'div',
                //         wrapper: true
                //     },
                //     // blockquote: { block: 'blockquote', classes: 'col', wrapper: true },

                // },
                setup : function(editor, ed) {
                    editor.on('init keydown change', function(e) {
                        document.querySelector("._getTmce-content-category-update").innerHTML = editor.getContent();
                    });
                }
            });
            
            // TinyMCE View
            tinymce.init({
                selector: "textarea._tmce-content-category-view",
                width : "100%",
                height : "300",
                mode : "textareas",
                statubar : true,
                menubar : true,
                element_format : 'html',
                block_unsupported_drop : false,
                language : 'vi',           
                readonly : true,
                // Remove Logo and Upgrade and Resize
                branding: false,
                promotion: false,
                resize: false,
                //
                menubar : 'view | insert | format | tools',
                // formats: {
                //     bold: {
                //         inline: 'b'
                //     },
                //     italic: {
                //         inline: 'i'
                //     },
                //     underline: {
                //         inline: 'u'
                //     },
                //     div: {
                //         block: 'div',
                //         wrapper: true
                //     },
                //     // blockquote: { block: 'blockquote', classes: 'col', wrapper: true },

                // },
            });
        })(jQuery);
    </script>

</body>
</html>