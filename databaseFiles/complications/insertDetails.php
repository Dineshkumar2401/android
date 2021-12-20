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

$complications = mysqli_real_escape_string($con, $data->complications);
$image =mysqli_real_escape_string($con, $data->image);
// mysqli insert query
$id = "SELECT max(id) from obstetric_complications ORDER BY id ASC";
$result = mysqli_query($con, $id);
$row = mysqli_fetch_assoc($result);
$last_id =$row['max(id)']+1;
$query = "INSERT into obstetric_complications (`id`,`complications`,`image`) 
VALUES ('$last_id','$complications','$image')";
// Inserting data into database
mysqli_query($con, $query);
echo true;
?>