<!DOCTYPE html>
<html>
<head>
	<?php include('assetsHead.php');?>
</head>
<body>
<?php include('topnav.php');?>
	<!-- content-section-starts-here -->
	<div class="main-body">
		<div class="wrap">
		<div class="about-page">
			<div class="col-md-8 content-left">
				<div class="about">
					<h2 class="head">About Us</h2>
					<p>Rekalpa.com lahir pada pertengahan tahun 2016 yang bertujuan untuk memberikan informasi kepada masyarakat luas entah itu informasi berupa atau pun berupa perbandingan yang orang lain tidak lihat kebetulan kami yang lihat, dan kami pun tidak selalu menyarankan untuk setuju atau mengikuti apapun yang ada di website ini.</p>
					<p>Seluruh informasi pada website ini adalah hasil dari kami sendiri yang menurut kami patut untuk disampaikan.</p>
					<div class="more-address"> 
								<address>
								  <strong>Rekalpa.com</strong><br>
								  Jl. Raya Puncak Megamendung Bogor<br>
								  Jawa Barat<br>
								  <abbr title="Phone">P :</abbr> +62 85714464554
								</address>
								<address>
								  <strong>Email</strong><br>
								  <a href="mailto:info@example.com">elgitheedge@gmail.com</a>
							   </address>
						  </div>

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
							include('database.php');
							$mysql = $mysqli->query("SELECT MAX(baca) as baca1, baca, judul, id_berita, image, DATE_FORMAT(tb_berita.tgl, '%d-%m-%Y') as tgl from tb_berita group by judul order by baca desc limit 0,5");
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
	<?php include('footerUser.php');?>
	<script type="text/javascript">
		$(document).ready(function() {
				/*
				var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
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