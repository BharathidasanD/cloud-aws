<!DOCTYPE html>
<?php include "dbinfo.inc"; ?>
<html lang="en">
  <head>
  <script>
  function preventBack(){window.history.forward();}
  setTimeout("preventBack()", 0);
  window.onunload=function(){null};
</script>

<h3>Fill Your Details</h3>


    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />

    <!-- Bootstrap CSS -->
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
      integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
      crossorigin="anonymous"
    />
    <title>Apply Form</title>
<div style="background-color:#6495ED;width:1515px;height:90px;left:0px;float:top;"> 
<a href="logout.php"><button style="position:absolute;right:20px;top:27px;width:100px;height:40px;border-radius: 12px;background-color:deeppink; box-shadow: 0 9px #999;cursor: pointer;">Logout</button></a>
</div>

<style>
.bg {
  /* The image used */
  background-image: url("download.jpg");

  /* Full height */
  height: 100%; 

  /* Center and scale the image nicely */
  background-position: center;
  background-size: cover;
}
h3
{
position:absolute;
left:550px;
top:30px;
font-style: italic;
}
h4
{
position:absolute;
top:30px;
font-style: italic;

}

</style>
  </head>
  <body class="bg">
<?php
session_start();
$iregu=$_SESSION['regno'];
/*-----------------*/
if(!$iregu)
{
       echo 'Illegal entry.......';
    header('Refresh:0; url=logout.php');
    
      
}
/*==================*/
  /* Connect to MySQL and select the database. */
  $connection = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD);

  if (mysqli_connect_errno()) echo "Failed to connect to MySQL: " . mysqli_connect_error();

  $database = mysqli_select_db($connection, DB_DATABASE);
echo "<h4>Welcome ".$_SESSION['regno']."</h4>";


  /* Ensure that the Employees table exists. */
  VerifySTUDENTINFOTable($connection, DB_DATABASE); 

  /* If input fields are populated, add a row to the Employees table. */
  $regno=htmlentities($_POST['regno']);
$full_name = htmlentities($_POST['fullname']);
$phone=htmlentities($_POST['phone']);
  $email=htmlentities($_POST['email']);
  $intname = htmlentities($_POST['intname']);
  $dptname = htmlentities($_POST['dptmt']);
  $cgpa=htmlentities($_POST['cgpa']);
  $noar=htmlentities($_POST['arear']);  
  $abt=htmlentities($_POST['abturslf']); 
  $areaex=htmlentities($_POST['areaex']);
  $ten=htmlentities($_POST['ten']);
   $twelf=htmlentities($_POST['twelf']);

  $orn=$_SESSION['regno'];
  $_SESSION['REGNO']=$orn;


  if (strlen($regno) || strlen($phone) || strlen($email)) {
    AddStudentinfo($connection,$regno,$full_name ,$phone,$email,$intname ,$dptname ,$cgpa,$noar ,$abt, $areaex, $ten, $twelf);
  }

?>


<section>
    <div class="container">
      <br /><br /><br /><br /><br />
      <div class="card is-primary">
        <div class="card-body">
          <h5 class="card-title">Please fill in your details</h5>
          <form action="<?PHP echo $_SERVER['SCRIPT_NAME'] ?>" method="POST">
             <div class="form-group">
              <label for="fullName">Reg Number</label>
              <input
                type="text"
                name="regno"
                class="form-control"
                id="fullName"
                aria-describedby="emailHelp"
                placeholder="Regno"
                required
              />
            </div>

            <div class="form-group">
              <label for="fullName">Full Name</label>
              <input
                type="text"
                name="fullname"
                class="form-control"
                id="fullName"
                aria-describedby="emailHelp"
                placeholder="Enter your full name"
                required
              />
            </div>
            <div class="form-group">
              <label for="phoneNumber">Phone Number</label>
              <input
                type="text"
                name="phone"
                size="10"
                class="form-control"
                id="phoneNumber"
                placeholder="Your phone number"
                required
              />
            </div>
            <div class="form-group">
              <label for="email">Email ID</label>
              <input
                type="email"
                name="email"
                class="form-control"
                id="email"
                placeholder="Your email ID"
                 required
              />
            </div>
            <div class="row">
              <div class="col-sm">
                <div class="form-group">
                  <label for="institution">Institution Name</label>
                  <input
                    type="text"
                    name="intname"
                    class="form-control"
                    id="institution"
                    placeholder="Full official name of institution"
                   required
                  />
                </div>
              </div>
              <div class="col-sm">
                <div class="form-group">
                  <label for="department">Department</label>
                  <input
                    type="text"
                    name="dptmt"
                    class="form-control"
                    id="department"
                    placeholder="Your department"
                   required
                  />
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-sm">
                <div class="form-group">
                  <label for="cgpa">CGPA</label>
                  <input
                    type="text"
                    class="form-control"
                    name="cgpa"
                    id="cgpa"
                    placeholder="Your current CGPA (do not round off)"
                     required
                  />
                </div>
              </div>
              <div class="col-sm">
                <div class="form-group">
                  <label for="arrear">No. of Arrears/Backlogs (if any)</label>
                  <input
                    type="number"
                    name="arear"
                    class="form-control"
                    min="0"
                    max="10"
                    id="cgpa"
                    placeholder="No. of Arrears/Backlogs (if any)"
                    required
                  />

                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm">
                <div class="form-group">
                  <label for="about">About yourself</label>
                  <textarea
                    class="form-control"
                    id="about"
                    rows="3"
                    name="abturslf"
                    placeholder="Express in a concise manner"
                    required
                  ></textarea>
                </div>
              </div>
              <div class="col-sm">
                <div class="form-group">
                  <label for="about">Area of expertise</label>
                  <textarea
                    class="form-control"
                    id="about"
                    rows="3"
                    name="areaex"
                    placeholder="Use keywords"
                    required
                  ></textarea>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm">
                <div class="form-group">
                  <label for="10th">Performance in 10th</label>
                  <input
                    type="text"
                    name="ten"
                    class="form-control"
                    id="10th"
                    placeholder="Percentage in 10th"
                   required
                  />
                </div>
              </div>
              <div class="col-sm">
                <div class="form-group">
                  <label for="12th">Performance in 12th</label>
                  <input
                    type="text"
                    name="twelf"
                    class="form-control"
                    id="12th"
                    placeholder="Percentage in 12th"
                    required
                  />
                </div>
              </div>
            </div>
            <div class="row justify-content-center">
              <div class="col-1">
                <button type="submit" class="btn btn-primary">
                  Update
                </button>
            </div>
