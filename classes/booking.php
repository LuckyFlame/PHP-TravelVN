<?php 

/* Call Date Default Time Zone Asia */

include("../library/timezone.php");

/* Create Class Name Booking */

Class Booking {
    
    // Account
    public $account;

    // Schedule
    public $schedule;
    
    // Booking
    public $payment, $notes, $date, $persons, $childrens, $amount, $status;

    // Create Booking
    public $create_at;

    // Update Booking
    public $update_at;

    public function __construct($account, $schedule, $payment, $notes, $date, $persons, $childrens, $amount, $status) {
        $this->account = $account;
        $this->schedule = $schedule;
        $this->payment = $payment;
        $this->notes = $notes;
        $this->date = $date;
        $this->persons = $persons;
        $this->childrens = $childrens;
        $this->amount = $amount;
        $this->status = $status;
    }

    // CREATE : UPDATE : DELETE : READ : FIND : JSE_FIND [FIND BY ID LIMIT 1]
    public static function Create(Booking $booking) {
        $connect = connectDB();
        $date = date('j/n/Y - g:i a');

        $sql = "INSERT INTO `booking` (`account`, `schedule`, `payment`, `notes`, `date`, `persons`, `childrens`, `amount`, `status`, `create_at`)
                VALUES ('$booking->account', '$booking->schedule', '$booking->payment', '$booking->notes', '$booking->date', '$booking->persons', '$booking->childrens', '$booking->amount', '$booking->status', '$date')";

        $result = $connect->query($sql);
        disconnectDB($connect);
        return $result;
    }

    public static function Update($id, Booking $booking) {
        $connect = connectDB();
        $date = date('j/n/Y - g:i a');

        $sql = "UPDATE `booking` SET `account` = '$booking->account', `schedule` = '$booking->schedule', `payment` = '$booking->payment', `notes` = '$booking->notes', `date` = '$booking->date', 
                `persons` = '$booking->persons', `childrens` = '$booking->childrens', `amount` = '$booking->amount', `status` = '$booking->status', `update_at` = '$date' WHERE `booking`.`id` = '$id'";
        
        $result = $connect->query($sql);
        disconnectDB($connect);
        return $result;
    }

    public static function Delete($id) {
        $connect = connectDB();

        $sql = "DELETE FROM `booking` WHERE `booking`.`id` = '$id'";

        $result = $connect->query($sql);
        disconnectDB($connect);
        return $result;
    }

    public static function Read() {
        $connect = connectDB();

        $sql = "SELECT * FROM `booking`";

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

        $sql = "SELECT * FROM `booking` WHERE `id` = '$id'";
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

        $sql = "SELECT * FROM `booking` WHERE `id` = '$id' LIMIT 1";

        $result = $connect->query($sql);
        $row = mysqli_fetch_assoc($result);

        disconnectDB($connect);
        echo json_encode($row);
    }

}

?>