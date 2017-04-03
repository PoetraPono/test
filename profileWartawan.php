<!DOCTYPE html>
<html>
<?php
		include_once 'cekLogin.php';
		include_once 'database.php';
		
		if(isset($_SESSION['id_wartawan']))
		{
			$cek = $_SESSION['id_wartawan'];
			$rows = $mysqli->query("select * from tb_wartawan where id_wartawan='$cek'");
			if($row = $rows->fetch_assoc())
			{
				$id_wartawan = $row['id_wartawan'];
				$name = $row['name'];
				$image = $row['image'];
			}
		
?>
  <head>
	<?php include('assetsHeadAdmin.php')?>
  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
      <?php include('headerWartawan.php')?>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            <?php echo $name?> Profile
          </h1>
        </section>

        <!-- Main content -->
        <section class="content">

          <div class="row">
            <div class="col-md-3">

              <!-- Profile Image -->
              <div class="box box-primary">
                <div class="box-body box-profile">
                  <img class="profile-user-img img-responsive img-circle" src="uploadWartawan/<?php echo $image?>" alt="User profile picture">
                  <h3 class="profile-username text-center"><?php echo $nama?></h3>

                  <ul class="list-group list-group-unbordered">
                    <li class="list-group-item">
					<?php
						  
						$sql = $mysqli->query("select *, (select count(tb_berita.id_wartawan) from tb_berita where tb_berita.id_wartawan = tb_wartawan.id_wartawan) as jumlah from tb_wartawan where id_wartawan = '$id_wartawan'");
						$data1 = $sql->fetch_assoc();
					?>
                      <b>Total Posting</b> <a class="pull-right"><?php echo $data1['jumlah']?></a>
                    </li>
					<li class="list-group-item">
                      <b>Edit Profile</b> <a href="frmEditProfile.php" class="pull-right">Edit</a>
                    </li>
					<li class="list-group-item">
                      <b>Edit Password</b> <a href="frmEditPassword.php" class="pull-right">Edit</a>
                    </li>
					<li class="list-group-item">
                      <b>Edit Photo</b> <a href="frmEditPhoto.php" class="pull-right">Edit</a>
                    </li>
                  </ul>
                </div><!-- /.box-body -->
              </div><!-- /.box -->


            </div><!-- /.row -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
	<footer class="main-footer">
        <strong>Copyright &copy; 2016 Elgi Avilla Yandana.</strong> All rights reserved.
      </footer>

      <!-- Control Sidebar -->
<!-- /.control-sidebar -->
      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
      <div class="control-sidebar-bg"></div>
    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.4 -->
    <script src="assetsAdmin/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="assetsAdmin/bootstrap/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="assetsAdmin/plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="assetsAdmin/dist/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="assetsAdmin/dist/js/demo.js"></script>
  </body>
 <?php }else{
	header("Location: admin.php");
 }?>
</html>
