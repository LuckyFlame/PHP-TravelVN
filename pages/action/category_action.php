<?php 

include("/xampp/htdocs/php-travelvn/library/database.php");
include("/xampp/htdocs/php-travelvn/classes/category.php");

date_default_timezone_set('Asia/Ho_Chi_Minh');

// print_r($_POST);
if(!empty($_POST["action"])) {

    $action = $_POST["action"];

    if($action == "create_category") {
        $category = $_POST["category"];
        $content = $_POST["content"];

        $create_at = date('j/n/Y - g:i a');
        $update_at = "";

        $create_category = new Category($category, $content, $create_at, $update_at);

        Category::Create($create_category);

    }


    if($action == "update_category") {
        print_r($_POST);

        $id = $_POST["id"];
        $category = $_POST["category"];
        $content = $_POST["content"];

        $create_at = "";
        $update_at = date('j/n/Y - g:i a');

        $create_category = new Category($category, $content, $create_at, $update_at);

        Category::Update($id, $create_category);

    }

    if($action == "delete_category") {
        $id = $_POST["id"];

        Category::Delete($id);

    }

}

?>