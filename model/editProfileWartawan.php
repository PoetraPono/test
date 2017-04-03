<?php
	include('../database.php');
	if(isset($_POST['submit']))
	{	
		$username = $_POST['username'];
		$id_wartawan = $_POST['id_wartawan'];
		$name = $_POST['name'];
		$input = "UPDATE tb_wartawan SET username = '$username',  name = '$name' WHERE id_wartawan = '$id_wartawan'";
		$query = mysqli_query($mysqli, $input);
		if($query)
		{
			echo '<script language="javascript">';
			echo 'alert("Category successfully Inserted")';
			echo '</script>';
			header("Location: ../dataWartawan.php");
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