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
                  <h3 class="box-title">Tambah Berita</h3>
                </div>
				<form action="model/addBerita.php" enctype="multipart/form-data" method="post">
					<div class="box-body">
					    <div class="form-group">
						<select name="id_category" class="form-control select2" data-placeholder="Select a State"  style="width: 100%;">
						<?php
							$sql = $mysqli->query("SELECT * FROM tb_category ORDER BY id_category DESC");
						?>
							<?php while($data = $sql->fetch_assoc()){?>
							  <option value="<?php echo $data['id_category']?>"><?php echo $data['nama_category']?></option>
							<?php }?>
						</select>
						</div>
					  <div class="form-group">
						<input name="judul" class="form-control" placeholder="Judul Berita">
						<input type="hidden" name="id_wartawan" class="form-control" placeholder="username" value="<?php echo $id_wartawan?>">
					  </div>
					  <div class="form-group">
                    <textarea id="editor1" name="isi" class="ckeditor" style="height: 300px" placeholder="Isi Berita">
                      
                    </textarea>
                  </div>
					  <div class="form-group">
					     <div class="btn btn-default btn-file">
								<i class="fa fa-paperclip"></i> Gambar
							<input type="file" name="image"/>
						</div>
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