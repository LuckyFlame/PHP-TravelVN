<?php 

Class Event {

    public $title, $images, $thumbnail, $header, $content, $date, $create_at, $update_at, $category;

    public function __construct($title, $images, $thumbnail, $header, $content, $date, $create_at, $update_at, $category) {
        $this->title = $title;
        $this->images = $images;
        $this->thumbnail = $thumbnail;
        $this->header = $header;
        $this->content = $content;
        $this->date = $date;
        $this->create_at = $create_at;
        $this->update_at = $update_at;
        $this->category = $category;
    }

    public static function Create(Event $event) {
        $connect = connectDB();

        $sql = "INSERT INTO `event` (`title`, `images`, `thumbnail`, `header`, `content`, `date`, `create_at`, `update_at`, `category`)
                VALUES ('$event->title', '$event->images', '$event->thumbnail', '$event->header', '$event->content', '$event->date', '$event->create_at', '$event->update_at', '$event->category')";

        $result = $connect->query($sql);
        $connect->close();
        return $result;
    }

    public static function Update($id, Event $event) {
        $connect = connectDB();

        $sql = "UPDATE `event` SET `title` = '$event->title', `images` = '$event->images', `thumbnail` = '$event->thumbnail', `header` = '$event->header', `content` = '$event->content', `date` = '$event->date', `update_at` = '$event->update_at', `category` = '$event->category' WHERE `event`.`id` = '$id'";
    
        $result = $connect->query($sql);
        $connect->close();
        return $result;
    }

    public static function Delete($id) {
        $connect = connectDB();

        // SQL
        $sql = "DELETE FROM `event` WHERE `event`.`id` = '$id'";

        // Get Result
        $result = $connect->query($sql);
        $connect->close();
        return $result;
    }

    public static function Find($id) {
        $connect = connectDB();

        $sql = "SELECT * FROM `event` WHERE `id`='$id' LIMIT 1";

        $query = mysqli_query($connect, $sql);
        $row = mysqli_fetch_assoc($query);

        $connect->close();

        // echo json_encode
        echo json_encode($row);
    }

    public static function Find_Action_Update($id) {
        $connect = connectDB();

        $sql = "SELECT * FROM `event` WHERE `id` = '$id'";

        $result = $connect->query($sql);
        if($result == false) {
            
        }

        $array = array();

        while($row = $result->fetch_assoc()) {
            $array[] = $row;
        }

        $connect->close();
        
        return $array;
    }

    public static function GetTotal() {
        $connect = connectPDO();

        $statement = $connect->prepare("SELECT * FROM `event`");
        $statement->execute();
        $statement->fetchAll();
        
        return $statement->rowCount();
    }
}

?>