<?php
session_start();
include 'connection.php';
if($log != "log"){
	header ("Location: manage_account.php");
}
$ctrl = $_REQUEST['key'];
$SQL = "DELETE FROM user WHERE u_id = '$ctrl'";
$conn->query($SQL);
mysqli_close($db_handle);

print "<script>location.href = 'manage_account.php'</script>";
?>