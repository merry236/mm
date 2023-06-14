<?php
	include("connection.php");  
 session_start();
if(isset($_SESSION['u_id']))
 {
  $mail=$_SESSION['u_id'];
 } else {
 ?>

<script>
  alert('You are not logged In !! Please Login to access this page');
  alert(window.location='login.php');
 </script>
 <?php
 }
 ?>
<?php

$user_id=$_SESSION['u_id'];
$result=$conn->query("select * from user where u_id='$user_id'")or die(mysqli_error);
$row=mysqli_fetch_array($result);
$FirstName=$row['fname'];
$middleName=$row['mname'];
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	
<!--Header-->
<title>Online Voting</title>
<script>
  function isdelete()
  {
   var d = confirm('Are you sure you want to Delete !!');
   if(!d)
   {
    alert(window.location='stations.php');
   }
   else
   {
   return false;
    
   }
  }
  </script>
<link rel="stylesheet" href="main.css" type="text/css" media="screen"/>
<link href="menu.css" rel="stylesheet" type="text/css" media="screen" />
		<!--End of Header-->
</head>
<body>
<table align="center" style="width:900px;border:1px solid gray;background:white url(img/tbg.png) repeat-x left top;border-radius:12px">
<tr style="height:auto;border-radius:12px;background: white url(img/tbg.png) repeat-x left top;">
<th colspan="2">
<img src="img/logo.png" width="150px" height="150px" align="left" style="margin-left:10px">
<img src="img/officer.png" 	width="450px" style="margin-left:30px;margin-top:40px" align="center">
<img src="img/logo1.png" width="150px" height="150px" align="right" style="margin-left:10px">

</th>
</tr>
<tr>
<td colspan="2" bgcolor="#3C5581" id="Menus" style="height:auto;border-radius:12px;">
		
		<ul>
			<li ><a href="e_officer.php">Home</a></li>
			<li class="active"><a href="stations.php">Stations</a></li>
						<li><a href="ov_candidate.php">Candidates</a></li>
			<li><a href="logout.php">Logout</a></li>
		</ul>
</td>
</tr>
</table>
<table align="center" style="width:900px;border:1px solid gray;border-radius:12px;" height="500px">
<tr valign="top">
<td><div style="clear: both"></div>

        <div id="left">
            <ul>
                <li>
                    <a href="elect_registrar.php">Ele.Registrar</a></li>
					<li>
                    <a href="o_result.php">Result</a></li>
					                <li>
                    <a href="o_generate.php">Generate Report</a></li>
					<li>
                    <a href="ov_candidate.php">Candidates</a></li>
                <li>
                    <a href="o_comment.php">View Comment</a></li>
					<li>
                    <a href="logout.php">Logout</a></li>
            </ul>
        </div>
		</td>
		<td><div id="right">
            <div class="desk">
           <h1 align="right"><?php 
echo '<img src="img/people.png" width="40px" height="30px">&nbsp;'.'<font style="text-transform:capitalize;"face="times new roman" color="blue" size="3">Hi,&nbsp;'.$FirstName."&nbsp;".$middleName." ".'</font>';?></h1>
<br><br>

	
			<?php
//$ctrl=$_REQUEST['vid'];
$ctrl=$_SESSION['psid'];
$query="SELECT * FROM station where psid='{$ctrl}'";
$result=$conn->query($query);
$count=mysqli_num_rows($result);
if(!$result){
die("Station is not registered!".mysqli_error());
}
if($count==1){
while($row=mysqli_fetch_array($result)){
$r1=$row['psid'];
$r5=$row['Region'];
$r6=$row['Zone'];
$r2=$row['psname'];
$r3=$row['kebele'];
$r4=$row['city'];
}
?>
  <form id="form1" method="POST" action="edit_station.php"  onsubmit='return formValidation()'>

 <table valign='top' align="center" style="border-radius:5px;border:1px solid #336699">
 <tr>
 <th colspan="2" bgcolor="#3C5581" height="25px"><font color="white">Edit Polling station</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="stations.php" title="Close"><img src="img/close_icon.gif"></a></th>
 </tr>
<tr>
<input type='hidden' name='psid' value="<?php echo "$r1"?>">
<tr><td>Region:</td><td><input type='text' name='region' id='psname' value="<?php echo "$r5"?>"></td></tr>
<tr><td>Zone:</td><td><input type='text' name='zone' id='psname' value="<?php echo "$r6"?>"></td></tr>
<tr><td>District:</td><td><input type='text' name='psname' id='psname' value="<?php echo "$r2"?>"></td></tr>
<tr><td>Kebele:</td><td><input type='text' name='kebele' id='kebele' value="<?php echo "$r3"?>"></td></tr>
<tr><td>City:</td><td><input type='text' name='city' id='city' value="<?php echo "$r4"?>"></td></tr>
<tr><td colspan='2' align='center'><input type='submit' name='update' value='Save Changes' class="button_example"></tr></td>
</table>
 <?php
}
?>
 
 <?php
  if(isset($_POST['update']))
  {
	  
	            $psregion=$_POST['region'];
	            $pszone=$_POST['zone'];
	            $psname=$_POST['psname'];
				$kebele=$_POST['kebele'];
				$city=$_POST['city'];
				$psid=$_POST['psid'];
  $update = $conn->query("update station set region='$psregion',zone='$pszone',psname='$psname',kebele='$kebele',city='$city'
  WHERE psid='{$psid}'") or die(mysqli_error());
  if(!$update)
  {
  echo"Error".die(mysqli_error());
  }
  else
  {
echo "<script>window.location='stations.php';</script>";
  }}
  ?>
  </form> 
	
				
				
				
				
				
				
				<br><br>




				
				
				<br><br></div>
        </div>
</td>
</tr>

</table>
<table align="center" style="width:900px;border-radius:12px;border:1px solid gray;background:white url(img/tbg.png) repeat-x left top;" height="70px" >
<tr>
<td id="link">
<p style="text-align:right;padding-right:30px;"><a  href="index.php">Home</a>|<a href="about.php">About Us</a>|<a href="contact.php">Contact Us</a></p>
<p ><hr width="350px" align="right"></p>
<p style="text-align:right;padding-right:30px;"><font color="#ffffff">Copyright &copy; 2015 Reserved.</font></p>
</td>
</tr>

</table>
</body>
</html>