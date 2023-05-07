<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP-TravelVN | Đăng Nhập</title>
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
<body>

    <!-- Loader Start -->
    <div class="loader">
        <div class="shape"></div>
    </div>
    <!-- Loader End -->

    <!-- Start With Form -->
    <!-- Login Start -->
    <section class="section-login">
        <div class="container">
            <span class="title">
                <img src="../assets/images/logo.png" alt="" width="40" height="40">
                <span class="logo-title">TravelVN</span>
            </span>
            <form action="../pages/login.php" class="form" id="form-login" enctype="multipart/form-data">
                <div class="req-data"></div>
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
                <div class="field field-flex">
                    <div class="input-check">
                        <label for="remember">
                            <input type="checkbox" name="remember">
                            <span class="text">Ghi nhớ</span>
                        </label>
                    </div>
                    <div class="forgot-password">
                        <a href="" class="link">Quên mật khẩu?</a>
                    </div>
                </div>
                <div class="input-field button">
                    <!-- <input type="submit" value="Đăng Nhập" class="input"> -->
                    <button type="submit" name="action" value="login">Đăng Nhập</button>
                </div>
                <div class="create-account">
                    <span>Bạn chưa có tài khoản? <a href="../pages/register">Đăng ký</a></span>
                </div>
            </form>
        </div>
    </section>
    <!-- Login End -->

    <!-- JavaScript / Jquery -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script type="text/javascript" src="../assets/js/validate.js"></script>
    <script type="text/javascript" src="../assets/js/app.js"></script>
    <script type="text/javascript">
        (function($) {

            // Validate
            $("#form-login").validate({
                rules : {
                    username : {
                        required : true,
                        // rangelength : [6, 20],
                    },
                    password : {
                        required : true,
                        // rangelength : [6, 30],
                    }
                }, 
                messages: {
                    username : {
                        required : "*Bạn Chưa Nhập Tài Khoản",
                        // rangelength: "*Tài Khoản Chỉ Nhận Từ 6 Đến 20 Ký Tự"
                    },
                    password : {
                        required : "*Bạn Chưa Nhập Mật Khẩu",
                        // rangelength : "*Mật Khẩu Chỉ Nhận Từ 6 Đến 30 Ký Tự"
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
                            $(".req-data").html(data);
                        }
                    });
                }
            });
        })(jQuery);
    </script>
</body>
</html>