<?php
class LaporanGaji extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		if ($this->session->userdata('hak_akses') != 1) {
			$this->session->set_flashdata('pesan', '
			<div class="alert alert-danger">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<strong>Anda belum Login</strong>
			</div>
			');
			redirect('Home');
		}
	}
	public function index()
	{
		$data['title'] = 'Data Gaji';
		// $data['datas'] = $this->PenggajianModel->get_data('data_pegawai')->result();
		if (isset($_GET['q']) && isset($_GET['bulan']) && isset($_GET['tahun'])) {
			$q = $_GET['q'];
			$bulan = $_GET['bulan'];
			$tahun = $_GET['tahun'];
			$bulanTahun = $bulan . $tahun;
		} elseif (isset($_GET['bulan']) && isset($_GET['tahun'])) {
			$q = '';
			$bulan = $_GET['bulan'];
			$tahun = $_GET['tahun'];
			$bulanTahun = $bulan . $tahun;
		} else {
			$q = '';
			$bulan = date('m');
			$tahun = date('Y');
			$bulanTahun = $bulan . $tahun;
		}
		// var_dump($bulanTahun);
		// die;
		$data['alphas'] = $this->db->query("SELECT * FROM potongan_gaji WHERE id = 2")->result();
		// $data['gajis'] = $this->PenggajianModel->get_data('potongan_gaji')->result();
		$data['datas'] = $this->db->query("SELECT 
		data_kehadiran.*, 
		data_pegawai.*,
		 data_jabatan.* 
		 FROM data_pegawai 
		 JOIN data_kehadiran ON  data_kehadiran.nik = data_pegawai.nik 
		 JOIN data_jabatan ON data_jabatan.id = data_kehadiran.id_jabatan
		 WHERE data_kehadiran.bulan = '$bulanTahun' 
		ORDER BY data_pegawai.id DESC
		 ")->result();
		// var_dump($data['datas']);
		// die;
		$this->load->view('admin/template/header', $data);
		$this->load->view('admin/template/sidebar', $data);
		$this->load->view('admin/LaporanGaji/LaporanGaji', $data);
		$this->load->view('admin/template/footer', $data);
	}


	public function cetakLaporanGaji()
	{
		$data['title'] = 'Laporan Data Gaji';
		// $data['datas'] = $this->PenggajianModel->get_data('data_pegawai')->result();
		$bulan = $this->input->post('bulan');
		$tahun = $this->input->post('tahun');
		$bulanTahun = $bulan . $tahun;
		// var_dump($bulanTahun);
		// die;
		$data['alphas'] = $this->db->query("SELECT * FROM potongan_gaji WHERE id = 2")->result();
		// $data['gajis'] = $this->PenggajianModel->get_data('potongan_gaji')->result();
		$data['datas'] = $this->db->query("SELECT 
		data_kehadiran.*, 
		data_pegawai.*,
		 data_jabatan.* 
		 FROM data_pegawai 
		 JOIN data_kehadiran ON  data_kehadiran.nik = data_pegawai.nik 
		 JOIN data_jabatan ON data_jabatan.id = data_kehadiran.id_jabatan
		 WHERE data_kehadiran.bulan = '$bulanTahun' 
		ORDER BY data_pegawai.id DESC
		 ")->result();
		$this->load->view('admin/template/header', $data);
		$this->load->view('admin/absensi/cetak', $data);
	}
}
