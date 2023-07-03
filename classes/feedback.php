<?php 

/* Call Date Default Time Zone Asia */

include("../../library/timezone.php");

/* Create Class Name Feedback */

Class Feedback {
    
    // Feedback
    public $fullname, $age, $phone, $email, $promotion, $quality, $comments, $user, $admin, $booking;

    // Create Feedback
    public $create_at;

    // Update Feedback
    public $update_at;

    public function __construct($fullname, $age, $phone, $email, $promotion, $quality, $comments, $user, $admin, $booking) {
        $this->fullname = $fullname;
        $this->age = $age;
        $this->phone = $phone;
        $this->email = $email;
        $this->promotion = $promotion;
        $this->quality = $quality;
        $this->comments = $comments;
        $this->user = $user;
        $this->admin = $admin;
        $this->booking = $booking; 
    }

    // CREATE : UPDATE : DELETE : READ : FIND : JSE_FIND [FIND BY ID LIMIT 1]

    public static function Create(Feedback $feedback) {
        $connect = connectDB();
        $date = date('j/n/Y - g:i a');

        $sql = "INSERT INTO `feedback` (`fullname`, `age`, `phone`, `email`, `promotion`, `quality`, `comments`, `user`, `admin`, `booking`, `create_at`)
                VALUES ('$feedback->fullname', '$feedback->age', '$feedback->phone', '$feedback->email', '$feedback->promotion', '$feedback->quality', '$feedback->comments', '$feedback->user', '$feedback->admin', '$feedback->booking', '$date')";

        $result = $connect->query($sql);
        disconnectDB($connect);
        return $result;
    }

    public static function Update($id, Feedback $feedback) {
        $connect = connectDB();
        $date = date('j/n/Y - g:i a');

        $sql = "UPDATE `feedback` SET `fullname` = '$feedback->fullname', `age` = '$feedback->age', `phone` = '$feedback->phone', `email` = '$feedback->email', `promotion` = '$feedback->promotion', `quality` = '$feedback->quality', 
                `comments` = '$feedback->comments', `user` = '$feedback->user', `admin` = '$feedback->admin', `booking` = '$feedback->booking', `update_at` = '$date' WHERE `feedback`.`id` = '$id'";

        $result = $connect->query($sql);
        disconnectDB($connect);
        return $result;
    }

    public static function Delete($id) {
        $connect = connectDB();

        $sql = "DELETE FROM `feedback` WHERE `booking`.`id` = '$id'";

        $result = $connect->query($sql);
        disconnectDB($connect);
        return $result;
    }

    public static function Read() {
        $connect = connectDB();

        $sql = "SELECT * FROM `feedback`";

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

        $sql = "SELECT * FROM `feedback` WHERE `id` = '$id'";
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

        $sql = "SELECT * FROM `feedback` WHERE `id` = '$id' LIMIT 1";

        $result = $connect->query($sql);
        $row = mysqli_fetch_assoc($result);

        disconnectDB($connect);
        echo json_encode($row);
    }
}

?>