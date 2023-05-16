<?php 

include("/xampp/htdocs/php-travelvn/library/database.php");

$connect = connectDB();

$id = $_POST["id"];
$sql = "SELECT * FROM `category` WHERE `id`='$id' LIMIT 1";
$query = mysqli_query($connect, $sql);
$row = mysqli_fetch_assoc($query);
echo json_encode($row);

?>