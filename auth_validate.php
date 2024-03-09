<?php

//If User is logged in the session['user_logged_in'] will be set to true

//if user is Not Logged in, redirect to login.php page.
if (isset($_SESSION['user_logged_in']) && basename($_SERVER['PHP_SELF']) == 'signin.php') {
	header('Location:index.php');
	exit();
}

 ?>