<?php
		include("connection.php");
	session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
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
<img src="img/log.png" 	width="450px" style="margin-left:30px;margin-top:40px" align="center">
<img src="img/logo1.png" width="150px" height="150px" align="right" style="margin-left:10px">
</th>
</tr>
<tr>
<td colspan="2" bgcolor="#3C5581" id="Menus" style="height:auto;border-radius:12px;">
		
		<ul>
			<li ><a href="index.php">Home</a></li>
			<li ><a href="about.php">About Us</a></li>
			<li class="active"><a href="candidate.php">Candidates</a></li>
			<li><a href="vote.php">Vote</a></li>
			<li ><a href="contacts.php">Contact Us</a></li>
			<li><a href="login.php">Login</a></li>
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
			<table style="width:550px;border:1px solid #51a351; border-radius:12px;">
			<?php
$result = mysql_query("SELECT * FROM event ORDER BY date desc");
while($row = mysql_fetch_array($result))
  {
$title=$row['title'];
$content=$row['content'];
$date=$row['date'];
$posted_by=$row['posted_by'];
?>
<tr><td></td>
<td align="right"><b><u><?php echo $date;?></u></b></td></tr>
<tr><td colspan="2"></td></tr>
<td colspan="2" style='text-transform:capitalize;'><b><u><center><?php echo $title;?></center></u></b></td></tr>
<tr><td colspan="2"></td></tr>
<tr>
<td colspan="2" style="font-size:15px;"><?php echo $content;?></td></tr>
<tr>
<td colspan="2" style="font-size:15px;text-align:right"><b>Posted By &nbsp;</b><i><?php echo $posted_by;?></i></td></tr>
<?php
  }
print( "</table></center><br><br>");
mysql_close($conn);
?>
			
			
			
			
			
			
			
			
			
           <h1>Candidate Page</h1>
<?php
			
	   if (isset($_POST['log'])){ 
	    $username=$_POST['user'];
	    $password=$_POST['pass'];
		$party=$_POST['party'];
	    $sql ="SELECT * FROM candidate WHERE party_name='$party' AND username='$username' AND password='$password'";
	    $result = mysql_query($sql); 
		// TO check that at least one row was returned 
		$rowCheck = mysql_num_rows($result);
		$row=mysql_fetch_array($result);
		if($rowCheck>0)
		{
		$_SESSION['u_id']=$row['c_id'];
        echo "<script>window.location='candidate_view.php';</script>";
		}
		else
		{
		
       echo'  <p class="wrong">Check Your username or/and Password!</p>';                                
		   echo' <meta content="15;candidate.php" http-equiv="refresh" />';	
		}
			
    mysql_close($conn);
	}
    ?>		
			<!--End of PHP script-->
            
           <table class="log_table" align="center" >
<form action="candidate.php" method="POST">
<tr bgcolor="#3C5581" ><th colspan="2" ><font color="#ffffff">Candidate Login</font></th></tr>
<tr>
<td>
<label>Party Name</label>
</td>
<td>
<input type="text" name="party" required x-moz-errormessage="Enter party name"/>
</td>
</tr>
<tr>
<td>
<label>User Name</label>
</td>
<td>
<input type="text" name="user" required x-moz-errormessage="Enter Username"/>
</td>
</tr>
<tr>
<td>
<label>Password</label>
</td>
<td>
<input type="password" name="pass" required x-moz-errormessage="Enter password" id="pw"/>
</td>
</tr>
<tr><td></td><td><input type="checkbox" name="checkbox" id="cb" onClick="change_char();"> Show Characters</td></tr>
<tr>
<td>
</td>
<td>
<input type="submit" name="log" value="Login" class="button_example"/>
<input type="reset" value="Reset" class="button_example"/>
</td>
</tr>
<tr><td><br></td></tr>
</form>
</table><br><br>
           
                
				
				
				
				
				
				
				
				
				
				
				
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