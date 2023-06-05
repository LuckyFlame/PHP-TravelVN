<?php 

include("../../library/database.php");
include("../../classes/region.php");

date_default_timezone_set('Asia/Ho_Chi_Minh');

if(!empty($_POST["action"])) {

    $action = $_POST["action"];

    if($action == "create_region") {
        $region = $_POST["region"];
        $acronym = $_POST["acronym"];
        $content = $_POST["content"];
        $coordinates = $_POST["coordinates"];

        $create_at = date('j/n/Y - g:i a');
        $update_at = "";

        $create_region = new Region($region, $acronym, $content, $coordinates, $create_at, $update_at);

        Region::Create($create_region);
    }

    if($action == "update_region") {
        $id = $_POST["id"];
        $region = $_POST["region"];
        $acronym = $_POST["acronym"];
        $content = $_POST["content"];
        $coordinates = $_POST["coordinates"];

        $create_at = "";
        $update_at = date('j/n/Y - g:i a');

        $create_region = new Region($region, $acronym, $content, $coordinates, $create_at, $update_at);

        Region::Update($id, $create_region);
    }

    if($action == "delete_region") {
        $id = $_POST["id"];

        Region::Delete($id);
    }

    if($action == "find_region") {
        $id = $_POST["id"];

        Region::Find($id);
    }

}

?>