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
		<div class="content-wrapper">
		<div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Data Berita</h3>
                  <div class="box-tools">
                    <div class="input-group" style="width: 150px;">
                      <input type="text" name="table_search" class="form-control input-sm pull-right" placeholder="Search">
                      <div class="input-group-btn">
                        <button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
                      </div>
                    </div>
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive no-padding">				  
				<div class="box-body">
                  <table id="example2" class="table table-bordered table-hover">
                    <thead>
                      <tr>
						<th>Kategori</th>
						<th>Judul</th>
						<th>Tanggal Posting</th>
						<th colspan = 2>Action</th>
                      </tr>
                    </thead>
                    <tbody>
					<?php
						$limit = 10;  
						if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };  
						$start_from = ($page-1) * $limit;  
						
						$sql = $mysqli->query("SELECT tb_berita.id_berita,tb_berita.id_wartawan, tb_category.nama_category, tb_berita.judul,DATE_FORMAT(tb_berita.tgl, '%d-%m-%Y') as tgl FROM tb_berita LEFT JOIN tb_category ON tb_berita.id_category = tb_category.id_category WHERE tb_berita.id_wartawan = '$id_wartawan' order by tb_berita.id_berita DESC LIMIT $start_from, $limit");  
					?>
                    
                    <tr>
					<?php while($row = $sql->fetch_assoc()) 
					{?>
                      <td><?php echo $row['nama_category']?></td>
                      <td><?php echo $row['judul']?></td>
                      <td><?php echo $row['tgl']?></td>
					<td><a href="frmEditBerita.php?id_berita=<?php echo $row["id_berita"]?>"><button><i class="fa fa-pencil"></i></button></a></td>
					<td><a href="model/deleteBerita.php?id_berita=<?php echo $row["id_berita"]?>" onclick="javascript:return confirm(\'Are you sure ?\');"><button title="DELETE"><i class="fa fa-trash"></i></button></a></td>						
                    </tr>
                    <?php }?>
                    </tbody>
                  </table>
				  <div class="box-footer clearfix">
				  <?php
					$sql = $mysqli->query("SELECT COUNT(id_berita) FROM tb_berita WHERE id_wartawan = '$id_wartawan'");  
					$row = $sql->fetch_row();  
					$total_records = $row[0];  
					$total_pages = ceil($total_records / $limit);   
					$pagLink = "<ul class='pagination pagination-sm no-margin pull-right'>";  
					for ($i=1; $i<=$total_pages; $i++) {  
						$pagLink .= "<li><a href='dataBerita.php?id_wartawan=".$id_wartawan."&page=".$i."'>".$i."</a></li>";  
					};
					echo $pagLink . "</ul>";
				   ?>
                </div>
                </div>
                </div><!-- /.box-body -->
              </div>
            </div>
          </div>
		</section>
      </div>
    </div>
	
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