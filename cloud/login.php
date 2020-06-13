<!DOCTYPE html>
<?php include "dbinfo.inc"; 
?>
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
    <title>Login</title>
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
  background-image: url("index.jpg");

  /* Full height */
  height: 100%; 

  /* Center and scale the image nicely */
  background-position: center;
  background-size: cover;
}
</style>
  </head>

  <body class="bg">

<?php
 session_start();
  /* Connect to MySQL and select the database. */
  $connection = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD);

  if (mysqli_connect_errno()) echo "Failed to connect to MySQL: " . mysqli_connect_error();

  $database = mysqli_select_db($connection, DB_DATABASE);

  

  /* If input fields are populated, add a row to the Employees table. */
  
  $un=htmlentities($_POST['username']);
$pw = htmlentities($_POST['password']);
$ty = htmlentities($_POST['type']);
$_SESSION['regno']=$un;  
$_SESSION['CID']=$un; 


  if (strlen($un) || strlen($pw) || strlen($ty)) {
    Check($connection, $un,$pw,$ty);
  }
?>


         
    <section class="hero is-fullheight">
      <div class="hero-body">
        <div class="container has-text-centered">
          <div class="column is-5 is-offset-4">
		  <div style="background-color:DeepPink ;border-radius:5px;" >
         <div id="topright" style="height:20px;width:450px;">
             <marquee> <h1><strong><i>Welocome to Placement portal</i></strong></h1></marquee>          
          </div>
            <h3 class="title has-text-white">Login</h3>
            <p class="subtitle has-text-white">Please login to proceed.</p></div>
            <div class="box">
              <form action="<?PHP echo $_SERVER['SCRIPT_NAME'] ?>" method="POST">
                <div class="field">
                  <div class="control">
                    <input
                      class="input is-large"
                      type="username"
                      name="username"
                      placeholder="Username/Regno"
                      autofocus=""
                      required
                    />
                  </div>
                </div>

                <div class="field">
                  <div class="control">
                    <input
                      class="input is-large"
                      type="password"
                      name="password"
                      placeholder="Password"
                       required
                    />
                  </div>
                </div>
				<div class="column is-12">
                    <div class="field">
                      <div class="control">
                     <div class="select is-success is-large">
                      <select name="type">
                        <option>Select Cadre</option>                     
                        <option value="STUDENT">STUDENT</option> 
                        <option  value="ADMIN">ADMIN</option>                       
                        <option value="COMPANY">COMPANY</option>                       						
                      </select>
                    </div>
                      </div>
                    </div>
                  </div>
                <div class="field">
                  <label class="checkbox">
                    <input type="checkbox" />
                    Remember me
                  </label>
                </div>
                <button type="submit" name="login"
                  class="button is-block is-info is-large is-rounded is-fullwidth" 
                >
                  Login
                </button>
              </form>
            </div>
            <p class="has-text-grey">
              <a href="ssignup.php">Sign Up for Students</a> &nbsp;·&nbsp;
			   <a href="csignup.php">Sign Up for company</a> &nbsp;·&nbsp;
             
              
            </p>
          </div>
        </div>
      </div>
    </section>
    <script async type="text/javascript" src="../js/bulma.js"></script>
  </body>
</html>
<?php
function Check($connection,$un,$pw,$ty)
{
if($ty=="STUDENT")
{
 $qr="SELECT * FROM STUDENT WHERE REGNO='$un' AND  PASSWORD='$pw';";
 $sr="SELECT * FROM STUDENTINFO WHERE REGNO='$un';";
  $RE=mysqli_query($connection,$sr);
$result=mysqli_query($connection,$qr);
while($row = mysqli_fetch_assoc($result))
{
  $uname=$row['REGNO'];
  $pword=$row['PASSWORD'];
}
while($RO = mysqli_fetch_assoc($RE))
{
  $unamerr=$RO['REGNO'];
}


if($un==$uname && $pw==$pword)
{       
               if($unamerr==$un){
                   header("Location:studentinfoview.php");}
               else
                {
                    header("Location:apply.php");
                    }
                  
     
}
else
{
       
     
echo '<script language="javascript">';
echo 'alert("Please Enter Valid username Password")';
echo '</script>';

}



}


else if($ty=="COMPANY")
{
    $qr="SELECT * FROM COMPANY WHERE C_ID='$un' AND  PASSWORD='$pw';";
$result=mysqli_query($connection,$qr);
while($row = mysqli_fetch_assoc($result))
{
       $uname=$row['C_ID'];
       $pword=$row['PASSWORD'];

}
if($un==$uname && $pw==$pword)
{
    header("Location:studentview.php");
}
else
{
          header('Refresh:5; url=login.php');
         echo '<script language="javascript">';
echo 'alert("Please Enter Valid username Password")';
echo '</script>';


}


}

else if($ty=="ADMIN")
{
    $qr="SELECT * FROM ADMIN WHERE ADMINUNAME='$un' AND ADMINPWD='$pw';";
$result=mysqli_query($connection,$qr);
while($row = mysqli_fetch_assoc($result))
{
       $uname=$row['ADMINUNAME'];
       $pword=$row['ADMINPWD'];

}
if($un==$uname && $pw==$pword)
{
    header("Location:adminlogin.php");
}
else
{
          header('Refresh:5; url=login.php');
         echo '<script language="javascript">';
echo 'alert("Please Enter Valid username Password")';
echo '</script>';


}


}

 

}


?>