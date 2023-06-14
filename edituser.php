<?php
error_reporting("E_NOTICE");
?>

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

$u_id=$_SESSION['u_id'];
$result=$conn->query("select * from user where u_id='$u_id'")or die(mysqli_error);
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
<img src="img/logo.png" width="150px" height="150px" align="left" style="margin-left:10px">
<img src="img/system.png" 	width="450px" style="margin-left:30px;margin-top:40px" align="center">
<img src="img/logo1.png" width="150px" height="150px" align="right" style="margin-left:10px">

</th>
</tr>
<tr>
<td colspan="2" bgcolor="#3C5581" id="Menus" style="height:auto;border-radius:12px;">
		
		<ul>
			<li class="active"><a href="system_admin.php">Home</a></li>
						<li><a href="a_candidate.php">Candidates</a></li>
			<li><a href="voters.php">Voters</a></li>
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
                    <a href="contacts.php">Contact Us</a></li>
					<li>
                    <a href="v_comment.php">View Comment</a></li>
					<li>
                    <a href="logout.php">Logout</a></li>
            </ul>
        </div>
		</td>
		<td><div id="right">
            <div class="desk">
           <h1 align="right"><?php 
echo '<img src="img/people.png" width="40px" height="30px">&nbsp;'.'<font face="times new roman" color="blue" size="3">Hi,&nbsp;'.$FirstName."&nbsp;".$middleName." ".'</font>';?></h1>
<br><br>
<?php
$ctrl = $_REQUEST['key'];
$query="SELECT * FROM user where u_id='{$ctrl}'";
$result=$conn->query($query);
$count=mysqli_num_rows($result);
if(!$result){
die("user is not registered!".mysqli_error());
}
if($count==1){
while($row=mysqli_fetch_array($result)){
$r1=$row['fname'];
$r2=$row['mname'];
$r3=$row['lname'];
$r4=$row['u_id'];
$r5=$row['sex'];
$r6=$row['role'];
}
?>
  <form id="form1" method="POST" action="edituser.php"  onsubmit='return formValidation()'>

 <table valign='top' align="center" style="border-radius:5px;border:1px solid #336699">
 <tr>
 <th colspan="2" bgcolor="#3C5581"><font color="white">Edit User Account</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="manage_account.php" title="Close"><img src="img/close_icon.gif"></a></th>
 </tr>
<tr>
<tr><td>First Name:</td><td><input type='text' name='fname' id='fname' value="<?php echo "$r1"?>"></td></tr>
<tr><td>Middle Name:</td><td><input type='text' name='mname' id='mname' value="<?php echo "$r2"?>"></td></tr>
<tr><td>Last Name:</td><td><input type='text' name='lname' id='lname' value="<?php echo "$r3"?>"></td></tr>
<tr><td>User ID:</td><td><input  readonly="readonly" type='text' id='user_id' name="us_id" value="<?php echo "$r4"?>"></td></tr>
<tr><td>Sex:</td><td><input  type='text' id='sex' name='sex' value="<?php echo "$r5"?>"></td></tr>
<tr><td>Role  :</td><td><input type='text' name='role' id='role'  value="<?php echo "$r6"?>"></tr></td>
<tr><td colspan='2' align='center'><input type='submit' name='update' value='Save Changes' class="button_example"></tr></td>
</table>
 <?php
}
	 

?>
 
 <?php
  if(isset($_POST['update']))
  {
	            $fname=$_POST['fname'];
				$mname=$_POST['mname'];
				$lname=$_POST['lname'];
				$u=$_POST['us_id'];
				$sex=$_POST['sex'];
				$role=$_POST['role'];
				$password=$_POST['password'];
				$username=$_POST['username'];
  $update = $conn->query("update user set fname='$fname',mname='$mname',lname='$lname', sex='$sex',role='$role',username='$username' 
	,password='$password'
  WHERE u_id='$u'") or die(mysqli_error());
  if(!$update)
  {
  echo"Error".die(mysqli_error());
  }
  else
  {
  //echo'<meta content="3;manage_account.php" http-equiv="refresh"/>';
echo "<script>window.location='manage_account.php';</script>";
 
  }}
  ?>
  </form> 
<br><br><br><br>           
                
				
				
				
				
				
				
				
				
				
				
				
				
				
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