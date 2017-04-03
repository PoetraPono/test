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
			}
		
?>
<?php include('assetsHeadAdmin.php')?>
<body>
<body class="hold-transition skin-blue sidebar-mini">
	<div class="wrapper">
	<?php include('headerWartawan.php')?>
		<div class="content-wrapper">
        <section class="content">
          <div class="row">
            <div class="col-md-12">
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Edit Berita</h3>
                </div>
				<?php
					$id_berita = $_GET['id_berita'];
					$sql1 = $mysqli->query("SELECT tb_berita.id_berita, tb_berita.id_category ,tb_berita.id_berita,tb_berita.id_wartawan, tb_category.nama_category, tb_berita.judul, tb_berita.isi, tb_berita.image FROM tb_berita LEFT JOIN tb_category ON tb_berita.id_category = tb_category.id_category WHERE tb_berita.id_berita = '$id_berita'");
				?>
				<form action="model/editBerita.php" enctype="multipart/form-data" method="post">
					<div class="box-body">
					<?php while($row = $sql1->fetch_assoc()){?>
					    <div class="form-group">
						<select name="id_category" class="form-control select2" data-placeholder="Select a State"  style="width: 100%;">
						<option value="<?php echo $row['id_category']?>" ><?php echo $row['nama_category']?></option>
							<?php
								$sql = $mysqli->query("SELECT * FROM tb_category ORDER BY id_category DESC");
							?>
							<?php while($data = $sql->fetch_assoc()){?>
							  <option value="<?php echo $data['id_category']?>"><?php echo $data['nama_category']?></option>
							<?php }?>
						</select>
						</div>
					  <div class="form-group">
						<input name="judul" class="form-control" placeholder="Judul Berita" value="<?php echo $row['judul']?>">
						<input type="hidden" name="id_wartawan" class="form-control" placeholder="username" value="<?php echo $id_wartawan?>">
						<input type="hidden" name="id_berita" class="form-control" placeholder="username" value="<?php echo $row['id_berita']?>">
					  </div>
					  <div class="form-group">
                    <textarea id="editor1"  name="isi" class="form-control" style="height: 300px" placeholder="Isi Berita">
                      <?php echo $row['isi']?>
                    </textarea>
                  </div>
					  <div class="form-group">
					     <div class="btn btn-default btn-file">
							<i class="fa fa-paperclip"></i> Gambar
							<input type="file" name="image" value="<?php echo $row['image']?>"/>
						</div>
					  </div>
					</div>
				<?php }?>
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
	<script src="assetsAdmin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
		<script type="text/javascript" src="assetsAdmin/plugins/ckeditor/ckeditor.js"></script>
	<script>
    var roxyFileman = 'assetsAdmin/plugins/ckeditor/plugins/fileman/index.html';
    $(function () {
        CKEDITOR.replace('editor1', {filebrowserBrowseUrl: roxyFileman,
            filebrowserImageBrowseUrl: roxyFileman + '?type=image',
            removeDialogTabs: 'link:upload;image:upload'});
    });
</script>
</body>
<?php } else{
	header("Location: admin.php");
}?>
</html>