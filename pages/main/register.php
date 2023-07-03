<!-- DOCTYPE -->
<!DOCTYPE html>
<html lang="en">
<head>
    <title>PHP TravelVN | Đăng Ký</title>
    <?php include("../includes/head.php"); ?>
</head>
<body>
    <?php include("../includes/load.php"); ?>

    <!-- Section Content -->
    <section class="section section-register">
        <div class="container">
            <div class="logo">
                <img src="../../assets/img/logo.png" alt="" width="40" height="40" class="logo-img">
                <span class="logo-name">TravelVN</span>
            </div>
            <form action="../../pages/main/register" class="form form-register" id="form-register" method="POST" enctype="multipart/form-data">
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
                <div class="field">
                    <div class="input-field phone-field">
                        <input type="text" placeholder="Nhập Số Điện Thoại" name="phone">
                        <i class="bx bx-phone"></i>
                    </div>
                </div>
                <div class="field">
                    <div class="input-field email-field">
                        <input type="text" placeholder="Nhập Email" name="email">
                        <i class="bx bx-envelope"></i>
                    </div>
                </div>
                <div class="button-submit">
                    <button type="submit" name="action" value="register">Đăng Ký</button>
                </div>
                <div class="other-link">
                    <span>Bạn đã có tài khoản? <a href="../../pages/main/login">Đăng Nhập</a></span>
                </div>
            </form>
        </div>
    </section>
    <!-- End Section Content -->

    <?php include("../includes/script.php"); ?>
</body>
</html>