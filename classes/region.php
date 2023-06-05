<?php 

Class Region {
    
    public $region, $acronym, $content, $coordinates, $create_at, $update_at;

    public function __construct($region, $acronym, $content, $coordinates, $create_at, $update_at) {
        $this->region = $region;
        $this->acronym = $acronym;
        $this->content = $content;
        $this->coordinates = $coordinates;
        $this->create_at = $create_at;
        $this->update_at = $update_at;
    }

    public static function Create(Region $region) {
        $connect = connectDB();

        $sql = "INSERT INTO `region` (`region`, `acronym`, `content`, `coordinates`, `create_at`, `update_at`) 
                VALUES ('$region->region', '$region->acronym', '$region->content', '$region->coordinates', '$region->create_at', '$region->update_at')";

        $result = $connect->query($sql);
        $connect->close();
        return $result;
    }

    public static function Update($id, Region $region) {
        $connect = connectDB();

        $sql = "UPDATE `region` SET `region` = '$region->region', `acronym` = '$region->acronym', `content` = '$region->content', `coordinates` = '$region->coordinates', 
        `update_at` = '$region->update_at' WHERE `region`.`id` = '$id'";

        $result = $connect->query($sql);
        $connect->close();
        return $result;
    }

    public static function Delete($id) {
        $connect = connectDB();

        // SQL
        $sql = "DELETE FROM `region` WHERE `region`.`id` = '$id'";

        // Get Result
        $result = $connect->query($sql);
        $connect->close();
        return $result;
    }

    public static function Find($id) {
        $connect = connectDB();

        $sql = "SELECT * FROM `region` WHERE `id`='$id' LIMIT 1";

        $query = mysqli_query($connect, $sql);
        $row = mysqli_fetch_assoc($query);

        $connect->close();

        // echo json_encode
        echo json_encode($row);
    }

    public static function GetTotal() {
        $connect = connectPDO();

        $statement = $connect->prepare("SELECT * FROM `region`");
        $statement->execute();
        $statement->fetchAll();
        
        return $statement->rowCount();
    }

}

?>