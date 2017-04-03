<?php
	session_start();
	if(isset($_SESSION['id_admin'])) // Destroying All Sessions
	{
		unset($_SESSION['id_admin']);
		session_destroy();
		header("location: ../admin.php"); // Redirecting To Home Page
	}
	else if(isset($_SESSION['id_wartawan']))
	{
		unset($_SESSION['id_wartawan']);
		session_destroy();
		header("location: ../admin.php"); // Redirecting To Home Page
	}
?>