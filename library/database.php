<?php 

/* Connect Database on XAMPP */
function connectDB() {
    $host = "localhost";
    $user = "root";
    $password = "";
    $dbname = "travelvn_db";

    $connect = mysqli_connect($host, $user, $password, $dbname) or die("Không thể kết nối với Máy chủ cơ sở dữ liệu!");
    
    return $connect;
}

function disconnectDB($connect) {
    // mysqli_close($connect);

    $connect -> close();
}


?>

