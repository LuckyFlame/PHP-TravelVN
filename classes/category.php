<?php 

/* Call Date Default Time Zone Asia */

include("../../library/timezone.php");

/* Create Class Name Category */

Class Category {

    // Category
    public $category, $content;

    // Create Category
    public $create_at;

    // Update Category
    public $update_at;

    // Construct
    public function __construct($category, $content) {
        $this->category = $category;
        $this->content = $content;
    }

    // CREATE : UPDATE : DELETE : READ : FIND : JSE_FIND [FIND BY ID LIMIT 1]
    public static function Create(Category $category) {
        $connect = connectDB();
        $date = date('j/n/Y - g:i a');

        $sql = "INSERT INTO `category` (`category`, `content`, `create_at`)
                VALUES ('$category->category', '$category->content', '$date')";

        $result = $connect->query($sql);
        disconnectDB($connect);
        return $result;
    }

    public static function Update($id, Category $category) {
        $connect = connectDB();
        $date = date('j/n/Y - g:i a');

        $sql = "UPDATE `category` SET `category` = '$category->category', `content` = '$category->content', `update_at` = '$date' WHERE `category`.`id` = '$id'";

        $result = $connect->query($sql);
        disconnectDB($connect);
        return $result;
    }

    public static function Delete($id) {
        $connect = connectDB();

        $sql = "DELETE FROM `category` WHERE `category`.`id` = '$id'";

        $result = $connect->query($sql);
        disconnectDB($connect);
        return $result;
    }

    public static function Read() {
        $connect = connectDB();

        $sql = "SELECT * FROM `category`";

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

        $sql = "SELECT * FROM `category` WHERE `id` = '$id'";
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

        $sql = "SELECT * FROM `category` WHERE `id` = '$id' LIMIT 1";

        $result = $connect->query($sql);
        $row = mysqli_fetch_assoc($result);

        disconnectDB($connect);
        echo json_encode($row);
    }
}

?>