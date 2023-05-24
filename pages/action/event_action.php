<?php 

include("../../library/database.php");
include("../../classes/event.php");
include("../../classes/category.php");

date_default_timezone_set('Asia/Ho_Chi_Minh');

if(!empty($_POST["action"])) {

    $action = $_POST["action"];

    if($action == "create_event") {

        // print_r($_POST);
        // print_r($_FILES);
        // die();

        $title = $_POST["title"];
        $date = $_POST["date"];
        $header = $_POST["header"];
        $content = $_POST["content"];
        $create_at = date('j/n/Y - g:i a');
        $update_at = "";

        if(!empty($_POST["category"])) {
            $replace = array('[', ']', '"');

            $category = str_replace($replace, "", json_encode($_POST["category"], JSON_UNESCAPED_UNICODE));
        } else {
            $category = "";
        }

        // Extension

        $images = $_FILES["images"]["name"];
        $imagesTmpName = $_FILES["images"]["tmp_name"];
        
        $imagesExtension = explode(".", $images);
        $imagesExtension = strtolower(end($imagesExtension));

        $imagesRand = rand() . "." . $imagesExtension;

        $folderImages = "../../uploads/images";
        $pathImages = $folderImages . "/" . $imagesRand;


        $thumbnail = $_FILES["thumbnail"]["name"];
        $thumbnailTmpName = $_FILES["thumbnail"]["tmp_name"];

        $thumbnailExtension = explode(".", $thumbnail);
        $thumbnailExtension = strtolower(end($thumbnailExtension));

        $thumbnailRand = rand() . "." . $thumbnailExtension;

        $folderThumbnail = "../../uploads/thumbnail";
        $pathThumbnail = $folderThumbnail . "/" . $thumbnailRand;

        move_uploaded_file($imagesTmpName, $pathImages);
        move_uploaded_file($thumbnailTmpName, $pathThumbnail);

        $create_event = new Event($title, $imagesRand, $thumbnailRand, $header, $content, $date, $create_at, $update_at, $category);
        Event::Create($create_event);
    }

    if($action == "update_event") {
        // print_r($_POST);
        // print_r($_FILES);
        // die();
        $id = $_POST["id"];

        $title = $_POST["title"];
        $date = $_POST["date"];
        $header = $_POST["header"];
        $content = $_POST["content"];
        $create_at = "";
        $update_at = date('j/n/Y - g:i a');

        if(!empty($_POST["category"])) {
            $replace = array('[', ']', '"');

            $category = str_replace($replace, "", json_encode($_POST["category"], JSON_UNESCAPED_UNICODE));
        } else {
            $category = "";
        }

        $findEvent = Event::Find_Action_Update($id);

        
        // Extension

        $imagesRand = "";
        $thumbnailRand = "";

        if((isset($_FILES["images"])) && (!$_FILES["images"]["error"])) {
            $images = $_FILES["images"]["name"];
            $imagesTmpName = $_FILES["images"]["tmp_name"];
            $imagesExtension = explode(".", $images);
            $imagesExtension = strtolower(end($imagesExtension));

            $imagesRand = rand() . "." . $imagesExtension;

            $folderImages = "../../uploads/images";
            $pathImages = $folderImages . "/" . $imagesRand;

            unlink($folderImages . "/" . $findEvent[0]["images"]);
            move_uploaded_file($imagesTmpName, $pathImages);

        } else {
            $imagesRand = $findEvent[0]["images"];
        }

        if((isset($_FILES["thumbnail"])) && (!$_FILES["thumbnail"]["error"])) {
            $thumbnail = $_FILES["thumbnail"]["name"];
            $thumbnailTmpName = $_FILES["thumbnail"]["tmp_name"];

            $thumbnailExtension = explode(".", $thumbnail);
            $thumbnailExtension = strtolower(end($thumbnailExtension));

            $thumbnailRand = rand() . "." . $thumbnailExtension;

            $folderThumbnail = "../../uploads/thumbnail";
            $pathThumbnail = $folderThumbnail . "/" . $thumbnailRand;

            unlink($folderThumbnail . "/" . $findEvent[0]["thumbnail"]);
            move_uploaded_file($thumbnailTmpName, $pathThumbnail);

        } else {
            $thumbnailRand = $findEvent[0]["thumbnail"];

        }

        $create_event = new Event($title, $imagesRand, $thumbnailRand, $header, $content, $date, $create_at, $update_at, $category);
        Event::Update($id, $create_event);

    }

    if($action == "find_event") {
        $id = $_POST["id"];

        Event::Find($id);

    }

    if($action == "delete_event") {
        $id = $_POST["id"];

        Event::Delete($id);

    }
}

?>