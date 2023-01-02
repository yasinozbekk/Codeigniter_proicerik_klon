<?php $this->load->view("header.php"); ?>

	<div class="content">

		<div class="w-100 bg-color2">
			<div class="container ozel-icerik-title-bg page-title">
				<div class="d-block">
					<h1 class="page-title-title">Hazır Makaleler</h1>
					<p class="page-title-desc"></p>
				</div>
			</div>
		</div>

		<div class="container mt-40">
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

	</div>
<?php $this->load->view("footer.php"); ?>
