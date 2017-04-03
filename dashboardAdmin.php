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
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
      <?php include('headerAdmin.php')?>
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <section class="content">
		<div class="row">
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
			  		<?php
						//include database uration file
						include('database.php');
						  
						$sql3 = $mysqli->query("select count(id_berita) from tb_berita");
						$data12 = $sql3->fetch_assoc();
					?>
              <div class="small-box bg-aqua">
                <div class="inner">
                  <h3><?php echo $data12['count(id_berita)']?></h3>
                  <p>Total Posting Berita</p>
                </div>
                <a href="dataBeritaSuper.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
			  <?php
						//include database uration file
						include('database.php');
						  
						$sql4 = $mysqli->query("select count(id_wartawan) from tb_wartawan");
						$data11 = $sql4->fetch_assoc();
					?>
              <div class="small-box bg-green">
                <div class="inner">
                  <h3><?php echo $data11['count(id_wartawan)']?></h3>
                  <p>Total Wartawan</p>
                </div>
                <a href="dataWartawan.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
			  <?php
						//include database uration file
						include('database.php');
						  
						$sql6 = $mysqli->query("select count(id_category) from tb_category");
						$data16 = $sql6->fetch_assoc();
					?>
              <div class="small-box bg-yellow">
                <div class="inner">
                  <h3><?php echo $data16['count(id_category)']?></h3>
                  <p>Total Kategori Berita</p>
                </div>
                <a href="dataCategory.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>
          </div>
          <div class="row">
            <!-- Left col -->
            <section class="col-lg-7 connectedSortable">
              <!-- Custom tabs (Charts with tabs)-->
              <!-- /.nav-tabs-custom -->

              <!-- Chat box -->
              <!-- TABLE: LATEST ORDERS -->
              <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">Data Berita</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <div class="table-responsive">
                    <table class="table no-margin">
                      <thead>
                        <tr>
                          <th>Nama Wartawan</th>
                          <th>Nama Kategori</th>
                          <th>Judul</th>
                          <th>Tanggal Posting</th>
                        </tr>
                      </thead>
					  <tbody>
						<?php
							include('database.php');
							
							
							$sql5 = $mysqli->query("SELECT tb_berita.id_berita,tb_berita.id_wartawan, tb_category.nama_category, tb_wartawan.name, tb_berita.judul,DATE_FORMAT(tb_berita.tgl, '%d-%m-%Y') as tgl FROM tb_berita LEFT JOIN tb_category ON tb_berita.id_category = tb_category.id_category LEFT JOIN tb_wartawan ON tb_wartawan.id_wartawan = tb_berita.id_wartawan order by tb_berita.id_berita DESC LIMIT 10 ");
							while($data2 = $sql5->fetch_assoc()){
							?>
						<tr>
                          <th><?php echo $data2['name']?></th>
                          <th><?php echo $data2['nama_category']?></th>
                          <th><?php echo $data2['judul']?></th>
                          <th><?php echo $data2['tgl']?></th>
                        </tr>
						<?php }?>
					  </tbody>
                    </table>
                  </div><!-- /.table-responsive -->
                </div>
                <div class="box-footer clearfix">
                  <a href="dataAdmin.php" class="btn btn-sm btn-info btn-flat pull-left">Lihat Data Berita</a>
                </div><!-- /.box-footer -->
              </div><!-- /.box (chat box) --

              <!-- quick email widget -->
              <div class="box box-info">

            </section><!-- /.Left col -->
            <!-- right col (We are only adding the ID to make the widgets sortable)-->
            <section class="col-lg-5 connectedSortable">

              <!-- Map box -->
              <div class="box box-solid bg-light-blue-gradient">
               <div class="box box-info">
         <div class="box-header with-border">
                  <h3 class="box-title">Data Wartawan</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div>
                <div class="box-body">
                  <div class="table-responsive">
                    <table class="table no-margin">
                      <thead>
                        <tr>
                          <th>Username</th>
                          <th>Nama</th>
                          <th>Jumlah Posting</th>
                        </tr>
                      </thead>
					  <tbody>
						<?php
						include('database.php');
						  
						$sql = $mysqli->query("SELECT *,(select count(tb_berita.id_wartawan) from tb_berita where tb_berita.id_wartawan = tb_wartawan.id_wartawan) as jumlah FROM tb_wartawan ORDER BY id_wartawan DESC LIMIT 5");
						
						while($data1 = $sql->fetch_assoc()){
						?>
						<tr>
                          <td><?php echo $data1['username']?></td>
                          <td><?php echo $data1['name']?></td>
                          <td><?php echo $data1['jumlah']?></td>
                        </tr>
						<?php }?>
					  </tbody>
                    </table>
                  </div>
                </div>
                <div class="box-footer clearfix">
				<a href="dataWartawan.php" class="btn btn-sm btn-info btn-flat pull-left">Lihat Data Wartawan</a>
                </div><!-- /.box-footer -->
              </div>
              </div>
        
        
        <div class="box box-info">
        <div class="box-header with-border">
                  <h3 class="box-title">Data Kategori Berita</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div>
                <div class="box-body">
                  <div class="table-responsive">
                    <table class="table no-margin">
                      <thead>
                        <tr>
                          <th>Nama Kategori</th>
                        </tr>
                      </thead>
                    </table>
                  </div>
                </div>
                <div class="box-footer clearfix">
          <a href="dataKategoriBerita.php" class="btn btn-sm btn-info btn-flat pull-left">Lihat Data Kategori Berita</a>
                </div><!-- /.box-footer -->
              </div>
        
              </div>
            </section><!-- right col -->
          </div><!-- /.row (main row) -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <footer class="main-footer">
        <strong>Copyright &copy; 2016 Elgi Avilla Yandana.</strong> All rights reserved.
      </footer>

    <script src="assetsAdmin/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.5 -->
    <script src="assetsAdmin/bootstrap/js/bootstrap.min.js"></script>
    <!-- Morris.js charts -->
    <script src="assetsAdmin/plugins/morris/morris.min.js"></script>
    <script src="assetsAdmin/plugins/knob/jquery.knob.js"></script>
    <!-- daterangepicker -->
    <script src="assetsAdmin/plugins/daterangepicker/daterangepicker.js"></script>
    <!-- datepicker -->
    <script src="assetsAdmin/plugins/datepicker/bootstrap-datepicker.js"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="assetsAdmin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
    <!-- Slimscroll -->
    <!-- AdminLTE App -->
    <script src="assetsAdmin/dist/js/app.min.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="assetsAdmin/dist/js/pages/dashboard.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="assetsAdmin/dist/js/demo.js"></script>
	
  </body>
 <?php } else{
  header('Location: admin.php');
 }?>
</html>