<?php foreach ($data as $key => $value) : ?>
	<section id="main-content">
		<section class="wrapper">
			<div class="row mt">
				<div class="form-panel">
					<!--CUSTOM CHART START -->
					<div class="border-head">
						<h3><?= $title ?></h3>
					</div>
					<div class="alert alert-success font-weight-bold ">
						Selamat Anda Login Sebagai Pegawai
					</div>
				</div>

				<div class="col-lg-12">
					<div class="row content-panel">
						<h3 style="margin-left: 10px;"><i class="fa fa-angle-right"></i> Data Pegawai</h3>
						<div class="col-md-4 profile-text mt mb centered">
							<div class="right-divider hidden-sm hidden-xs">
								<h4><?= date("d F Y", strtotime($value->tgl_masuk)) ?></h4>
								<h6>Tanggal Masuk</h6>
								<h4><?= $value->status ?></h4>
								<h6>Status</h6>
								<h4><?= gender($value->jk) ?></h4>
								<h6>Jenis Kelamin</h6>
							</div>
						</div>
						<!-- /col-md-4 -->
						<div class="col-md-4 profile-text">
							<h3><?= $value->nama_pegawai ?></h3>
							<h6><?= ucwords(get_jabatan($value->id_jabatan)) ?></h6>
							<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC.</p>
							<br>
							<p><button class="btn btn-theme"><i class="fa fa-envelope"></i> Send Message</button></p>
						</div>
						<!-- /col-md-4 -->
						<div class="col-md-4 centered">
							<div class="profile-pic">
								<p><img src="<?= base_url('assets/img/foto/' . $value->foto) ?>" class="img-circle"></p>
								<p>
									<button class="btn btn-theme"><i class="fa fa-check"></i> Follow</button>
									<button class="btn btn-theme02">Add</button>
								</p>
							</div>
						</div>
						<!-- /col-md-4 -->
					</div>


				</div>


		</section>
	</section>

<?php endforeach ?>