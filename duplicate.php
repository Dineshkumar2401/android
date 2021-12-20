 <?php
 // Create connection
$conn = mysqli_connect("localhost", "root", "", "dimoc");
 // Check connection
 if (!$conn) {
 die("Connection failed: " . mysqli_connect_error());
 }
 
 $tcreation = "CREATE TABLE IF NOT EXISTS `encoding` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `language` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
 `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
 PRIMARY KEY (`id`)
 ) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1";
 
 if (!mysqli_query($conn,$tcreation))
 {
 die('Error: ' . mysql_error());
 }
 
if($_POST[submit])
{
 mysqli_query($conn,'SET character_set_results=utf8');
 mysqli_query($conn,'SET names=utf8');
 mysqli_query($conn,'SET character_set_client=utf8');
 mysqli_query($conn,'SET character_set_connection=utf8');
 mysqli_query($conn,'SET character_set_results=utf8');
 mysqli_query($conn,'SET collation_connection=utf8_general_ci');
 
 $language=$_POST[language];
 $title=$_POST[title];
 
 $sql = "INSERT INTO encoding (language, title)
 VALUES ('$language','$title')";
 
 if (mysqli_query($conn, $sql)) {
 echo "New record created successfully";
 } else {
 echo "Error: " . $sql . "<br>" . mysqli_error($conn);
 }
 
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Store and display Unicode string (हिन्दी) with MySQL using PHP</title>
</head>
<body>
 <h1>Working with Foreign Languages using MySQL and PHP.</h1>
 <form method='post' action='duplicate.php' name='test'>
 First name:<br>
 <input type="text" name="language">
 <br>
 Last name:<br>
 <input type="text" name="title">
 <br>
 <input type="submit" name="submit" value='Submit'>
 </form>
 <?php
 mysqli_query($conn,"SET NAMES utf8"); //the main trick
 $cmd = "select * from encoding";
 $result = mysqli_query($conn,$cmd);
 echo "<table border=1>";
 while($myrow = mysqli_fetch_row($result))
 {
 echo "<tr><td>".$myrow[1]."</td><td>".$myrow[2]."</td></tr>";
 }
 echo "</table>";
 mysqli_close($conn);
 ?>
</body>
</html>