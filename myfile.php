<?php
	include("connection.php");  
 
 ?>
<?php		
			$av=$conn->query("select *from candidate");
			$countav=mysqli_num_rows($av);			
			echo '<font size="2"><h2><u>Result:</u></h2> There are <font color="blue" >'.$countav. ' candidates are participated.</font>' ;
			echo"<br><br>";
   ?>
	<?php
$result = $conn->query("SELECT * FROM candidate");
while($row = mysqli_fetch_array($result))
  {
$ctrl = $row['c_id'];
$_SESSION['c_id']=$ctrl;
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
<tr><td style='height:30px;'><a href = "final_result.php?key=<?php echo $ctrl;?>">View Detail</a></td></tr></table></td>
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