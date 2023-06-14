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
    alert(window.location='ov_candidate.php');
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
<img src="img/officer.png" 	width="450px" style="margin-left:30px;margin-top:40px" align="center">
<img src="img/logo1.png" width="150px" height="150px" align="right" style="margin-left:10px">


</th>
</tr>
<tr>
<td colspan="2" bgcolor="#3C5581" id="Menus" style="height:auto;border-radius:12px;">
		
		<ul>
			<li ><a href="e_officer.php">Home</a></li>
			<li><a href="stations.php">Stations</a></li>
						<li class="active"><a href="ov_candidate.php">Candidates</a></li>
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
<p align="center"><a href="o_candidate.php" title="Create New Account"><img src="img/candidate.png" style="width:190px;border-radius:15px;padding:10px"></a></p>
<table align='center' style='width:650px;border-radius:15px;border:1px solid #3C5581; -webkit-box-shadow:0 0 18px rgba(0,0,0,0.4); -moz-box-shadow:0 0 18px rgba(0,0,0,0.4); box-shadow:0 0 18px rgba(0,0,0,0.4);'>
<tr>
<th style='height:30px;text-align:center;color:#000;	font-weight:bold;background-color:#3C5581;'><font color='white' size='2'>Full Name</th>
<th style='height:30px;	color:#000;	font-weight:bold;background-color:#3C5581;'><font color='white' size='2'>Sex</th>
<th style='height:30px;	color:#000;	font-weight:bold;background-color:#3C5581;'><font color='white' size='2'>Work</th>
<th style='height:30px;	color:#000;	font-weight:bold;background-color:#3C5581;'><font color='white' size='2'>Education</th>
<th style='height:30px;	color:#000;	font-weight:bold;background-color:#3C5581;'><font color='white' size='2'>Party Name</th>
<th style='height:30px;	color:#000;	font-weight:bold;background-color:#3C5581;'><font color='white' size='2'>View</th>
<th style='height:30px;	color:#000;	font-weight:bold;background-color:#3C5581;'><font color='white' size='2'>Delete</th>
</tr>  
<?php
$result = $conn->query("SELECT * FROM candidate");
$count=mysqli_num_rows($result);
echo"<tr><td>";
if($count==0)
{
echo"<font color='red'>No entry!</font>";
}
echo"</td></tr>";
while($row = mysqli_fetch_array($result))
  {
$ctrl = $row['c_id'];
$fname=$row['fname'];
$mname=$row['mname'];
$lname=$row['lname'];
$sex=$row['sex'];
$party_name=$row['party_name'];
$work=$row['work'];
$education=$row['education'];
?>
<tr>
<td><?php echo $fname."&nbsp;".$mname."&nbsp;".$lname;?></td>
<td><?php echo $sex;?></td>
<td><?php echo $work;?></td>
<td><?php echo $education;?></td>
<td><?php echo $party_name;?></td>
						<?php
						print("
		<td style='height:30px;'><a href = 'detail_candidate.php?key=".$ctrl."'>View Detail</a></td>
		<td style='height:30px;' align = 'center' width = '1'><a href = 'deletecan.php?key=".$ctrl."'><img width='15px' height='15px' src = 'img/actions-delete.png' title='Delete' onclick='isdelete();'></img></a></td>
		");?>
		</tr>
<?php
  }
print( "</table><br><br><br>");
mysqli_close($conn);
?>




           
                
				
				
				
				
				
				
				
				
				
				
				
				
				
				<br><br>
           
                
				
				
				
				
				
				
				
				
				
				
				
				
				
				<br><br></div>
        </div>
</td>
</tr>

</table>
<table align="center" style="width:900px;border-radius:12px;border:1px solid gray;background:white url(img/tbg.png) repeat-x left top;" height="70px" >
<tr>
<td id="link">
<p style="text-align:right;padding-right:30px;"><a  href="e_officer.php">Home</a>|<a href="#">About Us</a>|<a href="#">Contact Us</a></p>
<p ><hr width="350px" align="right"></p>
<p style="text-align:right;padding-right:30px;"><font color="#ffffff">Copyright &copy; 2015 Reserved.</font></p>
</td>
</tr>

</table>
</body>
</html>