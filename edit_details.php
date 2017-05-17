<!DOCTYPE html>
<html>
<head>
<style> 
body
{
    font-size:20px;
    text-align: left;
    padding: 5px;
    font-family: sans-serif;
    font-color:black;
    background-color:#f2f2f2;
}
body>p
{
font-size:30px;
}
input[type=text] 
{
    width: 50%;
    padding: 12px 20px;
    margin: 8px 0;
    box-sizing: border-box;
    border: 2px solid red;
    border-radius: 4px;
    background-color: #f2f2f2;
    padding: 15px 32px;
    color: black;
    font-size: 16px;
}
input[type='submit'], button
{ 
    background-color:black;
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
}
a:hover
{
    color:white;
}
input[type=text]:focus
{
    width: 100%;
}

</style>
</head>
<body>

<p>Add Details</p>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"   method="POST">
  Email ID
  <br/>
  <input type="text" name="email" placeholder="Your valid Email ID here">
  <br/>
  Contact Number
  <br/>
  <hr/>
  
  <input type="text" name="number" placeholder="Your valid Mobile Number here">
  <br/>
  <hr/>
  Your Favourite place to be
  <br/>
  <input type="text" name="security" placeholder="Security answer (case sensitive)">
 
  <br/>
  <br/>

<input type="submit" name="validate" value="Update"/>
<br/>
<br/>
<input type="submit" name="cancel" value="Reset"/>
</form>
<br/>
<a href='Personal_details.php'><button>Back</button></a>

</body>
<?php
session_start();

$studentid= $_SESSION['student'];
if(isset($_POST['validate']))
{

$con =mysqli_connect("localhost","root","","Student_information");

if (!$con)
{
 die("Connection error: " . mysqli_connect_errno());
}
    $email=$_POST['email'];
    $number=$_POST['number'];
    $security=$_POST['security'];
$flag=0;
if(preg_match('/^[A-Za-z0-9\.%+-]+@[A-Za-z0-9]+\.[a-z]{2,5}$/',"$email"))
{
    mysqli_query($con,"UPDATE personal_info set email_id='$email' where student_id='$studentid' ");
    $flag=1;
}
if(preg_match('/^[0-9]{10}$/',"$number"))
{
    mysqli_query($con,"UPDATE personal_info set contact_number='$number' where student_id='$studentid' ");
    $flag=1;
}
if(preg_match('/^[[A-Za-z0-9]]+$/',"$security"))
{
    mysqli_query($con,"UPDATE credentials set security_answer='$security' where student_id='$studentid' ");
    $flag=1;
}
if($flag==0)
{
        
        echo "<br/>Enter a valid email and contact number";
}
else {
     echo "Updated.";
}
}
?>
</html>
