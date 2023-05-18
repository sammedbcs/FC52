<?php
session_start();

include('includes/dbconnection.php');
if (strlen($_SESSION['pgasoid']==0)) {
  header('location:logout.php');
  }
  else{

if(isset($_POST['submit']))
  {
    $donorid=$_SESSION['pgasoid'];
    $statename=$_POST['state'];
    $cityname=$_POST['city'];
    $description=$_POST['description'];
    $pdate=$_POST['pdate'];
    $padd=$_POST['padd'];
    $contactperson=$_POST['contactperson'];
    $cpmobnum=$_POST['cpmobnum'];
    $fid=mt_rand(100000000, 999999999);
     $pic=$_FILES["images"]["name"];
     $extension = substr($pic,strlen($pic)-4,strlen($pic));

$allowed_extensions = array(".jpg","jpeg",".png",".gif");

if(!in_array($extension,$allowed_extensions))
{
echo "<script>alert('Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
}
else
{

$foodpic=md5($pic.time()).$extension;
     move_uploaded_file($_FILES["images"]["tmp_name"],"images/".$foodpic);

$fitem=$_POST["fitem"]; 
$fitemarray=implode(",",$fitem);
    $query=mysqli_query($con, "insert into tblfood(DonorID,foodId,StateName, CityName, FoodItems, Description, PickupDate,PickupAddress,ContactPerson,CPMobNumber,Image) value('$donorid','$fid','$statename','$cityname','$fitemarray','$description','$pdate','$padd','$contactperson','$cpmobnum','$foodpic')");

    if ($query) {
    echo "<script>alert('Food Detail added successfully.');</script>";
echo "<script type='text/javascript'> document.location = 'add-food-details.php'; </script>";
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
<title>Food Waste Management System  | Add Food Detail </title>

<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<
<link rel="stylesheet" href="css/bootstrap.min.css" >

<link href="css/style.css" rel='stylesheet' type='text/css' />
<link href="css/style-responsive.css" rel="stylesheet"/>

<link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>

<link rel="stylesheet" href="css/font.css" type="text/css"/>
<link href="css/font-awesome.css" rel="stylesheet"> 

<script src="js/jquery2.0.3.min.js"></script>

<script>
function getCity(val) { 
  $.ajax({
type:"POST",
url:"get-city.php",
data:'sateid='+val,
success:function(data){
$("#city").html(data);
}});
}
 </script>
<script>
$(document).ready(function(){
var i=1;
$('#add').click(function(){
i++;
$('#dynamic_field').append('<tr id="row'+i+'"><td><input type="text" name="fitem[]" placeholder="Enter Food Items" class="form-control name_list" /></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');
});
    
$(document).on('click', '.btn_remove', function(){
var button_id = $(this).attr("id"); 
$('#row'+button_id+'').remove();
});
});
</script>
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
                List Your Food Details
            </header>
            <div class="panel-body">
                
                <form class="form-horizontal bucket-form" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Food Item</label>
                        <div class="col-sm-6">
                            <table class="table table-bordered" id="dynamic_field">
<tr>
<td><input type="text" name="fitem[]" placeholder="Enter Food Items" class="form-control name_list" /></td>
<td><button type="button" name="add" id="add" class="btn btn-success">Add More</button></td>
</tr>
</table>
                        </div>
                    </div>
               

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Description</label>
                        <div class="col-sm-6">
                            <textarea class="form-control" id="description" name="description" type="text" required="true" value="">
</textarea>                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Pickup Date</label>
                        <div class="col-sm-6">
                            <input class="form-control" id="pdate" name="pdate" type="date" required="true" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Pickup Address</label>
                        <div class="col-sm-6">
                             <textarea class="form-control" id="padd" name="padd" type="text" required="true" value="">
</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label col-lg-3" for="inputSuccess">Choose State</label>
                        <div class="col-lg-6">
                            <select class="form-control m-bot15" name="state" id="state" onChange="getCity(this.value);">
                                <option value="">Choose State</option>
                                <?php $query=mysqli_query($con,"select * from tblstate");
              while($row=mysqli_fetch_array($query))
              {
              ?>    
              <option value="<?php echo $row['StateName'];?>"><?php echo $row['StateName'];?></option>
                  <?php } ?> 
                            </select>

                           
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label col-lg-3" for="inputSuccess">Choose City</label>
                        <div class="col-lg-6">
                            <select class="form-control m-bot15" name="city" id="city" required="true">
              
                            </select>

                           
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Contact Person</label>
                        <div class="col-sm-6">
                            <input class="form-control" id="contactperson" name="contactperson" type="text" required="true" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Contact Person Mobile Number</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="cpmobnum" id="cpmobnum" required="true" value="" maxlength="10" pattern="[0-9]+">
                        </div>
                    </div>
                   
                    <div class="form-group">
                        <label class=" col-sm-3 control-label">Pictures</label>
                        <div class="col-lg-6">
                             <input type="file" class="form-control" name="images" id="images" value="">
                        </div>
                    </div>
                
                    

                    <hr />
<div class="form-group">
                                    <div class="col-lg-offset-3 col-lg-6">
                                        <button class="btn btn-primary" type="submit" name="submit">Submit</button>
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
