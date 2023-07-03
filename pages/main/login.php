<!-- DOCTYPE -->
<!DOCTYPE html>
<html lang="en">
<head>
    <title>PHP TravelVN | Đăng Nhập</title>
    <?php include("../includes/head.php"); ?>
    <style>
        .request-message {
            color: #D93025 !important;
            font-size: 0.85rem !important;
            font-weight: 400 !important;
            margin-bottom: 0.25rem !important;
        }
    </style>
</head>
<body>
    <?php include("../includes/load.php"); ?>

    <!-- Section Content -->
    <section class="section section-login">
        <div class="container">
            <div class="logo">
                <img src="../../assets/img/logo.png" alt="" width="40" height="40" class="logo-img">
                <span class="logo-name">TravelVN</span>
            </div>
            <form action="../../pages/main/login" class="form form-login" id="form-login" method="POST" enctype="multipart/form-data">
                <div id="request-message-login" class="request-message"></div>
                <div class="field">
                    <div class="input-field user-field">
                        <input type="text" placeholder="Nhập Tài Khoản" name="username">
                        <i class="bx bx-user"></i>
                    </div>
                </div>
                <div class="field">
                    <div class="input-field password-field">
                        <input type="password" placeholder="Nhập Mật Khẩu" name="password">
                        <i class="bx bx-lock-alt"></i>
                    </div>
                </div>
                <div class="field field-flex">
                    <div class="remember-me">
                        <input type="checkbox" name="cb-remember">
                        <label class="mb-0" for="cb-remember">Ghi Nhớ</label>
                    </div>
                    <div class="forgot-password">
                        <a href="" class="link">Quên mật khẩu?</a>
                    </div>
                </div>
                <div class="button-submit">
                    <button type="submit" name="action" value="login">Đăng Nhập</button>
                </div>
                <div class="other-link">
                    <span>Bạn chưa có tài khoản? <a href="../../pages/main/register">Đăng ký</a></span>
                </div>
            </form>
        </div>
    </section>
    <!-- End Section Content -->

    <?php include("../includes/script.php"); ?>
</body>
</html>