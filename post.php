<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
<head>
<?php 
	include('assetsHead.php');
	include('database.php');
	$id = $_GET['id_berita'];
	$pageurl = urlencode("http://" . $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"]);
	$sql = $mysqli->query("SELECT judul, SUBSTRING(tb_berita.isi, 0,100) as isi1, isi, image FROM tb_berita WHERE id_berita = '$id'");
	$val = $sql->fetch_assoc();
?>
<meta name="keywords" content="<?php echo $val['judul']?>" />
<meta name="description" content="<?php echo $val['isi1']?>" />
<meta name="title" content="<?php echo $val['judul']?>" />
<meta property="og:image" content="http://ia.media-imdb.com/rock.jpg"/>
<meta property="og:image:secure_url" content="https://secure.example.com/ogp.jpg" />
</head>
<body>
	<?php include('topnav.php')?>
	<!-- content-section-starts-here -->
	<div class="main-body">
		<div class="wrap">
		<ol class="breadcrumb">
			</ol>
			<div class="single-page">
			<div class="col-md-2 share_grid">
				<h3>SHARE</h3>
				<ul>
					<li>
						<a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $pageurl?>" target="_blank">
							<i class="facebook"></i>
							<div class="views">
								<span>SHARE</span>
							</div>			
							<div class="clearfix"></div>
						</a>
					</li>
					<li>
						<a href="http://twitter.com/share?url=<?php echo $pageurl?>&text=<?php echo $val['judul']?>" target="_blank">
							<i class="twitter"></i>
							<div class="views">
								<span>TWEET</span>
							</div>			
							<div class="clearfix"></div>				
						</a>
					</li>
					<li>
						<a href="http://www.linkedin.com/shareArticle?url=<?php echo $pageurl?>&title=<?php echo $val['judul']?>" target="_blank">
							<i class="linkedin"></i>
							<div class="views">
								<span>SHARES</span>
							</div>			
							<div class="clearfix"></div>								
						</a>
					</li>
				</ul>
			</div>	
			<div class="col-md-6 content-left single-post">
			<?php
				$artikel = $mysqli->query("SELECT * from tb_berita WHERE id_berita = '$id'");
				$artikel1 = mysqli_fetch_array($artikel);
				$cek = mysqli_num_rows($artikel);
				$baca = $artikel1['baca']+1;
				if($cek!=0){
					$update = $mysqli->query("UPDATE tb_berita SET baca = '$baca' WHERE id_berita = '$id'");
				}
				$query = $mysqli->query("SELECT tb_berita.id_berita, tb_berita.id_wartawan, tb_wartawan.name, tb_category.nama_category, tb_category.id_category, tb_berita.judul,DATE_FORMAT(tb_berita.tgl, '%d-%m-%Y') as tgl, tb_berita.isi , tb_berita.image FROM tb_berita LEFT JOIN tb_wartawan ON tb_berita.id_wartawan = tb_wartawan.id_wartawan LEFT JOIN tb_category ON tb_berita.id_category = tb_category.id_category WHERE tb_berita.id_berita = '$id'");
				$data = $query->fetch_assoc();
				
			?>
				<div class="blog-posts">
			<h3 class="post"><?php echo $data['judul']?></h3>
				<div class="last-article">
					<p class="artext">
							<img src="uploadBerita/<?php echo $data['image']?>" class="img-responsive" alt=""/>
					</p>
					<p class="artext"><?php echo $data['isi']?></p>
					<div class="clearfix"></div>
					<?php
						$judul = $data['judul'];
						$query3 = $mysqli->query("SELECT * FROM tb_berita where judul LIKE '%$judul%'");
					?>
				<div class="row related-posts">
					<h4>Articles You May Like</h4>
					<?php while($row = $query3->fetch_assoc()){
					$Judul = preg_replace("/\s/","-",$data['judul']);
					$url_link = "post-".$data['id_berita']."-".$Judul.".html";
					?>
					<div class="col-xs-6 col-md-3 related-grids">
						<a href="page.php?id_berita=<?php echo $data['id_berita']?>" class="thumbnail">
							<img src="uploadBerita/<?php echo $row['image']?>" alt="<?php echo $row['judul']?>" style="width:120px;height:100px;"/>
						</a>
						<h5><a href="post.php?id_berita=<?php echo $data['id_berita']?>"><?php echo $row['judul']?></a></h5>
					</div>
					<?php }?>					
				</div>
				</div>	
				
					<?php
						
						
					?>
				<div class="clearfix"></div>
			</div>
		</div>

				</div>
			<div class="col-md-4 side-bar">
			<div class="first_half">
				<div class="newsletter">
					<h1 class="side-title-head">Newsletter</h1>
					<p class="sign">Daftarkan email anda ke Rekalpa.com untuk Newsletter</p>
					<form>
						<input type="text" class="text" value="Email Address" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email Address';}">
						<input type="submit" value="submit">
					</form>
				</div>

					  </div>
					 <div class="secound_half"><div class="popular-news">
						<header>
							<h3 class="title-popular">popular News</h3>
						</header>
						<div class="popular-grids">
						<?php
							$mysql = $mysqli->query("SELECT MAX(baca) as baca1, baca, judul, id_berita, image, DATE_FORMAT(tb_berita.tgl, '%d-%m-%Y') as tgl from tb_berita group by baca ORDER BY `tb_berita`.`baca` desc limit 0,5 ");
							while($pop = $mysql->fetch_assoc()){
							$Judul = preg_replace("/\s/","-",$pop['judul']);
							$url_link = "post-".$pop['id_berita']."-".$Judul.".html";
						?>
							<div class="popular-grid">
								<a href="post.php?id_berita=<?php echo $pop['id_berita']?>"><img class="img-responsive" style="width:500px;height:200px" src="uploadBerita/<?php echo $pop['image']?>" alt="<?php echo $pop['judul']?>" /></a>
								<a class="title" href="post.php?id_berita=<?php echo $pop['id_berita']?>"><?php echo $pop['judul']?></a>
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
	</div>
	<!-- content-section-ends-here -->
	<!-- footer-section-starts-here -->
	<?php include('footerUser.php')?>
	<!-- footer-section-ends-here -->
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