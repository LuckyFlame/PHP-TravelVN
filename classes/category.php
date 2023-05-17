<?php 

Class Category {

    public $category, $content, $create_at, $update_at;

    public function __construct($category, $content, $create_at, $update_at) {
        $this->category = $category;
        $this->content = $content;
        $this->create_at = $create_at;
        $this->update_at = $update_at;
    }

    public static function Create(Category $category) {
        $connect = connectDB();

        $sql = "INSERT INTO `category` (`category`, `content`, `create_at`, `update_at`)
                VALUES ('$category->category', '$category->content', '$category->create_at', '$category->update_at')";

        $result = $connect->query($sql);
        $connect->close();
        return $result;
    }

    public static function Update($id, Category $category) {
        $connect = connectDB();

        $sql = "UPDATE `category` SET `category` = '$category->category', `content` = '$category->content', `update_at` = '$category->update_at' WHERE `category`.`id` = '$id'";
    
        $result = $connect->query($sql);
        $connect->close();
        return $result;
    }

    public static function Delete($id) {
        $connect = connectDB();

        // SQL
        $sql = "DELETE FROM `category` WHERE `category`.`id` = '$id'";

        // Get Result
        $result = $connect->query($sql);
        $connect->close();
        return $result;
    }

    public static function Find($id) {
        $connect = connectDB();

        $sql = "SELECT * FROM `category` WHERE `id`='$id' LIMIT 1";

        $query = mysqli_query($connect, $sql);
        $row = mysqli_fetch_assoc($query);

        $connect->close();

        // echo json_encode
        echo json_encode($row);
    }

    public static function GetTotal() {
        $connect = connectPDO();

        $statement = $connect->prepare("SELECT * FROM category");
        $statement->execute();
        $statement->fetchAll();
        
        return $statement->rowCount();
    }
}

?>