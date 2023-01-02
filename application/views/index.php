<?php $this->load->view("header.php"); ?>

	<div class="content">
		<div class="slider">
			<div class="container">
				<div class="slider-box br-5">
					<h3 class="slider-box-title">
						H&#304;T &#304;&Ccedil;ER&#304;K H&#304;ZMET&#304;YLE TANI&#350;IN!
					</h3>
					<div class="slider-content-box-container">
						<div class="slider-content-box br-5">
							<span class="slider-content-box-icon icon-tick"></span>
							DO&#286;RU<br>BA&#350;LIK
						</div>
						<span class="icon-plus color2"></span>
						<div class="slider-content-box br-5">
							<span class="slider-content-box-icon icon-double-tick"></span>
							DO&#286;RU<br>KEYWORD
						</div>
						<span class="icon-arrow-right color3"></span>
						<div class="slider-content-box br-5 color3 border-color3">
							<span class="slider-content-box-icon icon-ring"></span>
							MAKS&#304;MUM<br>TRAF&#304;K!
						</div>
					</div>
					<p class="slider-box-desc">Profesyonel ara&ccedil;larla do&#287;ru rakip ve keyword analizi, trend kelimelerin
						se&ccedil;imi, etkili ba&#351;l&#305;k ve a&ccedil;&#305;klama kullan&#305;m&#305; sonucunda onlarca anahtar kelimeden binlerce trafik
					alabileceksiniz.</p>


					<div class="slider-box-content mt-20">
						<a href="hit-icerik.html" class="btn bg-color2 br-5">HEMEN &#304;NCELE <span class="ml-10 icon-arrow-right"></span></a>
					</div>
				</div>
			</div>
		</div><div class="services-brief">
			<div class="container">
				<ul class="services-brief-list">


					<?php 

						foreach ($statistics as $row) {
							?>

								<li class="services-brief-list-item">
									<span class="icon-user <?php echo $row->statistics_icon; ?>"></span>
									<div class="services-brief-desc">
										<span class="services-brief-title"><?php echo $row->statistics_piece; ?></span>
										<span class="services-brief-sub-title"><?php echo $row->statistics_title; ?></span>
									</div>
								</li>
							<?php
						}

					?>
					
					
				</ul>
			</div>
		</div><script type="application/ld+json">[{"@context":"https:\/\/schema.org","@type":"Product","name":"Standart \u0130\u00e7erik","image":["https:\/\/proicerik.com\/image\/pro-icerik-image.png"],"brand":{"@type":"Brand","name":"Pro \u0130\u00e7erik","logo":"https:\/\/proicerik.com\/image\/pro-icerik.webp"},"offers":{"@type":"Offer","url":"https:\/\/proicerik.com\/standart-icerik","price":6,"priceCurrency":"TRY"},"aggregateRating":{"@type":"AggregateRating","bestRating":10,"worstRating":9,"ratingValue":10,"ratingCount":100}},{"@context":"https:\/\/schema.org","@type":"Product","name":"Uzman \u0130\u00e7erik","image":["https:\/\/proicerik.com\/image\/pro-icerik-image.png"],"brand":{"@type":"Brand","name":"Pro \u0130\u00e7erik","logo":"https:\/\/proicerik.com\/image\/pro-icerik.webp"},"offers":{"@type":"Offer","url":"https:\/\/proicerik.com\/uzman-icerik","price":10,"priceCurrency":"TRY"},"aggregateRating":{"@type":"AggregateRating","bestRating":10,"worstRating":9,"ratingValue":10,"ratingCount":20}},{"@context":"https:\/\/schema.org","@type":"Product","name":"Hit \u0130\u00e7erik","image":["https:\/\/proicerik.com\/image\/pro-icerik-image.png"],"brand":{"@type":"Brand","name":"Pro \u0130\u00e7erik","logo":"https:\/\/proicerik.com\/image\/pro-icerik.webp"},"offers":{"@type":"Offer","url":"https:\/\/proicerik.com\/hit-icerik","price":17.5,"priceCurrency":"TRY"},"aggregateRating":{"@type":"AggregateRating","bestRating":10,"worstRating":10,"ratingValue":10,"ratingCount":100}}]</script><div class="container mt-40">
			<img src="<?php echo base_url(); ?>assets/images/image-logo-icon.png" alt="" class="widget-title-icon">
			<h3 class="widget-title mt-10">Makale Paketleri</h3>
			<p class="widget-title-sub-dec mt-10">Makale paketlerimizi inceleyerek size en uygun paketi sat&#305;n alabilirsiniz.</p>
			<div class="d-flex col-gap-15 mt-40 d-m-grid col-m-1 row-gap-m-55">




				<?php 

					foreach ($articlepacks as $row) {
						?>
							<div class="box pb-20 br-5">
								<div class="box-square-icon br-5">
									<img src="<?php echo base_url(); ?>assets/images/image-4667-edit.webp" alt="Standart &#304;&ccedil;erik">
								</div>
								<h4 class="box-title mt-10"><?php echo $row->articlepacks_title ?></h4>
								<span class="badge bg-sheer-color2 color2 element-center mt-10 d-block"><?php echo $row->articlepacks_minwords ?> / <?php echo $row->articlepacks_maxwords ?>
								Kelime</span>
								<p class="box-desc mt-10 text-center">
									<?php echo $row->articlepacks_desc ?>
								</p>
								<span class="box-price mt-20">
									<?php echo number_format($row->articlepacks_price, 2, ',', '.') ?>TL
								</span>
								<span class="box-price-desc">
									<?php echo $row->articlepacks_minwords ?> Kelime
								</span>
								<div class="box-content mt-20">
									<a href="icerik-siparisi.html" class="btn br-5">HEMEN İÇERİK SİPARİŞİ VER <span class="ml-10 icon-arrow-right"></span></a>
								</div>
							</div>
						<?php
					}

				?>

			</div>
		</div>
		<div class="container mt-40">
			<img src="<?php echo base_url(); ?>assets/images/image-logo-icon.png" alt="" class="widget-title-icon">
			<h3 class="widget-title mt-10">Hazır Makaleler</h3>
			<p class="widget-title-sub-dec mt-10">Hazır makalelerinizden birini seçerek</p>
			<div class="box p-10 mt-40 br-5 splide home-category-list" role="group">
				<div class="splide__track w-100">
					<div class="splide__list">


				<?php 
					foreach ($readyarticles as $row) {
					?>

						<button type="button" data-test="asd" data-category-id="<?php echo $row->readyarticles_id ?>" class="home-category-list-item splide__slide btn-category-select"><?php echo $row->readyarticles_title ?></button>
					<?php
					}
				?>
						
					</div>
					<input type="hidden" value="<?php echo base_url(); ?>home/category" id="hazir-makale-listele-url">
				</div>
			</div>
			<div class="box mt-20 br-5" id="hazir-makale-list">
				<script type="application/ld+json">[{"@context":"https:\/\/schema.org","@type":"Product","name":"R\u00fcyada En \u00c7ok G\u00f6r\u00fclen 10 R\u00fcya ve Psikolojik Tabirleri","image":["https:\/\/proicerik.com\/image\/pro-icerik-image.png"],"brand":{"@type":"Brand","name":"Pro \u0130\u00e7erik","logo":"https:\/\/proicerik.com\/image\/pro-icerik.webp"},"offers":{"@type":"Offer","url":"https:\/\/proicerik.com\/hazir-makaleler","price":"13.04","priceCurrency":"TRY"}},{"@context":"https:\/\/schema.org","@type":"Product","name":"Bebeklerde Konu\u015fmaya Ba\u015flama S\u00fcreci","image":["https:\/\/proicerik.com\/image\/pro-icerik-image.png"],"brand":{"@type":"Brand","name":"Pro \u0130\u00e7erik","logo":"https:\/\/proicerik.com\/image\/pro-icerik.webp"},"offers":{"@type":"Offer","url":"https:\/\/proicerik.com\/hazir-makaleler","price":"32.40","priceCurrency":"TRY"}}]</script><table class="table">
					<tr class="d-m-none printAfterArticle">
						<th>Kategori</th>
						<th>Makale Başlığı</th>
						<th>Kelime Sayısı</th>
						<th>Fiyat</th>
						<th class="t-w-fit text-center">Aksiyon</th>
					</tr>


				<?php 

					foreach ($readyarticlesdetail as $row) {
					?>


						<tr class="defaultArticle">
							<td data-label="Makale Kategorisi">
								<span class="badge bg-sheer-color2 color2">Anne &Ccedil;ocuk</span>
							</td>
							<td class="mt-title">
								<span><?php echo $row->readyarticlesdetail_title ?></span>
							</td>
							<td data-label="Kelime Sayısı;">
								<span><?php echo $row->readyarticlesdetail_wordcount ?></span>
							</td>
							<td data-label="Fiyat">
								<span><?php echo $row->readyarticlesdetail_price ?> TL</span>
							</td>
							<td>
								<button type="button" data-id="<?php echo $row->readyarticlesdetail_id ?>" data-content="<?php echo $row->readyarticlesdetail_content ?>" data-title="<?php echo $row->readyarticlesdetail_title ?>" class="btn btn-sm w-fit bg-sheer-color2 color2 br-5 w-m-100 btn-hazir-makale-demo">DEMO</button>
								<button type="button" data-id="<?php echo $row->readyarticlesdetail_id ?>" class="btn btn-sm w-fit br-5 w-m-100 btn-add-cart">SEPETE EKLE</button>
							</td>
						</tr>


					<?php
					}
				?>


					<input type="hidden" value="https://proicerik.com/hazir-makaleler/demo" id="hazir-makale-demo-url">
				</table>
			</div>
		</div>
		<div class="container mt-40">
			<img src="<?php echo base_url(); ?>assets/images/image-logo-icon.png" alt="" class="widget-title-icon">
			<h3 class="widget-title mt-10">Editörlük Hizmetleri</h3>
			<p class="widget-title-sub-dec mt-10">Editörlük hizmetlerimizi inceleye bilirsiniz.</p>
			<div class="d-flex col-gap-15 mt-40 d-m-grid col-m-1 row-gap-m-55">

				<?php 


					for ($i=0; $i < 3; $i++) { 
					?>

				<div class="box br-5">
					<div class="box-circle-icon">
						<img src="<?php echo base_url(); ?>assets/images/image-frame-4.webp" alt="">
					</div>
					<h4 class="box-title color1 mt-10"><?php echo $editorservices[$i]->editorservices_title ?></h4>
					<p class="text-center"><?php echo $editorservices[$i]->editorservices_desc ?></p>
					<ul class="service-detail-list mt-20">
						
						<?php echo $editorservices[$i]->editorservices_items ?>
						<!-- Burası madde madde alınacak -->

					</ul>
					<span class="box-price mt-20">
						<?php echo $editorservices[$i]->editorservices_price ?> TL
					</span>
					<span class="box-price-desc">
						<?php echo $editorservices[$i]->editorservices_days ?> Günlük Hizmet
					</span>
					<div class="box-content mt-20 mb-20">
						<a href="servicedetail?id=<?php echo $editorservices[$i]->editorservices_id ?>" class="btn br-5">SEPETE EKLE <span class="ml-10 icon-arrow-right"></span></a>
					</div>
				</div>

					<?php
					}
				?>




			</div>
		</div>
	</div>
<?php $this->load->view("footer.php"); ?>
