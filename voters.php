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
<link rel="icon" type="image/jpg" href="img/flag.JPG"/>
<link rel="stylesheet" href="main.css" type="text/css" media="screen"/>
<link href="menu.css" rel="stylesheet" type="text/css" media="screen" />
		<!--End of Header-->
</head>
<body>
<table align="center" style="width:900px;border:1px solid gray;background:white url(img/tbg.png) repeat-x left top;border-radius:12px">
<tr style="height:auto;border-radius:12px;background: white url(img/tbg.png) repeat-x left top;">
<th colspan="2">
<!--a href="system_admin.php"><img src="img/logo.jpg" width="200px" height="180px" align="left" style="margin-left:10px"></a-->
<img src="img/logo.png" width="150px" height="150px" align="left" style="margin-left:10px">
<img src="img/system.png" 	width="450px" style="margin-left:30px;margin-top:40px" align="center">

<img src="img/logo1.png" width="150px" height="150px" align="right" style="margin-left:10px">
</th>
</tr>
<tr>
<td colspan="2" bgcolor="#3C5581" id="Menus" style="height:auto;border-radius:12px;">
		
		<ul>
			<li ><a href="system_admin.php">Home</a></li>
						<li><a href="a_candidate.php">Candidates</a></li>
			<li class="active"><a href="voters.php">Voters</a></li>
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
                    <a href="manage_account.php">Manage Account</a></li>
					                <li>
                    <a href="a_generate.php">Generate Report</a></li>
					<li>
                    <a href="a_candidate.php">Candidates</a></li>
                <li>
                    <a href="voters.php">Voters</a></li>
				<li>
                    <a href="setDate.php">Set Date</a></li>
				
					<li>
                    <a href="v_comment.php">View Comment</a></li>
				    <li><a href="logout.php">Logout</a></li>
            </ul>
        </div>
		</td>
		<td><div id="right">
            <div class="desk">
           <h1 align="right"><?php 
echo '<img src="img/people.png" width="40px" height="30px">&nbsp;'.'<font style="text-transform:capitalize;" face="times new roman" color="blue" size="3">Hi,&nbsp;'.$FirstName."&nbsp;".$middleName." ".'</font>';?></h1>
<br><br>

<table align='center' style='width:650px;border-radius:15px;border:1px solid #51a351; -webkit-box-shadow:0 0 18px rgba(0,0,0,0.4); -moz-box-shadow:0 0 18px rgba(0,0,0,0.4); box-shadow:0 0 18px rgba(0,0,0,0.4);'>
<tr>
<th style='height:30px;text-align:center;color:#000;	font-weight:bold;background-color:#3C5581;'><font color='white' size='2'>Names</th>
<th style='height:30px;	color:#000;	font-weight:bold;background-color:#3C5581;'><font color='white' size='2'>Age</th>
<th style='height:30px;	color:#000;	font-weight:bold;background-color:#3C5581;'><font color='white' size='2'>Sex</th>
<th style='height:30px;	color:#000;	font-weight:bold;background-color:#3C5581;'><font color='white' size='2'>Region</th>
<th style='height:30px;	color:#000;	font-weight:bold;background-color:#3C5581;'><font color='white' size='2'>Zone</th>
<th style='height:30px;	color:#000;	font-weight:bold;background-color:#3C5581;'><font color='white' size='2'>District</th>
<th style='height:30px;	color:#000;	font-weight:bold;background-color:#3C5581;'><font color='white' size='2'>Status</th>
</tr>  
<?php
$result = $conn->query("SELECT * FROM voter");
while($row = mysqli_fetch_array($result))
  {
$fname=$row['fname'];
$mname=$row['mname'];
$sex=$row['sex'];
$region=$row['Region'];
$zone=$row['Zone'];
$station=$row['station'];
$age=$row['age'];
$password=$row['password'];
$status=$row['status'];
?>
<tr>
<td style='height:30px;	text-align:center;'><?php echo $fname."&nbsp;".$mname;?></td>
<td style='height:30px;	text-align:center;'><?php echo $age;?></td>
<td style='height:30px;	text-align:center;'><?php echo $sex;?></td>
<td style='height:30px;	text-align:center;'><?php echo $region;?></td>
<td style='height:30px;	text-align:center;'><?php echo $zone;?></td>
<td style='height:30px;	text-align:center;'><?php echo $station;?></td>
<?php 
if($status==0)
{
print("
<td style='height:30px;	color:red;	text-align:center;'>Not Cast</td>");
}
else
{
print("
<td style='height:30px;	color:blue;	text-align:center;'>Cast</td>");
}
?>
		</tr>
<?php
  }
print( "</table><br><br><br>");
mysqli_close($conn);
?>

                
				
				
				
				
				
				
				
				
				
				
				
				
				
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