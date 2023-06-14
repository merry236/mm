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
$u_id=$row['u_id'];
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
<!--PHP code-->
<?php
 if(isset($_POST['ok']))
 {
 $fname=$_POST['fname'];
 $mname=$_POST['mname'];
 $lname=$_POST['lname'];
 $user_id=$_POST['user_id'];
 $sex=$_POST['sex'];
 $age=$_POST['age'];
 $phone=$_POST['phone'];
 $email=$_POST['email'];
 $edu=$_POST['edu'];
 $work=$_POST['work'];
 $party_name=$_POST['party_name'];
 $party_symbol=$_POST['symbol'];
 $experience=$_POST['experience'];
 $candidate_photo=$_POST['candidate_photo'];
 $passw=($_POST['passw']);
 $usern=$_POST['usern'];
 $query="SELECT * FROM user where username='$usern'";
$resultw=$conn->query($query);
$count=mysqli_num_rows($resultw);
		if($count>1)
		{
echo'  <p align="center"><font color="red" size="3">
<p class="wrong">User Name is used by another Party</p>';
echo'<meta content="15;o_candidate.php" http-equiv="refresh"/>';
}
else
{
if ($age<=21)
{
echo'<script>alert("Check the candidate age!");</script>';
}
else
{
$sql="INSERT INTO candidate (u_id,fname,mname,lname,sex,age,work,education,phone,email,experience,party_name,party_symbol,candidate_photo,username,password)
VALUES
('$user_id','$fname','$mname','$lname','$sex','$age','$work','$edu','$phone','$email','$experience','$party_name','$party_symbol','$candidate_photo','$usern','$passw')";

if (!$conn->query($sql))
  {
         echo'  <p class="wrong">Error</p>'.mysqli_error();
    }
  else
  {
echo'<p class="success"> Account is created successfully</p>';                                
		   echo' <meta content="10;o_candidate.php" http-equiv="refresh" />';	
}} } 
	   }
mysqli_close($conn)
?>    


<!--End of PHP code-->
<table class="log_table" align="center" >
<form action="o_candidate.php" method="post" enctype="multipart/form-data">
<tr bgcolor="#3C5581" ><th colspan="2" ><font color="#ffffff">Add New Candidate</font><a href="ov_candidate.php"><img align="right"src="img/close_icon.gif" title="close"></a></th></tr>
<tr>
<td><br>
</td>
<td>
</td>
</tr>
<tr>
<td colspan="2"><center><u><font style="text-transform:capitalize;"face="times new roman" color="blue" size="3">Part I. Personal information</font></u></center><br>
</td>
</tr>
<tr>
<td>
<font color="red">*</font><label>User ID</label>
</td>
<td>
<input type="text" value=<?php echo $u_id?> name="user_id" readonly="true"  required />
</td>
</tr>
<tr>
<td>
<font color="red">*</font><label>First Name</label>
</td>
<td>
<input type="text" name="fname" required/>
</td>
</tr>
<tr>
<td>
<font color="red">*</font><label>Middle Name</label>
</td>
<td>
<input type="text" name="mname" required/>
</td>
</tr>
<tr>
<td>
<font color="red">*</font><label>Last Name</label>
</td>
<td>
<input type="text" name="lname" required/>
</td>
</tr>

<tr>
                
                <td><font color="red">*</font> Sex:</td>
                <td><input type="radio"  name="sex" value="male" title="choose either male by clicking here" required />
                  Male
                  <input type="radio" name="sex" value="female" title='choose female by clicking here' required />
                  Female</td>
              </tr>
			  <tr>
<td>
<font color="red">*</font><label>Age</label>
</td>
<td>
<input type="text" name="age" maxlength='2' onKeyPress="return isNumberKey(event)" required/>
</td>
</tr>
<tr>
<td>
&nbsp;<label>Phone No</label>
</td>
<td>
<input type="text" name="phone" maxlength='10' onKeyPress="return isNumberKey(event)" />
</td>
</tr>
<tr>
<td>
&nbsp;<label>Email</label>
</td>
<td>
<input type="text" name="email" />
</td>
</tr>
<tr>
<td>
<font color="red">*</font><label>Education</label>
</td>
<td>
<select name="edu" required>
<option></option>
<option value="certificate">Certificate</option>
<option value="diploma">Diploma</option>
<option value="degree">Degree</option>
<option value="master">Master</option>
<option value="phd">Phd</option>
<option value="assprof">Ass.Prof</option>
<option value="prof">Prof</option>
</select>
</td>
</tr>
<tr>
<td>
<font color="red">*</font><label>Work</label>
</td>
<td>
<input type="text" name="work" required/>
</td>
</tr>
<tr>
<td>
<font color="red">*</font><label>Experience</label>
</td>
<td>
<input type="text" name="experience" onKeyPress="return isNumberKey(event)" required/>
</td>
</tr>
<input name="candidate_photo" id="dadded" type="hidden" value="upload/p.jpg" />
<tr>
<td><br>
</td>
<td>
</td>
</tr>
<tr>
<td colspan="2"><center><u><font style="text-transform:capitalize;"face="times new roman" color="blue" size="3">Part II. Party information</font></u></center><br>
</td>
</tr>
<tr>
<td>
<font color="red">*</font><label>Party Name</label>
</td>
<td>
<input type="text" name="party_name" required/>
</td>
</tr>
<input name="symbol" id="daddeda" type="hidden" value="upload/p.jpg" />
<tr>
<td>
<font color="red">*</font><label>User Name</label>
</td>
<td>
<input type="text" name="usern" required/>
</td>
</tr>
<tr>
<td>
<font color="red">*</font><label>Password</label>
</td>
<td>
<input type="password" name="passw" required/>
</td>
</tr>
<tr>
<td>
</td>
<td>
<input type="submit" name="ok" value="Save" class="button_example"/>
<input type="reset" value="Reset" class="button_example"/>
</td>
</tr>
<tr>
<td><br>
</td>
<td>
<font color="red">*</font> is Manadatory Field.
</td>
</tr>
</form>
<br><br> 
</table>
<br><br> <br><br> 
</td>
</tr>
</table>


          
                
				
				
				
				
				
				
				
				
				
				
				
				
				
				<br></div>
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