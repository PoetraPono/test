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
<header class="main-header">
        <nav class="navbar navbar-static-top" role="navigation">
		<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav"> 
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <span><?php echo $nama?></span>
                </a>
                <ul class="dropdown-menu">
                  <li class="user-footer">
                    <li class="user-header">
                    <p>
                      <?php echo $nama?>
                    </p>
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-right">
                      <a href="model/LogOut.php" class="btn btn-default btn-flat">Sign out</a>
                    </div>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
            </div>
            <div class="pull-left info">
              <p><?php echo $nama?></p>
            </div>
			<br>
          </div>
          <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li class="active treeview">
              <a href="dashboard">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-share"></i> <span>Data</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li>
                  <a href="#"><i class="fa fa-circle-o"></i> Data Wartawan <i class="fa fa-angle-left pull-right"></i></a>
                  <ul class="treeview-menu">
							<li><a href="frmAddWartawan.php"><i class="fa fa-circle-o"></i> Tambah Wartawan</a></li>
							<li><a href="dataWartawan.php"><i class="fa fa-circle-o"></i> Data Wartawan</a></li>
						</ul>
                </li>
                <li>
                  <a href="#"><i class="fa fa-circle-o"></i> Data Kategori <i class="fa fa-angle-left pull-right"></i></a>
                  <ul class="treeview-menu">
							<li><a href="frmAddCategory.php"><i class="fa fa-circle-o"></i> Tambah Kategori Berita</a></li>
							<li><a href="dataCategory.php"><i class="fa fa-circle-o"></i> Data Kat Berita</a></li>
						</ul>
                </li>
				<li>
                  <a href="dataBeritaSuper.php"><i class="fa fa-circle-o"></i> Data Berita <i class="fa fa-angle-left pull-right"></i></a>
                </li>
              </ul>
            </li>
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>
<?php } else{
	header('admin.php');
}?>