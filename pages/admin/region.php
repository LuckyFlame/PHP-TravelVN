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
    <title>PHP-TravelVN | Trang Khu Vực</title>
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
            
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="btn-create">
                                        <a data-id="" data-toggle="modal" data-target="#createModalRegion" class="btn btn-success text-white"><i class="bx bx-plus"></i> Tạo Mới</a>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <table id="table-region" class="table table-bordered table-hover nowrap" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Khu Vực</th>
                                                <th>Ký Tự</th>
                                                <th>Nội Dung</th>
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
    
    <?php include("../includes/modal/md_region.php") ?>
    <?php include("../includes/script_v2.php") ?>

    <script type="text/javascript">
        // DataTable
        $("#table-region").DataTable({
            
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
                "url" : "../fetch/data_region.php",
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

        tinymce.init({
            selector: "textarea._tmce-content-region-create",
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
                    var getContent = document.querySelector("._getTmce-content-region-create");

                    getContent.innerHTML = editor.getContent();
                });
            }
        });

        // Create Region
        $("#form-create-region").validate({
            ignore: "",
            rules : {
                region : {
                    required : true,
                    rangelength : [3, 50],
                },
                acronym : {
                    // required : true,
                    rangelength : [2, 10],
                },
                content : {
                    required : true,
                    minlength : 6
                },
            }, 
            messages: {
                region : {
                    required : "*Bạn Chưa Nhập Khu Vực",
                    rangelength: "*Khu Vực Chỉ Nhận Từ 3 Đến 50 Ký Tự"
                },
                acronym : {
                    // required : "*Bạn Chưa Nhập Phần Ký Tự",
                    rangelength : "*Phần Ký Tự Chỉ Nhận Từ 2 Đến 10 Ký Tự"
                },
                content : {
                    required : "*Bạn Chưa Nhập Nội Dung",
                    minlength : "*Nội Dung Phải Từ 6 Ký Tự Trở Lên"
                }
            },
            submitHandler: function(form) {
                $.ajax({
                    type : "POST",
                    url : "../../pages/action/region_action.php",
                    data : $(form).serializeArray(),
                    success: function (data) {

                        my_table = $("#table-region").DataTable();
                        my_table.ajax.reload();
                        
                        $("#createModalRegion").modal("hide");

                        tinymce.get("_tmce-content-region-create").setContent("");
                        $("._getTmce-content-region-create").html("");

                        $('#form-create-region')[0].reset();
                    }
                });
            }
        });


        tinymce.init({
            selector: "textarea._tmce-content-region-update",
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
                    var getContent = document.querySelector("._getTmce-content-region-update");

                    getContent.innerHTML = editor.getContent();

                     // Find Region
                     $("#table-region").on("click", ".edit-region", function(e) {
                        var table = $("#table-region").DataTable();
                        var id = $(this).data("id");

                        $("#updateModalRegion").modal("show");

                        $.ajax({
                            url : "../../pages/action/region_action.php",
                            data : {id : id, action : "find_region"},
                            type : "POST",
                            success : function(data) {
                                var json = JSON.parse(data);

                                $('#ip_update_region_id').val(id);
                                $("#ip_update_region_region").val(json.region);
                                $("#ip_update_region_acronym").val(json.acronym);
                                $("#ip_update_region_coordinates").val(json.coordinates);

                                // val
                                tinymce.get("_tmce-content-region-update").setContent(json.content);
                                $("#_tmce-content-region-update").val(json.content);

                                // Update region
                                $("#form-update-region").validate({
                                    ignore: "",
                                    rules : {
                                        region : {
                                            required : true,
                                            rangelength : [3, 50],
                                        },
                                        acronym : {
                                            // required : true,
                                            rangelength : [2, 10],
                                        },
                                        content : {
                                            required : true,
                                            minlength : 6
                                        },
                                    }, 
                                    messages: {
                                        region : {
                                            required : "*Bạn Chưa Nhập Khu Vực",
                                            rangelength: "*Khu Vực Chỉ Nhận Từ 3 Đến 50 Ký Tự"
                                        },
                                        acronym : {
                                            // required : "*Bạn Chưa Nhập Phần Ký Tự",
                                            rangelength : "*Phần Ký Tự Chỉ Nhận Từ 2 Đến 10 Ký Tự"
                                        },
                                        content : {
                                            required : "*Bạn Chưa Nhập Nội Dung",
                                            minlength : "*Nội Dung Phải Từ 6 Ký Tự Trở Lên"
                                        }
                                    },
                                    submitHandler: function(form) {
                                        $.ajax({
                                            type : "POST",
                                            url : "../../pages/action/region_action.php",
                                            data : $(form).serializeArray(),
                                            success: function (data) {
                                                my_table = $("#table-region").DataTable();
                                                my_table.ajax.reload();
                                                
                                                $("#updateModalRegion").modal("hide");

                                                $('#form-update-region')[0].reset();

                                            }
                                        });
                                    }
                                });
                            }
                        });
                    });
                });
            }
        });

        // TinyMCE View
        tinymce.init({
            selector: "textarea._tmce-content-region-view",
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
        });

        // View region
        $("#table-region").on("click", ".view-region", function(e) {
            var table = $("#table-region").DataTable();
            var id = $(this).data("id");

            $("#viewModalRegion").modal("show");

            $.ajax({
                url : "../../pages/action/region_action.php",
                data : {id : id, action : "find_region"},
                type : "POST",
                success : function(data) {
                    var json = JSON.parse(data);

                    $('#ip_view_region_id').val(id);
                    $("#ip_view_region_region").val(json.region);
                    $("#ip_view_region_acronym").val(json.acronym);
                    $("#ip_view_region_coordinates").val(json.coordinates);

                    // val
                    tinymce.get("ip_view_region_content").setContent(json.content);

                    $("#ip_view_region_create_at").val(json.create_at);
                    $("#ip_view_region_update_at").val(json.update_at);
                }
            });

        });

        // Delete region
        $("#table-region").on("click", ".delete-region", function(e) {
            var table = $("#table-region").DataTable();
            e.preventDefault();
            var id = $(this).data("id");

            if(confirm("Bạn có muốn xóa thể loại này không?")) {
                $.ajax({
                    url : "../../pages/action/region_action.php",
                    data : {id : id, action : "delete_region"},
                    type : "POST",
                    success : function(data) {
                        $("#table-region #"+id).remove();
                        my_table = $("#table-region").DataTable();
                        my_table.ajax.reload();
                    }
                });
            }
        });

    </script>
</body>
</html>