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
<SCRIPT language='Javascript'>
      <!--
      function isNumberKey(evt)
      {
         var charCode = (evt.which) ? evt.which : event.keyCode
         if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;

         return true;
      }
	      function isNumberKey(evt)
      {
         var charCode = (evt.which) ? evt.which : event.keyCode
         if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;

         return true;
      }
	 function isNumberKey(evt)
      {
         var charCode = (evt.which) ? evt.which : event.keyCode
         if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;
      //-->
	  
	  function chkblnk(eid,errid)
{
var x=document.getElementById(eid).value;
if(x=="")
{
document.getElementById(errid).innerHTML="pls fill this field";
}
else
{
document.getElementById(errid).innerHTML="";
}
}

function chkAplha(event,err)
{
if(!((event.which>=65 && event.which<=90) || (event.which>=97 && event.which<=122) || event.which==0 || event.which==8))
{
document.getElementById(err).innerHTML="Pls Enter Letter Only!!";
return false;
}
}
function chkAplha(event,err)
{
if(!((event.which>=65 && event.which<=90) || (event.which>=97 && event.which<=122) || event.which==0 || event.which==8))
{
document.getElementById(err).innerHTML="Pls Enter Letter Only!!";
return false;
}
}
function chkAplhaa(event,err)
{
if(!((event.which>=65 && event.which<=90) || (event.which>=97 && event.which<=122) || event.which==0 || event.which==8))
{
document.getElementById(err).innerHTML="Pls Enter Letter Only!!";
return false;
}
}
function chkeid()
{
var e=document.getElementById("e").value;
var atpos=e.indexOf("@");
var dotpos=e.lastIndexOf(".");
if(atpos<4 || dotpos<atpos+3)
{
document.getElementById("error2").innerHTML="invalid email";
}
else
{
document.getElementById("error2").innerHTML="";
}
//alert(atpos+" "+dotpos);
}
</script>

   <script type="text/javascript">
function chkblnk(eid,errid)
{
var x=document.getElementById(eid).value;
if(x=="")
{
document.getElementById(errid).innerHTML="pls fill this field";
}
else
{
document.getElementById(errid).innerHTML="";
}
}

function chkAplha(event,err)
{
if(!((event.which>=65 && event.which<=90) || (event.which>=97 && event.which<=122) || event.which==0 || event.which==8))
{
document.getElementById(err).innerHTML="Pls Enter Letter Only!!";
return false;
}
}
function chkAplha(event,err)
{
if(!((event.which>=65 && event.which<=90) || (event.which>=97 && event.which<=122) || event.which==0 || event.which==8))
{
document.getElementById(err).innerHTML="Pls Enter Letter Only!!";
return false;
}
}
function chkAplhaa(event,err)
{
if(!((event.which>=65 && event.which<=90) || (event.which>=97 && event.which<=122) || event.which==0 || event.which==8))
{
document.getElementById(err).innerHTML="Pls Enter Letter Only!!";
return false;
}
}
function chkeid()
{
var e=document.getElementById("e").value;
var atpos=e.indexOf("@");
var dotpos=e.lastIndexOf(".");
if(atpos<4 || dotpos<atpos+3)
{
document.getElementById("error2").innerHTML="invalid email";
}
else
{
document.getElementById("error2").innerHTML="";
}
//alert(atpos+" "+dotpos);
}
      //-->
   </SCRIPT>
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
<td colspan="2" bgcolor="#3C558" id="Menus" style="height:auto;border-radius:12px;">
		
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
 $user=$_POST['user'];
 $pass=($_POST['pass']);
 $cpass=($_POST['cpass']);
 $psname=$_POST['psname'];
 
if($pass==$cpass)
{
$query="SELECT * FROM user where u_id='$user_id' AND username='$user'";
$resultw=$conn->query($query);
$count=mysqli_num_rows($resultw);
		if($count>1)
		{
echo'  <p align="center"><font color="red" size="3">
<p class="wrong">User ID is used by another user</p>';
echo'<meta content="15;create.php" http-equiv="refresh"/>';
}
else
{
if ($age<=20)
{
echo'<script>alert("Check the Registrar age!");</script>';
}
else
{
$sql="INSERT INTO user (fname,mname,lname,u_id,sex,age,phone,email,role,username,password,status,station)
VALUES
('$fname','$mname','$lname','$user_id','$sex','$age','$phone','$email','registrar','$user','$pass','1','$psname')";

if (!$conn->query($sql))
  {
         echo'  <p class="wrong" style="text-decoration:blink;">Already Registered with this USER ID</p>';
		 echo'<meta content="10;add_registrar.php" http-equiv="refresh" />';
    }
  else
  {
echo'<p style="text-decoration:blink;" class="success"> Account is created successfully</p>';                                
		   echo' <meta content="6;add_registrar.php" http-equiv="refresh" />';	
}}}}
else
{
echo'<br><br><br>';
       echo'  <p style="text-decoration:blink;" class="wrong">Your Password Does not match!!</p>';
	   echo'<meta content="10;add_registrar.php" http-equiv="refresh" />';
	   }
	   }
