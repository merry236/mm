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
<img src="img/logo.png" width="150px" height="150px" align="left" style="margin-left:10px">
<img src="img/system.png" 	width="450px" style="margin-left:30px;margin-top:40px" align="center">
<img src="img/logo1.png" width="150px" height="150px" align="right" style="margin-left:10px">
</th>
</tr>
<tr>
<td colspan="2" bgcolor="#3C5581" id="Menus" style="height:auto;border-radius:12px;">
		
		<ul>
			<li ><a href="system_admin.php">Home</a></li>
						<li class="active"><a href="a_candidate.php">Candidates</a></li>
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
echo '<img src="img/people.png" width="40px" height="30px">&nbsp;'.'<font face="times new roman" color="blue" size="3">Hi,&nbsp;'.$FirstName."&nbsp;".$middleName." ".'</font>';?></h1>
<br><br><?php		
			$av=$conn->query("select *from candidate");
			$countav=mysqli_num_rows($av);			
			echo '<font size="2"><h2><u>General Information:</u></h2> There are <font color="blue" >'.$countav. ' candidates are participated.</font>' ;
			echo"<br><br>";
   ?>
	<?php
$result = $conn->query("SELECT * FROM candidate");
while($row = mysqli_fetch_array($result))
  {
$ctrl = $row['c_id'];
$fname=$row['fname'];
$mname=$row['mname'];
$lname=$row['lname'];
$pname=$row['party_name'];
$symbol=$row['party_symbol'];
$photo=$row['candidate_photo'];
?>
<table>
<tr>
<td><img src="<?php echo $symbol;?>" width="100px" height="100px"></td><td>
<table style="border-radius:5px;border:1px solid black;width:120px;height:100px;box-shadow:1px 1px 10px black">
<tr><td><?php echo "<b>Party Name:</b>"."&nbsp;".$pname;?><br><?php echo "<b>Candidate:</b>"."&nbsp;".$fname."&nbsp;".$mname;?><br></td></tr>
<tr><td style='height:30px;'><a href = "admin_can.php?key=<?php echo $ctrl;?>">View Detail</a></td></tr></table></td>
</tr>
</table>
<?php 
}
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