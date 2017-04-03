<?php
	include('../database.php');
	
		if(isset($_POST['submit']))
		{		
			$nama_category = $_POST['kategori'];
			$input = "INSERT INTO tb_category VALUES('', '$nama_category')";
			$query = mysqli_query($mysqli, $input);
			if($query > 0)
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