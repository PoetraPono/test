<?php
	include('../database.php');
	if(isset($_POST['submit']))
	{	
		$password = $_POST['password'];
		$passwordx = md5($password);
		$id_wartawan = $_POST['id_wartawan'];
		$input = "UPDATE tb_wartawan SET password = '$passwordx' WHERE id_wartawan = '$id_wartawan'";
		$query = mysqli_query($mysqli, $input);
		if($query)
		{
			echo '<script language="javascript">';
			echo 'alert("Category successfully Inserted")';
			echo '</script>';
			header("Location: ../dashboardWartawan.php");
			exit;
		}
		else
		{		
			echo '<script language="javascript">';
			echo 'alert("Category Unsuccessfully Inserted")';
			echo '</script>';
		}
	}
    else
	{	
		echo "Error with querry";
	}
	
	mysqli_close($mysqli);
?>