 <section id="main-content">
 	<section class="wrapper">
 		<h3><i class="fa fa-angle-right"></i> Form Components</h3>
 		<!-- BASIC FORM ELELEMNTS -->
 		<div class="row mt">
 			<div class="col-lg-12">
 				<div class="form-panel">
 					<h4 class="mb"><i class="fa fa-angle-right"></i> <?= $title ?></h4>

 					<?php foreach ($data as $key => $value) : ?>


 						<form class="form-horizontal style-form" method="post" action="<?= base_url() ?>admin/DataJabatan/update_aksi">
 							<input type="hidden" class="form-control" name="id" value="<?= $value->id ?>" placeholder="Nama Jabatan">

 							<div class="form-group">
 								<label class="col-sm-2 col-sm-2 control-label" for="nama_jabatan">Nama Jabatan</label>
 								<div class="col-sm-10">
 									<input type="text" class="form-control" name="nama_jabatan" id="nama_jabatan" value="<?= $value->nama_jabatan ?>" placeholder="Nama Jabatan">

 									<?= form_error('nama_jabatan') ?>
 								</div>
 							</div>

 							<div class="form-group">
 								<label class="col-sm-2 col-sm-2 control-label" for="gaji_pokok">Gaji Pokok</label>
 								<div class="col-sm-10">
 									<input type="number" class="form-control" name="gaji_pokok" id="gaji_pokok" value="<?= $value->gaji_pokok ?>" placeholder="Gaji Pokok">

 									<?= form_error('gaji_pokok') ?>
 								</div>
 							</div>

 							<div class="form-group">
 								<label class="col-sm-2 col-sm-2 control-label" for="transport">Transport</label>
 								<div class="col-sm-10">
 									<input type="number" class="form-control" name="transport" id="transport" value="<?= $value->transport ?>" placeholder="Transport">

 									<?= form_error('transport') ?>
 								</div>
 							</div>

 							<div class="form-group">
 								<label class="col-sm-2 col-sm-2 control-label" for="uang_makan">Uang Makanan</label>
 								<div class="col-sm-10">
 									<input type="number" class="form-control" name="uang_makan" id="uang_makan" value="<?= $value->uang_makan ?>" placeholder="Uang Makanan">

 									<?= form_error('uang_makan') ?>
 								</div>
 							</div>
 						<?php endforeach ?>
 						<button class="btn btn-sprimary" type="submit">Simpan</button>
 						</form>
 				</div>
 			</div>
 			<!-- col-lg-12-->
 		</div>
 	</section>
 </section>