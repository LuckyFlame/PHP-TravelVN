<?php 

include("../../library/database.php");
include("../../classes/category.php");

// GetTotal
function GetTotal() {
    $connect = connectPDO();

    $statement = $connect->prepare("SELECT * FROM `category`");
    $statement->execute();
    $statement->fetchAll();
    
    return $statement->rowCount();
}

// DataTables

$connect = connectPDO();

$query = '';
$output = array();
$query .= "SELECT * FROM category ";

if(isset($_POST["search"]["value"])) {
    $query .= 'WHERE category LIKE "%'.$_POST["search"]["value"].'%" ';
    // $query .= 'OR content LIKE "%'.$_POST["search"]["value"].'%" ';
}

if(isset($_POST["order"])) {
    $query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
} else {
    $query .= 'ORDER BY id DESC ';
} 

if($_POST["length"] != -1) {
    $query .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}

$statement = $connect->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
$data = array();
$filtered_rows = $statement->rowCount();

foreach($result as $row) {
    $sub_array = array();
    $sub_array[] = $row["id"];
    $sub_array[] = $row["category"];
    $sub_array[] = $row["content"];
    $sub_array[] = 
        '<a class="btn btn-info text-white" data-id="'.$row["id"].'" id="edit-category">
            <i class="bx bx-edit-alt"></i>
        </a>
        <a class="btn btn-danger text-white" data-id="'.$row["id"].'" id="delete-category">
            <i class="bx bx-trash"></i>
        </a>
        <a class="btn btn-warning text-white" data-id="'.$row["id"].'" id="detail-category">
            <i class="bx bx-detail"></i>
        </a>'
        ;
        
    $data[] = $sub_array;
}

$output = array(
    "draw" => intval($_POST["draw"]),
    "recordsTotal" => $filtered_rows,
    "recordsFiltered" => GetTotal(),
    "data" => $data
);

echo json_encode($output);

?>