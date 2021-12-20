<?php
// Including database connections

$url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$components = parse_url($url);
parse_str($components['query'], $results);

require_once '../database_connections.php'; 

 mysqli_query($con,'SET character_set_results=utf8');
 mysqli_query($con,'SET names=utf8');
 mysqli_query($con,'SET character_set_client=utf8');
 mysqli_query($con,'SET character_set_connection=utf8');
 mysqli_query($con,'SET character_set_results=utf8');
 mysqli_query($con,'SET collation_connection=utf8_general_ci');
// mysqli query to fetch all data from database
mysqli_query($con,"SET NAMES utf8"); //the main trick

$query = 'SELECT * from obstetric_complications_details where complications_id ="'.$results['complication_id'].'"';
//$query = "SELECT * from obstetric_complications_details ORDER BY id ASC";
$result = mysqli_query($con, $query);
$arr = array();
if(mysqli_num_rows($result) != 0) {
	while($row = mysqli_fetch_assoc($result)) {
        $arr[]=$row;
	}

 
			$arrs['status']="done";
			$arrs['msg']="done";
			$arrs['sub_complication_list'] = $arr; 
}
// Return json array containing data from the database
echo $json_info = json_encode($arrs);
?>