function FileValidate() {
    (function($) {
        jQuery.validator.addMethod("fileSizeLimit", function(value, element, limit) {
            return !element.files[0] || (element.files[0].size <= limit);
        }, "*Kích Thước Tệp Quá Lớn");
    })(jQuery);
}

function Select() {
    (function($){
        if(document.querySelector(".select2")) {
            $(".select2").select2();
        }
    
        if(document.querySelector(".select2bs4")) {
            $(".select2bs4").select2({
                theme: "bootstrap4"
            });
        }
    })(jQuery);
}

function CalcDate() {
    var today = new Date();

    var dd = String(today.getDate()).padStart(2, '0');
    var mm = String(today.getMonth() + 1).padStart(2, '0'); // January is 0
    var yyyy = today.getFullYear();

    today = dd + '/' + mm + '/' + yyyy;

    return today;
}

function DatePicker() {
    (function($) {
        $.datepicker.regional['vi'] = {
            monthNames: ["Tháng Một", "Tháng Hai", "Tháng Ba", "Tháng Tư", "Tháng Năm", "Tháng Sáu", 
                         "Tháng Bảy", "Tháng Tám", "Tháng Chín", "Tháng Mười", "Tháng Mười Một", "Tháng Mười Hai"],
            dayNames: ['Chủ Nhật', 'Thứ Hai', 'Thứ Ba', 'Thứ Tư', 'Thứ Năm', 'Thứ Sáu', 'Thứ Bảy'],
            dayNamesShort:  ['CN', 'T2', 'T3', 'T4', 'T5', 'T6', 'T7'],
            dayNamesMin: ['CN', 'T2', 'T3', 'T4', 'T5', 'T6', 'T7'],
            days: ['Chủ Nhật', 'Thứ Hai', 'Thứ Ba', 'Thứ Tư', 'Thứ Năm', 'Thứ Sáu', 'Thứ Bảy'],
        };
        
        $.datepicker.setDefaults($.datepicker.regional['vi']);

        if(document.querySelector(".datepicker1")) {
            $(".datepicker1").datepicker({
                dateFormat: "dd/mm/yy",
                minDate: new Date("01/01/1970"),
                duration: "fast"
            });
        }
    })(jQuery);
}

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
                        $("#AddModalCategory").modal("hide");

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
                });
            }
        });
        // Find Category
        $("#table-category").on("click", "#edit-category", function(e) {
            var table = $("#table-category").DataTable();
            var id = $(this).data("id");
            // Open Modal
            $("#EditModalCategory").modal("show");

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
                                    $("#EditModalCategory").modal("hide");                                                

                                    // Form Input Reset
                                    $("#form-edit-category")[0].reset();
                                }
                            });
                        }
                    });
                }
            });
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
        // Set TinyMCE View
        tinymce.init({
            selector: "textarea#tinymce-content-category-detail",
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

        // View
        $("#table-category").on("click", "#detail-category", function(e) {
            e.preventDefault();
            var id = $(this).data("id");

            $("#DetailModalCategory").modal("show");

            $.ajax({
                url: "../../pages/action/act_category.php",
                data: {
                    id: id, 
                    action: "find-category"
                },
                type: "POST",
                success: function(data) {
                    var response = JSON.parse(data);
                    $("#single-detail-id").val(response.id);
                    $("#single-detail-category").val(response.category);

                    tinymce.get("tinymce-content-category-detail").setContent(response.content);
                    $("#tinymce-content-category-detail").val(response.content);

                    $("#single-detail-create-at").val(response.create_at);
                    $("#single-detail-update-at").val(response.update_at); 
                }
            });
        });
    })(jQuery);
}

