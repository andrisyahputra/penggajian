<section id="main-content">
	<section class="wrapper">
		<h3><i class="fa fa-angle-right"></i> <?= $title ?></h3>
		<!-- BASIC FORM VALIDATION -->
		<div class="row mt">
			<!--  DATE PICKERS -->
			<div class="col-lg-5">
				<div class="form-panel">
					<h4 class="mb"><i class="fa fa-angle-right"></i> <?= $title ?></h4>
					<form action="<?= base_url('admin/GantiPassword/GantiPasswordAksi') ?>" method="POST" class="form-horizontal style-form">
						<div class="form-group">
							<label class="control-label col-md-3" for="password">Password Baru</label>
							<div class="col-md-8">
								<div class="form-group  <?= form_error('password') ? 'has-error' : '' ?>">
									<input type="password" name="password" id="password" placeholder="Password Baru" class="form-control">
									<span class="text-danger"><?= form_error('password') ?></span>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3" for="password_ulangi">Ulangi Password</label>
							<div class="col-md-8">
								<div class="form-group  <?= form_error('password_ulangi') ? 'has-error' : '' ?>">
									<input type="password" name="password_ulangi" id="password_ulangi" placeholder="Password Baru" class="form-control">
									<span class="text-danger"><?= form_error('password_ulangi') ?></span>
								</div>
							</div>
						</div>
						<button type="submit" class="btn btn-primary btn-lg btn-block"><i class="fa fa-lock"></i> Ganti Password</button>
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