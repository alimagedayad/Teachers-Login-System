<?php
$connect = mysqli_connect('localhost','root','','teachers');
include('header.php');
if(isset($_POST["submit"]))
{
    $username = $_POST['username'];
    $subject = $_POST['subject'];
	$tel = $_POST['tel'];
	$email = $_POST['email'];
	$username = mysqli_real_escape_string($connect,$username);
	$subject = mysqli_real_escape_string($connect,$subject);
	$tel = mysqli_real_escape_string($connect,$tel);
	$email = mysqli_real_escape_string($connect,$email);
	$_SESSION['username'] = $username;
	$sql = "SELECT email from `personal info` WHERE email = '$email'";
	$res = mysqli_query($connect,$sql);
	$row = mysqli_fetch_array($res,MYSQLI_ASSOC);
	if(mysqli_num_rows($res) == 1)
	{
	 echo "Sorry Mr/Mrs" . "&nbsp" . $username . "&nbsp" . "But your email already exist..";
	}
	else{
		
	$query = mysqli_query($connect, "INSERT INTO `personal info`(`id`, `teacher_name`, `email`, `subject`, `phone_number`, `Approved` , `role`) VALUES ('','$username','$email','$subject','$tel','N','user')");
	if($query) 	
		{
		
		echo "Thank You! you are now registered.";
		//Enter Header Redirect
		header("Location:login.php");
		
		}
	}
}
else{
 echo "Please try again later";
}
?>