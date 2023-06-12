<?php 

/* Call Date Default Time Zone Asia */

include("../library/timezone.php");

/* Create Class Name Event */

Class Event {

    // Event
    public $title, $images, $thumbnail, $header, $content, $datetime;
    
    // Create Event
    public $create_at;

    // Update Event
    public $update_at;

    public function __construct($title, $images, $thumbnail, $header, $content, $datetime) {
        $this->title = $title;
        $this->images = $images;
        $this->thumbnail = $thumbnail;
        $this->header = $header;
        $this->content = $content;
        $this->datetime = $datetime;
    }

    // CREATE : UPDATE : DELETE: READ : FIND : JSE_FIND [FIND BY ID LIMIT 1]
    public static function Create(Event $event) {
        $connect = connectDB();
        $date = date('j/n/Y - g:i a');

        $sql = "INSERT INTO `event` (`title`, `images`, `thumbnail`, `header`, `content`, `datetime`, `create_at`)
                VALUES ('$event->title', '$event->images', '$event->thumbnail', '$event->header', '$event->content', '$event->datetime', '$date')";

        $result = $connect->query($sql);
        disconnectDB($connect);
        return $result;
    }

    public static function Update($id, Event $event) {
        $connect = connectDB();
        $date = date('j/n/Y - g:i a');

        $sql = "UPDATE `event` SET `title` = '$event->title', `images` = '$event->images', `thumbnail` = '$event->thumbnail', `header` = '$event->header'.
                `content` = '$event->content', `datetime` = '$event->datetime', `update_at` = '$date' WHERE `event`.`id` = '$id'";
    
        $result = $connect->query($sql);
        disconnectDB($connect);
        return $result;
    }

    public static function Delete($id) {
        $connect = connectDB();

        $sql = "DELETE FROM `event` WHERE `event`.`id` = '$id'";

        $result = $connect->query($sql);
        disconnectDB($connect);
        return $result;
    }

    public static function Read() {
        $connect = connectDB();

        $sql = "SELECT * FROM `event`";

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

        $sql = "SELECT * FROM `event` WHERE `id` = '$id'";
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

    public static function JSE_FIND($id) {
        $connect = connectDB();

        $sql = "SELECT * FROM `event` WHERE `id` = '$id' LIMIT 1";

        $result = $connect->query($sql);
        $row = mysqli_fetch_assoc($result);

        disconnectDB($connect);
        echo json_encode($row);
    }
}

?>