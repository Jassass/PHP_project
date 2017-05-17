<html>
<head>
<title>Personal_details</title>
<link rel="stylesheet" type="text/css" href="Personal_details.css"></link>
</head>

<?php
session_start();

$studentid= $_SESSION['student'];

$con =mysqli_connect("localhost","root","","Student_information");

if (!$con)
{
 die("Connection error: " . mysqli_connect_errno());
}
$result=mysqli_query($con,"Select * from personal_info");//this query can be made easier.
$num_rows=mysqli_num_rows($result);
for($i=0;$i<$num_rows;$i++)
{
    $row=mysqli_fetch_assoc($result);
    if($studentid==$row['student_id'])
    {
        $Name=$row['name'];
        $Student_ID=$row['student_id'];
        $Roll_number=$row['roll_number'];
        $Course=$row['course'];
        $Batch=$row['batch'];
        $Address=$row['address'];
        $Email_ID=$row['email_id'];
        $Contact_number=$row['contact_number'];
        break;
    }
}
mysqli_close($con);
?>
<body>

<table>
  <tr>
    <th>Personal Details</th>
  </tr>
  <tr>
    <td>
    <?php
    echo "<div style='font-size:20px;text-align: left;padding: 5px;font-family: sans-serif;'>
    Name : $Name
    </div>";
    ?>
    </td>
  </tr>

  <tr>
    <td> 
  <?php
    echo "<div style='font-size:20px;text-align: left;padding: 5px;font-family: sans-serif;'>
    Student ID : $Student_ID
    </div>";
    ?>
    </td>
  </tr>

  <tr>
    <td> 
  <?php
    echo "<div style='font-size:20px;text-align: left;padding: 5px;font-family: sans-serif;'>
    Roll number : $Roll_number
    </div>";
    ?>
    </td>
  </tr>
  
  <tr>
    <td>
<?php
    echo "<div style='font-size:20px;text-align: left;padding: 5px;font-family: sans-serif;'>
    Course : $Course
    </div>";
    ?>
    </td>
  </tr>

<tr>
    <td>
<?php
    echo "<div style='font-size:20px;text-align: left;padding: 5px;font-family: sans-serif;'>
    Batch : $Batch
    </div>";
    ?>
    </td>
</tr>

<tr>
    <td>
<?php
    echo "<div style='font-size:20px;text-align: left;padding: 5px;font-family: sans-serif;'>
    Address : $Address
    </div>";
    ?>
    </td>
</tr>

<tr>
    <td>
<?php
    echo "<div style='font-size:20px;text-align: left;padding: 5px;font-family: sans-serif;'>
    Email ID : $Email_ID
    </div>";
    ?>
    </td>
</tr>

<tr>
    <td> 
<?php
    echo "<div style='font-size:20px;text-align: left;padding: 5px;font-family: sans-serif;'>
    Contact number : $Contact_number
    </div>";
    ?>
    </td>
</tr>
<tr>
<td>
<form action="edit_details.php" method="POST">
<input type="submit" name="edit" value="Edit Details"/>
</form>
</td>
</tr>

</table>
<a href="header.php"><button name="Back" style="font-size:20px;color:white;background-color:black"/>Back</button></a>

</body>
</html>