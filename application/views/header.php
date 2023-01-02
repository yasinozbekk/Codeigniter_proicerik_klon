<!DOCTYPE html>
<html lang="tr">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Proicerik - SEO Uyumlu Hit Odakl&#305; &#304;&ccedil;erik Ajans&#305;</title>
	<meta name="description" content="&#304;&ccedil;erik ve makale ihtiya&ccedil;lar&#305;n&#305;za, SEO uyumlu ve hit odakl&#305; profesyonel &ccedil;&ouml;z&uuml;mler &uuml;retiyoruz. T&uuml;rkiye'nin en ba&#351;ar&#305;l&#305; i&ccedil;erik ajans&#305;.">
	<meta name="keywords" content="Pro &#304;&ccedil;erik">
	<meta name="author" content="Proicerik">
	<meta property="og:type" content="website"><meta property="og:title" content="Proicerik - SEO Uyumlu Hit Odakl&#305; &#304;&ccedil;erik Ajans&#305;"><meta property="og:url" content="https://proicerik.com"><meta property="og:image" content="https://proicerik.com/image/pro-icerik-image.png"><meta property="og:description" content="&#304;&ccedil;erik ve makale ihtiya&ccedil;lar&#305;n&#305;za, SEO uyumlu ve hit odakl&#305; profesyonel &ccedil;&ouml;z&uuml;mler &uuml;retiyoruz. T&uuml;rkiye'nin en ba&#351;ar&#305;l&#305; i&ccedil;erik ajans&#305;."><meta name="twitter:card" content="summary_large_image"><meta property="twitter:domain" content="https://proicerik.com"><meta property="twitter:url" content="https://proicerik.com"><meta name="twitter:title" content="Proicerik - SEO Uyumlu Hit Odakl&#305; &#304;&ccedil;erik Ajans&#305;"><meta name="twitter:description" content="&#304;&ccedil;erik ve makale ihtiya&ccedil;lar&#305;n&#305;za, SEO uyumlu ve hit odakl&#305; profesyonel &ccedil;&ouml;z&uuml;mler &uuml;retiyoruz. T&uuml;rkiye'nin en ba&#351;ar&#305;l&#305; i&ccedil;erik ajans&#305;."><meta name="twitter:image" content="https://proicerik.com/image/pro-icerik-image.png">
	<link rel="icon" type="image/x-icon" href="favicons/image-favicon.ico">
	<link rel="canonical" href="https://proicerik.com">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/css-style.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/css-iconset.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/sweetalert2-sweetalert2.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/slider-splide.min.css">
