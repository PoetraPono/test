<?php
	include("../database.php");
	
	$id_category = $_GET['id_category'];
	
	$result = mysqli_query($mysqli, "DELETE FROM tb_category WHERE id_category = '$id_category'");
	if($result == TRUE)
	{
		echo '<script language="javascript">';
		echo 'alert("Category successfully Inserted")';
		echo '</script>';
		header("Location: ../dataCategory.php");
		exit;
	}else{
		echo '<script language="javascript">';
		echo 'alert("Category unsuccessfully Inserted")';
		echo '</script>';
	}
	
	mysqli_query($mysqli);
?>