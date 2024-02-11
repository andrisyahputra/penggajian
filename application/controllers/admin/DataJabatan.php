<?php
class DataJabatan extends CI_Controller
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
		$data['title'] = 'Data Jabatan';
		$data['datas'] = $this->PenggajianModel->get_data('data_jabatan')->result();
		// var_dump($data['datas']);
		// die;
		$this->load->view('admin/template/header', $data);
		$this->load->view('admin/template/sidebar', $data);
		$this->load->view('admin/jabatan/jabatan', $data);
		$this->load->view('admin/template/footer', $data);
	}
	public function create()
	{
		$data['title'] = 'Tambah Data Jabatan';
		// var_dump($data['datas']);
		// die;
		$this->load->view('admin/template/header', $data);
		$this->load->view('admin/template/sidebar', $data);
		$this->load->view('admin/jabatan/tambah', $data);
		$this->load->view('admin/template/footer', $data);
	}

	public function create_aksi()
	{
		$nama_jabatan = $this->input->post('nama_jabatan');
		$gaji_pokok = $this->input->post('gaji_pokok');
		$transport = $this->input->post('transport');
		$uang_makan = $this->input->post('uang_makan');
		$this->_rules();

		if ($this->form_validation->run() == false) {
			$this->create();
		} else {

			$data = [
				'nama_jabatan' => $nama_jabatan,
				'gaji_pokok' => $gaji_pokok,
				'transport' => $transport,
				'uang_makan' => $uang_makan,
			];

			$this->PenggajianModel->insert($data, 'data_jabatan');
			$this->session->set_flashdata('pesan', '
			<div class="alert">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<strong>Berhasil</strong> Ditambahkan
			</div>
			');
			redirect('admin/DataJabatan');
		}
	}
	public function update($id)
	{
		$data['title'] = 'Udpate Data Jabatan';
		$data['data'] = $this->db->query("SELECT * FROM data_jabatan WHERE id = '$id'")->result();
		// var_dump($data['data']);
		// die;
		$this->load->view('admin/template/header', $data);
		$this->load->view('admin/template/sidebar', $data);
		$this->load->view('admin/jabatan/update', $data);
		$this->load->view('admin/template/footer', $data);
	}

	public function update_aksi()
	{
		$id = $this->input->post('id');
		$nama_jabatan = $this->input->post('nama_jabatan');
		$gaji_pokok = $this->input->post('gaji_pokok');
		$transport = $this->input->post('transport');
		$uang_makan = $this->input->post('uang_makan');
		$this->_rules();

		if ($this->form_validation->run() == false) {
			$this->update();
		} else {

			$data = [
				'nama_jabatan' => $nama_jabatan,
				'gaji_pokok' => $gaji_pokok,
				'transport' => $transport,
				'uang_makan' => $uang_makan,
			];
			$where = [
				'id' => $id,
			];

			$this->PenggajianModel->update($data, $where, 'data_jabatan');
			$this->session->set_flashdata('pesan', '
			<div class="alert">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<strong>Berhasil</strong> DiUpdate
			</div>
			');
			redirect('admin/DataJabatan');
		}
	}
	public function delete($id)
	{

		$where = [
			'id' => $id,
		];

		$this->PenggajianModel->delete($where, 'data_jabatan');
		$this->session->set_flashdata('pesan', '
			<div class="alert">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<strong>Berhasil</strong> Dihapus
			</div>
			');
		redirect('admin/DataJabatan');
	}
	public function _rules()
	{
		$this->form_validation->set_rules('nama_jabatan', 'Nama Jabatan', 'required');
		$this->form_validation->set_rules('gaji_pokok', 'Gaji Pokok', 'required');
		$this->form_validation->set_rules('transport', 'Transport', 'required');
		$this->form_validation->set_rules('uang_makan', 'Uang Makan', 'required');
	}
}
