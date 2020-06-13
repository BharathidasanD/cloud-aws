<?php include "dbinfo.inc"; ?>
<html >
  <head>

<style>
body
{
    background-image: url("download.jpg");
}
</style>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Company Sign Up</title>
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

<div style="background-color:#6495ED;width:1800px;height:90px;left:0px;float:top;"> 
</div>

  </head>
  <body>
<?php

  /* Connect to MySQL and select the database. */
  $connection = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD);

  if (mysqli_connect_errno()) echo "Failed to connect to MySQL: " . mysqli_connect_error();

  $database = mysqli_select_db($connection, DB_DATABASE);

  /* Ensure that the Employees table exists. */
  VerifyCOMPANYTable($connection, DB_DATABASE); 

  /* If input fields are populated, add a row to the Employees table. */
  
  $c_id=htmlentities($_POST['id']);
$c_name = htmlentities($_POST['compname']);
  $email=htmlentities($_POST['email']);
  $phone=htmlentities($_POST['phone']);
  $c_address = htmlentities($_POST['address']);
  $pwd=htmlentities($_POST['pwd']);
  $cpwd=htmlentities($_POST['cpwd']); 
  
  

  if (strlen($c_name) || strlen($c_address) || strlen($email)) {
    AddCompany($connection, $c_id,$c_name,$email,$phone,$c_address,$pwd,$cpwd);
  }
?>

    <section class="hero is-fullheight">
      <div class="hero-body">
        <div class="container has-text-centered">
          <div class="column is-6 is-offset-3">
          <div style="background-color:DeepPink  ;border-radius:5px;" >
            <h3 class="title has-text-white" >Sign Up</h3>
            <p class="subtitle has-text-white" >Please fill in your details.</p></div>
            <disv class="box">
              <form action="<?PHP echo $_SERVER['SCRIPT_NAME'] ?>" method="POST" >
                <div class="columns">
                  <div class="column is-12">
                    <div class="field">
                      <div class="control">
                        <input
                          name="compname"
                          class="input is-large"
                          type="text"
                          placeholder="Company Name"
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
                          name="id"
                          class="input is-large"
                          type="text"
                          placeholder="Company Id"
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
                          name="email"
                          class="input is-large"
                          type="email"
                          placeholder="Username/email"
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
                          name="phone"
                          class="input is-large"                       						  
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
                          name="address"
                          class="input is-large"
                          type="text"
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
                          name="pwd"
                          class="input is-large"
                          type="password"
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
                          name="cpwd"
                          class="input is-large"
                          type="password"
                          placeholder="Confirm Password"
                          required
                        />
                      </div>
                    </div>
                  </div>
                </div>		
                <div class="field">
                  <div class="control">
                    <div class="select is-success is-large">
                      <select name="cadre">
                        <option>Select cadre</option>                     
                        <option  value="company">Company</option>                       
                      </select>
                    </div>
                  </div>
                </div>
                <button name="Add Data"
                  class="button is-large is-danger is-rounded is-centered">
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
function AddCompany($connection,$c_id,$c_name,$email,$phone,$c_address,$pwd,$cpwd) {
  
 if($pwd!=$cpwd)
  {
     header('Refresh:5; url=csignup.php');
     echo 'Please your password must same';
  }
else{
   $d=mysqli_real_escape_string($connection, $c_id);
   $n = mysqli_real_escape_string($connection, $c_name);
   $e = mysqli_real_escape_string($connection, $email);
   $p = mysqli_real_escape_string($connection, $phone);
    $a = mysqli_real_escape_string($connection, $c_address);
    $pw= mysqli_real_escape_string($connection, $pwd);

   $query = "INSERT INTO `COMPANY` VALUES('$d','$n','$e','$p','$a', '$pw');";
 
   if(!mysqli_query($connection, $query)) echo("<p>Error adding CONPANY data.</p>");
   else
   {
         header("Location:login.php");
   }
}
}

/* Check whether the table exists and, if not, create it. */
function VerifyCompanyTable($connection, $dbName) {
  if(!TableExists("COMPANY", $connection, $dbName)) 
  { 
     $query = "CREATE TABLE `COMPANY` (
         `C_ID` VARCHAR(255) PRIMARY KEY,
         `C_NAME` varchar(255),
         `EMAIL` varchar(255),
         `PHONE` varchar(255),
         `C_ADDRESS` varchar(90),
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


