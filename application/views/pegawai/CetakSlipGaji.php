<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?= $title ?></title>
	<style>
		body {
			font-family: Arial;
			color: grey;
		}
	</style>
</head>

<body>
	<center>
		<h1>Pt Indonesia</h1>
		<h2>Daftar Gaji Pegawai</h2>
		<hr style="width: 50%; border-width: 5px; color: black;">
	</center>


	?>
	<?php foreach ($alphas as $key => $value) : ?>
		<?php $alpha = $value->jml_potongan ?>
	<?php endforeach ?>


	<?php foreach ($data as $key => $value) : ?>
		<?php $potongan =  $value->alpha * $alpha ?>
		<?php $total_gaji =  $value->gaji_pokok + $value->transport +  $value->uang_makan - $potongan ?>

		<table>
			<tr>
				<td>Pegawai</td>
				<td>:</td>
				<td><?= $value->nama_pegawai ?></td>
			</tr>
			<tr>
				<td>Nik</td>
				<td>:</td>
				<td><?= $value->nik ?></td>
			</tr>
			<tr>
				<td>Jabatan</td>
				<td>:</td>
				<td><?= get_jabatan($value->id_jabatan) ?></td>
			</tr>
			<tr>
				<td>Bulan Tahun</td>
				<td>:</td>
				<td><?= substr($value->bulan, 0, 2) ?></td>
			</tr>
			<tr>
				<td>Tahun</td>
				<td>:</td>
				<td><?= substr($value->bulan, 2, 4) ?></td>
			</tr>
		</table>

		<table class="table table-inbox table-hover" style="margin-top: 10px;">
			<tbody>
				<tr class="unread">
					<th>No</th>
					<th>Keterangan</th>
					<th>Jumlah</th>
				</tr>
				<?php
				$jml_data = count($data);
				if ($jml_data > 0) :

				?>




					<!-- <= $alpha ?> -->


					<tr>
						<td><?= ++$key ?></td>
						<td>Gaji Pokok</td>
						<td>Rp. <?= number_format($value->gaji_pokok, 0, ',', '.') ?></td>
					</tr>
					<tr>
						<td><?= ++$key ?></td>
						<td>Tunjangan Transport</td>
						<td>Rp. <?= number_format($value->transport, 0, ',', '.') ?></td>
					</tr>
					<tr>
						<td><?= ++$key ?></td>
						<td>Uang Makan</td>
						<td>Rp. <?= number_format($value->uang_makan, 0, ',', '.') ?></td>
					</tr>
					<tr>
						<td><?= ++$key ?></td>
						<td>Jumlah Potongan</td>
						<td>Rp. <?= number_format($potongan, 0, ',', '.') ?></td>
					</tr>
					<tr>
						<td colspan="2" style="text-align: right;">TOTAL GAJI</td>
						<td>Rp. <?= number_format($total_gaji, 0, ',', '.') ?></td>
					</tr>
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
				<td>
					<p>Pegawai</p>
					<br>
					<br>
					<p><b>(<?= $value->nama_pegawai ?>)</b></p>
				</td>

				<td width="200px">
					<p>Binjai, <?= date("D F Y") ?> Financial,</p>
					<br>
					<br>
					<p><b>(_____________)</b></p>

				</td>
			</tr>
		</table>
	<?php endforeach ?>

</body>

</html>

<script>
	window.print();
</script>