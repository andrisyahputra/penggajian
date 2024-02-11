<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?= $title ?></title>
	<style>
		body {
			font-family: Arial;
			color: black;
		}
	</style>
</head>

<body>
	<center>
		<h1>Pt Indonesia</h1>
		<h2>Daftar Gaji Pegawai</h2>
	</center>

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

	<table>
		<tr>
			<td>Bulan</td>
			<td>:</td>
			<td><?= $bulan ?></td>
		</tr>
		<tr>
			<td>Tahun</td>
			<td>:</td>
			<td><?= $tahun ?></td>
		</tr>
	</table>

	<table class="table table-inbox table-hover" style="margin-top: 10px;">
		<tbody>
			<tr class="unread">
				<th>No</th>
				<th>Nik</th>
				<th>Nama Pegawai</th>
				<th>Jenis Jabatan</th>
				<th>Hadir</th>
				<th>Sakit</th>
				<th>Absen</th>
			</tr>
			<?php
			$jml_data = count($absens);
			if ($jml_data > 0) :
			?>

				<!-- <= $alpha ?> -->

				<?php foreach ($absens as $key => $value) : ?>

					<tr>
						<td><?= ++$key ?></td>
						<td><?= $value->nik ?></td>
						<td><?= $value->nama_keryawan ?></td>
						<td><?= get_jabatan($value->id_jabatan) ?></td>
						<td><?= $value->hadir ?></td>
						<td><?= $value->sakit ?></td>
						<td><?= $value->alpha ?></td>
					</tr>
				<?php endforeach ?>
			<?php else : ?>
				<tr>
					<td colspan="10" class="text-center">
						<span class="badge badge-danger"> <i class="fa fa-info-circle"></i> Data Masih Kosong Silakang tambahkan data bulan dan tahun yang anda pilih</span>
					</td>
				</tr>
			<?php endif ?>
		</tbody>
	</table>


	<table width="100%">
		<tr>
			<td></td>
			<td width="200px">
				<p>Binjai, <?= date("D F Y") ?>
					<br>
					<br>
				<p>__________________________</p>
				</p>
			</td>
		</tr>
	</table>

</body>

</html>

<script>
	window.print();
</script>