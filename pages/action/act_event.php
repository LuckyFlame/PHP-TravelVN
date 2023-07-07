<?php 

// Test Run
// print_r($_POST);

// Include Class
// Database
include("../../library/database.php");
// Event
include("../../classes/event.php");
// Category
include("../../classes/category.php");

if(!empty($_POST["action"])) {
    $action = $_POST["action"];

    if($action == "submit-create-event") {
        $title = $_POST["title"];
        $header = $_POST["header"];
        $content = $_POST["content"];
        $date = $_POST["date"];

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

        // Create
        $create_event = new Event($title, $imagesRand, $thumbnailRand, $header, $content, $date, $category);
        
        Event::Create($create_event);
    }

    if($action == "submit-edit-event") {
        $id = $_POST["id"];

        $title = $_POST["title"];
        $header = $_POST["header"];
        $content = $_POST["content"];
        $date = $_POST["date"];

        if(!empty($_POST["category"])) {
            $replace = array('[', ']', '"');
            $category = str_replace($replace, "", json_encode($_POST["category"], JSON_UNESCAPED_UNICODE));
        } else {
            $category = "";
        }

        $findEvent = Event::Find($id);

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
            $imagesRand = $findEvent["images"];
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
            $thumbnailRand = $findEvent["thumbnail"];
        }

        $create_event = new Event($title, $imagesRand, $thumbnailRand, $header, $content, $date, $category);
        Event::Update($id, $create_event);
    }

    if($action == "find-event") {
        $id = $_POST["id"];

        Event::JSE_Find($id);
    }

    if($action == "delete-event") {

    }
}

?>