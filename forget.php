<?php   
 session_start();
 include("connection.php");
  
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	
<!--Header-->
<title>Online Voting</title>
<link rel="icon" type="image/jpg" href="img/flag.JPG"/>
<link rel="stylesheet" href="main.css" type="text/css" media="screen"/>
<link href="menu.css" rel="stylesheet" type="text/css" media="screen" />
		<script type="text/javascript">
function change_char(){
	
	var pass = document.getElementById("pw");
	var checkbox = document.getElementById("cb");
	
	if(pass.type == "password"){
		pass.type = "text";
		checkbox.checked = true;
	}else{
		pass.type = "password";
		checkbox.checked = false;
	}
}
	</script>
		
		
		
		<!--End of Header-->
</head>
<body>
<table align="center" style="width:900px;border:1px solid gray;background:white url(img/tbg.png) repeat-x left top;border-radius:12px">
<tr style="height:auto;border-radius:12px;background: white url(img/tbg.png) repeat-x left top;">
<th colspan="2">
<img src="img/logo.png" width="150px" height="150px" align="left" style="margin-left:10px">
<img src="img/union.png" 	width="450px" style="margin-left:30px;margin-top:40px" align="center">
<img src="img/logo1.png" width="150px" height="150px" align="right" style="margin-left:10px">
</th>
</tr>
<tr>
<td colspan="2" bgcolor="#3C5581" id="Menus" style="height:auto;border-radius:12px;">
		
		<ul>
			<li ><a href="index.php">Home</a></li>
			<li ><a href="about.php">About Us</a></li>
			<li ><a href="candidate.php">Candidates</a></li>
			<li ><a href="vote.php">Vote</a></li>
			<li ><a href="contacts.php">Contact Us</a></li>
			<li class="active"><a href="login.php">Login</a></li>
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
                    <a href="index.php">Home</a></li>
					                <li>
                    <a href="about.php">About Us</a></li>
					<li>
                    <a href="candidate.php">Candidates</a></li>
                <li>
                    <a href="vote.php">Vote</a></li>
				<li>
                    <a href="contacts.php">Contact Us</a></li>
					<li>
                    <a href="help.php">Help</a></li>
					<li>
                    <a href="comment.php">Comment</a></li>
					<li>
                    <a href="login.php">Login</a></li>
            </ul>
        </div>
		</td>
		<td><div id="right">
            <div class="desk">
           <h1>Forget password page</h1>
<br><br>
           <!--PHP script-->
<?php
 if(isset($_POST['view']))
  {
   $username=$_POST['username'];
   $phone=$_POST['phone'];
   $lname=$_POST['lname'];
   $sql="SELECT * FROM user where username='$username' AND phone='$phone' AND lname='$lname';"; 
   $result_set=$conn->query($sql);
   if(!$result_set)
   {
   die("Query failed".mysqli_error());
   }
if(mysqli_num_rows($result_set)>0)
{
while($row=mysqli_fetch_array($result_set))
{
$fname=$row[0];
$password=$row['password'];
echo"<p class='success'>"."Hi"."&nbsp; &nbsp;".$fname."&nbsp; &nbsp;"."your password is:<font color='red' style='text-decoration:blink'>".$password."</font></p>";
echo'<meta content="12;login.php" http-equiv="refresh" />';

}}
else
{
echo"<p class='wrong'>Incorrect Input</p>";
echo'<meta content="10;forget.php" http-equiv="refresh" />';
}
}
mysqli_close($conn);
?>
  
<!--End of PHP-->
<form action="forget.php" method="POST">
           <table class="log_table" align="center" >

<tr bgcolor="#3C5581" ><th colspan="2" ><font color="#ffffff">Do you forget password?</font></th></tr>
<tr>
<td>
<label>Last Name</label>
</td>
<td>
<input type="text" name="lname" required x-moz-errormessage="Enter last name!"/>
</td>
</tr>
<tr>
<td>
<label>phone number</label>
</td>
<td>
<input type="text" name="phone" required x-moz-errormessage="Enter phone number!"/>
</td>
</tr>
<tr>
<td>
<label>User Name</label>
</td>
<td>
<input type="text" name="username" required x-moz-errormessage="Enter Username!"/>
</td>
</tr>
<tr>
<td>
</td>
<td>
<input type="submit" name="view" value="Recover" class="button_example"/>
<input type="reset" value="Reset" class="button_example"/>
</td>
</tr>
<tr>
<td>
</td>
<td>
<br>
</td>
</tr>
</form>
</table>
             
                
				
				
				
				
				
				
				<br><br>
				</div>
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