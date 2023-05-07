<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP-TravelVN | Đăng Ký</title>
    <!-- Favicons -->
    <link rel="icon" type="image/x-icon" href="../assets/images/logo.png">
    <!-- Boxicons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <!-- Bootstrap 4 -->
    <link rel="stylesheet" href="../assets/css/bootstrap.css">
    <!-- CSS / SCSS -->
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/scss/style.scss">
    <!-- Script Loader -->
    <script type="text/javascript" src="../assets/js/loader.js"></script>
    <!-- Script Ajax Bootstrap -->
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

    <!-- Loader Start -->
    <div class="loader">
        <div class="shape"></div>
    </div>
    <!-- Loader End -->

    <!-- Start With Form -->
    <!-- Register Start -->
    <section class="section-register">
        <div class="container">
            <span class="title">
                <img src="../assets/images/logo.png" alt="" width="40" height="40">
                <span class="logo-title">TravelVN</span>
            </span>
            <form action="../pages/register.php" class="form" id="form-register" method="POST" enctype="multipart/form-data">
                <div class="field">
                    <div class="input-field user-field">
                        <input type="text" placeholder="Nhập Tài Khoản" class="input" name="username">
                        <i class="bx bx-user normal-icon"></i>
                    </div>
                </div>
                <div class="field">
                    <div class="input-field password-field">
                        <input type="password" placeholder="Nhập Mật Khẩu" class="input input-password" name="password">
                        <i class="bx bx-show normal-icon"></i>
                    </div>
                </div>
                <div class="field">
                    <div class="input-field phone-field">
                        <input type="text" placeholder="Nhập Số Điện Thoại" class="input input-phone" name="phone">
                        <i class="bx bx-phone normal-icon"></i>
                    </div>
                </div>
                <div class="field">
                    <div class="input-field email-field">
                        <input type="text" placeholder="Nhập Email" class="input input-email" name="email">
                        <i class="bx bx-envelope normal-icon"></i>
                    </div>
                </div>
                <div class="input-field button">
                    <!-- <input type="submit" value="Đăng Ký" class="input" name="register"> -->
                    <button type="submit" name="action" value="register">Đăng Ký</button>
                </div>
                <div class="have-account">
                    <span>Bạn đã có tài khoản? <a href="../pages/login">Đăng nhập</a></span>
                </div>
            </form>
        </div>
    </section>
    <!-- Register End -->

    <!-- JavaScript / Jquery -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script type="text/javascript" src="../assets/js/validate.js"></script>
    <script type="text/javascript" src="../assets/js/app.js"></script>
    <script type="text/javascript">
        (function($) {

            // Validate
            $("#form-register").validate({
                rules : {
                    username : {
                        required : true,
                        rangelength : [6, 20],
                        remote : "check/reg_check.php"
                    },
                    password : {
                        required : true,
                        rangelength : [6, 30],
                    },
                    phone : {
                        required : true,
                        number : true,
                        rangelength : [10, 10],
                    },
                    email : {
                        required : true,
                        email : true,
                    }
                }, 
                messages: {
                    username : {
                        required : "*Bạn Chưa Nhập Tài Khoản",
                        rangelength: "*Tài Khoản Chỉ Nhận Từ 6 Đến 20 Ký Tự",
                        remote: "*Tài Khoản Này Đã Tồn Tại",
                    },
                    password : {
                        required : "*Bạn Chưa Nhập Mật Khẩu",
                        rangelength : "*Mật Khẩu Chỉ Nhận Từ 6 Đến 30 Ký Tự"
                    },
                    phone : {
                        required : "*Bạn Chưa Nhập Số Điện Thoại",
                        number : "*Số Điện Thoại Phải Là Ký Số",
                        rangelength : "*Số Điện Thoại Phải Đủ 10 Ký Số"
                    },
                    email : {
                        required : "*Bạn Chưa Nhập Email",
                        email : "*Email Không Đúng Định Dạng",
                    }
                },
                submitHandler: function(form) {
                    // form.submit();
                    // console.log($(form).serializeArray());

                    $.ajax({
                        type : "POST",
                        url : "action/auth_action.php",
                        data : $(form).serializeArray(),
                        success: function (data) {
                            window.location = "../pages/login";
                        }
                    });
                }
            });
        })(jQuery);
    </script>
</body>
</html>
