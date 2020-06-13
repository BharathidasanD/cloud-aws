<?php include "dbinfo.inc"; ?> 
<?php
session_start();

  $connection = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD,DB_DATABASE);

  if (mysqli_connect_errno()) echo "Failed to connect to MySQL: " . mysqli_connect_error(); 

$cid=$_GET['ci'];
$cn=$_GET['cn'];
$regno=$_GET['re'];
$sn=mysqli_query($connection,"SELECT * FROM STUDENTINFO WHERE REGNO='$regno' ");
$name = mysqli_fetch_assoc($sn);
$sname=$name['FULL_NAME'];
     
VerifyAPPLIEDTable($connection, DB_DATABASE); 

Applycompany($connection, $regno,$sname,$cid,$cn);



?>
<?php
function Applycompany($connection,$regno,$sname,$cid,$cn) {

   $a=mysqli_real_escape_string($connection,$regno);
   $b = mysqli_real_escape_string($connection,$sname);
    $c = mysqli_real_escape_string($connection,$cid);
   $d = mysqli_real_escape_string($connection, $cn);
  
if(mysqli_query($connection,"SELECT REGNO FROM APPLIED WHERE REGNO='$a' AND C_ID='$c'"))
{
   $query = "INSERT INTO APPLIED VALUES('$a','$b','$c','$d');";
 
   if(!mysqli_query($connection, $query)) echo("<p>Error adding apply data.</p>");
   else
   {
         header('Refresh:5; url=studentinfoview.php');
         echo "you are successfully applied for ".$cn."  company ";

   }

}

else
{
 header('Refresh:5; url=companyview.php');
  echo"You have already applied";
}
}


function VerifyAPPLIEDTable($connection, $dbName) {
  if(!TableExists("APPLIED", $connection, $dbName)) 
  { 
     $query = "CREATE TABLE `APPLIED` (
         `REGNO` VARCHAR(255) UNIQUE,
          `STUDENTNAME` varchar(255) UNIQUE ,
          `C_ID` varchar(255) UNIQUE,
          `COMPANYNAME` varchar(255) UNIQUE
           )";
       

     if(!mysqli_query($connection, $query)) echo(" <p>Error creating table.</p> ");
   }
}


function TableExists($tableName, $connection, $dbName) {
  $t = mysqli_real_escape_string($connection, $tableName);
  $d = mysqli_real_escape_string($connection, $dbName);

  $checktable = mysqli_query($connection, 
      "SELECT TABLE_NAME FROM information_schema.TABLES WHERE TABLE_NAME = '$t' AND TABLE_SCHEMA = '$d'");

  if(mysqli_num_rows($checktable) > 0) return true;

  return false;
}
?>



