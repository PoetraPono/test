<?php
	include('../database.php');
	if(isset($_POST['submit']))
	{
		$target_dir = '../uploadWartawan/';
		$target_file = $target_dir . basename($_FILES["image"]["name"]);
		$uploadOk = 1;
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

		if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) 
		{
			header('../dashboardAdmin.php');
		} 
		else 
		{
			echo "Sorry, there was an error uploading your file.";
		}
		
		$username = $_POST['username'];
		$password = $_POST['password'];
		$passwordx = md5($password);
		$name = $_POST['name'];
		$image=basename( $_FILES['image']['name']);
		$input = "INSERT INTO tb_wartawan VALUES('', '$username', '$passwordx', '$name', '$image')";
		$query = mysqli_query($mysqli, $input);
		if($query)
		{
			echo '<script language="javascript">';
			echo 'alert("Category successfully Inserted")';
			echo '</script>';
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