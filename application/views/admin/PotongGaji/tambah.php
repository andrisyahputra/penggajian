 <section id="main-content">
 	<section class="wrapper">
 		<h3><i class="fa fa-angle-right"></i> Form Components</h3>
 		<!-- BASIC FORM ELELEMNTS -->
 		<div class="row mt">
 			<div class="col-lg-12">
 				<div class="form-panel">
 					<h4 class="mb"><i class="fa fa-angle-right"></i> <?= $title ?></h4>
 					<form class="form-horizontal style-form" method="post" action="<?= base_url() ?>admin/PotongGaji/create_aksi">

 						<div class="form-group">
 							<label class="col-sm-2 col-sm-2 control-label" for="potongan">Nama Potongan Gaji</label>
 							<div class="col-sm-10">
 								<input type="text" class="form-control" name="potongan" id="potongan" placeholder="Nama Potongan Gaji">

 								<?= form_error('potongan') ?>
 							</div>
 						</div>


 						<div class="form-group">
 							<label class="col-sm-2 col-sm-2 control-label" for="jml_potongan">Jumlah Potongan</label>
 							<div class="col-sm-10">
 								<input type="number" class="form-control" name="jml_potongan" id="jml_potongan" placeholder="Jumlah Potongan">

 								<?= form_error('jml_potongan') ?>
 							</div>
 						</div>

 						<button class="btn btn-sprimary" type="submit">Simpan</button>
 					</form>
 				</div>
 			</div>
 			<!-- col-lg-12-->
 		</div>
 	</section>
 </section>