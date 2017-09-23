
<?php
$connect = mysqli_connect('localhost','root');
include('header.php');
echo "<div class=\"container\">";
if ($_POST) {
	// To do: replace all mysql_query calls with PDO prepared statements to prevent SQL injection
	if (!empty($_POST['admin_pass_change'])) {
		$newpass = mysqli_real_escape_string($connect,$_POST['admin_pass_change']);
		mysqli_query($connect,"UPDATE users SET password='{$newpass}' WHERE role='admin'");
		echo "<h1>Admin password updated</h1>";
	}

	if (!empty($_POST['guest1_pass_change'])) {
		$newpass = mysqli_real_escape_string($connect,$_POST['guest1_pass_change']);
		mysqli_query($connect,"UPDATE users SET password='{$newpass}' WHERE name='guest1'");
		echo "<h1>guest1 password updated</h1>";
	}
	if (!empty($_POST['guest2_pass_change'])) {
		$newpass = mysqli_real_escape_string($connect,$_POST['guest2_pass_change']);
		mysqli_query($connect,"UPDATE users SET password='{$newpass}' WHERE name='guest2'");
		echo "<h1>guest2 password updated</h1>";
	}

	if (!empty($_POST['name']) && !empty($_POST['lat']) && !empty($_POST['lon'])) {
		$newname = mysqli_real_escape_string($connect,$_POST['name']);
		$newlat = mysqli_real_escape_string($connect,$_POST['lat']);
		$newlong = mysqli_real_escape_string($connect,$_POST['lon']);
		if (mysqli_query($connect,"INSERT INTO `uber`.`locations` (`id`, `name`, `lat`, `long`) VALUES (NULL, '{$newname}', '{$newlat}', '{$newlong}');")) {
			echo "<h1>added {$newname} to locations</h1>";
		} else {
			mysqli_error();
		}
		

	} 
	else {
		echo "<h1>Couldn't add new location because a field was left empty.</h1>";
	}

} else {

	echo '<h1>error</h1>';

}


?>
<h1><a href="index.php"><button class="btn">Back</button></a>
</div>