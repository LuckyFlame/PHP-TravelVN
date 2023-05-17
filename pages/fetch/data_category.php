<?php 

include("/xampp/htdocs/php-travelvn/library/database.php");
include("/xampp/htdocs/php-travelvn/classes/category.php");

$connect = connectPDO();

$query = '';
$output = array();
$query .= "SELECT * FROM category ";

if(isset($_POST["search"]["value"])) {
    $query .= 'WHERE category LIKE "%'.$_POST["search"]["value"].'%" ';
    $query .= 'OR content LIKE "%'.$_POST["search"]["value"].'%" ';
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
            '<a class="btn btn-info edit-category text-white" data-id="'.$row["id"].'">
                <i class="bx bx-edit-alt"></i>
            </a>
            <a class="btn btn-danger delete-category text-white" data-id="'.$row["id"].'">
                <i class="bx bx-trash"></i>
            </a>';
    $data[] = $sub_array;
}

$output = array(
    "draw"    => intval($_POST["draw"]),
    "recordsTotal"  =>  $filtered_rows,
    "recordsFiltered" => Category::GetTotal(),
    "data"    => $data
);

echo json_encode($output);

// include("/xampp/htdocs/php-travelvn/library/database.php");

// $connect = connectDB();

// $sql = "SELECT * FROM category ";

// if(isset($_POST["draw"])) {
//     $draw = $_POST["draw"];
// }

// $query = mysqli_query($connect, $sql);
// $count_all_rows = mysqli_num_rows($query);

// if(isset($_POST["search"]["value"])) {

//     $search_value = $_POST["search"]["value"];
//     $sql .= " WHERE category LIKE '%".$search_value."%' ";
//     $sql .= " OR content LIKE '%".$search_value."%' ";

// }

// if(isset($_POST["order"])) {
//     $column_name = $_POST['order']["0"]['column'];
//     $order = $_POST['order']["0"]['dir'];
//     $sql .= " ORDER BY " .$column_name. " " .$order. "";
    
// } else {
//     $sql .= " ORDER BY id DESC";
// }

// // if($_POST["length"] != -1) {
// //     $start = $_POST["start"];

// //     $length = $_POST["length"];

// //     $sql .= " LIMIT " .$start. ", " .$length. "";
// // }

// $sql .= " LIMIT 0, 5";

// $data = array();

// $run_query = mysqli_query($connect, $sql);
// $filtered_rows = mysqli_num_rows($run_query);



// while($row = mysqli_fetch_assoc($run_query)) {
//     $sub_array = array();

//     $sub_array[] = $row["id"];
//     $sub_array[] = $row["category"];
//     $sub_array[] = $row["content"];
//     $sub_array[] = 
//         '<a class="btn btn-info edit-category text-white" data-id="'.$row["id"].'">
//             <i class="bx bx-edit-alt"></i>
//         </a>
//         <a class="btn btn-danger delete-category text-white" data-id="'.$row["id"].'">
//             <i class="bx bx-trash"></i>
//         </a>';
//     $data[] = $sub_array;
// }

// $output = array(
//     "recordsTotal" => $count_all_rows,
//     "recordsFiltered" => $filtered_rows,
//     "data" => $data,
// );

// $connect->close();

// echo json_encode($output);

?>