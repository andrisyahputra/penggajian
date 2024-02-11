 <section id="main-content">
 	<section class="wrapper">
 		<h3><i class="fa fa-angle-right"></i> <?= $title ?></h3>
 		<div class="row mt">
 			<div class="col-lg-12">





 				<div class="col-sm-12">
 					<section class="panel" style="padding: 10px;">
 						<header class="panel-heading wht-bg">
 							<h4 class="gen-case">
 								<?= $title ?>

 							</h4>
 						</header>
 						<div class="panel-body minimal">
 							<div class="table-inbox-wrap ">
 								<?php if ($this->session->flashdata('pesan')) : ?>
 									<div class="alert alert-success" style="margin-top: 10px;"><b>Berhasil</b> di tambahkan</div>
 								<?php endif; ?>


 								<table class="table table-inbox table-hover" style="margin-top: 10px;">
 									<tbody>
 										<tr class="unread">
 											<th>No</th>
 											<th>Bulan/Tahun</th>
 											<th>Gaji Pokok</th>
 											<th>Tj tunjangan</th>
 											<th>Uang Makan</th>
 											<th>Potongan</th>
 											<th>Total Gaji</th>
 											<th>Cetak</th>
 										</tr>
 										<?php
											$jml_data = count($datas);
											if ($jml_data > 0) :
											?>


 											<?php foreach ($alphas as $key => $value) : ?>
 												<?php $alpha = $value->jml_potongan ?>
 											<?php endforeach ?>
 											<!-- <= $alpha ?> -->

 											<?php foreach ($datas as $key => $value) : ?>
 												<?php $potongan =  $value->alpha * $alpha ?>
 												<?php $total_gaji =  $value->gaji_pokok + $value->transport +  $value->uang_makan - $potongan ?>

 												<tr>
 													<td><?= ++$key ?></td>
 													<td><?= $value->bulan ?></td>
 													<td>Rp. <?= number_format($value->gaji_pokok, 0, ',', '.') ?></td>
 													<td>Rp. <?= number_format($value->transport, 0, ',', '.') ?></td>
 													<td>Rp. <?= number_format($value->uang_makan, 0, ',', '.') ?></td>
 													<td>Rp. <?= number_format($potongan, 0, ',', '.') ?></td>
 													<td>Rp. <?= number_format($total_gaji, 0, ',', '.') ?></td>
 													<td>
 														<a class="btn btn-primary" style="color: white;" target="_blank" href="<?= base_url('pegawai/DataGaji/printPdf?id=' . $value->id) ?>"> <i class="fa fa-plus"></i> Cetak gaji</a>

 													</td>
 												</tr>
 											<?php endforeach ?>
 										<?php else : ?>
 											<tr>
 												<td colspan="10" class="text-center">
 													<span class="badge badge-danger"> <i class="fa fa-info-circle"></i> Data Masih Kosong Silakang tambahkan data bulan dan tahun yang anda pilih</span>
 												</td>
 											</tr>
 										<?php endif ?>
 									</tbody>
 								</table>
 							</div>
 						</div>
 					</section>
 				</div>



 				<!-- /content-panel -->
 			</div>
 			<!-- /col-lg-4 -->
 		</div>

 		<!-- /row -->
 	</section>
 	<!-- /wrapper -->
 </section>