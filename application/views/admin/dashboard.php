<!--sidebar end-->
<!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
<!--main content start-->
<section id="main-content">
	<section class="wrapper">
		<div class="row">
			<div class="col-lg-9 main-chart">
				<!--CUSTOM CHART START -->
				<div class="border-head">
					<h3><?= $title ?></h3>
				</div>
				<div class="custom-bar-chart">
					<ul class="y-axis">
						<li><span>10.000</span></li>
						<li><span>8.000</span></li>
						<li><span>6.000</span></li>
						<li><span>4.000</span></li>
						<li><span>2.000</span></li>
						<li><span>0</span></li>
					</ul>
					<div class="bar">
						<div class="title">JAN</div>
						<div class="value tooltips" data-original-title="8.500" data-toggle="tooltip" data-placement="top">85%</div>
					</div>
					<div class="bar ">
						<div class="title">FEB</div>
						<div class="value tooltips" data-original-title="5.000" data-toggle="tooltip" data-placement="top">50%</div>
					</div>
					<div class="bar ">
						<div class="title">MAR</div>
						<div class="value tooltips" data-original-title="6.000" data-toggle="tooltip" data-placement="top">60%</div>
					</div>
					<div class="bar ">
						<div class="title">APR</div>
						<div class="value tooltips" data-original-title="4.500" data-toggle="tooltip" data-placement="top">45%</div>
					</div>
					<div class="bar">
						<div class="title">MAY</div>
						<div class="value tooltips" data-original-title="3.200" data-toggle="tooltip" data-placement="top">32%</div>
					</div>
					<div class="bar ">
						<div class="title">JUN</div>
						<div class="value tooltips" data-original-title="6.200" data-toggle="tooltip" data-placement="top">62%</div>
					</div>
					<div class="bar">
						<div class="title">JUL</div>
						<div class="value tooltips" data-original-title="7.500" data-toggle="tooltip" data-placement="top">75%</div>
					</div>
				</div>

				<!-- data -->
				<div class="row mt">
					<!-- SERVER STATUS PANELS -->
					<div class="col-md-3 col-sm-3 mb ">
						<div class="grey-panel">
							<div class="grey-header">
								<h5>Data Pegawai</h5>
							</div>
							<i class="fa fa-users fa-2x"></i>
							<h1><?= $dataPegawai ?></h1>
						</div>
						<!-- /grey-panel -->
					</div>
					<div class="col-md-3 col-sm-3 mb">
						<div class="grey-panel ">
							<div class="grey-header">
								<h5>Data Admin</h5>
							</div>
							<i class="fa fa-users fa-2x"></i>
							<h1><?= $dataAdmin ?></h1>
						</div>
						<!-- /grey-panel -->
					</div>
					<div class="col-md-3 col-sm-3 mb">
						<div class="grey-panel ">
							<div class="grey-header">
								<h5>Data Jabatan</h5>
							</div>
							<i class="fa fa-users fa-2x"></i>
							<h1><?= $dataJabatan ?></h1>
						</div>
						<!-- /grey-panel -->
					</div>
					<div class="col-md-3 col-sm-3 mb">
						<div class="grey-panel ">
							<div class="grey-header">
								<h5>Data Kehadiran</h5>
							</div>
							<i class="fa fa-users fa-2x"></i>
							<h1><?= $dataKehadiran ?></h1>
						</div>
						<!-- /grey-panel -->
					</div>

					<!-- /col-md-4 -->
				</div>
				<!-- akhir data -->

				<!-- / calendar -->
			</div>
			<!-- /col-lg-3 -->
		</div>
		<!-- /row -->
	</section>
</section>
<!--main content end-->
<!--footer start-->