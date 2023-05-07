<?php 

include("/xampp/htdocs/php-travelvn/library/database.php");
include("/xampp/htdocs/php-travelvn/classes/auth.php");

$hasAccount = Auth::ByUsername($_GET["username"]);

if($hasAccount == true) {
    echo json_encode(false);
} else {
    echo json_encode(true);
}

?>