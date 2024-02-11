<?php

function ubahAngkaToBulan($bulanAngka)
{
	$bulanArray = [
		'0' => '',
		'1' => 'Januari',
		'2' => 'Februari',
		'3' => 'Maret',
		'4' => 'April',
		'5' => 'Mei',
		'6' => 'Juni',
		'7' => 'Juli',
		'8' => 'Agustus',
		'9' => 'September',
		'10' => 'Oktober',
		'11' => 'November',
		'12' => 'Desember'
	];

	return $bulanArray[$bulanAngka + 0];
}

function gender($id)
{
	switch ($id) {
		case "L":
			return "Laki-Laki";
			break;
		case "P":
			return "Perempuan";
			break;
		default:
			return "Belum Jelas";
			break;
	}
}

function get_jabatan($id)
{
	$_this = &get_instance();

	if ($id) {
		$sql = "SELECT nama_jabatan
        FROM data_jabatan
        WHERE id = '{$id}'
        ORDER BY id DESC
				LIMIT 1";

		// Eksekusi kueri
		$row = $_this->db->query($sql)->row();

		if ($row) {
			return $row->nama_jabatan;
		}
	}

	return '';
}
function get_akses($id)
{
	$_this = &get_instance();

	if ($id) {
		$sql = "SELECT keterangan
        FROM data_hak_akses
        WHERE hak_akses = '{$id}'
        ORDER BY id DESC
				LIMIT 1";

		// Eksekusi kueri
		$row = $_this->db->query($sql)->row();

		if ($row) {
			return $row->keterangan;
		}
	}

	return '';
}
