<?php $this->load->view("header.php"); ?>

	<div class="content">

		<div class="w-100 bg-color2">
			<div class="container ozel-icerik-title-bg page-title">
				<div class="d-block">
					<h1 class="page-title-title">Editörlük Hizmetleri</h1>
					<p class="page-title-desc">Editörlük hizmeti satın alarak sitenizi profesyonel içerikler ile yukarı taşıyın.</p>
				</div>
			</div>
		</div>

		<div class="container mt-40">
					<div class="col-3 col-gap-15 mt-40 d-m-grid col-m-1 row-gap-m-55">


				<?php 
					foreach ($editorservices as $row) {
					?>

				<div class="box br-5">
					<div class="box-circle-icon">
						<img src="<?php echo base_url(); ?>assets/images/image-frame-4.webp" alt="">
					</div>
					<h4 class="box-title color1 mt-10"><?php echo $row->editorservices_title ?></h4>
					<p class="text-center"><?php echo $row->editorservices_desc ?></p>
					<ul class="service-detail-list mt-20">
						
						<?php echo $row->editorservices_items ?>
						<!-- Burası madde madde alınacak -->

					</ul>
					<span class="box-price mt-20">
						<?php echo $row->editorservices_price ?> TL
					</span>
					<span class="box-price-desc">
						<?php echo $row->editorservices_days ?> Günlük Hizmet
					</span>
					<div class="box-content mt-20 mb-20">
						<a href="servicedetail?id=<?php echo $row->editorservices_id ?>" class="btn br-5">SEPETE EKLE <span class="ml-10 icon-arrow-right"></span></a>
					</div>
				</div>


					<?php
					}
				?>




						
					</div>
			
		</div>

	</div>
<?php $this->load->view("footer.php"); ?>
