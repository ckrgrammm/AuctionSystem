<?php
	session_start();

	$_SESSION['admin_logged_in'] = true;
	$_SESSION['aid'] = $_GET['aid'];

	// Redirect to the main admin page
	header('Location: index.php');
	exit();
?>
