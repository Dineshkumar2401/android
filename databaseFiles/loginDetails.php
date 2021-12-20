<?php 
// Including database connections
require_once 'database_connections.php';
// Fetching and decoding the inserted data
$data = json_decode(file_get_contents("php://input"));


 mysqli_query($con,'SET character_set_results=utf8');
 mysqli_query($con,'SET names=utf8');
 mysqli_query($con,'SET character_set_client=utf8');
 mysqli_query($con,'SET character_set_connection=utf8');
 mysqli_query($con,'SET character_set_results=utf8');
 mysqli_query($con,'SET collation_connection=utf8_general_ci');
 
// Escaping special characters from submitting data & storing in new variables.
$email = mysqli_real_escape_string($con, $data->email);
$password = mysqli_real_escape_string($con, $data->password);
$query = "SELECT * from user where email='$email' AND password='$password'";
$result = mysqli_query($con, $query);
$arr = array();
if(mysqli_num_rows($result) != 0) {
	while($row = mysqli_fetch_assoc($result)) {
			$arr[] = $row;
	}
}		
if(!$arr){
	echo false;
    die();	
} else{
	echo true;
}

?>