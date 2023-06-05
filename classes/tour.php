<?php 

Class Tour {

    public $title, $content, $images, $thumbnail, $price, $price_childrens, $price_persons, $number_of_seat, $days, $region, $create_at, $update_at;

    public function __construct($title, $content, $images, $thumbnail, $price, $price_childrens, $price_persons, $number_of_seat, $days, $region, $create_at, $update_at) {
        $this->title = $title;
        $this->content = $content;
        $this->images = $images;
        $this->thumbnail = $thumbnail;
        $this->price = $price;
        $this->price_childrens = $price_childrens;
        $this->price_persons = $price_persons;
        $this->number_of_seat = $number_of_seat;
        $this->days = $days;
        $this->region = $region;
        $this->create_at = $create_at;
        $this->update_at = $update_at;
    }

    public static function Create(Tour $tour) {
        $connect = connectDB();

        $sql = "INSERT INTO `tour` (`title`, `content`, `images`, `thumbnail`, `price`, `price_childrens`, `price_persons`, `number_of_seat`, `days`, `region`, `create_at`, `update_at`)
                VALUES ('$tour->title', '$tour->content', '$tour->images', '$tour->thumbnail', '$tour->price', '$tour->price_childrens', '$tour->price_persons', '$tour->number_of_seat', '$tour->days', '$tour->region', '$tour->create_at', '$tour->update_at')";

        $result = $connect->query($sql);
        $connect->close();
        return $result;
    }

    public static function Update($id, Tour $tour) {
        $connect = connectDB();

        $sql = "UPDATE `tour` SET `title` = '$tour->title', `content` = '$tour->content', `images` = '$tour->images', `thumbnail` = '$tour->thumbnail', `price` = '$tour->price', `price_childrens` = '$tour->price_childrens',
                `price_persons` = '$tour->price_persons', `number_of_seat` = '$tour->number_of_seat', `days` = '$tour->days', `region` = '$tour->region', `update_at` = '$tour->update_at' WHERE `tour`.`id` = '$id'";

        $result = $connect->query($sql);
        $connect->close();
        return $result;
    }

    public static function Delete($id) {
        $connect = connectDB();

        // SQL
        $sql = "DELETE FROM `tour` WHERE `tour`.`id` = '$id'";

        // Get Result
        $result = $connect->query($sql);
        $connect->close();
        return $result;
    }

    public static function Find($id) {
        $connect = connectDB();

        $sql = "SELECT * FROM `tour` WHERE `id`='$id' LIMIT 1";

        $query = mysqli_query($connect, $sql);
        $row = mysqli_fetch_assoc($query);

        $connect->close();

        // echo json_encode
        echo json_encode($row);
    }

    public static function GetTotal() {
        $connect = connectPDO();

        $statement = $connect->prepare("SELECT * FROM `tour`");
        $statement->execute();
        $statement->fetchAll();
        
        return $statement->rowCount();
    }
}

?>