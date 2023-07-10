<?php 

$_days = $_POST["days"];

if($_days > 0 && $_days <= 90) {
    echo json_encode(true);
} else {
    echo json_encode(false);
}

?>