<?php
class DataAbsensi extends CI_Controller
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
		$data['title'] = 'Data Absen Pegawai';
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
		$data['datas'] = $this->db->query("SELECT 
		data_kehadiran.*, 
		data_pegawai.*,
		 data_jabatan.* 
		 FROM data_kehadiran 
		 JOIN data_pegawai ON data_pegawai.nik = data_kehadiran.nik
		 JOIN data_jabatan ON data_jabatan.id = data_kehadiran.id_jabatan
		 WHERE data_kehadiran.bulan = '$bulanTahun' 
		ORDER BY data_pegawai.id DESC
		 ")->result();
		// var_dump($data['datas']);
		// die;
		$this->load->view('admin/template/header', $data);
		$this->load->view('admin/template/sidebar', $data);
		$this->load->view('admin/absensi/absensi', $data);
		$this->load->view('admin/template/footer', $data);
	}
	public function create()
	{
		$data['title'] = 'Tambah Data Absensi Pegawai';
		// var_dump($data['datas']);
		// die;
		if ($this->input->post('submit', true) == 'submit') {
			$post = $this->input->post();

			foreach ($post['bulan'] as $key => $value) {
				if ($post['bulan'][$key] != '' &&  $post['nik'][$key]) {
					$simpan[] = [
						'bulan' => $post['bulan'][$key],
						'nik' => $post['nik'][$key],
						'nama_keryawan' => $post['nama_keryawan'][$key],
						'jk' => $post['jk'][$key],
						'id_jabatan' => $post['id_jabatan'][$key],
						'hadir' => $post['hadir'][$key],
						'sakit' => $post['sakit'][$key],
						'alpha' => $post['alpha'][$key],
					];
				}
			}

			$this->PenggajianModel->insert_batch('data_kehadiran', $simpan);
			$this->session->set_flashdata('pesan', '
			<div class="alert">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<strong>Berhasil</strong> Ditambahkan
			</div>
			');
			redirect('admin/DataAbsensi');
		}




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
		$data['datas'] = $this->db->query("SELECT 
		data_pegawai.*,
		 data_jabatan.* 
		 FROM data_pegawai 
		 JOIN data_jabatan ON data_jabatan.id = data_pegawai.id_jabatan
		 WHERE NOT EXISTS ( SELECT * FROM data_kehadiran WHERE bulan = '$bulanTahun' AND data_pegawai.nik = data_kehadiran.nik) 
		ORDER BY data_pegawai.id DESC
		 ")->result();
		$this->load->view('admin/template/header', $data);
		$this->load->view('admin/template/sidebar', $data);
		$this->load->view('admin/absensi/tambah', $data);
		$this->load->view('admin/template/footer', $data);
	}

	public function create_aksi()
	{
		$nik = $this->input->post('nik');
		$nama_pegawai = $this->input->post('nama_pegawai');
		$jk = $this->input->post('jk');
		$id_jabatan = $this->input->post('id_jabatan');
		$tgl_masuk = $this->input->post('tgl_masuk');
		$status = $this->input->post('status');
		$foto = $_FILES['foto']['name'];
		// var_dump($foto);
		// die;



		$this->_rules();

		if ($this->form_validation->run() == false) {
			$this->create();
		} else {
			if (!empty($foto)) {
				$config['upload_path'] = './assets/img/foto';
				$config['allowed_types'] = 'jpg|png|jpeg|gif';

				$this->load->library('upload', $config);

				if (!$this->upload->do_upload('foto')) {
					$error = array('error' => $this->upload->display_errors());
					print_r($error);
				} else {
					$upload_data = $this->upload->data();
					$foto = $upload_data['file_name'];
				}
			}
			$data = [
				'nik' => $nik,
				'nama_pegawai' => $nama_pegawai,
				'jk' => $jk,
				'id_jabatan' => $id_jabatan,
				'tgl_masuk' => $tgl_masuk,
				'status' => $status,
				'foto' => $foto
			];
			// var_dump($data);
			// die;

			$this->PenggajianModel->insert($data, 'data_pegawai');
			$this->session->set_flashdata('pesan', '
			<div class="alert">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<strong>Berhasil</strong> Ditambahkan
			</div>
			');
			redirect('admin/DataPegawai');
		}
	}
	public function update($id)
	{
		$data['title'] = 'Udpate Data Pegawai';
		$data['data'] = $this->db->query("SELECT * FROM data_pegawai WHERE id = '$id'")->result();
		$data['jabatans'] = $this->PenggajianModel->get_data('data_jabatan')->result();
		// var_dump($data['data']);
		// die;
		$this->load->view('admin/template/header', $data);
		$this->load->view('admin/template/sidebar', $data);
		$this->load->view('admin/pegawai/update', $data);
		$this->load->view('admin/template/footer', $data);
	}

	public function update_aksi()
	{
		$id = $this->input->post('id');
		$nik = $this->input->post('nik');
		$nama_pegawai = $this->input->post('nama_pegawai');
		$jk = $this->input->post('jk');
		$id_jabatan = $this->input->post('id_jabatan');
		$tgl_masuk = $this->input->post('tgl_masuk');
		$status = $this->input->post('status');
		$foto = $_FILES['foto']['name'];
		$this->_rules();

		if ($this->form_validation->run() == false) {
			$this->update($id);
		} else {


			if (!empty($foto)) {
				$config['upload_path'] = './assets/img/foto';
				$config['allowed_types'] = 'jpg|png|jpeg|gif';

				$this->load->library('upload', $config);

				if (!$this->upload->do_upload('foto')) {
					$error = array('error' => $this->upload->display_errors());
					print_r($error);
				} else {
					$upload_data = $this->upload->data();
					$foto = $upload_data['file_name'];
					$this->db->set(
						'foto',
						$foto
					);
				}
			}

			$data = [
				'nik' => $nik,
				'nama_pegawai' => $nama_pegawai,
				'jk' => $jk,
				'id_jabatan' => $id_jabatan,
				'tgl_masuk' => $tgl_masuk,
				'status' => $status
			];
			$where = [
				'id' => $id,
			];

			$this->PenggajianModel->update($data, $where, 'data_pegawai');
			$this->session->set_flashdata('pesan', '
			<div class="alert">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<strong>Berhasil</strong> DiUpdate
			</div>
			');
			redirect('admin/DataPegawai');
		}
	}
	public function delete($id)
	{

		$where = [
			'id' => $id,
		];

		$this->PenggajianModel->delete($where, 'data_pegawai');
		$this->session->set_flashdata('pesan', '
			<div class="alert">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<strong>Berhasil</strong> Dihapus
			</div>
			');
		redirect('admin/DataPegawai');
	}
	public function _rules()
	{
		$this->form_validation->set_rules('nik', 'Nik Pegawai', 'required');
		$this->form_validation->set_rules('nama_pegawai', 'Nama Pegawai', 'required');
		$this->form_validation->set_rules('jk', 'Jenis Kelamin', 'required');
		$this->form_validation->set_rules('id_jabatan', 'Jabatan Pegawai', 'required');
		$this->form_validation->set_rules('tgl_masuk', 'Tanggal MAsuk Pegawai', 'required');
		$this->form_validation->set_rules('status', 'Status Pegawai', 'required');
	}
}
