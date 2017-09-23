<?php
include('header.php');
if (!isset($_SESSION['logged_in']) or $_SESSION['logged_in'] != 'true') {
		#header('Location: login.php');
		echo "Not Set";
}
$connect = mysqli_connect('localhost','root','','teachers');
$sql = "SELECT * FROM `personal info` WHERE email = '$email' "; //potentially vulnerable to SQL injection
$result = mysqli_query($connect,$sql);
$assoc = mysqli_fetch_assoc($result);
if($assoc['approved'] == 'N'){
	echo "You don't have permissions to access this page";
	header('Location: do_login.php');
}
?>
<html>
<head>
<link rel = "stylesheet" href = "style.css">
</head>
</html>
<?php
#if (!isset($_SESSION['logged_in']) or $_SESSION['logged_in'] != 'true') {
#	header('Location: login.php');
#}
?>
<html>
<script>
function refresh() {
    location.reload(true);
}
</script>
<div class="container">
	<div id="main">
		<h1>IG Academy | Teachers</h1>
		<p>
			<?php
				#if ($_SESSION['role'] == true) {
				#	echo "<a href=\"admin.php\">Admin</a>";
				#}
				#elseif ($_SESSION['guest'] == 'true') {
				#	echo "<a href='guest.php'>Guest</a>";
				#}
			?>
			<a href="logout.php">Logout</a>
		</p>
		<p>
			<button type="button" onclick="refresh()" class="btn btn-success">Refresh <span class="glyphicon glyphicon-refresh"></span></button>
		</p>
		<?php
		$mysqli = new mysqli("localhost", "root", "", "teachers");		
		$result = $mysqli->query("SELECT * FROM `personal info`");
		
		while ($row = $result->fetch_assoc()) {
			echo "<div>";
			echo "<p>" . "<h2>Teacher Info</h2>" . "#"        . $row["id"] . "</h2></p>";
			echo "<p>" . "Teacher Name :"  . $row["teacher_name"]   . "</p>";
			echo "<p>" . "Email :" . $row["email"] . "</p>";
			echo "<p>" . "Subject Teaching :" . $row["subject"] . "</p>";
			echo "<p>" . "Approved :" . $row["Approved"] . "</p>";
			echo "<p>" . "Role :" . $row["role"] . "</p>";
			echo "<br>";
		}
			//api call starts here
			//how are we getting end lat/long from start lat/long? just casting to int. this will raise an error if the difference is over 100 miles. but i doubt that will happen.
		?>

	</div>
</div>
</html>
