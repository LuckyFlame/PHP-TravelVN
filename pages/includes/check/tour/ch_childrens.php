<?php 

$_pr_childrens = $_POST["pr_childrens"];

if($_pr_childrens > 0 && $_pr_childrens < 10000000) {
    echo json_encode(true);
} else {
    echo json_encode(false);
}

?>