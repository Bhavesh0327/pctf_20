<?php
$servername = "";
$uname = ""; 
$upwd = "";
$dbname = "capture_the_flag";
$conn = mysqli_connect($servername, $uname, $upwd, $dbname);
if(!$conn)
{
	die("connection failed:".mysqli_connect_error());
}
?>