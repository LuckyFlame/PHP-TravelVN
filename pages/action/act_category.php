<?php

// Test Run
// print_r($_POST);

// Include Class
// Database
include("../../library/database.php");
// Category
include("../../classes/category.php");

if(!empty($_POST["action"])) {
    $action = $_POST["action"];

    // Create
    if($action == "submit-create-category") {
        $category = $_POST["category"];
        $content = $_POST["content"];

        $create_category = new Category($category, $content);
        Category::Create($create_category);
    }

    // Update Category
    if($action == "submit-edit-category") {
        $id = $_POST["id"];
        $category = $_POST["category"];
        $content = $_POST["content"];

        $create_category = new Category($category, $content);
        Category::Update($id, $create_category);
    }
    
    // Find Category
    if($action == "find-category") {
        $id = $_POST["id"];

        Category::JSE_Find($id);
    }

    // Delete Category
    if($action == "delete-category") {
        
    }
}

?>