<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['pgasoid']==0)) {
  header('location:logout.php');
  }
  else{

if(isset($_POST['submit']))
  {
   $cid=$_GET['editid'];

     $pgpic=$_FILES["images"]["name"];
     $extension = substr($pgpic,strlen($pgpic)-4,strlen($pgpic));
$allowed_extensions = array(".jpg","jpeg",".png",".gif");
if(!in_array($extension,$allowed_extensions))
{
echo "<script>alert('Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
}
else
{

$foodpic=md5($pgpic).$extension;
     move_uploaded_file($_FILES["images"]["tmp_name"],"images/".$foodpic);
    $query=mysqli_query($con, "update tblfood set Image='$foodpic' where ID='$cid'");
    if ($query) {
  
      echo "<script>alert('Donating food Image has been Update');</script>";
  }
  else
    {
       echo "<script>alert('Something went wrong. Please try again.');</script>";
    }
    }

  }

  ?>
<!DOCTYPE html>
<head>
<title>Food Waste Management System  | Image </title>

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
                Update Image
            </header>
            <div class="panel-body">
                

  <?php
 $cid=$_GET['editid'];
$ret=mysqli_query($con,"select * from tblfood where ID='$cid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
                <form class="form-horizontal bucket-form" method="post" enctype="multipart/form-data">
                                    
                  
                    <div class="form-group">
                        <label class=" col-sm-3 control-label">Pictures</label>
                        <div class="col-lg-6">
                             <img src="images/<?php echo $row['Image'];?>" width="200" height="150" value="<?php  echo $row['Image'];?>">
                        </div>
                    </div>
                 <div class="form-group">
                        <label class=" col-sm-3 control-label">Pictures</label>
                        <div class="col-lg-6">
                             <input type="file" class="form-control" name="images" id="images" value="">
                        </div>
                    </div>
<?php  } ?>
                    <hr />
<div class="form-group">
                                    <div class="col-lg-offset-3 col-lg-6">
                                        <button class="btn btn-primary" type="submit" name="submit">Update</button>
                                    </div>
                                </div>

                </form>
            </div>
        </section>
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

<?php  } ?>