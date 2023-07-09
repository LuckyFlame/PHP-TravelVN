<?php

// Test Run
// print_r($_POST);

// Include Class
// Database
include("../../library/database.php");
// Location
include("../../classes/location.php");

if(!empty($_POST["action"])) {
    $action = $_POST["action"];

    // Create Location
    if($action == "submit-create-location") {
        $area = $_POST["area"];
        $acronym = $_POST["acronym"];
        $city = $_POST["city"];
        
        $create_location = new Location($area, $acronym, $city);

        Location::Create($create_location);
    }

    // Update Location
    if($action == "submit-edit-location") {
      
    }
    
    // Find Location
    if($action == "find-location") {
        $id = $_POST["id"];

        Location::JSE_Find($id);
    }

    // Delete Location
    if($action == "delete-location") {
        
    }
}

?>