<?php
include('header.php');
$connect = mysqli_connect('localhost','root','','teachers');
$meaill = $_SESSION['emaill'];
$sql = "SELECT * FROM `personal info` WHERE email = '$meaill' "; //potentially vulnerable to SQL injection
$result = mysqli_query($connect,$sql);
$assoc = mysqli_fetch_assoc($result);
if (!isset($_SESSION['logged_in']) or $_SESSION['logged_in'] != 'true') {
	header('Location: login.php');
}
elseif ($assoc['Approved'] == 'Y') {
		echo "Your request is approved";
		echo "<br>";
		echo "You'll be redirected in your admin dashboard";
	header("refresh:2;url=admin.php");
	
	}
elseif ($assoc['Approved'] == 'N') {
	echo "Your request is currently in review / disapproved";
}
else { 
	echo "Try Again Later";
}
//echo "Setting Up The Page";
//echo "<a href = 'admin.php'>FOR admins only</a>";
?>