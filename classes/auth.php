<?php 

// Library

Class Auth {
    public $username, $password, $role, $fullname, $email, $phone, $gender, $dob, $create_at, $update_at;

    public function __construct($username, $password, $role, $fullname, $email, $phone, $gender, $dob, $create_at, $update_at) {
        $this->username = $username;
        $this->password = $password;
        $this->role = $role;
        $this->fullname = $fullname;
        $this->email = $email;
        $this->phone = $phone;
        $this->gender = $gender;
        $this->dob = $dob;
        $this->create_at = $create_at;
        $this->update_at = $update_at;
    }


    public static function Login() {

    }

    public static function ByUsername($username) {
        $connect = connectDB();

        // SQL
        $sql = "SELECT * FROM `account` WHERE `username` = '$username'";

        // Get Result
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

        $connect->close();
        return $array;
    }

    public static function Register(Auth $auth) {
        $connect = connectDB();

        $sql_account = "INSERT INTO `account` (`username`, `password`, `role`, `create_at`, `update_at`)
                        VALUES ('$auth->username', '$auth->password', '$auth->role', '$auth->create_at', '$auth->update_at')";

        $sql_profile = "INSERT INTO `profile` (`username`, `fullname`, `email`, `phone`, `gender`, `dob`, `create_at`, `update_at`)
                        VALUES ('$auth->username', '$auth->fullname', '$auth->email', '$auth->phone', '$auth->gender', '$auth->dob', '$auth->create_at', '$auth->update_at')";

        $result = $connect->query($sql_account);
        $result = $connect->query($sql_profile);

        $connect->close();
        return $result;
    }

}

?>