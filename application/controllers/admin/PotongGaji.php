<?php
class PotongGaji extends CI_Controller
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
		$data['title'] = 'Data Potongan Gaji';
		$data['datas'] = $this->PenggajianModel->get_data('potongan_gaji')->result();
		// var_dump($data['datas']);
		// die;
		$this->load->view('admin/template/header', $data);
		$this->load->view('admin/template/sidebar', $data);
		$this->load->view('admin/PotongGaji/PotongGaji', $data);
		$this->load->view('admin/template/footer', $data);
	}
	public function create()
	{
		$data['title'] = 'Tambah Data Potongan Gaji';
		// var_dump($data['datas']);
		// die;
		$this->load->view('admin/template/header', $data);
		$this->load->view('admin/template/sidebar', $data);
		$this->load->view('admin/PotongGaji/tambah', $data);
		$this->load->view('admin/template/footer', $data);
	}

	public function create_aksi()
	{
		$jml_potongan = $this->input->post('jml_potongan');
		$potongan = $this->input->post('potongan');
		$this->_rules();

		if ($this->form_validation->run() == false) {
			$this->create();
		} else {

			$data = [
				'jml_potongan' => $jml_potongan,
				'potongan' => $potongan,
			];

			$this->PenggajianModel->insert($data, 'potongan_gaji');
			$this->session->set_flashdata('pesan', '
			<div class="alert">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<strong>Berhasil</strong> Ditambahkan
			</div>
			');
			redirect('admin/PotongGaji');
		}
	}
	public function update($id)
	{
		$data['title'] = 'Udpate Data Potongan Gaji';
		$data['data'] = $this->db->query("SELECT * FROM potongan_gaji WHERE id = '$id'")->result();
		// var_dump($data['data']);
		// die;
		$this->load->view('admin/template/header', $data);
		$this->load->view('admin/template/sidebar', $data);
		$this->load->view('admin/PotongGaji/update', $data);
		$this->load->view('admin/template/footer', $data);
	}

	public function update_aksi()
	{
		$id = $this->input->post('id');
		$jml_potongan = $this->input->post('jml_potongan');
		$potongan = $this->input->post('potongan');
		$this->_rules();

		if ($this->form_validation->run() == false) {
			$this->update($id);
		} else {

			$data = [
				'jml_potongan' => $jml_potongan,
				'potongan' => $potongan,
			];
			$where = [
				'id' => $id,
			];

			$this->PenggajianModel->update($data, $where, 'potongan_gaji');
			$this->session->set_flashdata('pesan', '
			<div class="alert">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<strong>Berhasil</strong> DiUpdate
			</div>
			');
			redirect('admin/PotongGaji');
		}
	}
	public function delete($id)
	{

		$where = [
			'id' => $id,
		];

		$this->PenggajianModel->delete($where, 'potongan_gaji');
		$this->session->set_flashdata('pesan', '
			<div class="alert">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<strong>Berhasil</strong> Dihapus
			</div>
			');
		redirect('admin/PotongGaji');
	}
	public function _rules()
	{
		$this->form_validation->set_rules('potongan', 'Nama Potongan Gaji', 'required');
		$this->form_validation->set_rules('jml_potongan', 'jumlah Potongan Gaji', 'required');
	}
}
