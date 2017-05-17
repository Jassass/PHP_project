<html>
<head>
 <title>change_password</title>
    <link rel="stylesheet" type="text/css" href="Login.css" id="error"></link>
</head>
<body>
<div class="container">
        <img src="images/login_men22.png">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
            
            <div class="form_input">
                <input type="text" name="username" placeholder="student ID">
            </div>            
            <div class="form_input">
                <input type="text" name="old_password" placeholder="old password">
            </div>

            <div class="form_input">
                <input type="text" name="new_password" placeholder="New passowrd">
            </div>

            <div class="form_input">
                <input type="text" name="confirm_password" placeholder="Confirm password">
            </div>
            <input type="submit" name="submit" value="Done" class="button_login"></input>
            <br/>
        </form>
    </div>
<?php
$con =mysqli_connect("localhost","root","","Student_information");

if(isset($_POST['submit']))
{
$username= $_POST['username'];
$password= $_POST['old_password'];
$new_password=$_POST['new_password'];
$confirm=$_POST['confirm_password'];
if (!$con)
{
 die("Connection error: " . mysqli_connect_errno());
}
$result=mysqli_query($con,"select * from credentials where student_id='$username'");
$row=mysqli_fetch_assoc($result);
if($row['password']==$password&&$row['password']!=NULL)
{
    if($new_password==$confirm && $new_password!=NULL&&$confirm!=NULL)
    {
     mysqli_query($con,"update credentials set password='$new_password' where student_id='$username' ");
     echo "<div style='font-size:25px;color:white;margin-left:560px'>Password successfully Updated!</div>";
    }
    else {
        echo "<div style='font-size:25px;color:white;margin-left:560px'>Password not verified</div>";
    }
}
else {
    echo "<div style='font-size:25px;color:white;margin-left:560px'>Student id or password is incorrect</div>";
}
}
mysqli_close($con);
?>
</body>
</html>