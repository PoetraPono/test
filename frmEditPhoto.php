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


            </div>
			<div class="col-md-9">
              <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                  <li><a href="#settings" data-toggle="tab">Settings</a></li>
                </ul>
                <div class="tab-content">
				<?php
					$sql = mysqli_query($mysqli, "SELECT id_wartawan, image FROM tb_wartawan WHERE id_wartawan = '$id_wartawan'");
					$row = $sql->fetch_assoc();
				?>
                    <form class="form-horizontal" action="model/editPhotoWartawan.php" enctype="multipart/form-data" method="post">
                      <div class="form-group">
                        <label for="inputName" class="col-sm-2 control-label">Old Pict</label>
                        <div class="col-sm-10">
							<img src="uploadWartawan/<?php echo $row['image']?>" class="img-responsive">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputName" class="col-sm-2 control-label">New Pict</label>
                        <div class="col-sm-10">
                          <input type="file" name="image" />
                          <input type="hidden" name="id_wartawan" value="<?php echo $row['id_wartawan']?>"/>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                          <button type="submit" name="submit" class="btn btn-danger">Submit</button>
                        </div>
                      </div>
                    </form>
                </div><!-- /.tab-content -->
              </div><!-- /.nav-tabs-custom -->
            </div><!-- /.col -->
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

    <script src="assetsAdmin/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="assetsAdmin/bootstrap/js/bootstrap.min.js"></script>
    <!-- Slimscroll -->
    <script src="assetsAdmin/plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="assetsAdmin/plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="assetsAdmin/dist/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="assetsAdmin/dist/js/demo.js"></script>
    <!-- iCheck -->

  </body>
 <?php }else{
	header("Location: admin.php");
 }?>
</html>
