<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['pgasoid']==0)) {
  header('location:logout.php');
  } else{
    if(isset($_POST['submit']))
  {
    $donorid=$_SESSION['pgasoid'];
    $fullname=$_POST['fullname'];
  $mobno=$_POST['contactnumber'];

     $query=mysqli_query($con, "update tbldonor set FullName ='$fullname', MobileNumber='$mobno' where ID='$donorid'");
    if ($query) {
    $msg="Owner profile has been updated.";
    echo "<script>alert('Profile details updated successfully');</script>";
    echo "<script type='text/javascript'> document.location = 'donor-profile.php'; </script>";
  }
  else
    {
      echo "<script>alert('Something went wrong. Please try again.');</script>";
    }
  }
  ?>

<!DOCTYPE html>
<head>
<title>Food Waste Management System|| Donor Profile  </title>

<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>

<link rel="stylesheet" href="css/bootstrap.min.css" >
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link href="css/style-responsive.css" rel="stylesheet"/>
<link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>

<link rel="stylesheet" href="css/font.css" type="text/css"/>
<link href="css/font-awesome.css" rel="stylesheet"> 
<script src="js/jquery2.0.3.min.js"></script>
</head>
<body>
<section id="container">
<?php include_once('includes/header.php');?>
<?php include_once('includes/sidebar.php');?>

<section id="main-content">
	<section class="wrapper">
		<div class="form-w3layouts">
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Donor Profile
                            <span class="tools pull-right">
                                <a class="fa fa-chevron-down" href="javascript:;"></a>
                                <a class="fa fa-cog" href="javascript:;"></a>
                                <a class="fa fa-times" href="javascript:;"></a>
                             </span>
                        </header>
                        <div class="panel-body">
                            <div class="form">
                                 <p style="font-size:16px; color:red" align="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>

   <?php
 $donorid=$_SESSION['pgasoid'];
$ret=mysqli_query($con,"select * from tbldonor where ID='$donorid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
                                <form class="cmxform form-horizontal " method="post" action="">
                                    <div class="form-group ">
                                        <label for="adminname" class="control-label col-lg-3">Full Name</label>
                                        <div class="col-lg-6">
                                            <input class=" form-control" id="fullname" name="fullname" type="text" value="<?php  echo $row['FullName'];?>" required="true">
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="email" class="control-label col-lg-3">Email</label>
                                        <div class="col-lg-6">
                                            <input class="form-control " id="email" name="email" type="email" value="<?php  echo $row['Email'];?>" readonly="true">
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="username" class="control-label col-lg-3">Mobile Number</label>
                                        <div class="col-lg-6">
                                            <input class="form-control " id="contactnumber" name="contactnumber" type="text" value="<?php  echo $row['MobileNumber'];?>" required="true">
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="username" class="control-label col-lg-3">Registration Date</label>
                                        <div class="col-lg-6">
                                            <input class="form-control " id="regDate" name="regdate" type="text" value="<?php  echo $row['RegDate'];?>" readonly="true">
                                        </div>
                                    </div>
                                    
                                    <?php } ?>
                        
                                  

                                    <div class="form-group">
                                        <div class="col-lg-offset-3 col-lg-6">
                                          <p style="text-align: center;"> <button class="btn btn-primary" type="submit" name="submit">Update</button></p>
                                           
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>

                    </section>
                </div>
            </div>
        </div>

</section>
		  <?php include_once('includes/footer.php');?>  
</section>

</section>

<script src="js/bootstrap.js"></script>
<script src="js/jquery.dcjqaccordion.2.7.js"></script>
<script src="js/scripts.js"></script>
<script src="js/jquery.slimscroll.js"></script>
<script src="js/jquery.nicescroll.js"></script>
<script src="js/jquery.scrollTo.js"></script>
</body>
</html>
<?php }  ?>