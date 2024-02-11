 <!--main content start-->
 <section id="main-content">
 	<section class="wrapper">
 		<h3><i class="fa fa-angle-right"></i> <?= $title ?></h3>
 		<div class="row mt">
 			<div class="col-lg-12">

 				<div class="content-panel">
 					<h4><i class="fa fa-angle-right"></i> <?= $title ?></h4>
 					<section id="unseen" style="padding: 10px;">
 						<a class="btn btn-primary" href="<?= base_url('admin/DataJabatan/create') ?>"> <i class="fa fa-plus"></i> Tambah Data</a>

 						<?php if ($this->session->flashdata('pesan')) : ?>
 							<div class="alert alert-success" style="margin-top: 10px;"><b>Berhasil</b> di tambahkan</div>
 						<?php endif; ?>
 						<table class="table table-bordered table-striped table-condensed" style="margin-top: 10px;">
 							<thead>
 								<tr>
 									<th>No</th>
 									<th>Nama Jabatan</th>
 									<th>Gaji Pokok</th>
 									<th>Tj. Transport</th>
 									<th>Uang Makan</th>
 									<th>Total</th>
 									<th>Aksi</th>
 								</tr>
 							</thead>
 							<tbody>
 								<?php foreach ($datas as $key => $value) : ?>
 									<tr>
 										<td><?= ++$key ?></td>
 										<td><?= $value->nama_jabatan ?></td>
 										<td>Rp. <?= number_format($value->gaji_pokok, 0, ',', '.') ?></td>
 										<td>Rp. <?= number_format($value->transport, 0, ',', '.') ?></td>
 										<td>Rp. <?= number_format($value->uang_makan, 0, ',', '.') ?></td>
 										<td>Rp. <?= number_format($value->gaji_pokok + $value->transport + $value->uang_makan, 0, ',', '.') ?></td>
 										<td>
 											<center>
 												<a class="btn btn-primary" href="<?= base_url('admin/DataJabatan/update/' . $value->id) ?>"> <i class="fa fa-edit"></i></a>
 												|
 												<a class="btn btn-danger" href="<?= base_url('admin/DataJabatan/delete/' . $value->id) ?>" onclick="return confirm('Yakin Mau Di hapus..?')"><i class="fa fa-trash"></i></a>
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