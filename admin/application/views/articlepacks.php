<!-- TOP HEADER -->
<?php $this->load->view("top-header.php"); ?>
<!-- END TOP HEADER -->

	<!--wrapper-->
	<div class="wrapper">
		<!-- HEADER -->
		<?php $this->load->view("header.php"); ?>
		<!-- END HEADER -->

		<!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">

				
				<div class="row">
					<iv class="col">
						<h6 class="mb-0 text-uppercase">Makale Paketleri</h6>
						<hr/>
						<div class="card">
							<div class="card-body">
								

												<div class="d-flex align-items-center">
													<div>
														<h5 class="mb-0">Makale Paketleri Listesi</h5>
													</div>
													<div class="font-18 ms-auto">
														<button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
															<i class="bx bx-plus"></i>Yeni Ekle
														</button>
														<!-- Yeni Ekle Modal -->
														<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
															<div class="modal-dialog modal-lg">
																<div class="modal-content">
																	<div class="modal-header">
																		<h5 class="modal-title" id="exampleModalLabel">Makale Paketleri Ekle</h5>
																		<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
																	</div>
																	<div class="modal-body">

																		<form action="articlepacks/insert/" method="POST" enctype="multipart/form-data">

																			<div class="form-group">
																				<label>Başlık</label>
																				<input type="text" name="articlepacks_title" class="form-control form-control-lg mb-3">
																			</div>

																			<div class="form-group">
																				<label>Min Kelime Sayısı</label>
																				<input type="text" name="articlepacks_minwords" class="form-control form-control-lg mb-3">
																			</div>

																			<div class="form-group">
																				<label>Max Kelime Sayısı</label>
																				<input type="text" name="articlepacks_maxwords" class="form-control form-control-lg mb-3">
																			</div>

																			<div class="form-group">
																				<label>Minimum Kelime Sayısı Başına Fiyat</label>
																				<input type="text" name="articlepacks_price" class="form-control form-control-lg mb-3">
																			</div>

																			<div class="form-group">
																				<label>Açıklama</label>
																				<textarea name="articlepacks_desc" class="ckeditor" class="form-control form-control-lg mb-3"></textarea>
																			</div>


																			<div class="modal-footer">
																				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kapat</button>
																				<button type="submit" class="btn btn-primary">Ekle</button>
																			</div>
																		</form>
																	</div>
																</div>
															</div>
														</div>
														<!-- !Yeni Ekle Modal -->
													</div>
												</div>
												<hr>

												<div class="table-responsive">
													<table class="table align-middle mb-0 table-hover">
														<thead class="table-light">
															<tr>
																<th><i class="lni lni-full-screen"></i></th>
																<th>#</th>
																<th>Başlık</th>
																<th>Kelime Sayısı</th>
																<th>Fiyat</th>
																<th>Durum</th>
																<th>İşlem</th>
															</tr>
														</thead>
														<tbody id="sortable" data-url="<?php echo base_url("admin/articlepacks/ranksetter"); ?>">

																<?php 
																	if ($articlepacks) {
																		foreach ($articlepacks as $articlepacks) {
																			?>

																				<tr id="rank-<?php echo $articlepacks->articlepacks_id ?>">
																					<td><i class="lni lni-full-screen"></i></td>

																					<td>#<?php echo $articlepacks->articlepacks_id ?></td>
																					<td><?php echo $articlepacks->articlepacks_title ?></td>
																					<td><?php echo $articlepacks->articlepacks_minwords ?> / <?php echo $articlepacks->articlepacks_maxwords ?> Kelime</td>
																					<td><?php echo $articlepacks->articlepacks_price ?></td>
																					<td>

																						<div class="form-check form-switch">
																							<input class="form-check-input" type="checkbox" data-url="<?php echo base_url("admin/articlepacks/statusupdate/$articlepacks->articlepacks_id") ?>" id="isActive" <?php echo $articlepacks->articlepacks_status == 1 ? "checked" : "" ?>>
																						</div>
																					</td>
																					<td>
																						<div class="d-flex order-actions">	
																							<a href="javascript:;" data-bs-toggle="modal" data-bs-target="#editSocialModal_<?php echo $articlepacks->articlepacks_id ?>" class=""><i class="bx bx-edit"></i></a>
																							<a class="ms-4 deletearticlepacks" data-id="<?php echo $articlepacks->articlepacks_id ?>" data-url="<?php echo base_url("admin/articlepacks/delete/$articlepacks->articlepacks_id") ?>"><i class="bx bx-trash"></i></a>
																						</div>
																					</td>
																				</tr>


																				<!-- Düzenle Modal -->
																				<div class="modal fade" id="editSocialModal_<?php echo $articlepacks->articlepacks_id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
																					<div class="modal-dialog modal-lg">
																						<div class="modal-content">
																							<div class="modal-header">
																								<h5 class="modal-title" id="exampleModalLabel">Paket Güncelle</h5>
																								<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
																							</div>
																							<div class="modal-body">

																								<form action="articlepacks/update/<?php echo $articlepacks->articlepacks_id ?>" method="POST" enctype="multipart/form-data">


																			<div class="form-group">
																				<label>Başlık</label>
																				<input type="text" name="articlepacks_title" value="<?php echo $articlepacks->articlepacks_title ?>" class="form-control form-control-lg mb-3">
																			</div>

																			<div class="form-group">
																				<label>Min Kelime Sayısı</label>
																				<input type="text" name="articlepacks_minwords" value="<?php echo $articlepacks->articlepacks_minwords ?>" class="form-control form-control-lg mb-3">
																			</div>

																			<div class="form-group">
																				<label>Max Kelime Sayısı</label>
																				<input type="text" name="articlepacks_maxwords" value="<?php echo $articlepacks->articlepacks_maxwords ?>" class="form-control form-control-lg mb-3">
																			</div>

																			<div class="form-group">
																				<label>Minimum Kelime Sayısı Başına Fiyat</label>
																				<input type="text" name="articlepacks_price" value="<?php echo $articlepacks->articlepacks_price ?>" class="form-control form-control-lg mb-3">
																			</div>

																			<div class="form-group">
																				<label>Açıklama</label>
																				<textarea name="articlepacks_desc" class="ckeditor" class="form-control form-control-lg mb-3">
																				<?php echo $articlepacks->articlepacks_desc ?>
																					
																				</textarea>
																			</div>


																									<div class="modal-footer">
																										<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kapat</button>
																										<button type="submit" class="btn btn-primary">Güncelle</button>
																									</div>
																								</form>
																							</div>
																						</div>
																					</div>
																				</div>
																				<!-- !Düzenle Modal -->

																			<?php
																		}
																	}else{
																		?>
																			<tr><td colspan="7">Herhangi bir slider eklenmemiştir.</td></tr>
																		<?php
																	}

																?>

														</tbody>
													</table>
												</div>



							</div>
						</div>
			   
					
				   </div><!--End Row-->




					  

			</div>
		</div>
		<!--end page wrapper -->
		<!--start overlay-->
		<div class="overlay toggle-icon"></div>
		<!--end overlay-->
		<!--Start Back To Top Button--> <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
		<!--End Back To Top Button-->

<!-- footer -->
	<?php $this->load->view("footer.php"); ?>
<!-- end footer -->


<!-- bottom footer -->
	<?php $this->load->view("bottom-footer.php"); ?>
<!-- end  bottom footer -->



<script type="text/javascript">
	$( ".deletearticlepacks" ).click(function() {//Sosyal medya silme
	  	var id = $(this).attr("data-id");
	  	var url = $(this).attr("data-url");
		Swal.fire({
			title: 'Silmek istediğinizden emin misiniz?',
			// showDenyButton: true,
			showCancelButton: true,
			cancelButtonText: "İptal",
			confirmButtonText: 'Evet, Sil',
			// denyButtonText: `Don't save`,
		}).then((result) => {
		/* Read more about isConfirmed, isDenied below */
		if (result.isConfirmed) {
			$(location).attr('href', url);

			// Swal.fire('Saved!', '', 'success')
		} else if (result.isDenied) {
			Swal.fire('Changes are not saved', '', 'info')
		}
		})
	});
</script>
