<?php include "dbinfo.inc"; ?> 
<html lang="en">
<head></head>
<title>Student Details</title>

<body>

<?php
 $connection = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD,DB_DATABASE);

  if (mysqli_connect_errno()) echo "Failed to connect to MySQL: " . mysqli_connect_error();
?>

<?php

$del=$_GET['del'];
if(mysqli_query($connection,"DELETE FROM APPLIED WHERE REGNO='$del'"))
{
    
          header('Refresh:5; url=studentview.php');
        echo $del." is rejected successfully";
}


?>
</body>
</html>