<?php 

$_price = $_POST["price"];

if($_price > 0 && $_price < 100000000) {
    echo json_encode(true);
} else {
    echo json_encode(false);
}

?>