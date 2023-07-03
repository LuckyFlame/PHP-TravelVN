<?php 

// Database
include("../../library/database.php");
// Auth
include("../../classes/auth.php");

$check_auth = Auth::Find($_GET["username"]);

if($check_auth == true) {
    echo json_encode(false);
} else {
    echo json_encode(true);
}

?>