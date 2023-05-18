<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
?>
<!DOCTYPE html>
<html>
<head>
<title>Food Waste Management System| About Us</title>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<script src="js/jquery.min.js"></script>
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href='http://fonts.googleapis.com/css?family=Droid+Serif:400,700,700italic,400italic' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
		<script type="text/javascript">
			jQuery(document).ready(function($) {
				$(".scroll").click(function(event){		
					event.preventDefault();
					$('html,body').animate({scrollTop:$(this.hash).offset().top},900);
				});
			});
		</script>
</head>
<body>
<?php include_once("includes/header.php");?>
<div class="banner page-head">	
</div>
<div class="about">
	<div class="container">
		 <?php

$ret=mysqli_query($con,"select * from tblpages where PageType='aboutus' ");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
			
		<div class="about-info">
			
			<div class="about-gds">	
				<div class="col-md-5 about-info-left">
					<img src="images/666.jpg" alt=""/>
				</div>
				<div class="col-md-7 about-info-right">
					<h4><?php  echo $row['PageTitle'];?> </h4>
					<p><?php  echo $row['PageDescription'];?></p>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div><?php } ?>
		
	
	</div>
</div>
<?php include_once("includes/footer.php");?>
	<script type="text/javascript">
		$(document).ready(function() {							
		$().UItoTop({ easingType: 'easeOutQuart' });
		});
	</script>
	<a href="#" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
</body>
</html>