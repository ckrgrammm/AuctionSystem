<?php
	session_start();

	$_SESSION['user_logged_in'] = true;
	$_SESSION['uid'] = $_GET['uid'];

	// Redirect to the main admin page
	header('Location: index.php');
	exit();
?>
