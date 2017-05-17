<?php
$con =mysqli_connect("localhost","root","","Student_information");
if (!$con)
{
 die("Connection error: " . mysqli_connect_errno());
}
mysqli_query($con,"update credentials set security_answer='DDUC' where name='Jassa Singh'");
mysqli_query($con,"update credentials set security_answer='DDUC' where name='Sahil Nishal'");
mysqli_query($con,"update credentials set security_answer='DDUC' where name='Rohit Singh'");
mysqli_query($con,"update credentials set security_answer='DDUC' where name='Vinay Sharma'");
mysqli_query($con,"update credentials set security_answer='DDUC' where name='Aryan Hans'");
mysqli_query($con,"update credentials set security_answer='DDUC' where name='Deepak Rawat'");
mysqli_query($con,"update credentials set security_answer='DDUC' where name='Puneet Baghel'");
mysqli_query($con,"update credentials set security_answer='DDUC' where name='Samarth Chaturvedi'");
mysqli_query($con,"update credentials set security_answer='DDUC' where name='Krishna Aggarwal'");


mysqli_close($con);
?>