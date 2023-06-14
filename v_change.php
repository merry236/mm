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
$result=$conn->query("select * from voter where vid='$user_id'")or die(mysqli_error);
$row=mysqli_fetch_array($result);
$FirstName=$row['fname'];
$middleName=$row['mname'];
$oldpassword=$row['password'];
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
<img src="img/voter.png" 	width="400px" style="margin-left:30px;margin-top:0px" align="center">
<img src="img/logo1.png" width="150px" height="150px" align="right" style="margin-left:10px">
</th>
</tr>
<tr>
<td colspan="2" bgcolor="#3C5581" id="Menus" style="height:auto;border-radius:12px;">
		
		<ul>
			<li class="active"><a href="voter.php">Home</a></li>
			<li><a href="cast.php">Cast Vote</a></li>
			<li><a href="voter_comment.php">Comment</a></li>
			<li><a href="v_result.php">Result</a></li>
			<li><a href="vlogout.php">Logout</a></li>
		</ul>
</td>
</tr>
</table>
<table align="center" style="width:900px;border:1px solid gray;border-radius:12px;" height="500px">
<tr valign="top">
<td><div style="clear: both"></div>

        <div id="left">
            <ul>
                <li><a href="v_change.php">Change Password</a></li>
					                <li><a href="voter_comment.php">Comment</a></li>
					<li>
                    <a href="voter_candidate.php">Candidates</a></li>
                <li><a href="voter_result.php">Result</a></li>
					<li>
                    <a href="vlogout.php">Logout</a></li>
            </ul>
        </div>
		</td>
		<td><div id="right">
            <div class="desk">
           <h1 align="right"><?php 
echo '<img src="img/people.png" width="40px" height="30px">&nbsp;'.'<font style="text-transform:capitalize;" face="times new roman" color="blue" size="3">Hi,&nbsp;'.$FirstName."&nbsp;".$middleName." ".'</font>';?></h1>
<br><br>
<?php
if(isset($_POST['changepassword']))
{
$oldpass = md5($_POST['old_password']);
$newpass = md5($_POST['new_password']);
$confirmpass =md5 ($_POST['confirm_password']);
if($oldpassword!==$oldpass)
{
echo'  <p class="wrong">Incorrect old password!</p>';
echo' <meta content="5;v_change.php" http-equiv="refresh" />'; 
}
else
{
if($newpass!=$confirmpass){
echo'  <p class="wrong">New Password and Confirm Password does not Match!</p>';                                
echo' <meta content="5;v_change.php" http-equiv="refresh" />';
		   }       
		   else
		   {
  $query="update voter set password='{$newpass}' where vid='$user_id'";
        $result=$conn->query($query);
		 echo'  <p class="success"> Your password has been changed successfuly!</p>';
         echo' <meta content="5;v_change.php" http-equiv="refresh" />';  
   }
   }
}
?>

 <form id="form1" name="login" method="POST" action="v_change.php" onsubmit="return validateForm()">
  <table style="margin-top:-50px;border:1px solid #336699;border-radius:15px" width="350" align="center">
  <tr>
    <td colspan="2"><div style="font-family:Arial, Helvetica, sans-serif; color:#FF0000; font-size:12px;">
</div></td>
  </tr>  
  <br><br><br>
		 <tr>
	     <td class='para1_text' width="220px"><font color="red">*</font> Old Password:</td>
		 <td><input type="password" name="old_password" required x-moz-errormessage="Enter Old password" ></td>
	     </tr>
         <tr>
	     <td class='para1_text' width="220px"><font color="red">*</font> New Password:</td>
		 <td><input type="password" name="new_password" required x-moz-errormessage="Enter New Password" ></td>
	     </tr>
		 <tr>
	     <td class='para1_text' width="220px"><font color="red">*</font> Confirm Password:</td>
		 <td><input type="password" name="confirm_password" required x-moz-errormessage="Re-type your Password" ></td>
	     </tr>
  <tr>
    <td>&nbsp;</td>
	<br>
    <td><input type="submit" name="changepassword" value="Change Password" class="button_example"/></td>
  </tr>
</table> 
  </form>	
				
				
				
				
				
				
				
				
				<br><br></div>
        </div>
</td>
</tr>

</table>
<table align="center" style="width:900px;border-radius:12px;border:1px solid gray;background:white url(img/tbg.png) repeat-x left top;" height="70px" >
<tr>
<td id="link">
<p style="text-align:right;padding-right:30px;"><a  href="#">Home</a>|<a href="#">About Us</a>|<a href="contact.php">Contact Us</a></p>
<p ><hr width="350px" align="right"></p>
<p style="text-align:right;padding-right:30px;"><font color="#ffffff">Copyright &copy; 2015 Reserved.</font></p>
</td>
</tr>

</table>
</body>
</html>