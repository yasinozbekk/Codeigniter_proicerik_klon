
	<div class="footer mt-40">
		<div class="container">
			<a href="<?php echo base_url(); ?>">
				<img src="<?php echo base_url(); ?>assets/images/image-pro-icerik-footer-logo.webp" alt="Proicerik">
			</a>
			<div class="footer-social-media">


				<?php 
					foreach ($socialmedia as $row) {
						?>
							<a href="<?php echo $row->socialmedia_link ?>" class="footer-social-media-item">
								<span class="<?php echo $row->socialmedia_icon ?>"></span>
							</a>

						<?php
					}
				?>
			</div>
		</div>
		<div class="footer-content">
			<div class="container d-m-grid col-m-1 row-gap-m-55">
				<ul class="footer-content-links">
					<li class="footer-content-link-item">
						İLETİŞİM
					</li>
					<li class="footer-content-link-item">
						<a href="tel:<?php echo $settings->phone ?>" class="footer-content-link footer-contact-item">
							<span class="icon-phone br-30"></span>
							<?php echo $settings->phone ?>
						</a>
					</li>
					<li class="footer-content-link-item">
						<a href="https://wa.me/<?php echo $settings->phone ?>/?text=Proicerik.com%20sitesi%20%C3%BCzerinden%20eri%C5%9Fim%20sa%C4%9Fl%C4%B1yorum..." class="footer-content-link footer-contact-item">
							<span class="icon-whatsapp br-30"></span>
							<?php echo $settings->phone ?>
						</a>
					</li>
				</ul>
				<ul class="footer-content-links">
					<li class="footer-content-link-item">
						HIZLI MENÜ
					</li>
					<li class="footer-content-link-item">
						<a href="<?php echo base_url(); ?>" class="footer-content-link">
							Ana Sayfa
						</a>
					</li>
					<li class="footer-content-link-item">
						<a href="icerik-siparisi.html" class="footer-content-link">
							İçerik Siparişleri
						</a>
					</li>
					<li class="footer-content-link-item">
						<a href="<?php echo base_url(); ?>/readyarticles" class="footer-content-link">
							Hazır Makaleler
						</a>
					</li>
					<li class="footer-content-link-item">
						<a href="<?php echo base_url(); ?>/editorservices" class="footer-content-link">
							Editörlük Hizmetleri
						</a>
					</li>
				</ul>
				<ul class="footer-content-links">
					<li class="footer-content-link-item">
						KURUMSAL
					</li>


					<?php 
						foreach ($pages as $row) {
							?>
								<li class="footer-content-link-item">
									<a href="pages?id=<?php echo $row->pages_id ?>" class="footer-content-link">
										<?php echo $row->pages_title ?>
									</a>
								</li>
							<?php
						}
					?>
				</ul>
				<ul class="footer-content-links">
					<li class="footer-content-link-item">
						BLOG'DAN BA&#350;LIKLAR
					</li>
					<li class="footer-content-link-item">
						<a href="seo-uyumlu-makale-nasil-hazirlanir.html" class="footer-content-link">
							Seo Uyumlu Makale Nas&#305;l Haz&#305;rlan&#305;r?
						</a>
					</li>
					<li class="footer-content-link-item">
						<a href="seo-nedir-makale-yazdirmanin-seoya-etkileri-nelerdir.html" class="footer-content-link">
							Seo Nedir? Makale Yazd&#305;rman&#305;n Seoya Etkileri Nelerdir?
						</a>
					</li>
					<li class="footer-content-link-item">
						<a href="songuncel-makale-yazdirmak-neden-onemlidir.html" class="footer-content-link">
							G&uuml;ncel Makale Yazd&#305;rmak Neden &Ouml;nemlidir?
						</a>
					</li>
				</ul>
			</div>
		</div>
		<div class="container">
			<span>Copyright 2022 proicerik.com - T&uuml;m Haklar&#305; Sakl&#305;d&#305;r.</span>
			<div class="footer-bottom-links">
				<img src="<?php echo base_url(); ?>assets/images/image-credit-cards.webp" class="footer-credit-cart">
			</div>
		</div>
	</div>
	<input type="hidden" name="_token" value="SaMTrJq4Xe7ENBYk6xnvn8etXvIn8ND3kAqW14w1"> <ul class="mobile-menu d-none">
		<li class="mobile-menu-item">
			<a href="<?php echo base_url(); ?>" class="mobile-menu-link">
				<span class="icon-home mobile-menu-icon color2"></span>
				<span class="mobile-menu-pane-name">Ana Sayfa</span>
			</a>
		</li>
		<li class="mobile-menu-item">
			<a href="icerik-siparisi.html" class="mobile-menu-link">
				<span class="icon-paper-edit mobile-menu-icon"></span>
				<span class="mobile-menu-pane-name">Sipari&#351; Ver</span>
			</a>
		</li>
		<li class="mobile-menu-item">
			<a href="sepetim.html" class="mobile-menu-link color3">
				<span class="mobile-cart-count">0</span>
				<span class="icon-cart mobile-menu-icon"></span>
				<span class="mobile-menu-pane-name">Sepetim</span>
			</a>
		</li>
		<li class="mobile-menu-item">
			<a href="iletisim.html" class="mobile-menu-link">
				<span class="icon-headphone mobile-menu-icon"></span>
				<span class="mobile-menu-pane-name">&#304;leti&#351;im</span>
			</a>
		</li>
		<li class="mobile-menu-item">
			<a href="panel.html" class="mobile-menu-link">
				<span class="icon-user mobile-menu-icon"></span>
				<span class="mobile-menu-pane-name">Giri&#351;</span>
			</a>
		</li>
	</ul>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
	<script data-cfasync="false" src="<?php echo base_url(); ?>assets/js/cloudflare-static-email-decode.min.js"></script><script src="<?php echo base_url(); ?>assets/js/sweetalert2-sweetalert2.all.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/js-transactions.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/js-main.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/slider-splide.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/page-home.js"></script>


	<script type="text/javascript">
		
	function SuccessMessage(Title, Message, Url = null) {
	    Swal.fire({
	        title: Title,
	        html: Message,
	        confirmButtonText: "KAPAT", 
	        customClass: {
	            container: 'demo-content',
	            confirmButton: 'bg-color2 color4'
	      	}
	  	});	
	}


	</script>
</body>
</html>
