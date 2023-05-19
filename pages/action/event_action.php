<?php 

include("../../library/database.php");
include("../../classes/event.php");
include("../../classes/category.php");

date_default_timezone_set('Asia/Ho_Chi_Minh');

if(!empty($_POST["action"])) {

    $action = $_POST["action"];

    if($action == "create_event") {
        print_r($_POST);

        die();
    }
}

?>