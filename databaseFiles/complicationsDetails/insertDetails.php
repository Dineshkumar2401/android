<?php 
// Including database connections
require_once '../database_connections.php';
// Fetching and decoding the inserted data
$data = json_decode(file_get_contents("php://input")); 

 mysqli_query($con,'SET character_set_results=utf8');
 mysqli_query($con,'SET names=utf8');
 mysqli_query($con,'SET character_set_client=utf8');
 mysqli_query($con,'SET character_set_connection=utf8');
 mysqli_query($con,'SET character_set_results=utf8');
 mysqli_query($con,'SET collation_connection=utf8_general_ci');

$complications_id = mysqli_real_escape_string($con, $data->complications_id);
$complications_list = mysqli_real_escape_string($con, $data->complications_list);
$complications_details = mysqli_real_escape_string($con, $data->complications_details);
// mysqli insert query
$id = "SELECT max(id) from obstetric_complications_details ORDER BY id ASC";
$result = mysqli_query($con, $id);
$row = mysqli_fetch_assoc($result);
$last_id =$row['max(id)']+1;
$query = "INSERT into obstetric_complications_details (`id`,`complications_id`,`name`,`complications_details`) 
VALUES ('$last_id','$complications_id','$complications_list','$complications_details')";
// Inserting data into database
mysqli_query($con, $query);
echo true;
?>
