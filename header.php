<?php
session_start();
//include('connect.php');
include('base.php');

// csrf protection
require_once('nocsrf.php');
$csrftoken = NoCSRF::generate( 'csrf' );
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>IG Academy | Teachers</title>
<link rel="stylesheet" href="css/bootstrap.min.css">
<style type="text/css">
div#main {
	text-align: middle;
}

</style>
</head>