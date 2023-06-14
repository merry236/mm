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
</tr>
<tr>
<td colspan="2" bgcolor="#3C5581" id="Menus" style="height:auto;border-radius:12px;">
		
		<ul>
			<li><a href="voter.php">Home</a></li>
			<li><a href="cast.php">Cast Vote</a></li>
			<li class="active"><a href="voter_comment.php">Comment</a></li>
			<li ><a href="voter_result.php">Result</a></li>
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
                <li><a href="v_result.php">Result</a></li>
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
<script type='text/javascript'>
function formValidation(){
//assign the fields
        
		var email=document.getElementById('email');
		var fname = document.getElementById('fname');
	var message = document.getElementById('message');
	if(emailValidator(email,"check your E-mail format")){
if(lengthRestriction(fname, 5, 25,"for your full name")){
if(lengthRestriction(message, 3, 100,"for your comment")){


	return true;
	}
	}
	}	
return false;
		
}	
function isAlphabet(elem, helperMsg){
	var alphaExp = /^[a-zA-Z]+$/;
	if(elem.value.match(alphaExp)){
		return true;
	}else{
		alert(helperMsg);
		elem.focus();
		return false;
	}
}

function emailValidator(elem, helperMsg){
	var emailExp = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
	if(elem.value.match(emailExp)){
		return true;
	}else{
		alert(helperMsg);
		elem.focus();
		return false;
	}
}
function isNumeric(elem, helperMsg){
	var numericExpression = /^[0-9]+$/;
	if(elem.value.match(numericExpression)){
		return true;
	}else{
		alert(helperMsg);
		elem.focus();
		return false;
	}
}
function lengthRestriction(elem, min, max, helperMsg){
	var uInput = elem.value;
	if(uInput.length >= min && uInput.length <= max){
		return true;
	}else{
		alert("Please enter between " +min+ " and " +max+ " characters" +helperMsg);
		elem.focus();
		return false;
	}
}
function isAlphanumeric(elem, helperMsg){
	var alphaExp = /^[0-9a-zA-Z]+$/;
	if(elem.value.match(alphaExp)){
		return true;
	}else{
		alert(helperMsg);
		elem.focus();
		return false;
	}
}
function isAlphabet(elem, helperMsg){
	var alphaExp = /^[a-zA-Z]+$/;
	if(elem.value.match(alphaExp)){
		return true;
	}else{
		alert(helperMsg);
		elem.focus();
		return false;
	}
}
	</script>
	
	
	<div style="width:480px; height:350px; margin:0 auto; position:relative; border:2px solid rgba(0,0,0,0); -webkit-border-radius:5px; -moz-border-radius:5px; border-radius:25px; -webkit-box-shadow:0 0 18px rgba(0,0,0,0.4); -moz-box-shadow:0 0 18px rgba(0,0,0,0.4); box-shadow:0 0 18px rgba(0,0,0,0.4); margin-top:20px; color:#000000;">

  <form id="form1" name="login" method="POST" action="voter_comment.php" onsubmit='return formValidation()'>
 <div style="background-color:#3C5581;border-radius:5px;font-family:Arial, Helvetica, sans-serif; color:#000000; padding:5px; height:22px;"> 
 
 
 <div style="float:left;" ><strong><font color="white" size="2px">Submit Comment</font></strong></div>
 <div style="float:right; margin-right:20px; background-color:#cccccc; width:25px;  text-align:center; border-radius:10px; height:12px;"><a href="voter.php" title="Close"><img src="img/close_icon.gif"></a></div>
 
 
 </div>
 
 <?php
  $date=date("d/m/Y");
 if(isset($_POST['sent']))
 {
$ad = $conn->query("SELECT * FROM user WHERE role='admin'");
$ff = mysqli_fetch_array($ad);
$user_id = $ff['u_id'];
$sql="INSERT INTO comment (u_id,name,email, content,date,status)
VALUES
('$user_id','$_POST[fname]','$_POST[email]','$_POST[com]','$date','unread')";

if (!$conn->query($sql))
  {
  die('Error: ' . mysqli_error());
  }
		 echo'  <p class="success">Your Message has been Sent successfuly!</p>';
         echo' <meta content="5;voter_comment.php" http-equiv="refresh" />'; 
		 }
mysqli_close($conn)
?>
  <table width="480px" valign="top" align="center" border="0">
  
  <tr>
	       <td class='para1_text' width="160px"><font color="red">*</font> Your Full Name:</td>
		   <td><input type="text" name="fname" id="fname" required x-moz-errormessage="Enter Your Full Name" ></td>
	      </tr>
		 <tr>
	       <td class='para1_text'><font color="red">*</font> Email Address:</td>
		   <td><input type="text" name="email" id="email" required x-moz-errormessage="Enter password"></td>
	     </tr>
  <tr>
	       <td class='para1_text'><font color="red">*</font> Message:</td>
		   <td><textarea rows="6" cols="30" align="center" name="com" id="message" placeholder='Write your comment here' required x-moz-errormessage="Enter Message"></textarea></td>
	     </tr>
  <tr>
    <td>&nbsp;</td>
	<br>
    <td><input type="submit" class="button_example" name="sent" value="Send"/></td>
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