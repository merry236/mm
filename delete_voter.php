<?php
session_start();
include 'connection.php';
if($log != "log"){
	header ("Location: reg_voter.php");
}
$ctrl = $_REQUEST['key'];
$SQL = "DELETE FROM voter WHERE vid = '$ctrl'";
$conn->query($SQL);
mysqli_close($db_handle);

print "<script>location.href = 'reg_voter.php'</script>";
?>