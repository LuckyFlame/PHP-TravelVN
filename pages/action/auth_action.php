<?php 

include("/xampp/htdocs/php-travelvn/library/database.php");
include("/xampp/htdocs/php-travelvn/classes/auth.php");

date_default_timezone_set('Asia/Ho_Chi_Minh');

// print_r($_POST);

if(!empty($_POST["action"])) {
    
    $action = $_POST["action"];

    // Register
    if($action == "register") {
        $username = $_POST["username"];
        $password = $_POST["password"];
        $role = 0;

        $email = $_POST["email"];
        $phone = $_POST["phone"];

        // Set Empty
        $fullname = "";
        $gender = "";
        $dob = "";

        $create_at = date('j/n/Y - g:i a');
        $update_at = "";

        $encrypt_password = password_hash($password, PASSWORD_DEFAULT);

        $create_auth = new Auth($username, $encrypt_password, $role, $fullname, $email, $phone, $gender, $dob, $create_at, $update_at);
        Auth::Register($create_auth);
    }

    // Login
    if($action == "login") {
        $username = $_POST["username"];
        $password = $_POST["password"];

        $checkAccount = Auth::ByUsername($username);        

        if($checkAccount == false) {
            echo "*Tài Khoản Không Tồn Tại";
        } else {
            if($checkAccount["password"] != password_verify($password, $checkAccount["password"])) {
                echo "*Mật Khẩu Không Đúng";
            } else {
                session_start();
                if($checkAccount["role"] == 0) {
                    $_SESSION["user"] = $username;
                    ?>
                        <script type="text/javascript">
                            window.location = "../pages/user/index";
                        </script>
                    <?php
                } else if($checkAccount["role"] == 1) {
                    $_SESSION["admin"] = $username;
                    ?>
                        <script type="text/javascript">
                            window.location = "../pages/admin/index";
                        </script>
                    <?php
                }
            }
        }
    }

    if($action == "save-profile") {
        // print_r($_POST);
        $id = $_POST["id"];
        $fullname = $_POST["fullname"];
        $email = $_POST["email"];
        $phone = $_POST["phone"];
        $dob = $_POST["dob"];
        $gender = $_POST["gender"];

        $update_at = date('j/n/Y - g:i a');

        $create_auth = new Auth("", "", "", $fullname, $email, $phone, $gender, $dob, "", $update_at);
        Auth::Update($id, $create_auth);
    }
}

?>