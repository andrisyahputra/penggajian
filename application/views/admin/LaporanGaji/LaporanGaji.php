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
 		<!-- BASIC FORM VALIDATION -->
 		<div class="row mt">
 			<!--  DATE PICKERS -->
 			<div class="col-lg-5">
 				<div class="form-panel">
 					<form action="<?= base_url('admin/laporanGaji/cetakLaporanGaji') ?>" method="POST" class="form-horizontal style-form" target="_blank">
 						<div class="form-group">
 							<label class="control-label col-md-3">Bulan</label>
 							<div class="col-md-8">
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
 						<div class="form-group">
 							<label class="control-label col-md-3">Tahun</label>
 							<div class="col-md-8">
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
 						<button type="submit" class="btn btn-primary btn-lg btn-block"><i class="fa fa-print"></i> Cetak</button>
 					</form>
 				</div>
 				<!-- /form-panel -->
 			</div>
 			<!-- /col-lg-12 -->
 		</div>
 		<!-- /row -->
 	</section>
 	<!-- /wrapper -->
 </section>