<?php
session_start();
include 'connection.php';
if($log != "log"){
	header ("Location: elect_registrar.php");
}
$ctrl = $_REQUEST['key'];
$SQL = "DELETE FROM user WHERE u_id = '$ctrl'";
$conn->query($SQL);
mysqli_close($db_handle);

print "<script>location.href = 'elect_registrar.php'</script>";
?>