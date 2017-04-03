<!DOCTYPE html>
<html>
<head>
<?php include('assetsHead.php')?>
</head>
<body>
	<?php include('topnav.php')?>
	<div class="main-body">
				<div class="search">
					<!-- start search-->
				    <div class="search-box">
					    <div id="sb-search" class="sb-search">
							<form action="search.php" method="POST" enctype="multipart/form-data">
								<input class="sb-search-input" placeholder="Enter your search term..." type="search" name="search" id="search">
								<input class="sb-search-submit" name="cari" type="submit" value="">
								<span class="sb-icon-search"> </span>
							</form>
						</div>
				    </div>
					<!-- search-scripts -->
					<script src="media/js/classie.js"></script>
					<script src="media/js/uisearch.js"></script>
						<script>
							new UISearch( document.getElementById( 'sb-search' ) );
						</script>
					<!-- //search-scripts -->
					</div>
		<div class="wrap">
			<div class="col-md-8 content-left">
			<div class="articles">
			<header>
				<h3 class="title-head">Artikel</h3>
			</header>
					
				<?php
				include('database.php');
				$limit = 12;
				$start = 0;
				$query = $mysqli->query("SELECT tb_berita.id_berita, tb_berita.baca, tb_category.nama_category, tb_category.id_category, tb_berita.judul,DATE_FORMAT(tb_berita.tgl, '%d-%m-%Y') as tgl, SUBSTRING(tb_berita.isi, 1,100) as isi, tb_berita.image FROM tb_berita LEFT JOIN tb_category ON tb_berita.id_category = tb_category.id_category ORDER BY tb_berita.id_berita DESC LIMIT $start, $limit");
				while($data = $query->fetch_assoc()){
				$Judul = preg_replace("/\s/","-",$data['judul']);
				$url_link = "post-".$data['id_berita']."-".$Judul.".html";
			?>
			<div class="article">
				<div class="article-left">
					<a href="post.php?id_berita=<?php echo $data['id_berita']?>"><img style="width:400px;height:200px;" src="uploadBerita/<?php echo $data['image']?>" alt="<?php echo $data['judul']?>"></a>
				</div>
					<div class="article-right">
							<div class="article-title">
								<p><?php echo $data['tgl']?><a class="span_link" href="#"><span class="glyphicon glyphicon-eye-open"></span><?php echo $data['baca']?> </a></p>
								<a class="title" href="post.php?id_berita=<?php echo $data['id_berita']?>"><?php echo $data['judul']?></a>
							</div>
							<div class="article-text">
								<p><?php echo $data['isi']?></p>
								<a href="post.php?id_berita=<?php echo $data['id_berita']?>"><img src="media/images/more.png" alt="" /></a>
								<div class="clearfix"></div>
							</div>
					</div>
						<div class="clearfix"></div>
			</div>
			<?php }?>
			
						<ul class="pager">
						  <li class="next"><a href="page.php?id=2">News →</a>
							</li>
                        </li>
                    </ul>
				</div>
			</div>
			
			<div class="col-md-4 side-bar">
			<div class="first_half">
				<div class="list_vertical">
									<div class="newsletter">
					<h1 class="side-title-head">Newsletter</h1>
					<p class="sign">Daftarkan email kamu ke Rekalpa.com Newsletter</p>
					<form>
						<input type="text" class="text" value="Email Address" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email Address';}">
						<input type="submit" value="submit">
					</form>
				</div>
					 </div>
					 </div>
					 <div class="secound_half">					 
					 <div class="popular-news">
						<header>
							<h3 class="title-popular">popular News</h3>
						</header>
						<div class="popular-grids">
						<?php
							$mysql = $mysqli->query("SELECT MAX(baca) as baca1, baca, judul, id_berita, image, DATE_FORMAT(tb_berita.tgl, '%d-%m-%Y') as tgl from tb_berita group by judul order by baca desc limit 0,5");
							while($pop = $mysql->fetch_assoc()){
							$Judul = preg_replace("/\s/","-",$pop['judul']);
							$url_link = "post-".$pop['id_berita']."-".$Judul.".html";
						?>
							<div class="popular-grid">
								<a href="post.php?id_berita=<?php echo $data['id_berita']?>"><img class="img-responsive" style="width:500px;height:200px" src="uploadBerita/<?php echo $pop['image']?>" alt="<?php echo $pop['judul']?>" /></a>
								<a class="title" href="post.php?id_berita=<?php echo $data['id_berita']?>"><?php echo $pop['judul']?></a>
								<p><?php echo $pop['tgl']?> <a class="span_link" href="#"><span class="glyphicon glyphicon-eye-open"></span><?php echo $pop['baca']?> </a></p>
							</div>
							<?php }?>
						</div>
					</div>
					</div>
					<div class="clearfix"></div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	<!-- content-section-ends-here -->
	<!-- footer-section-starts-here -->
	<?php include('footerUser.php')?>

	<script type="text/javascript">
		$(document).ready(function() {
				/*
				var defaults = {
				wrapID: 'toTop', // fading element id
				wrapHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
				};
				*/
		$().UItoTop({ easingType: 'easeOutQuart' });
});
</script>
<a href="#to-top" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
<!---->
</body>
</html>