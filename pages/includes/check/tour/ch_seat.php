<?php 

$_num_of_seat = $_POST["num_of_seat"];

if($_num_of_seat > 0 && $_num_of_seat <= 50) {
    echo json_encode(true);
} else {
    echo json_encode(false);
}

?>