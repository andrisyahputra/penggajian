 <!--main content start-->
 <?php
	if (isset($_GET['q']) && isset($_GET['bulan']) && isset($_GET['tahun'])) {
		$q = $_GET['q'];
		$bulan = $_GET['bulan'];
		$tahun = $_GET['tahun'];
	} elseif (isset($_GET['bulan']) && isset($_GET['tahun'])) {
		$q = '';
		$bulan = $_GET['bulan'];
		$tahun = $_GET['tahun'];
	} else {
		$q = '';
		$bulan = date('m');
		$tahun = date('Y');
	}


	?>
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
 							<div class="mail-option">

 								<form action="" method="get">
 									<div class="row">
 										<div class="col-sm-3">

 											<label class="col-sm-2" style="margin-top: 10px; text-align: end;" for="q">Cari :</label>
 											<div class="col-sm-10" style="padding-left: 0;">

 												<input type="text" class="form-control" name="q" id="q" placeholder="Search Mail">
 											</div>
 										</div>
 										<div class="col-sm-3">

 											<label class="col-sm-2" style="margin-top: 10px; text-align: end;" for="buan">Bulan :</label>
 											<div class="col-sm-10" style="padding-left: 0;">
 												<select name="bulan" id="bulan" class="form-control">
 													<option value="" <?= $bulan == '' ? 'selected' : '' ?>>~ Pilih Bulan ~</option>
 													<option value="01" <?= $bulan == '01' ? 'selected' : '' ?>>Januari</option>
 													<option value="02" <?= $bulan == '02' ? 'selected' : '' ?>>Februari</option>
 													<option value="03" <?= $bulan == '03' ? 'selected' : '' ?>>Maret</option>
 													<option value="04" <?= $bulan == '04' ? 'selected' : '' ?>>April</option>
 													<option value="05" <?= $bulan == '05' ? 'selected' : '' ?>>Mei</option>
 													<option value="06" <?= $bulan == '06' ? 'selected' : '' ?>>Juni</option>
 													<option value="07" <?= $bulan == '07' ? 'selected' : '' ?>>July</option>
 													<option value="08" <?= $bulan == '08' ? 'selected' : '' ?>>Agustus</option>
 													<option value="09" <?= $bulan == '09' ? 'selected' : '' ?>>September</option>
 													<option value="10" <?= $bulan == '10' ? 'selected' : '' ?>>Oktober</option>
 													<option value="11" <?= $bulan == '11' ? 'selected' : '' ?>>November</option>
 													<option value="12" <?= $bulan == '12' ? 'selected' : '' ?>>Desember</option>
 												</select>
 											</div>
 										</div>
 										<div class="col-sm-3">
 											<label class="col-sm-2" style="margin-top: 10px; text-align: end;" for="tahun">Tahun :</label>
 											<div class="col-sm-10" style="padding-left: 0;">
 												<select name="tahun" id="tahun" class="form-control">
 													<option value="">~ Pilih tahun ~</option>
 													<?php
														$tahun_now = date("Y");
														for ($i = 2022; $i < $tahun_now + 5; $i++) :
														?>
 														<option value="<?= $i ?>" <?= $tahun == $i ? 'selected' : '' ?>><?= $i ?></option>
 													<?php endfor; ?>
 												</select>
 											</div>
 										</div>

 										<div class="col-sm-3">
 											<button type="submit" class="btn btn-success">
 												<i class="fa fa-eye"></i> Cari
 											</button>

 											<?php
												$jml_data = count($datas);
												if ($jml_data > 0) :
												?>
 												<a class="btn btn-primary" target="_blank" href="<?= base_url('admin/DataGaji/printPdf?bulan=' . $bulan . '&tahun=' . $tahun) ?>" style="margin-left: 10px;"> <i class="fa fa-plus"></i> Cetak Daftar gaji</a>
 											<?php else : ?>

 												<a class="btn btn-primary" data-toggle="modal" href='#modal-id'><i class="fa fa-plus"></i> Cetak Daftar gaji</a>


 											<?php endif; ?>
 										</div>
 									</div>
 								</form>
 							</div>
 							<div class="table-inbox-wrap ">
 								<?php if ($this->session->flashdata('pesan')) : ?>
 									<div class="alert alert-success" style="margin-top: 10px;"><b>Berhasil</b> di tambahkan</div>
 								<?php endif; ?>



 								<div class="alert alert-info" style="margin-top: 10px;">Menampilkan data Gaji pegawai <b><?= $q ?></b> bulan <b><?= $bulan ?></b> tahun <b><?= $tahun ?></b></div>


 								<table class="table table-inbox table-hover" style="margin-top: 10px;">
 									<tbody>
 										<tr class="unread">
 											<th>No</th>
 											<th>Nik</th>
 											<th>Nama Pegawai</th>
 											<th>Jenis Kelamin</th>
 											<th>Jabatan</th>
 											<th>Gaji Pokok</th>
 											<th>Tj tunjangan</th>
 											<th>Uang Makan</th>
 											<th>Potongan</th>
 											<th>Total Gaji</th>
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
 													<td><?= $value->nik ?></td>
 													<td><?= $value->nama_pegawai ?></td>
 													<td><?= gender($value->jk) ?></td>
 													<td><?= get_jabatan($value->id_jabatan) ?></td>
 													<td>Rp. <?= number_format($value->gaji_pokok, 0, ',', '.') ?></td>
 													<td>Rp. <?= number_format($value->transport, 0, ',', '.') ?></td>
 													<td>Rp. <?= number_format($value->uang_makan, 0, ',', '.') ?></td>
 													<td>Rp. <?= number_format($potongan, 0, ',', '.') ?></td>
 													<td>Rp. <?= number_format($total_gaji, 0, ',', '.') ?></td>
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




 <div class="modal fade" id="modal-id">
 	<div class="modal-dialog">
 		<div class="modal-content">
 			<div class="modal-header">
 				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
 				<h4 class="modal-title">Informasi</h4>
 			</div>
 			<div class="modal-body">
 				Data Gaji Masih Kosong. Silahkan input absesni terlebh dahulu pada ulan dan tahun di pilih.
 			</div>
 			<div class="modal-footer">
 				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
 				<button type="button" class="btn btn-primary">Save changes</button>
 			</div>
 		</div>
 	</div>
 </div>