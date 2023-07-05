function Validate() {
    (function($) {
        if(document.getElementById("form-login")) {
            $("#form-login").validate({
                rules: {
                    username: {
                        required: true,
                    },
                    password: {
                        required: true,
                    }
                },
                messages: {
                    username: {
                        required: "*Bạn Chưa Nhập Tài Khoản",
                    },
                    password: {
                        required: "*Bạn Chưa Nhập Mật Khẩu",
                    }
                },
                submitHandler: function(form) {
                    // form.submit();
                    // console.log($(form).serializeArray());

                    $.ajax({
                        type: "POST",
                        url: "../../pages/action/act_auth",
                        data: $(form).serializeArray(),
                        success: function (data) {
                            $("#request-message-login").html(data);
                        }
                    });
                }
            });
        }

        if(document.getElementById("form-register")) {
            $("#form-register").validate({
                rules: {
                    username: {
                        required: true,
                        rangelength: [6, 25],
                        remote: "../../pages/action/check_auth",
                    },
                    password: {
                        required: true,
                        rangelength: [6, 50],
                    },
                    phone: {
                        required : true,
                        number : true,
                        rangelength : [10, 10],
                    },
                    email: {
                        required: true,
                        email: true,
                    }
                },
                messages: {
                    username: {
                        required: "*Bạn Chưa Nhập Tài Khoản",
                        rangelength: "*Tài Khoản Chỉ Nhận Từ 6 Đến 25 Ký Tự",
                        remote: "*Tài Khoản Này Đã Tồn Tại",
                    },
                    password: {
                        required: "*Bạn Chưa Nhập Mật Khẩu",
                        rangelength: "*Mật Khẩu Chỉ Nhận Từ 6 Đến 50 Ký Tự",
                    },
                    phone: {
                        required : "*Bạn Chưa Nhập Số Điện Thoại",
                        number : "*Số Điện Thoại Phải Là Ký Số",
                        rangelength : "*Số Điện Thoại Phải Đủ 10 Ký Số",
                    },
                    email: {
                        required : "*Bạn Chưa Nhập Email",
                        email : "*Email Không Đúng Định Dạng",
                    }
                },
                submitHandler: function(form) {
                    // form.submit();
                    // console.log($(form).serializeArray());

                    $.ajax({
                        type: "POST",
                        url: "../../pages/action/act_auth",
                        data: $(form).serializeArray(),
                        success: function (data) {
                            window.location = "../../pages/main/login";
                        }
                    });
                }
            });
        }
    })(jQuery);
}

function ModalCategory() {
    (function($) {
        // DataTable
        $("#table-category").DataTable({
            "language": {
                url : "https://cdn.datatables.net/plug-ins/1.13.4/i18n/vi.json",
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
                "url" : "../../pages/fetch/data-category.php",
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
        tinymce.init({
            selector: "textarea#tinymce-content-category-create",
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
            // Menu
            menubar : 'view | insert | format | tools',
            // Format
            formats: {},
            setup: function(editor, ed) {
                editor.on("init keydown change", function(e) {
                    var getContent = document.querySelector("#gettinymce-content-category-create");
                    getContent.innerHTML = editor.getContent();
                });
            }
        });
        $("#form-create-category").validate({
            ignore: [],
            rules : {
                category : {
                    required : true,
                    rangelength : [3, 25],
                },
                content : {
                    required : true,
                    minlength : 25
                },
            },
            messages: {
                category : {
                    required : "*Bạn Chưa Nhập Thể Loại",
                    rangelength: "*Thể Loại Chỉ Nhận Từ 3 Đến 25 Ký Tự"
                },
                content : {
                    required : "*Bạn Chưa Nhập Nội Dung",
                    minlength : "*Nội Dung Phải Từ 25 Ký Tự Trở Lên"
                }
            },
            submitHandler: function(form) {
                $.ajax({
                    type : "POST",
                    url : "../../pages/action/act_category.php",
                    data : $(form).serializeArray(),
                    success: function (data) {
                        // console.log($(form).serializeArray());
                        myTable = $("#table-category").DataTable();
                        myTable.ajax.reload();
                        
                        // Close Modal
                        $("#AddModelCategory").modal("hide");

                        // TinyMCE Reset
                        tinymce.get("tinymce-content-category-create").setContent("");
                        $("#gettinymce-content-category-create").html("");

                        // Form Input Reset
                        $("#form-create-category")[0].reset();
                    }
                });
            }
        });

        // Edit Category
        tinymce.init({
            selector: "textarea#tinymce-content-category-edit",
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
            // Menu
            menubar : 'view | insert | format | tools',
            // Format
            formats: {},
            setup: function(editor, ed) {
                editor.on("init keydown change", function(e) {
                    var getContent = document.querySelector("#gettinymce-content-category-edit");
                    getContent.innerHTML = editor.getContent();

                    // Find Category
                    $("#table-category").on("click", "#edit-category", function(e) {
                        var table = $("#table-category").DataTable();
                        var id = $(this).data("id");
                        // Open Modal
                        $("#EditModelCategory").modal("show");

                        // Ajax
                        $.ajax({
                            url: "../../pages/action/act_category.php",
                            data: {
                                id: id,
                                action: "find-category"
                            },
                            type: "POST",
                            success: function(data) {
                                var response = JSON.parse(data);
                                $("#single-edit-id").val(response.id);
                                $("#single-edit-category").val(response.category);

                                tinymce.get("tinymce-content-category-edit").setContent(response.content);
                                $("#tinymce-content-category-edit").val(response.content);
                            
                                // Edit Category
                                // Validate
                                $("#form-edit-category").validate({
                                    ignore: "",
                                    rules : {
                                        category : {
                                            required : true,
                                            rangelength : [3, 25],
                                        },
                                        content : {
                                            required : true,
                                            minlength : 25
                                        },
                                    },
                                    messages: {
                                        category : {
                                            required : "*Bạn Chưa Nhập Thể Loại",
                                            rangelength: "*Thể Loại Chỉ Nhận Từ 3 Đến 25 Ký Tự"
                                        },
                                        content : {
                                            required : "*Bạn Chưa Nhập Nội Dung",
                                            minlength : "*Nội Dung Phải Từ 25 Ký Tự Trở Lên"
                                        }
                                    },
                                    submitHandler: function(form) {
                                        $.ajax({
                                            type : "POST",
                                            url : "../../pages/action/act_category.php",
                                            data : $(form).serializeArray(),
                                            success: function (data) {
                                                // console.log($(form).serializeArray());
                                                table = $("#table-category").DataTable();
                                                table.ajax.reload();
                                                
                                                // Close Modal
                                                $("#EditModelCategory").modal("hide");                                                
 
                                                // Form Input Reset
                                                $("#form-edit-category")[0].reset();
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

        // Delete Category
        $("#table-category").on("click", "#delete-category", function(e) {
            var table = $("#table-category").DataTable();
            e.preventDefault();
            var id = $(this).data("id");

            if(confirm("Bạn có muốn xóa thể loại mã "+ id +" này không?")) {
                // Ajax
                $.ajax({
                    url: "../../pages/action/act_category.php",
                    data: {
                        id: id, 
                        action: "delete-category"
                    },
                    type: "POST",
                    success: function(data) {
                        // Check Status
                    }
                });
            }
        });

        // View Category
    })(jQuery);
}

if(document.getElementById("table-category")) {
    ModalCategory();
}

Validate();