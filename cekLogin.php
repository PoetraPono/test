<?php
	include 'database.php';
	
	session_start();
	$error='';
	if(isset($_POST['submit']))
	{
		if(empty($_POST['username']) || empty($_POST['password']))
		{
			$error = "Username and password is invalid";
		}else
		{
			$username = $_POST['username'];
			$password = $_POST['password'];
			$passwordx = md5($password);
			$query = $mysqli->query("SELECT * FROM tb_admin WHERE username = '$username' AND password= '$passwordx'");
			$query1 = $mysqli->query("SELECT * FROM tb_wartawan WHERE username = '$username' AND password= '$passwordx'");
			$data = $query->fetch_assoc();
			$data1 = $query1->fetch_assoc();
			if ($query->num_rows > 0) {
				$_SESSION['id_admin'] = $data['id_admin']; 
				header("location: dashboardAdmin.php");
				return true;
			} 
			else if($query1->num_rows > 0){
				$_SESSION['id_wartawan'] = $data1['id_wartawan']; 
				header("location: dashboardWartawan.php");
				return true;
			}
			else {
				echo $error;
				header("location: rahasia");
			}
			mysqli_close($mysqli);
		}
	}
?>