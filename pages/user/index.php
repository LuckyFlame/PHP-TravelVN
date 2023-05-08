<?php 
    session_start();

    include("/xampp/htdocs/php-travelvn/library/database.php");
    include("/xampp/htdocs/php-travelvn/classes/auth.php");
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP-TravelVN | Trang Chủ</title>
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
    ?>

    <?php 
        include("../includes/script.php");
    ?>
</body>
</html>