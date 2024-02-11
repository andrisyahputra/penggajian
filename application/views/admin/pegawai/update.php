 <section id="main-content">
 	<section class="wrapper">
 		<h3><i class="fa fa-angle-right"></i> Form Components</h3>
 		<!-- BASIC FORM ELELEMNTS -->
 		<div class="row mt">
 			<form class="form-horizontal style-form" method="post" action="<?= base_url() ?>admin/DataPegawai/update_aksi" enctype="multipart/form-data">
 				<div class="col-sm-7">
 					<div class="form-panel">
 						<h4 class="mb"><i class="fa fa-angle-right"></i> <?= $title ?></h4>

 						<?php foreach ($data as $key => $value) : ?>



 							<input type="hidden" class="form-control" name="id" value="<?= $value->id ?>">
 							<div class="form-group">
 								<label class="col-sm-2 col-sm-2 control-label" for="nik">Nik Pegawai</label>
 								<div class="col-sm-10">
 									<input type="number" class="form-control" name="nik" id="nik" value="<?= $value->nik ?>" placeholder="Nik Pegawai">

 									<?= form_error('nik') ?>
 								</div>
 							</div>

 							<div class="form-group">
 								<label class="col-sm-2 col-sm-2 control-label" for="nama_pegawai">Nama Pegawai</label>
 								<div class="col-sm-10">
 									<input type="text" class="form-control" name="nama_pegawai" id="nama_pegawai" value="<?= $value->nama_pegawai ?>" placeholder="Nama Pegawai">

 									<?= form_error('nama_pegawai') ?>
 								</div>
 							</div>

 							<div class="form-group">
 								<label class="col-sm-2 col-sm-2 control-label" for="jk">Gaji Pokok</label>
 								<div class="col-sm-10">

 									<select name="jk" id="jk" class="form-control">
 										<option disabled <?= $value->jk == '' ? 'selected' : '' ?>>Pilih Jenis Kelamin</option>
 										<option value="L" <?= $value->jk == 'L' ? 'selected' : '' ?>>Laki Laki</option>
 										<option value="P" <?= $value->jk == 'P' ? 'selected' : '' ?>>Perempuan</option>
 									</select>
 									<?= form_error('jk') ?>
 								</div>
 							</div>

 							<div class="form-group">
 								<label class="col-sm-2 col-sm-2 control-label" for="id_jabatan">Gaji Pokok</label>
 								<div class="col-sm-10">

 									<select name="id_jabatan" id="id_jabatan" class="form-control">
 										<option disabled selected>Pilih Jabatan</option>
 										<?php foreach ($jabatans as $key => $jabatan) : ?>
 											<option value="<?= $jabatan->id ?>" <?= $value->id_jabatan == $jabatan->id ? 'selected' : '' ?>><?= $jabatan->nama_jabatan ?></option>
 										<?php endforeach ?>
 									</select>
 									<?= form_error('jabatan') ?>
 								</div>
 							</div>

 							<div class="form-group">
 								<label class="col-sm-2 col-sm-2 control-label" for="status">Status Pegawai</label>
 								<div class="col-sm-10">

 									<select name="status" id="status" class="form-control">
 										<option disabled <?= $value->status == '' ? 'selected' : '' ?>>Pilih Status</option>
 										<option value="karyawan_tetap" <?= $value->status == 'karyawan_tetap' ? 'selected' : '' ?>>Karyawan Tetap</option>
 										<option value="karyawan_kontrak" <?= $value->status == 'karyawan_tetap' ? 'selected' : '' ?>>Karyawan Kontrak</option>
 									</select>
 									<?= form_error('status') ?>
 								</div>
 							</div>


 							<div class="form-group">
 								<label class="col-sm-2 col-sm-2 control-label" for="tgl_masuk">Tanggal Masuk</label>
 								<div class="col-sm-10">
 									<input type="date" class="form-control" name="tgl_masuk" id="tgl_masuk" value="<?= $value->tgl_masuk ?>" placeholder="Uang Makanan">

 									<?= form_error('tgl_masuk') ?>
 								</div>
 							</div>

 							<div class="form-group">
 								<label class="col-sm-2 col-sm-2 control-label" for="id_hak_akses">Hak Akses</label>
 								<div class="col-sm-10">
 									<select name="id_hak_akses" id="id_hak_akses" class="form-control">
 										<option disabled selected>Pilih Hak Akses</option>
 										<?php foreach ($aksess as $key => $akses) : ?>
 											<option value="<?= $akses->hak_akses ?>" <?= $value->hak_akses == $akses->hak_akses ? 'selected' : '' ?>><?= ucwords($akses->keterangan) ?></option>
 										<?php endforeach ?>
 									</select>
 									<?= form_error('id_hak_akses') ?>
 								</div>
 							</div>

 							<div class="form-group">
 								<label class="col-sm-2 col-sm-2 control-label" for="foto">Foto pegawai</label>
 								<div class="col-sm-10">
 									<input type="file" class="form-control" name="foto" id="foto">

 									<?= form_error('foto') ?>
 								</div>
 							</div>


 						<?php endforeach; ?>
 					</div>
 				</div>
 				<div class="col-sm-5">
 					<div class="form-panel">

 						<div class="form-group">
 							<label class="col-sm-2 col-sm-2 control-label" for="username">Username</label>
 							<div class="col-sm-10">
 								<input type="text" class="form-control" name="username" id="username" value="<?= $value->username ?>" placeholder="Username">

 								<?= form_error('username') ?>
 							</div>
 						</div>

 						<div class="form-group">
 							<label class="col-sm-2 col-sm-2 control-label" for="password">Password</label>
 							<div class="col-sm-10">
 								<input type="password" class="form-control" name="password" id="password" placeholder="Password Baru">

 								<?= form_error('password') ?>
 							</div>
 						</div>




 						<button class="btn btn-primary" type="submit">Simpan</button>
 					</div>
 				</div>
 			</form>
 			<!-- col-lg-12-->
 		</div>
 	</section>
 </section>