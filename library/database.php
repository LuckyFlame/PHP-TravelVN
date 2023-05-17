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

    $connect->close();
}

function connectPDO() {
    $host = "localhost";
    $user = "root";
    $password = "";
    $dbname = "travelvn_db";

    try {
        $connect = new PDO('mysql:host='.$host.';dbname='.$dbname.'', $user, $password);
    } catch (PDOException $e) {
        print "Không thể kết nối với Máy chủ cơ sở dữ liệu!";
        die();
    }

    return $connect;
}

?>