mysqli_close($conn)
?>    


<!--End of script-->
<table class="log_table" align="center" >
<form action="add_registrar.php" method="post">
<tr bgcolor="#3C5581" ><th colspan="2" ><font color="#ffffff">Add new election registrar</font><a href="elect_registrar.php"><img align="right"src="img/close_icon.gif" title="close"></a></th></tr>
<tr>
<td><br>
</td>
<td>
</td>
</tr>
<tr>
<td>
<font color="red">*</font><label>First Name</label>
</td>
<td>
<input type="text" name="fname"id="fn"  onkeypress="return chkAplha(event,'error12')" onblur="chkblnk('fn','error12')" required/>
<td class="col" id="error12" style="color:red"></td>
</td>
</tr>
<tr>
<td>
<font color="red">*</font><label>Middle Name</label>
</td>
<td>
<input type="text" name="mname"id="mn"  onkeypress="return chkAplha(event,'error11')" onblur="chkblnk('fn','error11')" required/>
<td class="col" id="error11" style="color:red"></td>
</td>
</tr>
<tr>
<td>
<font color="red">*</font><label>Last Name</label>
</td>
<td>
<input type="text" name="lname"id="ln"  onkeypress="return chkAplha(event,'error10')" onblur="chkblnk('fn','error10')"  required/>
<td class="col" id="error10" style="color:red"></td>
</td>
</tr>
<tr>
<td>
<font color="red">*</font><label>User ID</label>
</td>
<td>
<input type="text" name="user_id" required/>
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
<input type="text" name="email" required x-moz-errormessage="Please Select Type User " title="Please Enter Letter Only" id="e" onblur="chkeid()"/>
<td class="col" id="error2" style="color:red"></td>
</td>
</tr>
<tr>
<td>
<font color="red">*</font><label>Region:</label>
</td>
<td>

<select name="psname" required>
	<?php 
	include("connection.php");
	$CYS_query=$conn->query("select * from station")or die(mysqli_error());
while($CYS_row=mysqli_fetch_array($CYS_query)){
	?>
	<option><?php echo $CYS_row['Region']; ?></option>
	<?php } ?>
	</select>
</td>
</tr>
<tr>
<td>
<font color="red">*</font><label>Zone:</label>
</td>
<td>

<select name="psname" required>
	<?php 
	include("connection.php");
	$CYS_query=$conn->query("select * from station")or die(mysqli_error());
while($CYS_row=mysqli_fetch_array($CYS_query)){
	?>
	<option><?php echo $CYS_row['Zone']; ?></option>
	<?php } ?>
	</select>
</td>
</tr>
<tr>
<td>
<font color="red">*</font><label>District:</label>
</td>
<td>

<select name="psname" required>
	<?php 
	include("connection.php");
	$CYS_query=$conn->query("select * from station")or die(mysqli_error());
while($CYS_row=mysqli_fetch_array($CYS_query)){
	?>
	<option><?php echo $CYS_row['psname']; ?></option>
	<?php } ?>
	</select>
</td>
</tr>
<tr>
<td>
<font color="red">*</font><label>User Name</label>
</td>
<td>
<input type="text" name="user" required/>
</td>
</tr>
<tr>
<td>
<font color="red">*</font><label>Password</label>
</td>
<td>
<input type="password" name="pass" required/>
</td>
</tr>
<tr>
<td>
<font color="red">*</font><label>Confirm Password</label>
</td>
<td>
<input type="password" name="cpass" required/>
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
</table>
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