<?php
	include('../database.php');
	if(isset($_POST['submit']))
	{		
		$nama_category = $_POST['kategori'];
		$id_category = $_POST['id_category'];
		$input = "UPDATE tb_category SET nama_category = '$nama_category' WHERE id_category = '$id_category'";
		$query = mysqli_query($mysqli, $input);
		if($query)
		{
			echo '<script language="javascript">';
			echo 'alert("Category successfully Inserted")';
			echo '</script>';
			header("Location: ../dataCategory.php");
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