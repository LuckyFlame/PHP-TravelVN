<?php 

include("../../library/database.php");
include("../../classes/tour.php");

$connect = connectPDO();

$query = '';
$output = array();
$query .= "SELECT * FROM `tour` ";

if(isset($_POST["search"]["value"])) {
    $query .= 'WHERE title LIKE "%'.$_POST["search"]["value"].'%" ';
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
    $sub_array[] = $row["title"];
    $sub_array[] = $row["days"];

    $sub_array[] = "<img src='../../assets/img/default-150x150.png' width='75' height='75'>";
   
    $sub_array[] = 
            '<a class="btn btn-info edit-event text-white" data-id="'.$row["id"].'">
                <i class="bx bx-edit-alt"></i>
            </a>
            <a class="btn btn-danger delete-event text-white" data-id="'.$row["id"].'">
                <i class="bx bx-trash"></i>
            </a>
            <a class="btn btn-warning view-event text-white" data-id="'.$row["id"].'">
                <i class="bx bx-detail"></i>
            </a>'
            ;
            
    $data[] = $sub_array;
}

$output = array(
    "draw" => intval($_POST["draw"]),
    "recordsTotal" => $filtered_rows,
    "recordsFiltered" => Tour::GetTotal(),
    "data" => $data
);

echo json_encode($output);

?>