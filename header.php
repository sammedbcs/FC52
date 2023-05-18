<?php
error_reporting(0);
?>
<header class="header fixed-top clearfix">
<div class="brand">
    <a href="dashboard.php" class="logo">
        Donor
    </a>
    <div class="sidebar-toggle-box">
        <div class="fa fa-bars"></div>
    </div>
</div>
<div class="nav notify-row" id="top_menu">
    <ul class="nav top-menu">
                <?php
        $did=$_SESSION['pgasoid'];       
$ret1=mysqli_query($con,"select tblfoodrequests.id,fullName,requestNumber from tblfoodrequests
 join tblfood  on tblfood.ID=tblfoodrequests.foodId 
 where tblfood.DonorID='$did' and (tblfoodrequests.status is null || tblfoodrequests.status='')");
$num=mysqli_num_rows($ret1);

?>  
        <li id="header_inbox_bar" class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                <i class="fa fa-envelope-o"></i>
                <span class="badge bg-important"><?php echo $num;?></span>
            </a>
            <ul class="dropdown-menu extended inbox">
                <li>
                    <p class="red">You received <?php echo $num;?> New Request</p>
                </li>
<?php if($num>0){
while($result=mysqli_fetch_array($ret1))
{
?>
                <li>
<span class="subject">
<span class="from"><a class="dropdown-item" href="view-requestdetails.php?frid=<?php echo $result['id'];?>">New Request Received from <?php echo $result['fullName'];?> (<?php echo $result['requestNumber'];?>)</a></span>
</span>
                </li>
<?php } }  else {?>
  <li>  No New Request Received</li>
        <?php } ?>

                <li>
                    <a href="new-requests.php">See all Request</a>
                </li>
            </ul>
        </li>
    </ul>
</div>
<div class="top-nav clearfix">
    <ul class="nav pull-right top-menu">
        <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                <?php
$donorid=$_SESSION['pgasoid'];
$ret=mysqli_query($con,"select FullName from  tbldonor where ID='$donorid'");
$row=mysqli_fetch_array($ret);
$name=$row['FullName'];
?>
                <img alt="" src="images/2.png">
                <span class="username"><?php echo $name; ?></span>
                <b class="caret"></b>
            </a>
            <ul class="dropdown-menu extended logout">
                <li><a href="donor-profile.php"><i class=" fa fa-suitcase"></i>Profile</a></li>
                <li><a href="change-password.php"><i class="fa fa-cog"></i> Change Password</a></li>
                <li><a href="logout.php"><i class="fa fa-key"></i> Log Out</a></li>
            </ul>
</li>
    </ul>
</div>
</header>