<?php
	include('../database.php');
	$id_wartawan = $_GET['id_wartawan'];
	$sql = mysqli_query($mysqli, "DELETE FROM tb_wartawan WHERE id_wartawan='$id_wartawan'");
	if($sql == TRUE)
	{
		echo '<script language="javascript">';
		echo 'alert("Category successfully Deleted")';
		echo '</script>';
		header("Location: ../dataWartawan.php");
		exit;
	}else{
		echo '<script language="javascript">';
		echo 'alert("Category successfully Deleted")';
		echo '</script>';
		header("Location: ../dataWartawan.php");
		exit;
	}
?>