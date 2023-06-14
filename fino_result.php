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


<br><br><?php
$ctrl = $_REQUEST['key'];
//$ctrl=$_SESSION['c_id'];
$query="SELECT * FROM candidate where c_id='{$ctrl}'";
$result=$conn->query($query);
$count=mysqli_num_rows($result);
if(!$result){
die("Candidate is not registered!".mysqli_error());
}
if($count==1){
while($row=mysqli_fetch_array($result)){
$r1=$row['fname'];
$r2=$row['mname'];
$r3=$row['lname'];
$r4=$row['age'];
$r5=$row['sex'];
$r6=$row['work'];
$r7=$row['education'];
$r8=$row['phone'];
$r9=$row['email'];
$r10=$row['experience'];
$r11=$row['party_symbol'];
$r12=$row['party_name'];
$r13=$row['candidate_photo'];
}
?>
  <form id="form1" method="POST" action="voter_can.php"  onsubmit='return formValidation()'>

 <table valign='top'  align="center" style="border-radius:5px;border:1px solid #336699;width:550px">
 <tr>
 <th colspan="2" bgcolor="#3C5581"><font color="white" style="text-transform:uppercase;"><?php echo $r12;?>&nbsp;&nbsp;Party</font><a href="o_result.php" title="Close"><img src="img/close_icon.gif" align="right"></a></th>
 </tr>
 <tr>
 <td><table>
<tr><td colspan='2'align="center"><img src='<?php echo $r13;?>' width="200px"></td></tr>
<tr><td colspan='2'>&nbsp;</td></tr>
<tr><td><b>Party Name:</b></td><td><?php echo $r12;?></td></tr></table></td>
 <td><table>
<tr><td colspan='2'align="center"><img src='<?php echo $r13;?>' width="200px"></td></tr>
<tr><td colspan='2'><input type="hidden" name="results" value='<?php echo $r12;?>'></td></tr>

<?php
$querys="SELECT * FROM result where choice ='$r12'";
$results=$conn->query($querys);
$counts=mysqli_num_rows($results);
echo"<p class='success' style='margin-left:-10px;'>You have&nbsp;<font color='red'>".$counts."</font>&nbsp;vote</p>";
?>
</table>
</td>
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
<p style="text-align:right;padding-right:30px;"><a  href="e_officer.php">Home</a>|<a href="#">About Us</a>|<a href="#">Contact Us</a></p>
<p ><hr width="350px" align="right"></p>
<p style="text-align:right;padding-right:30px;"><font color="#ffffff">Copyright &copy; 2015 Reserved.</font></p>
</td>
</tr>

</table>
</body>
</html>