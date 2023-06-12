<?php 

/* Call Date Default Time Zone Asia */

include("../library/timezone.php");

/* Create Class Name Tour */

Class Tour {
    
    // Tour
    public $title, $price, $pr_persons, $pr_childrens, $images, $thumbnail, $content, $days, $num_of_seat, $location;

    // Create Tour
    public $create_at;

    // Update Tour
    public $update_at;

    public function __construct($title, $price, $pr_persons, $pr_childrens, $images, $thumbnail, $content, $days, $num_of_seat, $location) {
        $this->title = $title;
        $this->price = $price;
        $this->pr_persons = $pr_persons;
        $this->pr_childrens = $pr_childrens;
        $this->images = $images;
        $this->thumbnail = $thumbnail;
        $this->content = $content;
        $this->days = $days;
        $this->num_of_seat = $num_of_seat;
        $this->location = $location;
    }

    // CREATE : UPDATE : DELETE: READ : FIND : JSE_FIND [FIND BY ID LIMIT 1]
    public static function Create(Tour $tour) {
        $connect = connectDB();
        $date = date('j/n/Y - g:i a');

        $sql = "INSERT INTO `tour` (`title`, `price`, `pr_persons`, `pr_childrens`, `images`, `thumbnail`, `days`, `num_of_seat`, `location`, `create_at`)
                VALUES ('$tour->title', '$tour->price', '$tour->pr_persons', '$tour->pr_childrens', '$tour->images', '$tour->thumbnail', '$tour->days', '$tour->num_of_seat', '$tour->location', '$date')";
        
        $result = $connect->query($sql);
        disconnectDB($connect);
        return $result;
    }

    public static function Update($id, Tour $tour) {
        $connect = connectDB();
        $date = date('j/n/Y - g:i a');

        $sql = "UPDATE `tour` SET `title` = '$tour->title', `price` = '$tour->price', `pr_persons` = '$tour->pr_persons', `pr_childrens` = '$tour->pr_childrens', `images` = '$tour->images',
                `thumbnail` = '$tour->thumbnail', `days` = '$tour->days', `num_of_seat` = '$tour->num_of_seat', `location` = '$tour->location', `update_at` = '$date' WHERE `tour`.`id` = '$id'";

        $result = $connect->query($sql);
        disconnectDB($connect);
        return $result;
    }

    public static function Delete($id) {
        $connect = connectDB();

        $sql = "DELETE FROM `tour` WHERE `tour`.`id` = '$id'";

        $result = $connect->query($sql);
        disconnectDB($connect);
        return $result;
    }

    public static function Read() {
        $connect = connectDB();

        $sql = "SELECT * FROM `tour`";

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

        $sql = "SELECT * FROM `tour` WHERE `id` = '$id'";
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

        $sql = "SELECT * FROM `tour` WHERE `id` = '$id' LIMIT 1";

        $result = $connect->query($sql);
        $row = mysqli_fetch_assoc($result);

        disconnectDB($connect);
        echo json_encode($row);
    }

}

?>