<html>
<?php
		include_once 'cekLogin.php';
		include_once 'database.php';
		
		if(isset($_SESSION['id_admin']))
		{
			$cek = $_SESSION['id_admin'];
			$rows = $mysqli->query("select id_admin, username from tb_admin where id_admin='$cek'");
			if($row = $rows->fetch_assoc())
			{
				$nama = $row['username'];
			}
		
?>
<?php include('assetsHeadAdmin.php')?>
<body>
<body class="hold-transition skin-blue sidebar-mini">
	<div class="wrapper">
	<?php include('headerAdmin.php')?>
		<div class="content-wrapper">
        <section class="content">
          <div class="row">
            <div class="col-md-12">
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Edit Wartawan</h3>
                </div>
				<?php
					include('database.php');
					
					$id_wartawan = $_GET['id_wartawan'];
					$show = mysqli_query($mysqli, "SELECT * FROM tb_wartawan WHERE id_wartawan = '$id_wartawan'");
					$data = $show->fetch_assoc();
				?>
				<form action="model/editWartawan.php" enctype="multipart/form-data" method="post">
					<div class="box-body">
					  <div class="form-group">
						<input name="username" class="form-control" placeholder="username" value="<?php echo $data['username']?>">
						<input type="hidden" name="id_wartawan" class="form-control" placeholder="username" value="<?php echo $data['id_wartawan']?>">
					  </div>
					  <div class="form-group">
						<input type="password" name="password" class="form-control" placeholder="password" value="<?php echo $data['password']?>">
					  </div>
					  <div class="form-group">
						<input class="form-control" name="name" placeholder="name" value="<?php echo $data['name']?>">
					  </div>
					  <div class="form-group">
							<label>Foto</label>
							<input type="file" name="image" value="<?php echo $data['image']?>" />
					  </div>
					</div><!-- /.box-body -->
					<div class="box-footer">
					  <div class="pull-right">
						<button type="submit" name="submit" class="btn btn-primary">Submit</button>
					  </div>
					</div>
				</form>
              </div><!-- /. box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

	</div>
</div>
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
<?php } else{
	header("Location: admin.php");
}?>
</html>