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
<table border="0" cellspacing="0">
   <tr>
     
     <td width="800"  height="600" valign="top"><br><br>
	 <script type="text/javascript">
function showDiv(prefix,chooser) 
{
        for(var i=0;i<chooser.options.length;i++) 
		{
        	var div = document.getElementById(prefix+chooser.options[i].value);
            div.style.display = 'none';
        }
 
		var selectedOption = (chooser.options[chooser.selectedIndex].value);
		if(selectedOption == "1")
		{
			displayDiv(prefix,"1");
		}
		if(selectedOption == "2")
		{
			displayDiv(prefix,"2");
		}
		if(selectedOption == "3")
		{
			displayDiv(prefix,"3");
		}
		if(selectedOption == "4")
		{
			displayDiv(prefix,"4");
		}
		if(selectedOption == "5")
		{
			displayDiv(prefix,"5");
		}
} 
function displayDiv(prefix,suffix) 
{
        var div = document.getElementById(prefix+suffix);
        div.style.display = 'block';
}
</script>
 <table id="contentbox">
		<tr>
			<td id="content">
				<div id="report">
				Which Type of report do you want?
				<select name="portal" id="cboOptions" onChange="showDiv('div',this)">
					<option value="1">...</option>
					<option value="2">Candidates</option>
					<option value="4">Voters</option>
				</select>
				<br /><br />
						  
				<div id="div1" style="display:none;"></div>	
				<div id="div2" style="display:none;">
					<form action="" method="post" >
						<center><h3><u>List of candidates</u></h3></center> 
						<?php 
						echo'<p valign="bottom" align="right"><form><input type="button" style="width:30%;height:30px;color:#3C5581;
					   text-transform:capitalize;Font-weight:bolder;font-size:15px"; value="Print" onclick="window.print();"></form></p>';
	$sel=$conn->query("SELECT * FROM candidate");
			echo '<table align="center" style="width:500px;border:1px solid #3C5581;border-radius:10px;" id="vtable"><tr>';
			echo '<th bgcolor="#3C5581" width="100px"><font color="white" size="2">Party Name.</th><th bgcolor="#3C5581"><font color="white" size="2">Name.</th><th bgcolor="#3C5581"><font color="white" size="2">Sex</th><th bgcolor="#3C5581"><font color="white" size="2">Age</th></tr>';
			$rowcolor=0;
			$intt=mysqli_num_rows($sel);
			echo"<br>";
			echo"<font color='blue'>There are &nbsp;</font><font color='red'>".$intt."&nbsp;</font>Candidates are participated";
			echo"<br><br>";
			while($row=mysqli_fetch_array($sel)){
  print ("<tr>");
	 print ("<td><font size='2'>" . $row['party_name'] . "</td>");
print ("<td><font size='2'>" .$row['fname']."&nbsp;". $row['mname'] ."&nbsp;".$row['lname']. "</td>");	 
print ("<td><font size='2'>" . $row['sex'] . "</td>");
print ("<td><font size='2'>" . $row['age'] . "</td>");
  print ("</tr>");
  }
print( "</table>");
						
						
						
						?>
					</form>
				</div>		
				<div id="div4" style="display:none;">
					<form action="" method="post">
					<u><center><h2>Voters</h2></center></u>
						<?php
						echo'<p valign="bottom" align="right"><form><input type="button" style="width:30%;height:30px;color:#3C5581;
					   text-transform:capitalize;Font-weight:bolder;font-size:15px"; value="Print" onclick="window.print();"></form></p>';
	$sel=$conn->query("SELECT * FROM voter");
			echo '<table style="width:500px;border:1px solid #3C5581;border-radius:10px;" id="vtable"><tr>';
			echo '<th bgcolor="#3C5581"><font color="white" size="2">Name.</th><th bgcolor="#3C5581" ><font color="white" size="2">Age</th>
			<th bgcolor="#3C5581" ><font color="white" size="2">sex</th>
			<th bgcolor="#3C5581" ><font color="white" size="2">Region</th>
			<th bgcolor="#3C5581" ><font color="white" size="2">Zone</th>
			<th bgcolor="#3C5581" ><font color="white" size="2">District</th>
			<th bgcolor="#3C5581" ><font color="white" size="2">Status</th>
			</tr>';
			$rowcolor=0;
			$intt=mysqli_num_rows($sel);
			echo"<br><br>";
			while($row=mysqli_fetch_array($sel)){
  print ("<tr>");
print ("<td><font size='2'>" .$row['fname']."&nbsp;". $row['mname'] ."&nbsp;".$row['lname']. "</td>");
	  print ("<td><font size='2'>" . $row['age'] . "</td>");
print ("<td><font size='2'>" . $row['sex'] . "</td>");	
print ("<td><font size='2'>" . $row['Region'] . "</td>"); 
print ("<td><font size='2'>" . $row['Zone'] . "</td>"); 
print ("<td><font size='2'>" . $row['station'] . "</td>"); 
$status=$row['status'];
if($status==0)
{
print("
<td style='height:30px;	color:red;	text-align:center;'>Not Cast</td>");
}
else
{
print("
<td style='height:30px;	color:blue;	text-align:center;'>Cast</td>");
}
  print ("</tr>");
  }
print( "</table>");
						
						
						
						?>
					</form>
				</div>
				<div id="div5" style="display:none;">
					<form action="" method="post">
						Annual report: 
						<select name="masterfile">
							<option value="">...</option>
							<option value="">Population</option>
							<option value="">House</option>
						</select>
						</form>
				</div>
				</div>
			</td>
		</tr>
	</table>
</td>
	</tr>
	 </table>            
				
				
				
				
				
				
				
				
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