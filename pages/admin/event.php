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
    <title>PHP-TravelVN | Trang Sự Kiện</title>
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
                                    <table id="table-event" class="table table-bordered table-hover" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Tựa Đề</th>
                                                <th>Ảnh</th>
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
                    "target" : [0, 3],
                    "orderable" : false,
                }],
            });

            jQuery.validator.addMethod('fileSizeLimit', function(value, element, limit) {
                return !element.files[0] || (element.files[0].size <= limit);
            }, "Kích Thước Tệp Quá Lớn");

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
                    date : {
                        required : true,
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
                    date : {
                        required : "*Bạn Chưa Nhập Ngày"
                    },
                    images : {
                        required : "*Bạn Chưa Nhập Hình Ảnh 1"
                    },
                    thumbnail : {
                        required : "*Bạn Chưa Nhập Hình Ảnh 2"
                    },
                },
                submitHandler: function(form) {
                    // form.submit();
                    // console.log($(form).serializeArray());
                    $.ajax({
                        type : "POST",
                        url : "../../pages/action/event_action.php",
                        data : $(form).serializeArray(),
                        success: function (data) {
                            
                        }
                    });
                }
            });

            // TinyMCE Create
            tinymce.init({
                selector: "textarea._tmce-header-event-create",
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
                formats: {
                    // bold: {
                    //     inline: 'b'
                    // },
                    // italic: {
                    //     inline: 'i'
                    // },
                    // underline: {
                    //     inline: 'u'
                    // },
                    // div: {
                    //     block: 'div',
                    //     wrapper: true
                    // },
                    // blockquote: { block: 'blockquote', classes: 'col', wrapper: true },
                },
                setup : function(editor, ed) {
                    editor.on('init keydown change', function(e) {
                        document.querySelector("._getTmce-header-event-create").innerHTML = editor.getContent();
                    });
                }
            });

            tinymce.init({
                selector: "textarea._tmce-content-event-create",
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
                formats: {
                    // bold: {
                    //     inline: 'b'
                    // },
                    // italic: {
                    //     inline: 'i'
                    // },
                    // underline: {
                    //     inline: 'u'
                    // },
                    // div: {
                    //     block: 'div',
                    //     wrapper: true
                    // },
                    // blockquote: { block: 'blockquote', classes: 'col', wrapper: true },
                },
                setup : function(editor, ed) {
                    editor.on('init keydown change', function(e) {
                        document.querySelector("._getTmce-content-event-create").innerHTML = editor.getContent();
                    });
                }
            });

            $("#form-create-event .input-datepicker").datepicker({
                dateFormat: "dd/mm/yy",
                minDate: new Date("01/01/1970"),
                duration: "fast",
            });

        })(jQuery);
    </script>

</body>
</html>