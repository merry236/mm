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
$result=$conn->query("select * from candidate where c_id='$user_id'")or die(mysql_error);
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
<img src="img/can.png" 	width="400px" style="margin-left:30px;margin-top:30px" align="center">
<img src="img/logo1.png" width="150px" height="150px" align="right" style="margin-left:10px">

</th>
</tr>
<tr>
<td colspan="2" bgcolor="#3C5581" id="Menus" style="height:auto;border-radius:12px;">
		
		<ul>
			<li class="active"><a href="candidate_view.php">Home</a></li>
			<li><a href="can_comment.php">Comment</a></li>
			<li><a href="can_result.php">Result</a></li>
			<li><a href="clogout.php">Logout</a></li>
		</ul>
</td>
</tr>
</table>
<table align="center" style="width:900px;border:1px solid gray;border-radius:12px;" height="500px">
<tr valign="top">
<td><div style="clear: both"></div>

        <div id="left">
            <ul>
			<li><a href="post.php">Post News</a></li>
                <li><a href="can_change.php">Change Password</a></li>
					                <li><a href="can_comment.php">Comment</a></li>
					<li>
                    <a href="can_candidate.php">Candidates</a></li>
                <li><a href="can_result.php">Result</a></li>
					<li>
                    <a href="clogout.php">Logout</a></li>
            </ul>
        </div>
		</td>
		<td><div id="right">
            <div class="desk">
           <h1 align="right"><?php 
echo '<img src="img/people.png" width="40px" height="30px">&nbsp;'.'<font style="text-transform:capitalize;" face="times new roman" color="blue" size="3">Hi,&nbsp;'.$FirstName."&nbsp;".$middleName." ".'</font>';?></h1>
<br><br>
<center><fieldset style="border:1px solid #336699;width:500px">
<legend><h3>Post News</h3></legend>
<?php
 if(isset($_POST['postn']))
 {
 $title=$_POST['titles'];
 $content=$_POST['content'];
 $date=date("d/m/Y");
$sql="INSERT INTO event(c_id,title,content,posted_by,date)
VALUES
('$user_id','$title','$content','$FirstName','$date')";

if (!$conn->query($sql))
  {
         echo'  <p class="wrong">Already Posted</p>';
  die('Error: '.'Already Exist'.mysqli_error());
  }
  else
  {
echo'<p class="success"> Posted successfully!</p>';                                
		   echo' <meta content="6;post.php" http-equiv="refresh" />';	
}}
mysqli_close($conn)
?>  
 <table><form  action="post.php" method="post" enctype="multipart/form-data"><tr><td>Title</td><td><input name="titles" type="text" required x-moz-errormessage="Enter File title"/></td></tr>
 <tr><td>Content</td><td><textarea cols='50px' rows='8px' name='content' required x-moz-errormessage="Enter Content Here!" ></textarea></td></tr>
  <br>
 	<tr><td></td><td><input type="submit" value="Post" name='postn' class="button_example">&nbsp;&nbsp;<input type="reset" value="Cancel" class="button_example"></td></tr></table>   
</form>
</fieldset></center>

				
				
				
				
				
				
				
				
				
				
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