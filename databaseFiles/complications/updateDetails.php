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
 
// Escaping special characters from updated data
$id = mysqli_real_escape_string($con, $data->id);
$complications = mysqli_real_escape_string($con, $data->complications);
$image = mysqli_real_escape_string($con, $data->image);
// mysqli query to insert the updated data
$query = "UPDATE obstetric_complications SET `id`='$id',`complications`='$complications',`image`='$image' WHERE id=$id";
mysqli_query($con, $query);
echo true;
?>