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
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
	      <?php include('headerWartawan.php')?>
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <section class="content">
		<div class="row">
					<?php
						//include database configuration file
						include('database.php');
						  
						$sql = $mysqli->query("select *, (select count(tb_berita.id_wartawan) from tb_berita where tb_berita.id_wartawan = tb_wartawan.id_wartawan) as jumlah from tb_wartawan where id_wartawan = '$id_wartawan'");
						$data1 = $sql->fetch_assoc();
					?>
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-aqua">
                <div class="inner">
                  <h3><?php echo $data1['jumlah']?></h3>
                  <p>Total Posting</p>
                </div>
                <a href="dataBerita.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
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
                          <th>Kategori</th>
                          <th>Judul</th>
                          <th>Tanggal Posting</th>
                        </tr>
                      </thead>
                      <tbody>
					<?php

						$sql = $mysqli->query("SELECT tb_berita.id_berita,tb_berita.id_wartawan, tb_category.nama_category, tb_berita.judul,DATE_FORMAT(tb_berita.tgl, '%d-%m-%Y') as tgl FROM tb_berita LEFT JOIN tb_category ON tb_berita.id_category = tb_category.id_category WHERE tb_berita.id_wartawan = '$id_wartawan' order by tb_berita.id_berita DESC LIMIT 5");  
					?>
                    
                    <tr>
					<?php while($row = $sql->fetch_assoc()) 
					{?>
                      <td><?php echo $row['nama_category']?></td>
                      <td><?php echo $row['judul']?></td>
                      <td><?php echo $row['tgl']?></td>						
                    </tr>
                    <?php }?>
                    </tbody>
                      </tbody>
                    </table>
                  </div><!-- /.table-responsive -->
                </div>
                <div class="box-footer clearfix">
                  <a href="dataBerita.php" class="btn btn-sm btn-info btn-flat pull-left">Lihat Data Berita</a>
                </div><!-- /.box-footer -->
              </div>
			  
              <!-- TO DO List -->
              
            </section><!-- /.Left col -->
            <!-- right col (We are only adding the ID to make the widgets sortable)-->
            <section class="col-lg-5 connectedSortable">

              <!-- Map box -->
              <div class="box box-solid bg-light-blue-gradient">
                              <div class="box box-info">
                <!-- /.box-footer -->
              </div>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="assetsAdmin/plugins/morris/morris.min.js"></script>
    <!-- Sparkline -->
    <script src="assetsAdmin/plugins/sparkline/jquery.sparkline.min.js"></script>
    <!-- jvectormap -->
    <script src="assetsAdmin/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="assetsAdmin/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="assetsAdmin/plugins/knob/jquery.knob.js"></script>
    <!-- daterangepicker -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
    <script src="assetsAdmin/plugins/daterangepicker/daterangepicker.js"></script>
    <!-- datepicker -->
    <script src="assetsAdmin/plugins/datepicker/bootstrap-datepicker.js"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="assetsAdmin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
    <!-- Slimscroll -->
    <script src="assetsAdmin/plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="assetsAdmin/plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="assetsAdmin/dist/js/app.min.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="assetsAdmin/dist/js/pages/dashboard.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="assetsAdmin/dist/js/demo.js"></script>
  </body>
 <?php } else{
	header("Location: admin.php");
 }?>
</html>