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
$station=$row['station'];
$vid=$row['vid'];
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

</th>
</tr>
<tr>
<td colspan="2" bgcolor="#3C5581" id="Menus" style="height:auto;border-radius:12px;">
		
		<ul>
			<li><a href="voter.php">Home</a></li>
			<li class="active"><a href="cast.php">Cast Vote</a></li>
			<li><a href="voter_comment.php">Comment</a></li>
			<li><a href="voter_result.php">Result</a></li>
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
                <li><a href="voter_result.php">Result</a></li>
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
<?php             
				/*$date1 = new DateTime(date('Y-m-d'));
				$yr = strftime('%Y');
				$qry=mysql_query("SELECT * FROM election_date WHERE year(date)='$yr'");
				$fetch = mysql_fetch_array($qry);
				$date2 = $fetch['date'];
				//**********************/
                $date1 = new DateTime(date('Y-m-d'));
				$yr = strftime('%Y');
				$qry=$conn->query("SELECT * FROM election_date WHERE year(date)='$yr'");
				$fetch = mysqli_fetch_array($qry);
				$date2 = new DateTime($fetch['date']);
				
				
                $interval = $date1->diff($date2);
                 $d=$interval->d;
                 $h=$interval->h;
                 $m=$interval->i;
                 
                 ?>
                       <div class="panel panel-default">
                          <div class="panel-heading">
                            <h3 class="panel-title"> </h3>
                          </div>
                          <div class="panel-body">
                                  
                                    
                              
                    <table class="table">
                        <tr>
                            <th  class="blink"><div class=" <?php 
                        if( $date1<$date2){
                              if ($d>='3')
                                    {
                                        echo "alert alert-success dropdown-toggle";
                                    } 
                            elseif($d=='2')
                                    {
                                        echo "alert alert-warning dropdown-toggle";
                                    } 
                             elseif($d=='1')
                                    {
                                        
                                        echo "alert alert-warning dropdown-toggle";
                                    }
                             elseif($d=='0')
                                    {
                                        echo "alert alert-danger dropdown-toggle";
                                    }
                              else
                                    {
                                        echo "alert alert-danger dropdown-toggle";
                                    }
                              } 
                               else
                                    {
                                        echo "alert alert-danger dropdown-toggle";
                                    }
                                    ?>"><span class="glyphicon glyphicon-warning-sign"></span> 

                
                <?php
                       
                       if($date1>$date2)
                       {
                        echo "<p class='wrong'>Your voting date has been already expired!</p>";
                       }
                       elseif($date1<$date2)
                       {
                        
                        echo   "<p class='success'>". $d. " days left. </p>";
                       }
                       else
                       {
                        echo  "<p class='success'>".$d. " days left</p>";
                       }
                
                
                   ?></div></th>
                        </tr>
                        <tr>
                            <td> 
                           
                            
                    
                            </td>
                        
                        </tr>
                    </table>
                
<form role="form" action="cast.php" method="post" enctype="multipart/form-data" autocomplete="off">
<label>Political Party <i style="color: red;">*</i></label>
                                      
                                    <?php 
                                        if( $date1>$date2)
                                            {
                                                  ?>
                                      
<select required x-moz-errormessage="Select candidate" name="candidate" disabled="">
	<?php $CYS_query=$conn->query("select * from candidate")or die(mysqli_error());
while($CYS_row=mysqli_fetch_array($CYS_query)){
	?>
	<option value='<?php echo $CYS_row['party_name']; ?>'><?php echo $CYS_row['party_name']; ?></option>
	<?php } ?>
	</select>

                                                    
                                                    
                                                 <?php 
                                                
                                            }
                                            else if($date1==$date2){  ?>
                                    
<select required x-moz-errormessage="Select candidate" name="candidate">
	<?php $CYS_query=$conn->query("select * from candidate")or die(mysqli_error());
while($CYS_row=mysqli_fetch_array($CYS_query)){
	?>
	<option value='<?php echo $CYS_row['party_name']; ?>'><?php echo $CYS_row['party_name']; ?></option>
	<?php } ?>
	</select>
                                    
                                    
                                    
                                  <?php   }  else {  ?>
								   
                                    
<select required x-moz-errormessage="Select candidate" name="candidate" disabled="">
	<?php $CYS_query=$conn->query("select * from candidate")or die(mysqli_error());
while($CYS_row=mysqli_fetch_array($CYS_query)){
	?>
	<option value='<?php echo $CYS_row['party_name']; ?>'><?php echo $CYS_row['party_name']; ?></option>
	<?php } ?>
	</select>
                                    
                                    
                                    
                                  <?php   }   ?>
                                    
                                    
                                
                                  </div>
                                 <?php 
                                        if( $date1>$date2)
                                            {
                                                ?>
                                                  <input type="submit" class="btn btn-default" name="project" disabled="" value='Submit' class="button_example"/>
                                                 <?php 
                                                
                                            }
                                            else if( $date1==$date2){  ?>
                                     <input type="submit" class="btn btn-default" name="ok"  value='Submit' class="button_example"/>
                                  <?php   }  else{ ?>
								    
                                     <input type="submit" class="btn btn-default" name="ok"  value='Submit' class="button_example" disabled=""/>
                                  <?php   }   ?>
                                  
                                  
                                  
                                </form>
<?php
if(isset($_POST['ok']))
 {
 $candidate=$_POST['candidate'];
	$query="SELECT * FROM result where vid='$user_id'";
$resultw=$conn->query($query);
$count=mysqli_num_rows($resultw);
		if($count>0)
		{
echo'  <p align="center"><font color="red" size="3">
<p class="wrong">You are already cast the vote</p></font>';
echo'<meta content="15;cast.php" http-equiv="refresh"/>';
}
else
{
$sql="INSERT INTO result (vid,u_id,fname,mname,station,choice)
VALUES
('$user_id','$vid','$FirstName','$middleName','$station','$candidate')";
  $update = $conn->query("update voter set status=1
  WHERE vid='{$user_id}'") or die(mysqli_error());
if (!$conn->query($sql))
  {       
		echo'  <p class="wrong">Already Cast the vote.</p>';
    }
  else
  {
echo'<p class="success"> Thank you for Your casting the vote!</p>';                                
		   echo' <meta content="6;cast.php" http-equiv="refresh" />';	
}}}															
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