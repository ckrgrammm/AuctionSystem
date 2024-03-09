<?php
	session_start();

	$_SESSION['user_logged_in'] = true;
	$_SESSION['uid'] = $_GET['uid'];
	$_SESSION['status'] = $_GET['status'];

	// Redirect to the main admin page
	header('Location: index.php');
	exit();
?>
