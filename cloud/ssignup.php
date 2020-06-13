<!DOCTYPE html>
<?php include "dbinfo.inc"; ?>
<html>
  <head>
  <script>
  function preventBack(){window.history.forward();}
  setTimeout("preventBack()", 0);
  window.onunload=function(){null};
</script>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Student Sign Up</title>
    <link
      rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
    />
    <link
      href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700"
      rel="stylesheet"
    />
    <!-- Bulma Version 0.7.4-->
    <link
      rel="stylesheet"
      href="https://unpkg.com/bulma@0.7.4/css/bulma.min.css"
    />
    <link rel="stylesheet" type="text/css" href="../css/login.css" />
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
</style>

<div style="background-color:#6495ED;width:1800px;height:90px;left:0px;float:top;"> 
</div>

  </head>
  <body class="bg">
<?php

  /* Connect to MySQL and select the database. */
  $connection = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD);

  if (mysqli_connect_errno()) echo "Failed to connect to MySQL: " . mysqli_connect_error();

  $database = mysqli_select_db($connection, DB_DATABASE);

  /* Ensure that the Employees table exists. */
  VerifySTUDENTTable($connection, DB_DATABASE); 

  /* If input fields are populated, add a row to the Employees table. */
  
  $regno=htmlentities($_POST['regno']);
$f_name = htmlentities($_POST['firstname']);
$l_name = htmlentities($_POST['lastname']);
  $email=htmlentities($_POST['email']);
  $phone=htmlentities($_POST['phone']);
  $s_address = htmlentities($_POST['address']);
  $pwd=htmlentities($_POST['pwd']);
  $cpwd=htmlentities($_POST['cpwd']);  
  $gender=htmlentities($_POST['gender']); 
 


  if (strlen($regno) || strlen($s_address) || strlen($email)) {
    AddStudent($connection, $regno,$f_name,$l_name,$email,$phone,$s_address,$pwd,$cpwd,$gender);
  }
?>

    <section class="hero is-fullheight">
    
      <div class="hero-body">
        <div class="container has-text-centered">
          <div class="column is-6 is-offset-3">
		  <div style="background-color:DeepPink  ;border-radius:5px;" >
            <h3 class="title has-text-white" >Sign Up</h3>
            <p class="subtitle has-text-white" >Please fill in your details.</p></div>
            <div class="box">
              <form action="<?PHP echo $_SERVER['SCRIPT_NAME'] ?>" method="POST" >
                <div class="columns">
                  <div class="column is-6">
                    <div class="field">
                      <div class="control">
                        <input
                          class="input is-large"
                          type="text"
                          placeholder="First Name"
                          name="firstname"
                          required
                        />
                      </div>
                    </div>
                  </div>
                  <div class="column is-6">
                    <div class="field">
                      <div class="control">
                        <input
                          class="input is-large"
                          type="text"
                          placeholder="Last Name"
                          name="lastname"
                          required
                        />
                      </div>
                    </div>
                  </div>
                </div>
                <div class="columns">
                  <div class="column is-12">
                    <div class="field">
                      <div class="control">
                        <input
                          class="input is-large"
                          type="username"
                          placeholder="Username/Reg-no"
                          name="regno"
                          autofocus=""
                          required
                        />
                      </div>
                    </div>
                  </div>
                </div>
                <div class="columns">
                  <div class="column is-12">
                    <div class="field">
                      <div class="control">
                        <input
                          class="input is-large"
                          type="email"
                          name="email"
                          placeholder="E-mail"
                          autofocus=""
                          required
                        />
                      </div>
                    </div>
                  </div>
                </div>
				 <div class="columns">
                  <div class="column is-12">
                    <div class="field">
                      <div class="control">
                        <input
                          class="input is-large"
                          type="text"
                          name="phone"
			  pattern="[7-9]{1}[0-9]{8}[0-9]{1}"
                          placeholder="phone"
                          autofocus=""
                          required
                        />
                      </div>
                    </div>
                  </div>
                </div>
				 <div class="columns">
                  <div class="column is-12">
                    <div class="field">
                      <div class="control">
                        <input
                          class="input is-large"
                          type="text"
                          name="address"
                          placeholder="Address"
                          autofocus=""
                          required
                        />
                      </div>
                    </div>
                  </div>
                </div>				
                
                <div class="columns" >
                  <div class="column is-6">
                    <div class="field">
                      <div class="control">
                        <input 
                          class="input is-large"
                          type="password"
                          name="pwd"
                          placeholder="Password"
                          required
                        />
                      </div>
                    </div>
                  </div>
                  <div class="column is-6">
                    <div class="field">
                      <div class="control">
                        <input
                          class="input is-large"
                          type="password"
                          name="cpwd"
                          placeholder="Confirm Password"
                          required
                        />
                      </div>
                    </div>
                  </div>
                </div>
				<div class="columns" >
                  <div class="column is-6">
                    <div class="field">
                      <div class="control">
                      <div class="select is-success is-large">
                      <select name="cadre" required>
                        <option>Select cadre</option>                     
                        <option value="student">Student</option>                       
                      </select>
                    </div>
                      </div>
                    </div>
                  </div>
                  <div class="column is-6">
                    <div class="field">
                      <div class="control">
                                            <div class="select is-success is-large">
                      <select name="gender" required>
                        <option>Select gender</option>                     
                        <option value="male">Male</option> 
                        <option value="female">Female</option>                       
                        <option value="other">Other</option>                       						
                      </select>
                    </div>
                      </div>
                    </div>
                  </div>
                </div>
				
                <button
                  class="button is-large is-danger is-rounded is-centered" type="submit" name="submit"
                >
                  Sign Up Now
                </button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
    <script async type="text/javascript" src="../js/bulma.js"></script>
  </body>
</html>
<?php

/* Add an employee to the table. */
function AddStudent($connection,$regno,$f_name,$l_name,$email,$phone,$s_address,$pwd,$cpwd,$gender) {
  
 if($pwd!=$cpwd)
  {
     header('Refresh:5; url=signup.php');
     echo 'Check your password must same';
  }
else{
   $r=mysqli_real_escape_string($connection, $regno);
   $fn = mysqli_real_escape_string($connection, $f_name);
    $ln = mysqli_real_escape_string($connection, $l_name);
   $e = mysqli_real_escape_string($connection, $email);
   $p = mysqli_real_escape_string($connection, $phone);
    $a = mysqli_real_escape_string($connection, $s_address);
    $pw= mysqli_real_escape_string($connection, $pwd);
     $g= mysqli_real_escape_string($connection, $gender);

   $query = "INSERT INTO `STUDENT` VALUES('$r','$fn','$ln','$e','$p','$a','$g','$pw');";
 
   if(!mysqli_query($connection, $query)) echo("<p>Error adding Student data.</p>");
   else
   {
         header("Location:login.php");
         echo 'Wait your login page load soon';

   }
}
}

/* Check whether the table exists and, if not, create it. */
function VerifySTUDENTTable($connection, $dbName) {
  if(!TableExists("STUDENT", $connection, $dbName)) 
  { 
     $query = "CREATE TABLE `STUDENT` (
         `REGNO` VARCHAR(255) PRIMARY KEY,
         `F_NAME` varchar(255),
          `L_NAME` varchar(255),
         `EMAIL` varchar(255),
         `PHONE` varchar(255),
         `S_ADDRESS` varchar(90),
           `GENDER` varchar(90),
          `PASSWORD` varchar(90) 
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


