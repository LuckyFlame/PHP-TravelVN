<?php 

$_pr_persons = $_POST["pr_persons"];

if($_pr_persons > 0 && $_pr_persons < 10000000) {
    echo json_encode(true);
} else {
    echo json_encode(false);
}

?>