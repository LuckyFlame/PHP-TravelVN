<?php 

Class Schedule {

    public $start_date, $end_date, $remainders, $notes, $tour, $feedback, $create_at, $update_at;

    public function __construct($start_date, $end_date, $remainders, $notes, $tour, $feedback, $create_at, $update_at) {
        $this->start_date = $start_date;
        $this->end_date = $end_date;
        $this->remainders = $remainders;
        $this->notes = $notes;
        $this->tour = $tour;
        $this->feedback = $feedback;
        $this->create_at = $create_at;
        $this->update_at = $update_at;
    }

    public static function Create(Schedule $schedule) {
        $connect = connectDB();

        $sql = "INSERT INTO `schedule` (`start_date`, `end_date`, `remainders`, `notes`, `tour`, `feedback`, `create_at`, `update_at`)
                VALUES ('$schedule->start_date', '$schedule->end_date', '$schedule->remainders', '$schedule->notes', '$schedule->tour', '$schedule->feedback', '$schedule->create_at', '$schedule->update_at')";
                
        $result = $connect->query($sql);
        $connect->close();
        return $result;
    }

    public static function Update($id, Schedule $schedule) {
        $connect = connectDB();

        $sql = "UPDATE `schedule` SET `start_date` = '$schedule->start_date', `end_date` = '$schedule->end_date', `remainders` = '$schedule->remainders', `notes` = '$schedule->notes', 
                `tour` = '$schedule->tour', `feedback` = '$schedule->feedback', `create_at` = '$schedule->create_at', `update_at` = '$schedule->update_at' WHERE `schedule`.`id` = '$id'";

        $result = $connect->query($sql);
        $connect->close();
        return $result;
    }

    public static function Delete($id) {
        $connect = connectDB();

        // SQL
        $sql = "DELETE FROM `schedule` WHERE `schedule`.`id` = '$id'";

        // Get Result
        $result = $connect->query($sql);
        $connect->close();
        return $result;
    }

    public static function Find($id) {
        $connect = connectDB();

        $sql = "SELECT * FROM `schedule` WHERE `schedule`='$id' LIMIT 1";

        $query = mysqli_query($connect, $sql);
        $row = mysqli_fetch_assoc($query);

        $connect->close();

        // echo json_encode
        echo json_encode($row);
    }

    public static function GetTotal() {
        $connect = connectPDO();

        $statement = $connect->prepare("SELECT * FROM `schedule`");
        $statement->execute();
        $statement->fetchAll();
        
        return $statement->rowCount();
    }

}

?>