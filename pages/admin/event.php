<?php 
    session_start();

    include("../../library/database.php");
    include("../../classes/auth.php");
    include("../../classes/category.php");

    $listCategory = Category::List();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PHP-TravelVN | Trang Sự Kiện</title>
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
                            <h1>Sự Kiện</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Trang Chủ</a></li>
                                <li class="breadcrumb-item active">Sự Kiện</li>
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
                                        <a data-id="" data-toggle="modal" data-target="#createModalEvent" class="btn btn-success text-white"><i class="bx bx-plus"></i> Tạo Mới</a>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <table id="table-event" class="table table-bordered table-hover nowrap" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Tựa Đề</th>
                                                <th>Phần Đầu</th>
                                                <th>Hình Ảnh</th>
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

    <?php include("../includes/modal/md_event.php") ?>
    <?php include("../includes/script_v2.php") ?>

    <script type="text/javascript">
        (function($) {
            
            $("#form-create-event .input-datepicker").val(calcDate());

            // Select 2
            $('.select2').select2();

            $('.select2bs4').select2({
                theme: "bootstrap4",
            });

            // Validate
            jQuery.validator.addMethod('fileSizeLimit', function(value, element, limit) {
                return !element.files[0] || (element.files[0].size <= limit);
            }, "Kích Thước Tệp Quá Lớn");

            $("#form-create-event .input-datepicker").datepicker({
                dateFormat: "dd/mm/yy",
                minDate: new Date("01/01/1970"),
                duration: "fast",
            });


            // DataTable
            $("#table-event").DataTable({
                
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
                "order" : [],
                "dom" : "ftip",
                "ajax" : {
                    "url" : "../fetch/data_event.php",
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

            // TinyMCE Create
            tinymce.init({
                selector: "textarea._tmce-header-event-create",
                width : "100%",
                height : "300",
                mode : "textareas",
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
                formats: {

                },
                setup : function(editor, ed) {
                    editor.on('init keydown change', function(e) {
                        var getContent = document.querySelector("._getTmce-header-event-create");

                        getContent.innerHTML = editor.getContent();
                    });
                }
            });

            tinymce.init({
                selector: "textarea._tmce-content-event-create",
                width : "100%",
                height : "300",
                mode : "textareas",
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
                formats: {

                },
                setup : function(editor, ed) {
                    editor.on('init keydown change', function(e) {
                        var getContent2 = document.querySelector("._getTmce-content-event-create");

                        getContent2.innerHTML = editor.getContent();
                    });
                }
            });


            // Create Event
            $("#form-create-event").validate({
                ignore: "",
                rules : {
                    title : {
                        required : true,
                        rangelength : [3, 25],
                    },
                    header : {
                        required : true,
                        minlength : 6
                    },
                    content : {
                        required : true,
                        minlength : 6
                    },
                    images : {
                        required : true,
                        fileSizeLimit: 1000000
                    },
                    thumbnail : {
                        required : true,
                        fileSizeLimit: 1000000
                    },
                }, 
                messages: {
                    title : {
                        required : "*Bạn Chưa Nhập Tựa Đề",
                        rangelength: "*Tựa Đề Chỉ Nhận Từ 3 Đến 25 Ký Tự"
                    },
                    header : {
                        required : "*Bạn Chưa Nhập Phần Đầu",
                        minlength: "*Phần Đầu Chỉ Nhận Từ 6 Ký Tự Trở Lên"
                    },
                    content : {
                        required : "*Bạn Chưa Nhập Phần Nội Dung",
                        minlength: "*Phần Nội Dung Chỉ Nhận Từ 6 Ký Tự Trở Lên"
                    },
                    images : {
                        required : "*Bạn Chưa Nhập Hình Ảnh 1"
                    },
                    thumbnail : {
                        required : "*Bạn Chưa Nhập Hình Ảnh 2"
                    },
                },
                submitHandler: function(form) {
                    $.ajax({ 
                        type : "POST",
                        url : "../../pages/action/event_action.php",
                        data : new FormData(form),
                        // dataType: "json",
                        contentType : false,
                        processData :false,
                        // cache : false,
                        success: function (data) {
                            my_table = $("#table-event").DataTable();
                            my_table.ajax.reload();
                            $("#createModalEvent").modal("hide");

                            tinymce.get("_tmce-content-event-create").setContent("");
                            $("._getTmce-content-event-create").html("");

                            tinymce.get("_tmce-header-event-create").setContent("");
                            $("._getTmce-header-event-create").html("");

                            $("#ip_create_event_date").empty();

                            $('#form-create-event')[0].reset();

                            $("#form-create-event .input-datepicker").val(calcDate());
                        }
                    });
                }
            });

        })(jQuery);
    </script>

</body>
</html>