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
    alert(window.location='elect_registrar.php');
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
<!--a href="e_officer.php"><img src="img/logo.jpg" width="200px" height="180px" align="left" style="margin-left:10px"></a-->
<img src="img/logo.png" width="150px" height="150px" align="left" style="margin-left:10px">
<img src="img/officer.png" 	width="450px" style="margin-left:30px;margin-top:40px" align="center">
<img src="img/logo1.png" width="150px" height="150px" align="right" style="margin-left:10px">

</th>
</tr>
<tr>
<td colspan="2" bgcolor="#3C5581" id="Menus" style="height:auto;border-radius:12px;">
		
		<ul>
			<li ><a href="e_officer.php">Home</a></li>
			<li><a href="stations.php">Stations</a></li>
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
<p align="center"><a href="add_registrar.php" title="Create New Account"><img src="img/add.jpg" style="width:120px;border-radius:15px;padding:10px"></a></p>
<table align='center' style='width:650px;border-radius:15px;border:1px solid #51a351; -webkit-box-shadow:0 0 18px rgba(0,0,0,0.4); -moz-box-shadow:0 0 18px rgba(0,0,0,0.4); box-shadow:0 0 18px rgba(0,0,0,0.4);'>
<tr>
<th style='height:30px;text-align:center;color:#000;	font-weight:bold;background-color:#3C5581;'><font color='white' size='2'>Names</th>
<th style='height:30px;	color:#000;	font-weight:bold;background-color:#3C5581;'><font color='white' size='2'>User ID</th>
<th style='height:30px;	color:#000;	font-weight:bold;background-color:#3C5581;'><font color='white' size='2'>Sex</th>
<th style='height:30px;	color:#000;	font-weight:bold;background-color:#3C5581;'><font color='white' size='2'>Role</th>
<th style='height:30px;	color:#000;	font-weight:bold;background-color:#3C5581;'><font color='white' size='2'>Username</th>
<th style='height:30px;	color:#000;	font-weight:bold;background-color:#3C5581;'><font color='white' size='2'>Password</th>
<th style='height:30px;	color:#000;	font-weight:bold;background-color:#3C5581;'><font color='white' size='2'>Delete</th>
<th style='height:30px;	color:#000;	font-weight:bold;background-color:#3C5581;'><font color='white' size='2'>Edit</th>
</tr>  
<?php
$result = $conn->query("SELECT * FROM user where role='registrar'");
$count=mysqli_num_rows($result);
echo"<tr><td>";
if($count==0)
{
echo"<font color='red'>No entry!</font>";
}
echo"</td></tr>";
while($row = mysqli_fetch_array($result))
  {
$ctrl = $row['u_id'];
$_SESSION['us_id']=$ctrl;
$fname=$row['fname'];
$mname=$row['mname'];
$sex=$row['sex'];
$user_type=$row['role'];
$username=$row['username'];
$password=$row['password'];
$status=$row['status'];
?>
<tr>
<td><?php echo $fname."&nbsp;".$mname;?></td>
<td><?php echo $row['u_id'];?></td>
<td><?php echo $sex;?></td>
<td><?php echo $user_type;?></td>
<td><?php echo $username;?></td>
<td><?php echo $password;?></td>
						<?php
						print("<td style='height:30px;' align = 'center' width = '1'><a href = 'deletereg.php?key=".$ctrl."'><img width='15px' height='15px' src = 'img/actions-delete.png' title='Delete' onclick='isdelete();'></img></a></td>
		<td style='height:30px;'><a href = 'editreg.php?u_id=".$ctrl."'><img src = 'img/actions-edit.png' width='15px' height='15px' title='Edit' ></img></a></td>
		");?>
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