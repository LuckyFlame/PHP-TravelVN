<?php 

// Test Run
// print_r($_POST);

// Include Class
// Database
include("../../library/database.php");
// Auth
include("../../classes/auth.php");


// Check Action

if(!empty($_POST["action"])) {
    $action = $_POST["action"];

    // Register
    if($action == "register") {

        // Primary
        $username = $_POST["username"];

        // Account
        $password = $_POST["password"];
        $role = 0;

        $phone = $_POST["phone"];
        $email = $_POST["email"];

        // Profile
        $fullname = null;
        $gender = null;
        $dob = null;

        $encrypt_password = password_hash($password, PASSWORD_DEFAULT);

        $create_auth = new Auth($username, $encrypt_password, $role, $fullname, $email, $phone, $gender, $dob);

        Auth::Register($create_auth);
    }

    // Login

    if($action == "login") {
        $username = $_POST["username"];
        $password = $_POST["password"];

        $check_account = Auth::Login($username);

        if($check_account == false) {
            echo "*Tài Khoản Không Tồn Tại";
        } else {
            if($check_account["password"] != password_verify($password, $check_account["password"])) {
                echo "*Mật Khẩu Không Chính Xác";
            } else {
                // Session Start
                session_start();

                ?> <script type="text/javascript"> <?php

                // Check Role
                if($check_account["role"] == 0) {
                    $_SESSION["user"] = $username;
                    ?> window.location = "../../pages/main/index";<?php
                }

                if($check_account["role"] == 1) {
                    $_SESSION["admin"] = $username;
                    ?> window.location = "../../pages/main/dashboard";<?php
                }
                ?> </script> <?php
            }
        }
    }
}

?>