 <!--main content start-->
 <section id="main-content">
 	<section class="wrapper">
 		<h3><i class="fa fa-angle-right"></i> <?= $title ?></h3>
 		<div class="row mt">
 			<div class="col-lg-12">

 				<div class="content-panel">
 					<h4><i class="fa fa-angle-right"></i> <?= $title ?></h4>
 					<section id="unseen" style="padding: 10px;">
 						<a class="btn btn-primary" href="<?= base_url('admin/DataPegawai/create') ?>"> <i class="fa fa-plus"></i> Tambah Data</a>

 						<?php if ($this->session->flashdata('pesan')) : ?>
 							<div class="alert alert-success" style="margin-top: 10px;"><b>Berhasil</b> di tambahkan</div>
 						<?php endif; ?>
 						<table class="table table-bordered table-striped table-condensed" style="margin-top: 10px;">
 							<thead>
 								<tr>
 									<th>No</th>
 									<th>Nik</th>
 									<th>Nama Pegawai</th>
 									<th>Jenis Kelamin</th>
 									<th>Jabatan</th>
 									<th>Tanggal Masuk</th>
 									<th>Status</th>
 									<th>Hak Akses</th>
 									<th>Foto</th>
 									<th>Aksi</th>
 								</tr>
 							</thead>
 							<tbody>
 								<?php foreach ($datas as $key => $value) : ?>
 									<tr>
 										<td><?= ++$key ?></td>
 										<td><?= $value->nik ?></td>
 										<td><?= $value->nama_pegawai ?></td>
 										<td><?= gender($value->jk) ?></td>
 										<td><?= ucwords(get_jabatan($value->id_jabatan)) ?></td>
 										<td><?= date("d F Y", strtotime($value->tgl_masuk)) ?></td>
 										<td><?= $value->status ?></td>
 										<td><?= ucwords(get_akses($value->hak_akses)) ?></td>
 										<td>
 											<img src="<?= base_url('assets/img/foto/' . $value->foto) ?>" alt="<?= $value->foto ?>" width="100px">
 										</td>
 										<td>
 											<center>
 												<a class="btn btn-primary" href="<?= base_url('admin/DataPegawai/update/' . $value->id) ?>"> <i class="fa fa-edit"></i></a>
 												|
 												<a class="btn btn-danger" href="<?= base_url('admin/DataPegawai/delete/' . $value->id) ?>" onclick="return confirm('Yakin Mau Di hapus..?')"><i class="fa fa-trash"></i></a>
 											</center>
 										</td>
 									</tr>
 								<?php endforeach ?>

 							</tbody>
 						</table>
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