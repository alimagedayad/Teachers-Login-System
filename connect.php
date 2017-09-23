<?php
$connect = mysqli_connect('localhost','root');

if ($connect) {
	if (mysqli_select_db( $connect, 'uber')) {

	} else {
		echo '<h1>Connected but no application database. Check mySQL.</h1>';
		die();
	}


} else {
	echo '<h1>Could not connect to database.</h1>';
	die();
}

?>