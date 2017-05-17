<html>
<head>
 <title>request_credentials</title>
    <link rel="stylesheet" type="text/css" href="Login.css" id="error"></link>
</head>
<body>
<div class="container">
        <img src="images/login_men22.png">
        <form action="request_credentials.php" method="POST">
            <div class="form_input">
                <input type="text" name="name" placeholder="Your name here">
            </div>

            <div class="form_input">
                <input type="text" name="roll_number" placeholder="College roll number here">
            </div>

            <div class="form_input">
                <input type="password" name="security" placeholder="Security answer here">
            </div>
            <input type="submit" name="submit" value="Fetch Details" class="button_login"></input>
            <br/>
        </form>
    </div>
<?php
$con =mysqli_connect("localhost","root","","Student_information");

if(isset($_POST['submit']))
{
$name= $_POST['name'];
$roll_number= $_POST['roll_number'];
$security=$_POST['security'];
if (!$con)
{
 die("Connection error: " . mysqli_connect_errno());
}
$result=mysqli_query($con,"Select * from credentials");
$num_rows=mysqli_num_rows($result);
$flag=0;
for($i=0;$i<=$num_rows;$i++)
{
    $row=mysqli_fetch_assoc($result);
    if($name==$row['name']&&$name!=NULL)
    {
        if($roll_number==$row['roll_number']&& $roll_number!=NULL)
        {
            if($security==$row['security_answer'])
            {
            echo  "Your student id is ".$row['student_id'] ;
            echo "<br/>";
            echo "Your password is ".$row['password'] ;
            $flag=1;
            }
        }
    }
}
if($flag==0)
      {
    echo "<div style='font-size:25px;color:white;margin-left:570px'>You are not registered</div>";
      }
}
mysqli_close($con);
?>
</body>
</html>