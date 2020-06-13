<?php include "dbinfo.inc"; ?>
<?php

  /* Connect to MySQL and select the database. */
  $connection = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD,DB_DATABASE);

  if (mysqli_connect_errno()) echo "Failed to connect to MySQL: " . mysqli_connect_error();
else
{
echo "connected";
}
?>
<?php

$aqury="CREATE TABLE ADMIN(
ADMINUNAME VARCHAR(255) PRIMARY KEY,
ADMINPWD   VARCHAR(255)
)";
if(mysqli_query($connection,$aqury))
{
echo "creadted";
}

if(mysqli_query($connection,"INSERT INTO ADMIN VALUES('bharathidasandurai','22092014')"))
{
echo "Inserted";
}
else
{
  echo "problem";
}

?>