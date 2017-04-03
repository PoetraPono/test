<?php
		include_once 'cekLogin.php';
		include_once 'database.php';
		
		if(isset($_SESSION['id_wartawan']))
		{
			$cek = $_SESSION['id_wartawan'];
			$rows = $mysqli->query("select * from tb_wartawan where id_wartawan='$cek'");
			if($row = $rows->fetch_assoc())
			{
				$id_admin = $row['id_wartawan'];
				$nama = $row['name'];
				$foto = $row['image'];
			}
		}
?>
<?php include('assetsHeadAdmin.php')?>
<header class="main-header">
<nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="uploadWartawan/<?php echo $foto?>" class="user-image" alt="User Image">
                  <span class="hidden-xs"><?php echo $nama?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="uploadWartawan/<?php echo $foto?>" class="img-circle" alt="User Image">
                    <p>
                      <?php echo $nama?>
                    </p>
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="profileWartawan.php" class="btn btn-default btn-flat">Profile</a>
                    </div>
                    <div class="pull-right">
                      <a href="model/logOut.php" class="btn btn-default btn-flat">Sign out</a>
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
              <img src="uploadWartawan/<?php echo $foto?>" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p><?php echo $nama?></p>
            </div>
			<br>
          </div>
          <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li class="active treeview">
              <a href="dashboarWartawan.php">
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
                  <a href="#"><i class="fa fa-circle-o"></i> Data Berita <i class="fa fa-angle-left pull-right"></i></a>
                  <ul class="treeview-menu">
							<li><a href="frmAddBerita.php"><i class="fa fa-circle-o"></i> Tambah Berita</a></li>
							<li><a href="dataBerita.php"><i class="fa fa-circle-o"></i> Data Berita</a></li>
						</ul>
                </li>
              </ul>
            </li>
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>