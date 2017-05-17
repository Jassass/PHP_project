<html>
<head>
<title>assessment_details</title>
<link rel="stylesheet" type="text/css" href="library_details.css"></link>
</head>

<?php
session_start();

$studentid= $_SESSION['student'];

$con =mysqli_connect("localhost","root","","Student_information");

if (!$con)
{
 die("Connection error: " . mysqli_connect_errno());
}
$result=mysqli_query($con,"Select * from assessment_details where student_id = '$studentid'");
$num_rows=mysqli_num_rows($result);

for($i=0;$i<$num_rows;$i++)
{
    $row=mysqli_fetch_assoc($result);
        $Name=$row['name'];
        $Student_ID=$row['student_id'];
        $PHP=$row['PHP'];
        $Software=$row['Software'];
        $DBMS=$row['DBMS'];
        $Algorithms=$row['Algorithms'];
        $average=($PHP+$Software+$DBMS+$Algorithms)/4;

        if($average>20&&$average<=25)
        $grade="A+";
        if($average>15&&$average<=20)
        $grade="A";
        if($average>10&&$average<=15)
        $grade="B";
        if($average>5&&$average<=10)
        $grade="C";
        if($average>=0&&$average<=5)
        $grade="D";
}
mysqli_close($con);
?>
<body>


<table>
  <tr>
    <th>Assessment Details</th>
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
    PHP : $PHP
    </div>";
    ?>
    </td>
  </tr>
  
  <tr>
    <td>
<?php
    echo "<div style='font-size:20px;text-align: left;padding: 5px;font-family: sans-serif;'>
    Software : $Software
    </div>";
    ?>
    </td>
  </tr>

<tr>
    <td>
<?php
    echo "<div style='font-size:20px;text-align: left;padding: 5px;font-family: sans-serif;'>
    DBMS : $DBMS
    </div>";
    ?>
    </td>
</tr>

<tr>
    <td>
<?php
    echo "<div style='font-size:20px;text-align: left;padding: 5px;font-family: sans-serif;'>
    Algorithms : $Algorithms
    </div>";
    ?>
    </td>
</tr>

<tr>
    <td>
<?php
    echo "<div style='font-size:20px;text-align: left;padding: 5px;font-family: sans-serif;'>
    Average : $average
    </div>";
    ?>
    </td>
</tr>
<tr>
    <td>
<?php
    echo "<div style='font-size:20px;text-align: left;padding: 5px;font-family: sans-serif;'>
    Grade : $grade
    </div>";
    ?>
    </td>
</tr>
</table>
<a href="header.php"><button name="Back" style="font-size:20px;color:white;background-color:black"/>Back</button></a>


</body>
</html>