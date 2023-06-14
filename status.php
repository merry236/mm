<?php
$conn=new mysqli("localhost","root","","onlinevote");
//or die(mysqli_error());
	//$sdb=mysql_select_db("onlinevote",$conn) or die(mysqli_error()); 
if(isset($_GET['status']))
{
	$status=$_GET['status'];
	
	$select_status=$conn->query("select * from user where u_id='$status'");
	while($row=mysqli_fetch_object($select_status))
	{
		$st=$row->status;
	
	if($st=='0')
	{
		$status2=1;
	}
	else
	{
		$status2=0;
	}
	$update=$conn->query("update user set status='$status2' where u_id='$status' ");
	if($update)
	{
		header("Location:manage_account.php");
	}
	else
	{
		echo mysqli_error();
	}
	}
	?>
     
    <?php
}
?>