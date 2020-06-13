<?php include "dbinfo.inc"; ?>
<?php

  /* Connect to MySQL and select the database. */
  $connection = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD,DB_DATABASE);

  if (mysqli_connect_errno()) echo "Failed to connect to MySQL: " . mysqli_connect_error();
?>
<html>
<h2> WELCOME ADMIN </h2>
<div style="background-color:#6495ED;width:1525px;height:70px;left:0px;float:top;"> 
<a href="logout.php"><button style="position:absolute;right:20px;top:27px;width:100px;height:40px;border-radius: 12px;background-color:deeppink; box-shadow: 0 9px #999;cursor: pointer;">Logout</button></a>
</div>
 <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />


<style>
h2
{
 position: absolute;
  top: 25px;
  left:570px;
  
}

table,td,th {
  height: 40px;
  left:50px;
  width:160px;
  vertical-align: center;
  text-align:center;
  padding:10px;
}
button
{
cursor:pointer;
color:navy;
border-radius: 8px
}
body
{
 background-image: url("index.jpg");
 background-color: #cccccc;
}

</style>
<body>
<table border='2' style='background-color:#FFFFFF;border-collapse:collapse;border:2px solid black;color:#000000;width:400;position:absolute;padding:50px;top:150px;left:500px;'>
<tr>
<th style="color:blue;">STUDENT</th>
<th style="color:red;">COMPANY</th>
</tr>
<tr>
<td><a href="editstudent.php"><button>Edit student</button></a></td>
<td><a href="editcompany.php"><button>Edit company</button></a></td>
</tr>
<tr>
<td><a href="adminscview.php"><button>Applied Student's</button></a></td>
<td><a href="#"><button>Edit company</button></a></td>
</tr>
</table>

</body>


</html>