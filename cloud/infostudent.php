<!DOCTYPE html>
<?php include "dbinfo.inc"; ?>
<html lang="en">

<?php
 $connection = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD,DB_DATABASE);

  if (mysqli_connect_errno()) echo "Failed to connect to MySQL: " . mysqli_connect_error();
?>
<head>
<script>
  function preventBack(){window.history.forward();}
  setTimeout("preventBack()", 0);
  window.onunload=function(){null};
</script>
<meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

<h2>STUDENT DETAILS</h2>
<div style="background-color:#6495ED;width:1515px;height:100px;left:-100px;top:-100px;"> 
<a href="logout.php"><button style="position:absolute;right:20px;top:45px;width:100px;height:40px;border-radius: 12px;background-color:deeppink; box-shadow: 0 9px #999;cursor: pointer;">Logout</button></a>
</div>

</head>
<title>Student Details</title>



<style>
td,th {
  height: 40px;
  width:250px;
  vertical-align: center;
  text-align:center;
  padding:10px;
}
h2
{
 position: absolute;
  top: 25px;
  left:570px;
  
}
button
{
cursor:pointer;
background-color:blue;
border-radius: 8px
}

body
{
 background-color:lightcyan;
}
</style>

<body>
<table border='2' style='background-color:#FFFFFF;border-collapse:collapse;border:2px solid black;color:#000000;width:1000;position:absolute;padding:50px;top:140px;left:300px;'>
<tr>
<th colspan="3">STUDENT DETAILS</th>
</tr>
<?php
$rn=$_GET['rns'];
$result = mysqli_query($connection, "SELECT REGNO,FULL_NAME,PHONE,EMAIL,COLLAGE,DPARTMENT,CGPA,NO_AREAR,ABTURSLF,AREAEX,TEN,TWELVE FROM STUDENTINFO WHERE REGNO='$rn' "); 
$row=mysqli_fetch_assoc($result);
$a=$row['REGNO'];
$b=$row['FULL_NAME'];
$c=$row['PHONE'];
$d=$row['EMAIL'];
$e=$row['COLLAGE'];
$f=$row['DPARTMENT'];
$g=$row['CGPA'];
$h=$row['NO_AREAR'];
$i=$row['ABTURSLF'];
$j=$row['AREAEX'];
$k=$row['TEN'];
$l=$row['TWELVE'];

echo"<tr>
<td>1</td>
<td>REISTER NUMBER</td>
<td>$a</td>
</tr>";
 
echo"<tr>
<td>2</td>
<td>STUDENT NAME</td>
<td>$b</td>
</tr>";

echo"<tr>
<td>3</td>
<td>PHONE</td>
<td>$c</td>
</tr>";

echo"<tr>
<td>4</td>
<td>EMAIL</td>
<td>$d</td>
</tr>";

echo"<tr>
<td>5</td>
<td>INSTITUTION</td>
<td>$e</td>
</tr>";

echo"<tr>
<td>6</td>
<td>DEPARTMRNT</td>
<td>$f</td>
</tr>";

echo"<tr>
<td>7</td>
<td>CGPA</td>
<td>$g</td>
</tr>";

echo"<tr>
<td>8</td>
<td>NUMBER OF AREAR</td>
<td>$h</td>
</tr>";

echo"<tr>
<td>9</td>
<td>ABOUT YOUR SELF</td>
<td>$i</td>
</tr>";

echo"<tr>
<td>10</td>
<td>AREA OF INTEREST</td>
<td>$j</td>
</tr>";


echo"<tr>
<td>11</td>
<td>10'th PERFOMANCE</td>
<td>$k</td>
</tr>";

echo"<tr>
<td>12</td>
<td>12'th PERFOMANCE</td>
<td>$l</td>
</tr>";
 
  
  




?> 
</table>

<table>
<tr>
<td><a href='studentview.php' ><button>Go Back</button></a></td>
</tr>
</table>

</body>


</html>