</head>
<body>
	<div class="header">
		<div class="header-top d-m-none">
			<div class="container">
				<ul class="header-top-menu">
					<li class="header-top-menu-item">
						<a href="#" class="header-top-menu-link"><span class="icon-menu mr-10"></span> KURUMSAL <span class="icon-arrow-down ml-10 fs-6"></span></a>
						<ul class="header-top-menu-sub-item">

							<?php 
								foreach ($pages as $row) {
									?>
									<li class="header-top-menu-sub-item-item">
										<a href="pages?id=<?php echo $row->pages_id ?>" class="header-top-menu-sub-item-link"><?php echo $row->pages_title ?></a>
									</li>
									<?php
								}
							?>

						</ul>
					</li>
					<li class="header-top-menu-item">
						<a href="https://wa.me/<?php echo $settings->phone ?>/?text=Proicerik.com%20sitesi%20%C3%BCzerinden%20eri%C5%9Fim%20sa%C4%9Fl%C4%B1yorum..." target="_blank" class="header-top-menu-link"><span class="icon-whatsapp mr-10"></span><?php echo $settings->phone ?><span class="oval online ml-10">ONL&#304;NE</span></a>
					</li>
				</ul>
				<ul class="header-top-menu">
					<li class="header-top-menu-item">
						<a href="panel.html" class="header-top-menu-link"><span class="icon-user mr-10"></span> M&Uuml;&#350;TER&#304;
						PANEL&#304;</a>
					</li>
				</ul>
			</div>
		</div>
		<div class="header-bottom">
			<div class="container">
				<a href="<?php echo base_url(); ?>" class="logo">
					<img src="<?php echo base_url(); ?>assets/images/image-pro-icerik.webp" alt="Proicerik">
				</a>
				<ul class="header-nav d-m-none">
					<li class="header-nav-item">
						<a href="icerik-siparisi.html" class="header-nav-link ">&#304;&ccedil;erik Sipari&#351;i</a>
					</li>
					<li class="header-nav-item">
						<a href="<?php echo base_url(); ?>readyarticles" class="header-nav-link ">Hazır Makaleler</a>
					</li>
					<li class="header-nav-item">
						<a href="<?php echo base_url(); ?>editorservices" class="header-nav-link ">Editörlük Hizmetleri</a>
					</li>
					<li class="header-nav-item">
						<a href="sepetim.html" class="header-nav-cart-btn br-30" id="cart">
							<span class="icon-cart mr-10"></span>
							Sepetim
							<span class="cart-total br-30">
								0
							</span>
						</a>
					</li>
				</ul>
				<ul class="mobile-header-button d-none">
					<li>
						<a href="https://wa.me/<?php echo $settings->phone ?>/?text=Proicerik.com%20sitesi%20%C3%BCzerinden%20eri%C5%9Fim%20sa%C4%9Fl%C4%B1yorum..." target="_blank" class="btn bg-sheer-color3 color3 br-5">
							<span class="icon-whatsapp"></span>
						</a>
					</li>
					<li>
						<a href="#" class="btn bg-sheer-color2 color2 br-5 mobile-popup-box-btn" data-id="mobile-menu">
							<span class="icon-menu"></span>
						</a>
					</li>
				</ul>
			</div>
			<div class="mobile-popup-box d-none" id="mobile-menu">
				<div class="mobile-popup-header">
					<a href="<?php echo base_url(); ?>">
						<img src="<?php echo base_url(); ?>assets/images/image-pro-icerik-footer-logo.webp" alt="Proicerik">
					</a>
					<div class="d-flex col-gap-15">
						<a href="https://wa.me/<?php echo $settings->phone ?>/?text=Proicerik.com%20sitesi%20%C3%BCzerinden%20eri%C5%9Fim%20sa%C4%9Fl%C4%B1yorum..." target="_blank" class="btn bg-sheer-color3 color3 br-5">
							<span class="icon-whatsapp"></span>
						</a>
						<a href="#" class="btn bg-header color1 br-5 mobile-popup-box-btn" data-id="mobile-menu">
							<span class="icon-close"></span>
						</a>
					</div>
				</div>
				<ul class="mobile-popup-nav">
					<li class="mobile-popup-nav-item">
						H&#304;ZMETLER&#304;M&#304;Z
					</li>
					<li class="mobile-popup-nav-item">
						<a href="icerik-siparisi.html" class="mobile-popup-nav-link">&#304;&Ccedil;ER&#304;K S&#304;PAR&#304;&#350;&#304; <span class="icon icon-arrow"></span></a>
					</li>
					<li class="mobile-popup-nav-item">
						<a href="<?php echo base_url(); ?>readyarticles" class="mobile-popup-nav-link">HAZIR MAKALELER <span class="icon icon-arrow"></span></a>
					</li>
					<li class="mobile-popup-nav-item">
						<a href="<?php echo base_url(); ?>editorservices" class="mobile-popup-nav-link">Editörlük Hizmetleri<span class="icon icon-arrow"></span></a>
					</li>
				</ul>
				<ul class="mobile-popup-nav">
					<li class="mobile-popup-nav-item">
						HIZLI ER&#304;&#350;&#304;M
					</li>
					<li class="mobile-popup-nav-item">
						<a href="hakkimizda.html" class="mobile-popup-nav-link">Hakk&#305;m&#305;zda <span class="icon icon-arrow"></span></a>
					</li>
					<li class="mobile-popup-nav-item">
						<a href="iletisim.html" class="mobile-popup-nav-link">Bize Ula&#351;&#305;n <span class="icon icon-arrow"></span></a>
					</li>
					<li class="mobile-popup-nav-item">
						<a href="uyelik-sozlesmesi.html" class="mobile-popup-nav-link">&Uuml;yelik S&ouml;zle&#351;mesi <span class="icon icon-arrow"></span></a>
					</li>
					<li class="mobile-popup-nav-item">
						<a href="mesafeli-satis-sozlesmesi.html" class="mobile-popup-nav-link">Mesafeli Sat&#305;&#351; S&ouml;zle&#351;mesi <span class="icon icon-arrow"></span></a>
					</li>
					<li class="mobile-popup-nav-item">
						<a href="on-bilgilendirme-formu.html" class="mobile-popup-nav-link">&Ouml;n Bilgilendirme Formu <span class="icon icon-arrow"></span></a>
					</li>
				</ul>
			</div>
		</div>
	</div>