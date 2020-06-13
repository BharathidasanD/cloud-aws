<?php include "dbinfo.inc"; ?> 
<!doctype html>
    <html lang="en">
    <head>
<script>
  function preventBack(){window.history.forward();}
  setTimeout("preventBack()", 0);
  window.onunload=function(){null};
</script>
      <meta charset="UTF-8">
      <title>Student Details</title>
<h2>STUDENT APPLIED DETAILS</h2>
    </head>
<div style="background-color:#6495ED;width:1530px;height:70px;left:0px;float:top;"> 
<a href="logout.php"><button style="position:absolute;right:20px;top:27px;width:100px;height:40px;border-radius: 12px;background-color:navy; box-shadow: 0 9px #999;cursor: pointer;">Logout</button></a>
</div>

<style>
td,th {
  height: 40px;
  left:150px;
  width:100px;
  vertical-align: center;
  text-align:center;
  padding:10px;
}
h2
{
 position: absolute;
  top: 20px;
  left:580px;
  
}
button
{
cursor:pointer;
background-color:blue;
border-radius: 8px;
color:red;
}

table
{
 position: absolute;
float:left; 
margin-left:40px;
}
body
{
 background-color:lightcyan;
}
</style>
    <body>
<?php
session_start();
$rn=$_SESSION['REGNO'];
  /* Connect to MySQL and select the database. */
  /*-------------------*/
if(!$rn){
     header('Refresh:0; url=logout.php');
         echo 'Illegal Entry.............';}
/*-------------------*/
  $connection = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD,DB_DATABASE);

  if (mysqli_connect_errno()) echo "Failed to connect to MySQL: " . mysqli_connect_error();
?>
<?php

echo "<table  border='2' style='background-color:#FFFFFF;border-collapse:collapse;border:2px solid black;color:#000000;width:400;position:absolute;padding:50px;top:150px;left:350px;'>

<tr>
<th>S NO</th>
<th>REGNO</th>

<th>NAME</th>

<th>COMPANY ID</th>

<th>COMPANY NAME</th>

<th>STATUS</th>



</tr>";

 
$result=mysqli_query($connection,"SELECT REGNO,STUDENTNAME,C_ID,COMPANYNAME FROM APPLIED WHERE REGNO='$rn' ");
 $i=1;
while($row = mysqli_fetch_array($result))

  {
 
  echo "<tr>";
echo "<td>" . $i . "</td>";


  echo "<td>" . $row['REGNO'] . "</td>";

  echo "<td>" . $row['STUDENTNAME']."</td>";


  echo "<td>" . $row['C_ID'] . "</td>";

  echo "<td>" . $row['COMPANYNAME'] . "</td>";
   
  echo "<td>".'<button style="cursor: pointer;" disabled> APPLIED </button>'."</td>";
   

  echo "</tr>";
$i++;

  }

echo "</table>";

echo "<table>";
echo "<tr>";
echo"<td>"."<a href='studentinfoview.php' ><button>Go Back</button></a>"."</td>";
echo"</tr>";
echo "</table>";

 

mysqli_close($connection);

?> 
    </body>
    </html>
