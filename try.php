<?php
$con=mysqli_connect("localhost","root","","student_information");
if (!$con)
{
 die("Connection error: " . mysqli_connect_errno());
}
$result=mysqli_query($con,"Select * from details");

$row=mysqli_fetch_assoc($result);
while($row)
{
echo $row['NAME']." ".$row['ROLL_NUMBER']." ".$row['PHP']." ".$row['DBMS']." ".$row['OS']."->".(($row['OS']+$row['DBMS']+$row['PHP'])/3);
$row=mysqli_fetch_assoc($result);
}
mysqli_close($con);
$x= array ("YO"=>"JASSA","YOO"=>"SAHIL","YOOO"=>"SAMARTH");
foreach($x as $i=>$j)
{
echo "<br>";
    echo "$i"."$j";
}




?>





