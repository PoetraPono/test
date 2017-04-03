<div class="footer">
		<div class="footer-top">
			<div class="wrap">
				<div class="col-md-3 col-xs-6 col-sm-4 footer-grid">
					<h4 class="footer-head">About Us</h4>
					<p>Rekalpa.com lahir pada pertengahan tahun 2016</p>
					<p>Seluruh informasi pada website ini adalah hasil dari kami sendiri yang menurut kami patut untuk disampaikan.</p>
				</div>
				<div class="col-md-2 col-xs-6 col-sm-2 footer-grid">
					<h4 class="footer-head">Artikel</h4>
					<ul class="cat">
						<?php
							$query1 = $mysqli->query('SELECT id_category, nama_category FROM tb_category');
							while($val = $query1->fetch_assoc()){
							$nama = preg_replace("/\s/","-",$val['nama_category']);
							$url_link = "category-".$val['id_category']."-".$nama."";
						?>
						<li><a href="category.php?id_category=<?php echo $val['id_category']?>"><?php echo $val['nama_category']?></a></li>
						<?php }?>
					</ul>
				</div>
				<div class="col-md-4 col-xs-6 col-sm-6 footer-grid">
					<h4 class="footer-head">Reporter</h4>
					<ul class="flickr">
					<?php 
						$query = $mysqli->query('SELECT image FROM tb_wartawan');
						while($value = $query->fetch_assoc()){
					?>
						<li><img src="uploadWartawan/<?php echo $value['image']?>"></li>
						<?php }?>
						<div class="clearfix"></div>
					</ul>
				</div>
				<div class="col-md-3 col-xs-12 footer-grid">
					<h4 class="footer-head">Contact Us</h4>
					<span class="hq">Our headquaters</span>
					<address>
						<ul class="location">
							<li><span class="glyphicon glyphicon-map-marker"></span></li>
							<li>Jl.Raya Puncak Megamendung Bogor</li>
							<div class="clearfix"></div>
						</ul>	
						<ul class="location">
							<li><span class="glyphicon glyphicon-earphone"></span></li>
							<li>+62 85714464554</li>
							<div class="clearfix"></div>
						</ul>	
						<ul class="location">
							<li><span class="glyphicon glyphicon-envelope"></span></li>
							<li><a href="#">elgitheedge@gmail.com</a></li>
							<div class="clearfix"></div>
						</ul>						
					</address>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
		<div class="footer-bottom">
			<div class="wrap">
				<div class="copyrights col-md-6">
					<p> © 2015 Rekalpa.com All Rights Reserved</p>
				</div>
				<div class="footer-social-icons col-md-6">
					<ul>
						<li><a class="facebook" href="#"></a></li>
						<li><a class="twitter" href="#"></a></li>
						<li><a class="flickr" href="#"></a></li>
						<li><a class="googleplus" href="#"></a></li>
						<li><a class="dribbble" href="#"></a></li>
					</ul>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>