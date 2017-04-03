	<div class="header">
		<div class="header-bottom">
			<div class="logo text-center">
				<a href="index"><img src="/media/Capture1.png" alt="rekalpa.com" /></a>
			</div>
			<div class="navigation">
				<nav class="navbar navbar-default" role="navigation">
		   <div class="wrap">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				
			</div>
			<!--/.navbar-header-->
		
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					 <li><a href="index">Home</a></li>
				    <li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">Artikel<b class="caret"></b></a>
						<ul class="dropdown-menu">
						<?php include('database.php');
						$query = $mysqli->query('SELECT id_category, nama_category FROM tb_category');
						while($data = $query->fetch_assoc()){
						
						$nama = preg_replace("/\s/","-",$data['nama_category']);
						$url_link = "category-".$data['id_category']."-".$nama."";
						?>
							<li><a href="<?php echo $url_link?>"><?php echo $data['nama_category']?></a></li>
							<li class="divider"></li>
						<?php }?>
						</ul>
					</li>
					<li><a href="aboutus">About Us</a></li>
					<div class="clearfix"></div>
					
				</ul>
					<div class="clearfix"></div>
				</div>
			</div>
			<!--/.navbar-collapse-->
	 <!--/.navbar-->
			</div>
		</nav>
		</div>
	</div>