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
			echo "The file ". basename( $_FILES["image"]["name"]). " has been uploaded.";
		} 
		else 
		{
			echo "Sorry, there was an error uploading your file.";
		}
		
		$id_wartawan = $_POST['id_wartawan'];
		$image=basename( $_FILES['image']['name']);
		$input = "UPDATE tb_wartawan SET image = '$image' WHERE id_wartawan = '$id_wartawan'";
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