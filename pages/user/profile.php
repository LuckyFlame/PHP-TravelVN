<?php 
    session_start();

    include("../../library/database.php");
    include("../../classes/auth.php");

?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP-TravelVN | Thông Tin</title>
    <?php 
        include("../includes/head.php");
    ?>
</head>
<body>

    <!-- Loader Start -->
    <div class="loader">
        <div class="shape"></div>
    </div>
    <!-- Loader End -->

    <?php 
        include("../includes/user/header.php");


        if(isset($_SESSION["user"])) {
            if(!empty($_GET["id"])) {
                $user = $_SESSION["user"];
                $id = $_GET["id"];
    
                if($id != str_replace("=", "", base64_encode($user))) {
                    
                } else {
                    $getAuth = Auth::ByProfile($user);
                }
    
            } else {
                
            }
        }
    ?>

    <!-- Section Profile -->
    <section class="section section-profile">
        <div class="container rounded mt-5 card-profile bg-light">
            <div class="row">
                <div class="col-md-4 border-right">
                    <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                        <img src="../../assets/img/user8-128x128.jpg" alt="" class="rounded-circle mt-5" width="100">
                        <span class="h5 font-weight-bold mt-1 mb-1"><?php echo $getAuth["username"]; ?></span>
                        <span class=""><?php echo $getAuth["email"] ?></span>
                    </div>
                    <div class="d-block text-left p-3">
                        <div class="profile-feedback">
                            <span class="text">Đánh Giá: </span>
                            <span class="badge badge-warning">12</span>
                        </div>
                        <div class="profile-booking">
                            <span class="text">Đặt Tour: </span>
                            <span class="badge badge-info">05</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="p-3 py-5">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <a href="../user/index" class="d-flex flex-row align-items-center link back">
                                <i class="bx bx-horizontal-left mr-1 mb-1"></i>
                                <h6>Trở về trang chủ</h6>
                            </a>
                            <h6>Cập Nhật Thông Tin</h6>
                        </div>
                        <form action="../user/profile.php" method="POST" class="form" id="form-profile" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-6 mt-3 pr-md-1">
                                    <input type="text" class="input" name="fullname" placeholder="Họ Tên" value="<?php echo $getAuth["fullname"] ?>">
                                </div>
                                <div class="col-md-6 mt-3 pl-md-1">
                                    <input type="text" class="input" name="email" placeholder="Email" value="<?php echo $getAuth["email"] ?>">
                                </div>
                                <div class="col-md-6 mt-3 pr-md-1">
                                    <input type="text" class="input" name="phone" placeholder="Số Điện Thoại" value="<?php echo $getAuth["phone"] ?>">
                                </div>
                                <div class="col-md-6 mt-3 pl-md-1">
                                    <input type="text" class="input input-datepicker" name="dob" placeholder="Ngày Sinh" value="<?php echo $getAuth["dob"] ?>" readonly>
                                </div>
                                <div class="col-md-6 mt-3 pr-md-1">
                                    <div class="select-menu">
                                        <div class="select-button hasActive">
                                            <span class="select-title"><?php echo (empty($getAuth["gender"])) ? "Khác" : $getAuth["gender"] ?></span>
                                            <i class="bx bx-chevron-down"></i>
                                            <input type="text" class="input-gender" name="gender" value="<?php echo (empty($getAuth["gender"])) ? "" : $getAuth["gender"] ?>" hidden>
                                        </div>
                                        <ul class="select-option" role-style="none">
                                            <li>
                                                <span class="option-title">Nam</span>
                                            </li>
                                            <li>
                                                <span class="option-title">Nữ</span>
                                            </li>
                                            <li>
                                                <span class="option-title">Khác</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-6 mt-3 pl-md-1 d-none">
                                    <input type="text" class="input" name="id" placeholder="Mã ID" value="<?php echo $getAuth["id"] ?>">
                                </div>
                            </div>
                            <div class="mt-5 text-right">
                                <button type="submit" class="btn btn-primary profile-button" name="action" value="save-profile">Lưu Thông Tin</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Section Profile End -->

    <?php 
        include("../includes/script.php");
    ?>

    <script type="text/javascript">
        (function($) {
            $("#form-profile").validate({
                rules : {
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
                    phone : {
                        required : "*Số Điện Thoại Không Được Bỏ Trống",
                        number : "*Số Điện Thoại Phải Là Ký Số",
                        rangelength : "*Số Điện Thoại Phải Đủ 10 Ký Số"
                    },
                    email : {
                        required : "*Email Không Được Bỏ Trống",
                        email : "*Email Không Đúng Định Dạng",
                    }
                },
                submitHandler: function(form) {
                    // form.submit();
                    // console.log($(form).serializeArray());

                    $.ajax({
                        type : "POST",
                        url : "../action/auth_action.php",
                        data : $(form).serializeArray(),
                        success: function (data) {
                            window.location = window.location.href;
                        }
                    });
                }
            });
        })(jQuery);
    </script>
</body>
</html>