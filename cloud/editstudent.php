<?php include "dbinfo.inc"; ?> 
<!doctype html>
    <html lang="en">
    <head>
    <script>
  function preventBack(){window.history.forward();}
  setTimeout("preventBack()", 0);
  window.onunload=function(){null};
</script>
      <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

      <title>Company Details</title>
<h2>COMPANY DETAILS</h2>
    </head>

<div style="background-color:#6495ED;width:1525px;height:70px;left:0px;float:top;"> 
<a href="logout.php"><button style="position:absolute;right:20px;top:27px;width:100px;height:40px;border-radius: 12px;background-color:deeppink; box-shadow: 0 9px #999;cursor: pointer;">Logout</button></a>
</div>


<style>
table,td,th {
  height: 40px;
  left:50px;
  width:160px;
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
h4
{
 position: absolute;
  top: 10px;
  left:15px;
  
}
button
{
cursor:pointer;
color:blue;
border-radius: 8px
}

body
{
 background-color:lightcyan;
}
</style>
    <body>

<?php

  /* Connect to MySQL and select the database. */
  $connection = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD,DB_DATABASE);

  if (mysqli_connect_errno()) echo "Failed to connect to MySQL: " . mysqli_connect_error();
?>
<?php

echo "<table border='2' style='background-color:#FFFFFF;border-collapse:collapse;border:2px solid black;color:#000000;width:400;position:absolute;padding:50px;top:150px;left:350px;'>
<h4>Welcome  Admin</h4>
<tr>
<th>S NO</th>
<th>COMPANY ID</th>

<th>COMPANY NAME</th>

<th>EMAIL</th>

<th>PHONE</th>

<th>ADDRESS</th>

<th>DELETE</th>




</tr>";

$result=mysqli_query($connection,"SELECT * FROM STUDENT");
 $i=1;
while($row = mysqli_fetch_array($result))

  {
  echo "<tr>";
echo "<td>" . $i . "</td>";

   
  echo "<td>" . $row['REGNO'] . "</td>";

  echo "<td>" . $row['F_NAME'] . $row['L_NAME'] . "</td>";

  echo "<td>" . $row['EMAIL'] . "</td>";

  echo "<td>" . $row['PHONE'] . "</td>";

   echo "<td>" . $row['S_ADDRESS'] . "</td>";
   
  echo "<td>"."<a href='deletestudent.php?siid={$row['REGNO']}' onclick='return confirm(\"Are you sure to delete?\")' ><button>DELETE</button></a>"."</td>";
   



  echo "</tr>";
$i++;



  }

echo "</table>";

echo "<table>";
echo "<tr>";
echo"<td>"."<a href='adminlogin.php' ><button>Go Back</button></a>"."</td>";
echo"</tr>";
echo "</table>";

 

mysqli_close($connection);

?> 

    </body>
    </html>