function ModalEvent() {
    (function($) {
        $("#table-event").DataTable({
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
                "url" : "../../pages/fetch/data-event.php",
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
        // Create Event
        tinymce.init({
            selector: "textarea#tinymce-header-event-create",
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
                    var getContent = document.querySelector("#gettinymce-header-event-create");
                    getContent.innerHTML = editor.getContent();
                });
            }
        });
        tinymce.init({
            selector: "textarea#tinymce-content-event-create",
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
                    var getContent = document.querySelector("#gettinymce-content-event-create");
                    getContent.innerHTML = editor.getContent();
                });
            }
        });

        // Set Create Event Date
        $("#datepicker-date-event-create").val(CalcDate());

        $("#form-create-event").validate({
            ignore: "",
            rules : {
                title: {
                    required : true,
                    rangelength : [6, 50]
                },
                header: {
                    required : true,
                    minlength : 50
                },
                content: {
                    required : true,
                    minlength : 50
                },
                images: {
                    required: true,
                    fileSizeLimit: 1000000
                },
                thumbnail: {
                    required: true,
                    fileSizeLimit: 1000000
                },
            },
            messages: {
                title : {
                    required: "*Bạn Chưa Nhập Tựa Đề",
                    rangelength: "*Tựa Đề Chỉ Nhận Từ 6 Đến 50 Ký Tự"
                },
                header : {
                    required: "*Bạn Chưa Nhập Phần Đầu",
                    minlength: "*Phần Đầu Chỉ Nhận Từ 50 Ký Tự Trở Lên"
                },
                content : {
                    required: "*Bạn Chưa Nhập Phần Nội Dung",
                    minlength: "*Phần Nội Dung Chỉ Nhận Từ 50 Ký Tự Trở Lên"
                },
                thumbnail: {
                    required: "*Bạn Chưa Nhập Hình Ảnh 1"
                },
                images: {
                    required: "*Bạn Chưa Nhập Hình Ảnh 2"
                },
            },
            submitHandler: function(form) {
                $.ajax({ 
                    type : "POST",
                    url : "../../pages/action/act_event.php",
                    data : new FormData(form),
                    // dataType: "json",
                    contentType : false,
                    processData :false,
                    // cache : false,
                    success: function (data) {
                       myTable = $("#table-event").DataTable();
                       
                       myTable.ajax.reload();
                        // Close Modal
                        $("#AddModalEvent").modal("hide");

                        // TinyMCE Reset
                        tinymce.get("tinymce-header-event-create").setContent("");
                        $("#gettinymce-header-event-create").html("");

                        tinymce.get("tinymce-content-event-create").setContent("");
                        $("#gettinymce-content-event-create").html("");

                        // Form Input Reset
                        $("#form-create-event")[0].reset();

                        // Reset Select2
                        $("#select2-category-event-create").select2({
                            theme : "bootstrap4",
                            tag : [] // Set Tag
                        });

                        // Reset Date
                        $("#datepicker-date-event-create").val(CalcDate());
                    }
                });
            }
        });
        // Edit Event
        tinymce.init({
            selector: "textarea#tinymce-header-event-edit",
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
                    var getContent = document.querySelector("#gettinymce-header-event-edit");
                    getContent.innerHTML = editor.getContent();
                });
            }
        });
        tinymce.init({
            selector: "textarea#tinymce-content-event-edit",
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
                    var getContent = document.querySelector("#gettinymce-content-event-edit");
                    getContent.innerHTML = editor.getContent();
                });
            }
        });
        $("#table-event").on("click", "#edit-event", function(e) {
            var table = $("#table-event").DataTable();
            e.preventDefault();
            var id = $(this).data("id");

            $("#EditModalEvent").modal("show");

            $.ajax({
                url: "../../pages/action/act_event.php",
                data: {
                    id: id, 
                    action: "find-event"
                },
                type : "POST",
                success : function(data) { 
                    var response = JSON.parse(data);

                    $("#single-edit-id-event").val(response.id);
                    $("#single-edit-title-event").val(response.title);

                    $("#upload-edit-thumbnail-event").attr("src", "../../uploads/thumbnail/"+ response.thumbnail +"");
                    $("#upload-edit-images-event").attr("src", "../../uploads/images/"+ response.images +"");

                    tinymce.get("tinymce-header-event-edit").setContent(response.header);
                    $("#tinymce-header-event-edit").val(response.header);

                    tinymce.get("tinymce-content-event-edit").setContent(response.content);
                    $("#tinymce-content-event-edit").val(response.content);

                    var str = [response.category];
                    var str_stringify = JSON.stringify(str[0]).trim();
                    var arr = str_stringify.split(",");

                    var clear_arr = arr.map(function(el) {
                        return el.replace(/["\\]/g, '');
                    });
                    var values = clear_arr;
                    var select_el = $("#select2-category-event-edit");

                    select_el.val(values);
                    select_el.trigger("change");

                    $("#datepicker-date-event-edit").val(response.datetime);
               
                    // Edit Event
                    // Validate
                    $("#form-edit-event").validate({
                        ignore: "",
                        rules : {
                            title: {
                                required : true,
                                rangelength : [6, 50]
                            },
                            header: {
                                required : true,
                                minlength : 50
                            },
                            content: {
                                required : true,
                                minlength : 50
                            },
                            images: {
                                fileSizeLimit: 1000000
                            },
                            thumbnail: {
                                fileSizeLimit: 1000000
                            },
                        },
                        messages: {
                            title : {
                                required: "*Bạn Chưa Nhập Tựa Đề",
                                rangelength: "*Tựa Đề Chỉ Nhận Từ 6 Đến 50 Ký Tự"
                            },
                            header : {
                                required: "*Bạn Chưa Nhập Phần Đầu",
                                minlength: "*Phần Đầu Chỉ Nhận Từ 50 Ký Tự Trở Lên"
                            },
                            content : {
                                required: "*Bạn Chưa Nhập Phần Nội Dung",
                                minlength: "*Phần Nội Dung Chỉ Nhận Từ 50 Ký Tự Trở Lên"
                            },
                            thumbnail: {},
                            images: {},
                        },
                        submitHandler: function(form) { 
                            $.ajax({
                                type: "POST",
                                url: "../../pages/action/act_event.php",
                                data: new FormData(form),
                                contentType : false,
                                processData :false,
                                success: function (data) {
                                    table = $("#table-event").DataTable();
                                    table.ajax.reload();
                                    
                                    $("#EditModalEvent").modal("hide");
                                    $('#form-edit-event')[0].reset();
                                }
                            });
                        }
                    });
                }
            });
        });
        // Delete Event
        $("#table-event").on("click", "#delete-event", function(e) {
            var table = $("#table-event").DataTable();
            e.preventDefault();
            var id = $(this).data("id");

            if(confirm("Bạn có muốn xóa sự kiện mã "+ id +" này không?")) {
                // Ajax
                $.ajax({
                    url: "../../pages/action/act_event.php",
                    data: {
                        id: id, 
                        action: "delete-event"
                    },
                    type: "POST",
                    success: function(data) {
                        // Check Status
                    }
                });
            }
        });
        // View Event
        tinymce.init({
            selector: "textarea#tinymce-header-event-detail",
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

        tinymce.init({
            selector: "textarea#tinymce-content-event-detail",
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

        $("#table-event").on("click", "#detail-event", function(e) {
            var table = $("#table-event").DataTable();
            e.preventDefault();
            var id = $(this).data("id");

            $("#DetailModalEvent").modal("show");

            $.ajax({
                url: "../../pages/action/act_event.php",
                data: {
                    id: id,
                    action: "find-event"
                },
                type: "POST",
                success: function(data) {
                    var response = JSON.parse(data);

                    $("#single-detail-id-event").val(response.id);
                    $("#single-detail-title-event").val(response.title);
        
                    $("#upload-detail-thumbnail-event").attr("src", "../../uploads/thumbnail/"+ response.thumbnail +"");
                    $("#upload-detail-images-event").attr("src", "../../uploads/images/"+ response.images +"");
        
                    tinymce.get("tinymce-header-event-detail").setContent(response.header);
                    tinymce.get("tinymce-content-event-detail").setContent(response.content);
        
                    var str = [response.category];
                    var str_stringify = JSON.stringify(str[0]).trim();
                    var arr = str_stringify.split(",");
        
                    var clear_arr = arr.map(function(el) {
                        return el.replace(/["\\]/g, '');
                    });
                    var values = clear_arr;
                    var select_el = $("#select2-category-event-detail");
        
                    select_el.val(values);
                    select_el.trigger("change");
        
                    $("#datepicker-date-event-detail").val(response.datetime);
                    $("#single-detail-create-at-event").val(response.create_at);
                    $("#single-detail-update-at-event").val(response.update_at);
                }
            });
        });
    })(jQuery);
}

function ModalLocation() {
    $("#table-location").DataTable({
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
            "url" : "../../pages/fetch/data-location.php",
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
}

if(document.getElementById("table-category")) {
    ModalCategory();
}

if(document.getElementById("table-event")) {
    ModalEvent();
}

if(document.getElementById("table-location")) {
    ModalLocation();
}


Validate();
Select();
FileValidate();
DatePicker();