<?php 

/* Call Date Default Time Zone Asia */

include("../../library/timezone.php");

/* Create Class Name Schedule */

Class Schedule {

    // Schedule
    public $start_date, $end_date, $remainders, $notes, $tour, $feedback;

    // Create Schedule
    public $create_at;

    // Update Schedule
    public $update_at;

    public function __construct($start_date, $end_date, $remainders, $notes, $tour, $feedback) {
        $this->start_date = $start_date;
        $this->end_date = $end_date;
        $this->remainders = $remainders;
        $this->notes = $notes;
        $this->tour = $tour;
        $this->feedback = $feedback;
    }

    // CREATE : UPDATE : DELETE: READ : FIND : JSE_FIND [FIND BY ID LIMIT 1]
    public static function Create(Schedule $schedule) {
        $connect = connectDB();
        $date = date('j/n/Y - g:i a');

        $sql = "INSERT INTO `schedule` (`start_date`, `end_date`, `remainders`, `notes`, `tour`, `feedback`, `create_at`)
                VALUES ('$schedule->start_date', '$schedule->end_date', '$schedule->remainders', '$schedule->notes', '$schedule->tour', '$schedule->feedback', '$date')";

        $result = $connect->query($sql);
        disconnectDB($connect);
        return $result;
    }

    public static function Update($id, Schedule $schedule) {
        $connect = connectDB();
        $date = date('j/n/Y - g:i a');

        $sql = "UPDATE `schedule` SET `start_date` = '$schedule->start_date', `end_date` = '$schedule->end_date', `remainders`, '$schedule->remainders', `notes` = '$schedule->notes', 
                `tour` = '$schedule->tour', `feedback` = '$schedule->feedback', `update_at` = '$date' WHERE `schedule`.`id` = '$id'";

        $result = $connect->query($sql);
        disconnectDB($connect);
        return $result;
    }

    public static function Delete($id) {
        $connect = connectDB();

        $sql = "DELETE FROM `schedule` WHERE `schedule`.`id` = '$id'";

        $result = $connect->query($sql);
        disconnectDB($connect);
        return $result;
    }

    public static function Read() {
        $connect = connectDB();

        $sql = "SELECT * FROM `schedule`";

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

        $sql = "SELECT * FROM `schedule` WHERE `id` = '$id'";
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

        $sql = "SELECT * FROM `schedule` WHERE `id` = '$id' LIMIT 1";

        $result = $connect->query($sql);
        $row = mysqli_fetch_assoc($result);

        disconnectDB($connect);
        echo json_encode($row);
    }

}


?>