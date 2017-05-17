<?php
session_start();
$con =mysqli_connect("localhost","root","","Student_information");

if(isset($_POST['submit']))
{
$username= $_POST['username'];
$password= $_POST['password'];
$_SESSION['student'] =$username ;//for saving name of the student

if (!$con)
{
 die("Connection error: " . mysqli_connect_errno());
}
$result=mysqli_query($con,"Select * from credentials");
$num_rows=mysqli_num_rows($result);
$flag=0;
for($i=0;$i<$num_rows;$i++)
{
    $row=mysqli_fetch_assoc($result);
    if($username==$row['student_id']&&$username!=NULL)
    {
        if($password==$row['password']&&$password!=NULL)
        {
            include 'header.php';
            $flag=1;
        }
    }
}
if($flag==0)
{
    include 'Login.html';
   echo "<div style='font-size:18px;color:white;margin-left:550px'>Enter a valid student ID and password</div>";
   
}
}
mysqli_close($con);
?>