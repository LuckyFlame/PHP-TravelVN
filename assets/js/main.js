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

Validate();