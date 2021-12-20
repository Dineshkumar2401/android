<?php
// Connecting to database as mysqli_connect("hostname", "username", "password", "database name");
$con = mysqli_connect("localhost", "root", "", "dimoc"); 
// Check connection
 if (!$con) {
 die("Connection failed: " . mysqli_connect_error());
 }
 
 $tcreation = "CREATE TABLE IF NOT EXISTS `emp_details` (
  `emp_id` int(255) NOT NULL AUTO_INCREMENT,
  `emp_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `emp_email` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `emp_gender` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `emp_address` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`emp_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1";

if (!mysqli_query($con,$tcreation))
 {
 die('Error: ' . mysql_error());
 }
 
?>