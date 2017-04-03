<html>
<?php
    include_once 'cekLogin.php';
    include_once 'config/database.php';
    
    if(isset($_SESSION['id_admin']))
    {
      $cek = $_SESSION['id_admin'];
      $rows = $mysqli->query("select id_admin, username from tb_admin where id_admi='$cek'");
      if($row = $rows->fetch_assoc())
      {
        $nama = $row['username'];
      }
    
?>
<?php include('assetsHeadAdmin.php')?>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
      <?php include('headerSuperAdmin.php')?>
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <section class="content">
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
            //include database configuration file
            include('config/database.php');
              
            $sql = $mysqli->query("SELECT tb_berita.id_berita,tb_berita.id_admin, tb_cat_berita.nama_cat_berita, tb_berita.judul, tb_admin.name, DATE_FORMAT(tb_berita.tgl, '%d-%m-%Y') as tgl FROM tb_berita LEFT JOIN tb_cat_berita ON tb_berita.id_cat_berita = tb_cat_berita.id_cat_berita LEFT JOIN tb_admin ON tb_berita.id_admin = tb_admin.id_admin order by tb_berita.id_berita DESC LIMIT 10 ");  
          ?>
                        <tr>
            <?php while($row = $sql->fetch_assoc()){?>
                          <td><?php echo $row['name']?></td>
                          <td><?php echo $row['nama_cat_berita']?></td>
                          <td><?php echo $row['judul']?></td>
                          <td><?php echo $row['tgl']?></td>
              <td><a href="frmDetailBeritaSuper.php?id_berita=<?php echo $row["id_berita"]?>"><button><i class="fa fa-eye"></i></button></a></td>
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
                          <th>Order ID</th>
                          <th>Item</th>
                          <th>Status</th>
                          <th>Popularity</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td><a href="pages/examples/invoice.html">OR9842</a></td>
                          <td>Call of Duty IV</td>
                          <td><span class="label label-success">Shipped</span></td>
                          <td><div class="sparkbar" data-color="#00a65a" data-height="20">90,80,90,-70,61,-83,63</div></td>
                        </tr>
                        <tr>
                          <td><a href="pages/examples/invoice.html">OR1848</a></td>
                          <td>Samsung Smart TV</td>
                          <td><span class="label label-warning">Pending</span></td>
                          <td><div class="sparkbar" data-color="#f39c12" data-height="20">90,80,-90,70,61,-83,68</div></td>
                        </tr>
                        <tr>
                          <td><a href="pages/examples/invoice.html">OR7429</a></td>
                          <td>iPhone 6 Plus</td>
                          <td><span class="label label-danger">Delivered</span></td>
                          <td><div class="sparkbar" data-color="#f56954" data-height="20">90,-80,90,70,-61,83,63</div></td>
                        </tr>
                        <tr>
                          <td><a href="pages/examples/invoice.html">OR7429</a></td>
                          <td>Samsung Smart TV</td>
                          <td><span class="label label-info">Processing</span></td>
                          <td><div class="sparkbar" data-color="#00c0ef" data-height="20">90,80,-90,70,-61,83,63</div></td>
                        </tr>
                        <tr>
                          <td><a href="pages/examples/invoice.html">OR1848</a></td>
                          <td>Samsung Smart TV</td>
                          <td><span class="label label-warning">Pending</span></td>
                          <td><div class="sparkbar" data-color="#f39c12" data-height="20">90,80,-90,70,61,-83,68</div></td>
                        </tr>
                        <tr>
                          <td><a href="pages/examples/invoice.html">OR7429</a></td>
                          <td>iPhone 6 Plus</td>
                          <td><span class="label label-danger">Delivered</span></td>
                          <td><div class="sparkbar" data-color="#f56954" data-height="20">90,-80,90,70,-61,83,63</div></td>
                        </tr>
                        <tr>
                          <td><a href="pages/examples/invoice.html">OR9842</a></td>
                          <td>Call of Duty IV</td>
                          <td><span class="label label-success">Shipped</span></td>
                          <td><div class="sparkbar" data-color="#00a65a" data-height="20">90,80,90,-70,61,-83,63</div></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
                <div class="box-footer clearfix">
                  <a href="javascript::;" class="btn btn-sm btn-info btn-flat pull-left">View All Orders</a>
          
                  <div class="box-tools pull-right">
                    <ul class="pagination pagination-sm inline">
                      <li><a href="#">&laquo;</a></li>
                      <li><a href="#">1</a></li>
                      <li><a href="#">2</a></li>
                      <li><a href="#">3</a></li>
                      <li><a href="#">&raquo;</a></li>
                    </ul>
                  </div>
                </div><!-- /.box-footer -->
              </div>
              </div>

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
            //include database configuration file
            include('config/database.php');
              
            $sql = $mysqli->query("select *, (select count(tb_berita.id_admin) from tb_berita where tb_berita.id_admin = tb_admin.id_admin) as jumlah from tb_admin order by id_admin DESC LIMIT 10");  
          ?>
                        <tr>
            <?php while($row = $sql->fetch_assoc()){?>
                          <td><?php echo $row['username']?></td>
                          <td><?php echo $row['name']?></td>
                          <td><?php echo $row['jumlah']?></td>
                        </tr>
            <?php }?>
                      </tbody>

                    </table>
                  </div>
                </div>
                <div class="box-footer clearfix">
          <a href="dataAdmin.php" class="btn btn-sm btn-info btn-flat pull-left">Lihat Data Wartawan</a>
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
                      <tbody>
            
          <?php
            //include database configuration file
            include('config/database.php');
              
            $sql = $mysqli->query("SELECT * FROM tb_cat_berita ORDER BY id_cat_berita DESC LIMIT 10");  
          ?>
                        <tr>
            <?php while($row = $sql->fetch_assoc()){?>
                          <td><?php echo $row['nama_cat_berita']?></td>
                        </tr>
            <?php }?>
                      </tbody>
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
    <!-- Slimscroll -->
    <script src="assetsAdmin/plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
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