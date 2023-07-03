<?php 

/* Call Date Default Time Zone Asia */

include("../../library/timezone.php");

/* Create Class Name Auth */

Class Auth {
    
    // Primary Key
    public $username;

    // Account
    public $password, $role;

    // Profile
    public $fullname, $email, $phone, $gender, $dob;

    // Create Auth
    public $create_at;

    // Update Profile
    public $update_at;

    // Construct
    public function __construct($username, $password, $role, $fullname, $email, $phone, $gender, $dob) {
        $this->username = $username;
        $this->password = $password;
        $this->role = $role;
        $this->fullname = $fullname;
        $this->email = $email;
        $this->phone = $phone;
        $this->gender = $gender;
        $this->dob = $dob;
    }

    // REGISTER : UPDATE : LOGIN  : FIND
    public static function Register(Auth $auth) {
        $connect = connectDB();
        $date = date('j/n/Y - g:i a');

        $sql_1 = "INSERT INTO `account` (`username`, `password`, `role`, `create_at`)
                  VALUES ('$auth->username', '$auth->password', '$auth->role', '$date')";

        $sql_2 = "INSERT INTO `profile` (`username`, `fullname`, `email`, `phone`, `gender`, `dob`, `create_at`)
                  VALUES ('$auth->username', '$auth->fullname', '$auth->email', '$auth->phone', '$auth->gender', '$auth->dob', '$date')";

        $result = $connect->query($sql_1);
        $result = $connect->query($sql_2);
        disconnectDB($connect);
        return $result;
    }

    public static function Update($id, Auth $auth) {
        $connect = connectDB();
        $date = date('j/n/Y - g:i a');
        
        $sql = "UPDATE `profile` SET `fullname` = '$auth->fullname', `email` = '$auth->email', `phone` = '$auth->phone', `gender` = '$auth->gender', 
                `dob` = '$auth->dob', `update_at` = '$date' WHERE `profile`.`id` = '$id'";

        $result = $connect->query($sql);
        disconnectDB($connect);
        return $result;
    }

    public static function Login($username) {
        $connect = connectDB();

        $sql = "SELECT * FROM `account` WHERE `username` = '$username'";
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

    public static function Find($username) {
        $connect = connectDB();

        $sql = "SELECT * FROM `profile` WHERE `username` = '$username'";
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
}

?>