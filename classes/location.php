<?php 

/* Call Date Default Time Zone Asia */

include("../../library/timezone.php");

/* Create Class Name Location */

Class Location {

    // Location
    public $area, $acronym, $city;

    // Create Location
    public $create_at;

    // Update Location
    public $update_at;

    public function __construct($area, $acronym, $city) {
        $this->area = $area;
        $this->acronym = $acronym;
        $this->city = $city;
    }

    // CREATE : UPDATE : DELETE: READ : FIND : JSE_FIND [FIND BY ID LIMIT 1]

    public static function Create(Location $location) {
        $connect = connectDB();
        $date = date('j/n/Y - g:i a');

        $sql = "INSERT INTO `location` (`area`, `acronym`, `city`, `create_at`)
                VALUES ('$location->area', '$location->acronym', '$location->city', '$date')";
        
        $result = $connect->query($sql);
        disconnectDB($connect);
        return $result;
    }

    public static function Update($id, Location $location) {
        $connect = connectDB();
        $date = date('j/n/Y - g:i a');

        $sql = "UPDATE `location` SET `area` = '$location->area', `acronym` = '$location->acronym', `city` = '$location->city', 
                `update_at` = '$date' WHERE `location`.`id` = '$id'";

        $result = $connect->query($sql);
        disconnectDB($connect);
        return $result;
    }

    public static function Delete($id) {
        $connect = connectDB();

        $sql = "DELETE FROM `location` WHERE `location`.`id` = '$id'";

        $result = $connect->query($sql);
        disconnectDB($connect);
        return $result;
    }

    public static function Read() {
        $connect = connectDB();

        $sql = "SELECT * FROM `location`";

        $result = $connect->query($sql);
       
        if($result === false) {

        } else {
            $array = array();

            while($row = $result->fetch_assoc()) {
                $array[] = $row;
            }
            // while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            //     $array = $row;
            // }
        }

        $connect->close();
        return $array;
    }

    public static function Find($id) {
        $connect = connectDB();

        $sql = "SELECT * FROM `location` WHERE `id` = '$id'";
        $result = $connect->query($sql);

        if ($result === false) {

        } else {
            $array = array();

            while ($row = $result->fetch_assoc()) {
                $array = $row;
            }
            // while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            //     $array = $row;
            // }
        }

        disconnectDB($connect);
        return $array;
    }

    public static function JSE_Find($id) {
        $connect = connectDB();

        $sql = "SELECT * FROM `location` WHERE `id` = '$id' LIMIT 1";

        $result = $connect->query($sql);
        $row = mysqli_fetch_assoc($result);

        disconnectDB($connect);
        echo json_encode($row);
    }
}

?>