<!--<a href="studentinfoview.php" style="position:absolute;left:300px;">
                  After fill click me
                </a>-->

          </form>
        </div>
      </div>
    </div>
 </section>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script
      src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
      integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
      integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
      integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
      crossorigin="anonymous"
    ></script>
  </body>
</html>


<?php

/* Add an employee to the table. */
function AddStudentinfo($connection,$regno,$full_name ,$phone,$email,$intname ,$dptname ,$cgpa,$noar , $abt, $areaex, $ten, $twelf) {
  
 
   $r=mysqli_real_escape_string($connection, $regno);
   $fn = mysqli_real_escape_string($connection, $full_name);
$p = mysqli_real_escape_string($connection, $phone);
   $e = mysqli_real_escape_string($connection, $email);
    $in = mysqli_real_escape_string($connection, $intname);
    $dn= mysqli_real_escape_string($connection,$dptname);
     $cg= mysqli_real_escape_string($connection,$cgpa );
  $na= mysqli_real_escape_string($connection,$noar );
$abt=mysqli_real_escape_string($connection,$abt );
$aex=mysqli_real_escape_string($connection,$areaex );
$t=mysqli_real_escape_string($connection,$ten);
$tw=mysqli_real_escape_string($connection,$twelf);

   $query = "INSERT INTO `STUDENTINFO` VALUES('$r','$fn','$p','$e','$in','$dn','$cg','$na','$abt','$aex','$t','$tw');";
 
   if(!mysqli_query($connection, $query)) echo("<p>Error adding STUDENTINFO data.</p>");
   else
   {
         header('Refresh:5; url=studentinfoview.php');
         echo 'Successfully added';
   }

}

/* Check whether the table exists and, if not, create it. */
function VerifySTUDENTINFOTable($connection, $dbName) {
  if(!TableExists("STUDENTINFO", $connection, $dbName)) 
  { 
     $query = "CREATE TABLE `STUDENTINFO` (
         `REGNO` VARCHAR(255) PRIMARY KEY,
         `FULL_NAME` varchar(255),
         `PHONE` varchar(255),
         `EMAIL` varchar(255),
         `COLLAGE` varchar(255),
          `DPARTMENT` varchar(255),
           `CGPA`  varchar(255),
          `NO_AREAR` varchar(90), 
            `ABTURSLF` varchar(90), 
            `AREAEX` varchar(90), 
             `TEN` varchar(90), 
             `TWELVE` varchar(90) 
       )";
       

     if(!mysqli_query($connection, $query)) echo(" <p>Error creating table.</p> ");
  }
}

/* Check for the existence of a table. */
function TableExists($tableName, $connection, $dbName) {
  $t = mysqli_real_escape_string($connection, $tableName);
  $d = mysqli_real_escape_string($connection, $dbName);

  $checktable = mysqli_query($connection, 
      "SELECT TABLE_NAME FROM information_schema.TABLES WHERE TABLE_NAME = '$t' AND TABLE_SCHEMA = '$d'");

  if(mysqli_num_rows($checktable) > 0) return true;

  return false;
}
?>


