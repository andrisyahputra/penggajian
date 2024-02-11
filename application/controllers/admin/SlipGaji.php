<?php
class SlipGaji extends CI_Controller
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
		$data['title'] = 'Slip Gaji Absensi';
		// var_dump($bulanTahun);
		// die;
		$data['namas'] = $this->PenggajianModel->get_data('data_pegawai')->result();
		// var_dump($data['datas']);
		// die;
		$this->load->view('admin/template/header', $data);
		$this->load->view('admin/template/sidebar', $data);
		$this->load->view('admin/SlipGaji/SlipGaji', $data);
		$this->load->view('admin/template/footer', $data);
	}


	public function cetakSlipGaji()
	{
		$data['title'] = 'Cetak Slip Gaji';
		// $data['datas'] = $this->PenggajianModel->get_data('data_pegawai')->result();
		$bulan = $this->input->post('bulan');
		$tahun = $this->input->post('tahun');
		$nama = $this->input->post('nama');
		$bulanTahun = $bulan . $tahun;
		// var_dump($bulanTahun);
		// die;
		$data['alphas'] = $this->db->query("SELECT * FROM potongan_gaji WHERE id = 2")->result();
		// $data['gajis'] = $this->PenggajianModel->get_data('potongan_gaji')->result();
		$data['data'] = $this->db->query("SELECT 
		data_kehadiran.*, 
		data_pegawai.*,
		 data_jabatan.* 
		 FROM data_pegawai 
		 JOIN data_kehadiran ON  data_kehadiran.nik = data_pegawai.nik 
		 JOIN data_jabatan ON data_jabatan.id = data_kehadiran.id_jabatan
		 WHERE data_kehadiran.bulan = '$bulanTahun' AND data_pegawai.id = '$nama'
		ORDER BY data_pegawai.id DESC
		 ")->result();
		// var_dump($data['datas']);
		// die;
		$this->load->view('admin/template/header', $data);
		$this->load->view('admin/SlipGaji/cetak', $data);
	}
}
