<?php 

include("../../library/database.php");
include("../../classes/auth.php");

$hasAccount = Auth::ByUsername($_GET["username"]);

if($hasAccount == true) {
    echo json_encode(false);
} else {
    echo json_encode(true);
}

?>