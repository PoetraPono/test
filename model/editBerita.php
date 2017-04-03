<?php
	include('../database.php');
	if(isset($_POST['submit']))
	{
		$target_dir = '../uploadBerita/';
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
		$id_berita = $_POST['id_berita'];
		$id_category = $_POST['id_category'];
		echo $id_category;
		
		$id_wartawan = $_POST['id_wartawan'];
		$judul = $_POST['judul'];
		$isi = $_POST['isi'];
		$image=basename( $_FILES['image']['name']);
		$input = "UPDATE tb_berita SET id_wartawan = '$id_wartawan', id_category = '$id_category', judul = '$judul', isi = '$isi', image = '$image' WHERE id_berita = '$id_berita'";
		$query = mysqli_query($mysqli, $input);
	}
    else
	{	
		echo "Error with querry";
	}
	
	mysqli_close($mysqli);
?>