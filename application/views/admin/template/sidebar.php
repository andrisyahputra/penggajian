<section id="container">
	<!-- **********************************************************************************************************************************************************
        TOP BAR CONTENT & NOTIFICATIONS
        *********************************************************************************************************************************************************** -->
	<!--header start-->
	<header class="header black-bg">
		<div class="sidebar-toggle-box">
			<div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
		</div>
		<!--logo start-->
		<a href="index.html" class="logo"><b>App <span>Penggajian</span></b></a>
		<!--logo end-->
		<div class="nav notify-row" id="top_menu">
			<!--  notification start -->
			<ul class="nav top-menu">
				<!-- settings start -->
				<li class="dropdown">
					<a data-toggle="dropdown" class="dropdown-toggle" href="index.html#">
						<i class="fa fa-tasks"></i>
						<span class="badge bg-theme">4</span>
					</a>
					<ul class="dropdown-menu extended tasks-bar">
						<div class="notify-arrow notify-arrow-green"></div>
						<li>
							<p class="green">You have 4 pending tasks</p>
						</li>
						<li>
							<a href="index.html#">
								<div class="task-info">
									<div class="desc">Dashio Admin Panel</div>
									<div class="percent">40%</div>
								</div>
								<div class="progress progress-striped">
									<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
										<span class="sr-only">40% Complete (success)</span>
									</div>
								</div>
							</a>
						</li>
						<li>
							<a href="index.html#">
								<div class="task-info">
									<div class="desc">Database Update</div>
									<div class="percent">60%</div>
								</div>
								<div class="progress progress-striped">
									<div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
										<span class="sr-only">60% Complete (warning)</span>
									</div>
								</div>
							</a>
						</li>
						<li>
							<a href="index.html#">
								<div class="task-info">
									<div class="desc">Product Development</div>
									<div class="percent">80%</div>
								</div>
								<div class="progress progress-striped">
									<div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
										<span class="sr-only">80% Complete</span>
									</div>
								</div>
							</a>
						</li>
						<li>
							<a href="index.html#">
								<div class="task-info">
									<div class="desc">Payments Sent</div>
									<div class="percent">70%</div>
								</div>
								<div class="progress progress-striped">
									<div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width: 70%">
										<span class="sr-only">70% Complete (Important)</span>
									</div>
								</div>
							</a>
						</li>
						<li class="external">
							<a href="#">See All Tasks</a>
						</li>
					</ul>
				</li>
				<!-- settings end -->
				<!-- inbox dropdown start-->
				<li id="header_inbox_bar" class="dropdown">
					<a data-toggle="dropdown" class="dropdown-toggle" href="index.html#">
						<i class="fa fa-envelope-o"></i>
						<span class="badge bg-theme">5</span>
					</a>
					<ul class="dropdown-menu extended inbox">
						<div class="notify-arrow notify-arrow-green"></div>
						<li>
							<p class="green">You have 5 new messages</p>
						</li>
						<li>
							<a href="index.html#">
								<span class="photo"><img alt="avatar" src="<?= base_url() ?>/assets/img/ui-zac.jpg"></span>
								<span class="subject">
									<span class="from">Zac Snider</span>
									<span class="time">Just now</span>
								</span>
								<span class="message">
									Hi mate, how is everything?
								</span>
							</a>
						</li>
						<li>
							<a href="index.html#">
								<span class="photo"><img alt="avatar" src="<?= base_url() ?>/assets/img/ui-divya.jpg"></span>
								<span class="subject">
									<span class="from">Divya Manian</span>
									<span class="time">40 mins.</span>
								</span>
								<span class="message">
									Hi, I need your help with this.
								</span>
							</a>
						</li>
						<li>
							<a href="index.html#">
								<span class="photo"><img alt="avatar" src="<?= base_url() ?>/assets/img/ui-danro.jpg"></span>
								<span class="subject">
									<span class="from">Dan Rogers</span>
									<span class="time">2 hrs.</span>
								</span>
								<span class="message">
									Love your new Dashboard.
								</span>
							</a>
						</li>
						<li>
							<a href="index.html#">
								<span class="photo"><img alt="avatar" src="<?= base_url() ?>/assets/img/ui-sherman.jpg"></span>
								<span class="subject">
									<span class="from">Dj Sherman</span>
									<span class="time">4 hrs.</span>
								</span>
								<span class="message">
									Please, answer asap.
								</span>
							</a>
						</li>
						<li>
							<a href="index.html#">See all messages</a>
						</li>
					</ul>
				</li>
				<!-- inbox dropdown end -->
				<!-- notification dropdown start-->
				<li id="header_notification_bar" class="dropdown">
					<a data-toggle="dropdown" class="dropdown-toggle" href="index.html#">
						<i class="fa fa-bell-o"></i>
						<span class="badge bg-warning">7</span>
					</a>
					<ul class="dropdown-menu extended notification">
						<div class="notify-arrow notify-arrow-yellow"></div>
						<li>
							<p class="yellow">You have 7 new notifications</p>
						</li>
						<li>
							<a href="index.html#">
								<span class="label label-danger"><i class="fa fa-bolt"></i></span>
								Server Overloaded.
								<span class="small italic">4 mins.</span>
							</a>
						</li>
						<li>
							<a href="index.html#">
								<span class="label label-warning"><i class="fa fa-bell"></i></span>
								Memory #2 Not Responding.
								<span class="small italic">30 mins.</span>
							</a>
						</li>
						<li>
							<a href="index.html#">
								<span class="label label-danger"><i class="fa fa-bolt"></i></span>
								Disk Space Reached 85%.
								<span class="small italic">2 hrs.</span>
							</a>
						</li>
						<li>
							<a href="index.html#">
								<span class="label label-success"><i class="fa fa-plus"></i></span>
								New User Registered.
								<span class="small italic">3 hrs.</span>
							</a>
						</li>
						<li>
							<a href="index.html#">See all notifications</a>
						</li>
					</ul>
				</li>
				<!-- notification dropdown end -->
			</ul>
			<!--  notification end -->
		</div>
		<div class="top-menu">
			<ul class="nav pull-right top-menu">

				<li><a class=" logout" href="<?= base_url('Home/logout') ?>"><i class="fa fa-sign-out"></i> Logout</a></li>
			</ul>
		</div>
	</header>
	<!--header end-->
	<!-- **********************************************************************************************************************************************************
        MAIN SIDEBAR MENU
        *********************************************************************************************************************************************************** -->
	<!--sidebar start-->
	<aside>
		<div id="sidebar" class="nav-collapse " style="z-index: 999;">
			<!-- sidebar menu start-->
			<ul class="sidebar-menu" id="nav-accordion">
				<p class="centered"><a href="profile.html"><img src="<?= base_url('assets/img/foto/' . $this->session->userdata('foto')) ?>" class="img-circle" width="80"></a></p>
				<h5 class="centered"><?= ucwords($this->session->userdata('nama_pegawai')) ?></h5>
				<li class="mt">
					<a class="active" href="<?= base_url() ?>admin/dashboard">
						<i class="fa fa-dashboard"></i>
						<span>Dashboard</span>
					</a>
				</li>
				<li class="sub-menu">
					<a href="javascript:;">
						<i class="fa fa-database"></i>
						<span>Master Data</span>
						<i class="fa fa-caret-down pull-right"></i>
					</a>
					<ul class="sub">
						<li><a href="<?= base_url() ?>admin/dataPegawai">Data Pegawai</a></li>
						<li><a href="<?= base_url() ?>admin/dataJabatan">Data Jabatan</a></li>
					</ul>
				</li>

				<li class="sub-menu">
					<a href="javascript:;">
						<i class="fa fa-money"></i>
						<span>Transaksi</span>
						<i class="fa fa-caret-down pull-right"></i>
					</a>
					<ul class="sub">
						<li><a href="<?= base_url() ?>admin/DataAbsensi">Data Absensi</a></li>
						<li><a href="<?= base_url() ?>admin/PotongGaji">Potongan Gaji</a></li>
						<li><a href="<?= base_url() ?>admin/DataGaji">Data Gaji</a></li>
					</ul>
				</li>
				<li class="sub-menu">
					<a href="javascript:;">
						<i class="fa fa-print"></i>
						<span>Laopran</span>
						<i class="fa fa-caret-down pull-right"></i>
					</a>
					<ul class="sub">
						<li><a href="<?= base_url() ?>admin/LaporanGaji">Laporan Gaji</a></li>
						<li><a href="<?= base_url() ?>admin/LaporanAbsensi">Laporan Absensi</a></li>
						<li><a href="<?= base_url() ?>admin/SlipGaji">Slip Gaji</a></li>
					</ul>
				</li>

				<li>
					<a href="<?= base_url() ?>admin/GantiPassword">
						<i class="fa fa-lock"></i>
						<span>Ubah Password </span>
					</a>
				</li>

			</ul>
			<!-- sidebar menu end-->
		</div>
	</aside>