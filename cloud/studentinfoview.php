<!DOCTYPE html>
<?php include "dbinfo.inc"; ?>
<html lang="en">
  <head>
  <script>
  function preventBack(){window.history.forward();}
  setTimeout("preventBack()", 0);
  window.onunload=function(){null};
</script>
<h3>Your Profille</h3>
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
    <title>Filled form</title>
<div style="background-color:#6495ED;width:1518px;height:90px;left:0px;float:top;"> 
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
left:600px;
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
$rn=$_SESSION['regno'];
$_SESSION['REGNO']=$rn;

/*-------------------*/
if(!$rn){
     header('Refresh:0; url=logout.php');
         echo 'Illegal Entry.............';}





/*-------------------*/

  /* Connect to MySQL and select the database. */
  $connection = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD,DB_DATABASE);

  if (mysqli_connect_errno()) echo "Failed to connect to MySQL: " . mysqli_connect_error();
else
{
echo "<h4>Welcome ".$_SESSION['regno']."</h4>";
}
$result = mysqli_query($connection, "SELECT REGNO,FULL_NAME,PHONE,EMAIL,COLLAGE,DPARTMENT,CGPA,NO_AREAR,ABTURSLF,AREAEX,TEN,TWELVE FROM STUDENTINFO WHERE REGNO='$rn' "); 
$row=mysqli_fetch_assoc($result);
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
if(isset($_POST["update"]))
{
if(mysqli_query($connection,"UPDATE STUDENTINFO SET FULL_NAME='$full_name',PHONE='$phone',EMAIL='$email',COLLAGE='$intname',DPARTMENT='$dptname',CGPA='$cgpa',NO_AREAR='$noar',ABTURSLF='$abt',AREAEX='$areaex',TEN='$ten',TWELVE='$twelf' WHERE REGNO='$rn' "))
{
 header('Refresh:2; url=studentinfoview.php');
echo "Updated successfully";
}
}
?>



<section>

    <div class="container">
      <br />
      <div style="background-color:DeepPink;border-radius:5px;width:1110px;height:50px;" >
             <marquee> <h1><strong><i><?php echo"Welcome ".$_SESSION['regno']; ?></i></strong></h1></marquee>    
            </div>
      
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
                value="<?php echo $row['REGNO'] ?>"
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
                id="fullName1"
                aria-describedby="emailHelp"
                value="<?php echo $row['FULL_NAME'] ?>"
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
                value="<?php echo $row['PHONE'] ?>"
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
                 value="<?php echo $row['EMAIL'] ?>"
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
                    value="<?php echo $row['COLLAGE'] ?>"
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
                      value="<?php echo $row['DPARTMENT'] ?>"
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
                     value="<?php echo $row['CGPA'] ?>"
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
                    value="<?php echo $row['NO_AREAR'] ?>"
                    id="cgpa1"
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
                    name="adturslf"               
                    placeholder="Express in a concise manner"
                    required
                  ><?php echo $row['ABTURSLF'] ?></textarea>
                </div>
              </div>
              <div class="col-sm">
                <div class="form-group">
                  <label for="about">Area of expertise</label>
                  <textarea
                    class="form-control"
                    id="about1"
                    rows="3"
                     
                    name="areaex"
                    placeholder="Use keywords"
                    required
                  ><?php echo $row['AREAEX'] ?></textarea>
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
                     value="<?php echo $row['TEN'] ?>"
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
                     value="<?php echo $row['TWELVE'] ?>"
                    placeholder="Percentage in 12th"
                    required
                  />
                </div>
              </div>
            </div>
            <div class="row justify-content-center">
              <div class="col-1">
                <button type="submit" name="update" value="update" class="btn btn-primary">
                  Update
                </button>
              </div>
<a href="companyview.php" style="position:absolute;left:250px;">
                  Apply for commpany
                </a>
<a href="studentapply.php" style="position:absolute;right:250px;">
                  View applied compnies
                </a>

            </div>
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




