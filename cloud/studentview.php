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
<h2>STUDENT DETAILS</h2>
    </head>
<meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

<div style="background-color:#6495ED;width:1550px;height:70px;left:0px;float:top;">
<a href="logout.php"><button style="position:absolute;right:20px;top:27px;width:100px;height:40px;border-radius: 12px;background-color:deeppink; box-shadow: 0 9px #999;cursor: pointer;">Logout</button></a>
</div>

<style>
td,th {
  height: 40px;
  left:70px;
  width:100px;
  vertical-align: center;
  text-align:center;
  padding:10px;
}
h2
{
 position: absolute;
  top: 20px;
  left:640px;
  
}
table
{
 position: absolute;
float:left; 
margin-left:-100px;
}
body
{
 background-color:lightcyan;
}
button
{
cursor:pointer;
}
</style>
    <body>
<?php
session_start();
$ccid=$_SESSION['CID'];
/*-------------------*/
if(!$ccid){
     header('Refresh:0; url=logout.php');
         echo 'Illegal Entry.............';}





/*-------------------*/




  /* Connect to MySQL and select the database. */
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

<th>VIEW</th>


<th>REJECT</th>


</tr>";

 
$result=mysqli_query($connection,"SELECT REGNO,STUDENTNAME,C_ID,COMPANYNAME FROM APPLIED WHERE C_ID='$ccid' ");
 $i=1;
while($row = mysqli_fetch_array($result))

  {
 
  echo "<tr>";
echo "<td>" . $i . "</td>";


  echo "<td>" . $row['REGNO'] . "</td>";

  echo "<td>" . $row['STUDENTNAME']."</td>";


  echo "<td>" . $row['C_ID'] . "</td>";

  echo "<td>" . $row['COMPANYNAME'] . "</td>";
   
  echo "<td>"."<a href='infostudent.php?rns={$row['REGNO']}'><button>VIEW</button></a>"."</td>";
   
  echo "<td>"."<a href='deleted.php?del={$row['REGNO']}' onclick='return confirm(\"Are you sure to delete?\")'><button>Reject</button></a>"."</td>";


  echo "</tr>";
$i++;

  }

echo "</table>";

 

mysqli_close($connection);

?> 
    </body>
    </html>