<?php 
// Including database connections
require_once '../database_connections.php';
// Fetching the updated data & storin in new variables
$data = json_decode(file_get_contents("php://input")); 

 mysqli_query($con,'SET character_set_results=utf8');
 mysqli_query($con,'SET names=utf8');
 mysqli_query($con,'SET character_set_client=utf8');
 mysqli_query($con,'SET character_set_connection=utf8');
 mysqli_query($con,'SET character_set_results=utf8');
 mysqli_query($con,'SET collation_connection=utf8_general_ci');
 
$id = mysqli_real_escape_string($con, $data->id);
$complications_id = mysqli_real_escape_string($con, $data->complications_id);
$complications_list = mysqli_real_escape_string($con, $data->complications_list);
$complications_details = mysqli_real_escape_string($con, $data->complications_details);

// mysqli query to insert the updated data
$query = "UPDATE obstetric_complications_details SET `id`='$id',`complications_id`='$complications_id',`name`='$complications_list',`complications_details`='$complications_details' WHERE id=$id";
mysqli_query($con, $query);
echo true;
?>