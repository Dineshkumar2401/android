<?php 
require_once '../database_connections.php';
$data = json_decode(file_get_contents("php://input")); 
$query = "DELETE FROM obstetric_complications_details WHERE id=$data->id";
mysqli_query($con, $query);
echo true;
?>