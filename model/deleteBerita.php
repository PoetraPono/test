<?php
	include('../database.php');
	
	$id_berita = $_GET['id_berita'];
	$result = mysqli_query($mysqli, "DELETE FROM tb_berita WHERE id_berita = '$id_berita'");
	if($result == TRUE)
	{
		echo '<script>';
		echo 'alert("Sukses")';
		echo '</script>';
		header("Location: ../dataBerita.php");
		exit;
	}
	else
	{
		echo '<script>';
		echo 'alert("Gagal")';
		echo '</script>';
	}
?>