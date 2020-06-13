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

$dele=$_GET['ciid'];
if(mysqli_query($connection,"DELETE FROM COMPANY WHERE C_ID='$dele'"))
{
    if(mysqli_query($connection,"DELETE FROM APPLIED WHERE C_ID='$dele'"))
{
          header('Refresh:2; url=adminlogin.php');
        echo $dele." is DELETED successfully";
}
}


?>
</body>
</html>