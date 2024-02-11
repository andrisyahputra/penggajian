<?php
class DataGaji extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		if ($this->session->userdata('hak_akses') != 2) {
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

		$id = $this->session->userdata('user');
		$pegawai = $this->db->query("SELECT * FROM data_pegawai WHERE id = '$id'")->row();
		$nik = $pegawai->nik;
		// var_dump($nik);
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
		 WHERE  data_kehadiran.nik = '$nik'
		ORDER BY data_pegawai.id DESC
		 ")->result();
		// var_dump($data['datas']);
		// die;
		$this->load->view('pegawai/template/header', $data);
		$this->load->view('pegawai/template/sidebar', $data);
		$this->load->view('pegawai/DataGaji', $data);
		$this->load->view('pegawai/template/footer', $data);
	}

	public function printPdf()
	{
		$data['title'] = 'Slip Gaji Pegawai';
		$id = $this->input->get('id');
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
		 WHERE data_kehadiran.id = '$id'
		ORDER BY data_pegawai.id DESC
		 ")->result();
		// var_dump($data['datas']);
		// die;
		$this->load->view('pegawai/template/header', $data);
		$this->load->view('pegawai/CetakSlipGaji', $data);
	}
}
