<?php
class DataPegawai extends CI_Controller
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
		$data['title'] = 'Data Pegawai';
		$data['datas'] = $this->PenggajianModel->get_data('data_pegawai')->result();
		// var_dump($data['datas']);
		// die;
		$this->load->view('admin/template/header', $data);
		$this->load->view('admin/template/sidebar', $data);
		$this->load->view('admin/pegawai/pegawai', $data);
		$this->load->view('admin/template/footer', $data);
	}
	public function create()
	{
		$data['title'] = 'Tambah Data Pegawai';
		// var_dump($data['datas']);
		// die;
		$data['jabatans'] = $this->PenggajianModel->get_data('data_jabatan')->result();
		$data['aksess'] = $this->PenggajianModel->get_data('data_hak_akses')->result();
		$this->load->view('admin/template/header', $data);
		$this->load->view('admin/template/sidebar', $data);
		$this->load->view('admin/pegawai/tambah', $data);
		$this->load->view('admin/template/footer', $data);
	}

	public function create_aksi()
	{
		$nik = $this->input->post('nik');
		$nama_pegawai = $this->input->post('nama_pegawai');
		$id_hak_akses = $this->input->post('id_hak_akses');
		$jk = $this->input->post('jk');
		$id_jabatan = $this->input->post('id_jabatan');
		$tgl_masuk = $this->input->post('tgl_masuk');
		$status = $this->input->post('status');
		$username = $this->input->post('username');
		$password = md5($this->input->post('password'));
		$foto = $_FILES['foto']['name'];
		// var_dump($foto);
		// die;


		$this->_rules();
		$this->form_validation->set_rules('password', 'Password Pegawai', 'required');

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
				'hak_akses' => $id_hak_akses,
				'username' => $username,
				'password' => $password,
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
		$data['aksess'] = $this->PenggajianModel->get_data('data_hak_akses')->result();
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
		$id_hak_akses = $this->input->post('id_hak_akses');
		$username = $this->input->post('username');
		$password = md5($this->input->post('password'));
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

			if (!empty($password)) {
				$this->db->set(
					'password',
					$password
				);
			}

			$data = [
				'nik' => $nik,
				'nama_pegawai' => $nama_pegawai,
				'jk' => $jk,
				'id_jabatan' => $id_jabatan,
				'tgl_masuk' => $tgl_masuk,
				'hak_akses' => $id_hak_akses,
				'username' => $username,
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
		$this->form_validation->set_rules('id_hak_akses', 'Hak Akses', 'required');
		$this->form_validation->set_rules('username', 'Username Pegawai', 'required');
		// $this->form_validation->set_rules('password', 'Password Pegawai', 'required');
	}
}
