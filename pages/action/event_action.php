<?php 

include("../../library/database.php");
include("../../classes/event.php");
include("../../classes/category.php");

date_default_timezone_set('Asia/Ho_Chi_Minh');

if(!empty($_POST["action"])) {

    $action = $_POST["action"];

    if($action == "create_event") {
        // print_r($_POST);
        // print_r($_FILES["images"]["name"]);
        // print_r($_FILES["thumbnail"]["name"]);

        // die();
        // $title = $_POST["title"];
        // $date = $_POST["date"];
        // $header = $_POST["header"];
        // $content = $_POST["content"];
        // $create_at = date('j/n/Y - g:i a');
        // $update_at = "";

        // if(!empty($_POST["category"])) {
        //     $category = $_POST["category"];
        // } else {
        //     $category = [];
        // }
     
        print_r($_POST["category"]);
        die();

  
        // Extension

        // $images = $_FILES["images"]["name"];
        // $imagesTmpName = $_FILES["images"]["tmp_name"];
        
        // $imagesExtension = explode(".", $images);
        // $imagesExtension = strtolower(end($imagesExtension));

        // $imagesRand = rand() . "." . $imagesExtension;

        // $folderImages = "../../uploads/images";
        // $pathImages = $folderImages . "/" . $imagesRand;


        // $thumbnail = $_FILES["thumbnail"]["name"];
        // $thumbnailTmpName = $_FILES["thumbnail"]["tmp_name"];

        // $thumbnailExtension = explode(".", $thumbnail);
        // $thumbnailExtension = strtolower(end($thumbnailExtension));

        // $thumbnailRand = rand() . "." . $thumbnailExtension;

        // $folderThumbnail = "../../uploads/thumbnail";
        // $pathThumbnail = $folderThumbnail . "/" . $thumbnailRand;

        // if(move_uploaded_file($imagesTmpName, $pathImages) && move_uploaded_file($thumbnailTmpName, $pathThumbnail)) {
        //     $create_event = new Event($title, $imagesRand, $thumbnailRand, $header, $content, $date, $create_at, $update_at, $category);
        //     Event::Create($create_event);

        // }
    }
}

?>