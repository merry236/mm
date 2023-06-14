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
<script>
  function isdelete()
  {
   var d = confirm('Are you sure you want to Delete !!');
   if(!d)
   {
    alert(window.location='reg_voter.php');
   }
   else
   {
   return false;
    
   }
  }
  </script>
		
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
<img src="img/registrar.png" 	width="450px" style="margin-left:30px;margin-top:40px" align="center">
<img src="img/logo1.png" width="150px" height="150px" align="right" style="margin-left:10px">
</th>
</tr>
<tr>
<td colspan="2" bgcolor="#3C5581" id="Menus" style="height:auto;border-radius:12px;">
		
		<ul>
			<li ><a href="e_registrar.php">Home</a></li>
						<li ><a href="e_candidate.php">Candidates</a></li>
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
                <li >
                    <a href="reg_voter.php">Voter</a></li>
					<li>
                    <a href="e_result.php">Result</a></li>
					                <li>
                    <a href="e_generate.php">Generate Report</a></li>
					<li>
                    <a href="ov_candidate.php">Candidates</a></li>
                <li>
                    <a href="e_comment.php">View Comment</a></li>
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
$ctrl=$_SESSION['vid'];
$query="SELECT * FROM voter where vid='{$ctrl}'";
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
$r4=$row['age'];
$ii=$row['vid'];
$r5=$row['sex'];
$r9=$row['Region'];
$r10=$row['Zone'];
$r6=$row['station'];
$r7=$row['work'];
$r8=$row['password'];
$phone=$row['phone'];
$email=$row['email'];
}
?>
  <form id="form1" method="POST" action="edit_voter.php"  onsubmit='return formValidation()'>

 <table valign='top' align="center" style="border-radius:5px;border:1px solid #336699">
 <tr>
 <th colspan="2" bgcolor="#3C5581" height="25px"><font color="white">Edit Voter Information</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="reg_voter.php" title="Close"><img src="img/close_icon.gif"></a></th>
 </tr>
<tr>
<input type='hidden' name='vid' value="<?php echo "$ii"?>">
<tr><td>First Name:</td><td><input type='text' name='fname' id='fname' value="<?php echo "$r1"?>"></td></tr>
<tr><td>Middle Name:</td><td><input type='text' name='mname' id='mname' value="<?php echo "$r2"?>"></td></tr>
<tr><td>Last Name:</td><td><input type='text' name='lname' id='lname' value="<?php echo "$r3"?>"></td></tr>
<tr><td>Age:</td><td><input  type='text' id='age' name="age" value="<?php echo "$r4"?>"></td></tr>
<tr><td>Sex:</td><td><input  type='text' id='sex' name='sex' value="<?php echo "$r5"?>"></td></tr>
<tr><td>Phone:</td><td><input  type='text' id='phone' name='phone' value="<?php echo "$phone"?>"></td></tr>
<tr><td>Email:</td><td><input  type='text' id='email' name='email' value="<?php echo "$email"?>"></td></tr>
<tr><td>Region:</td><td><input  type='text' id='region' name='region' value="<?php echo "$r9"?>"></td></tr>
<tr><td>Zone:</td><td><input  type='text' id='zone' name='zone' value="<?php echo "$r10"?>"></td></tr>
<tr><td>District:</td><td><input  type='text' id='station' name='station' value="<?php echo "$r6"?>"></td></tr>
<tr><td>Work:</td><td><input type='text' name='work' id='work' value="<?php echo "$r7"?>"></tr></td>
<tr><td>Password:</td><td><input type='text' name='password' id='password' value="<?php echo "$r8"?>"></tr></td>
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
				$vid=$_POST['vid'];
				$age=$_POST['age'];
				$phone=$_POST['phone'];
				$email=$_POST['email'];
				$sex=$_POST['sex'];
				$password=$_POST['password'];
				$region=$_POST['region'];
				$zone=$_POST['zone'];
				$station=$_POST['station'];
				$work=$_POST['work'];
  $update = $conn->query("update voter set fname='$fname',mname='$mname',lname='$lname', sex='$sex',age='$age',Region='$region',Zone='$zone',station='$station',work='$work' 
	,password='$password'
  WHERE vid='{$vid}'") or die(mysqli_error());
  if(!$update)
  {
  echo"Error".die(mysqli_error());
  }
  else
  {
echo "<script>window.location='reg_voter.php';</script>";
 
  }}
  ?>
  </form> 
<br><br><br><br>  		
				
				
				
				
				
				
				<br><br>
           
                
				
				
				
				
				
				
				
				
				
				
				
				
				
				<br><br></div>
        </div>
</td>
</tr>

</table>
<table align="center" style="width:900px;border-radius:12px;border:1px solid gray;background:white url(img/tbg.png) repeat-x left top;" height="70px" >
<tr>
<td id="link">
<p style="text-align:right;padding-right:30px;"><a  href="e_registrar.php">Home</a>|<a href="#">About Us</a>|<a href="#">Contact Us</a></p>
<p ><hr width="350px" align="right"></p>
<p style="text-align:right;padding-right:30px;"><font color="#ffffff">Copyright &copy; 2015 Reserved.</font></p>
</td>
</tr>

</table>
</body>
</html>