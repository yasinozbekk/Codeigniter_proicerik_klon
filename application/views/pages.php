<?php $this->load->view("header.php"); ?>

	<div class="content">
		<div class="w-100 bg-color2">
			<div class="container ozel-icerik-title-bg page-title">
				<div class="d-block">
					<h1 class="page-title-title"><?php echo $pageinfo->pages_title; ?></h1>
					<p class="page-title-desc"></p>
				</div>
			</div>
		</div>
		<div class="container mt-40">
			<div class="w-100">
				<div class="box br-5 p-30">
					<h2><?php echo $pageinfo->pages_title; ?></h2>
					
					<?php echo $pageinfo->pages_content; ?>
				</div>
			</div>
		</div>
	</div>

<?php $this->load->view("footer.php"); ?>