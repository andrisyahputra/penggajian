<?php

class GantiPassword extends CI_Controller
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
		$data['title'] = 'Ganti Password Data Pegawai';
		$this->load->view('admin/template/header', $data);
		$this->load->view('admin/template/sidebar', $data);
		$this->load->view('admin/pegawai/GantiPassword', $data);
		$this->load->view('admin/template/footer', $data);
	}
	public function GantiPasswordAksi()
	{
		$password = $this->input->post('password');
		$password_ulangi = $this->input->post('password_ulangi');
		// var_dump($foto);
		// die;

		$this->form_validation->set_rules('password', 'Password Pegawai', 'required|matches[password_ulangi]');
		$this->form_validation->set_rules('password_ulangi', 'Ulangi Password Pegawai', 'required');


		if ($this->form_validation->run() == false) {
			$this->index();
		} else {

			$data = [
				'password' => md5($password),
			];
			// var_dump($data);
			// die;
			$where = [
				'id' => $this->session->userdata('user')
			];

			$this->PenggajianModel->update($data, $where, 'data_pegawai');

			// $this->session->sess_destroy();
			$this->session->unset_userdata('hak_akses');
			$this->session->unset_userdata('user');
			$this->session->unset_userdata('nama_pegawai');
			$this->session->unset_userdata('foto');


			$this->session->set_flashdata('pesan', '
			<div class="alert alert-success">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<strong>Password</strong> Berhasil Diubah
			</div>
			');

			redirect('Home');
		}
	}
}
