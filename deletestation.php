<?php
session_start();
include 'connection.php';
if($log != "log"){
	header ("Location: stations.php");
}
$ctrl = $_REQUEST['key'];
$SQL = "DELETE FROM station WHERE psid = '$ctrl'";
$conn->query($SQL);
mysqli_close($db_handle);

print "<script>location.href = 'stations.php'</script>";
?>