<html>
<head>
<title>library_details</title>
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
$result=mysqli_query($con,"Select * from library_details where student_id = '$studentid'");
$num_rows=mysqli_num_rows($result);
$count = 0;
for($i=0;$i<$num_rows;$i++)
{
    $row=mysqli_fetch_assoc($result);
        $Name=$row['name'];
        $Student_ID=$row['student_id'];
        $book_name[$count]=$row['book_name'];
        $issued_on[$count]=$row['issued_on'];
        $return_on[$count]=$row['return_on'];
        $no_of_days[$count]=(strtotime($return_on[$count])-strtotime($issued_on[$count]))/(60*60*24);
        if($no_of_days[$count]>7)
        {
            $fine[$count] = ($no_of_days[$count]-7)*5;
        }
        else{
            $fine[$count] = 0;
        }
    $count++;
}
mysqli_close($con);
?>
<body>


<table>
  <tr>
    <th>Library Details</th>
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
<?php
for($i=0;$i<$count;$i++)
{   
    $x=$i+1;
   
    echo "<tr><td><div style='background-color:black;color:white;font-size:20px;text-align: left;padding: 5px;font-family: sans-serif;'>
    Book $x
    </div></td></tr>";


    echo "<tr><td><div style='font-size:20px;text-align: left;padding: 5px;font-family: sans-serif;'>
    Book name : $book_name[$i]
    </div></td></tr>";  
  
    echo "<tr><td><div style='font-size:20px;text-align: left;padding: 5px;font-family: sans-serif;'>
    Issuing date : $issued_on[$i]
    </div></td></tr>";
    

    echo "<tr><td><div style='font-size:20px;text-align: left;padding: 5px;font-family: sans-serif;'>
    Return date : $return_on[$i]
    </div></td></tr>";
 


    echo "<tr><td><div style='font-size:20px;text-align: left;padding: 5px;font-family: sans-serif;'>
    Number of days : $no_of_days[$i]
    </div></td></tr>";
    

    echo "<tr><td><div style='font-size:20px;text-align: left;padding: 5px;font-family: sans-serif;'>
    Fine : $fine[$i]
    </div></td></tr>";
}
?>
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