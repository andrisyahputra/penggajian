<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->_rules();

		if ($this->form_validation->run() == false) {
			$data['title'] = 'Login Aplikasi Pengajian';
			$this->load->view('auth/template/header', $data);
			$this->load->view('auth/form_login', $data);
			$this->load->view('auth/template/footer', $data);
		} else {
			$username = $this->input->post('username');
			$password = $this->input->post('password');

			$cek = $this->PenggajianModel->cek_login($username, $password);

			if ($cek == false) {
				$this->session->set_flashdata('pesan', '
			<div class="alert alert-danger">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<strong>Username dan Password</strong> Salah
			</div>
			');
				redirect('Home');
			} else {

				$this->session->set_userdata('hak_akses', $cek->hak_akses);
				$this->session->set_userdata('user', $cek->id);
				$this->session->set_userdata('nama_pegawai', $cek->nama_pegawai);
				$this->session->set_userdata('foto', $cek->foto);
				switch ($cek->hak_akses) {
					case '1':
						redirect('admin/Dashboard');
						break;
					case '2':
						redirect('pegawai/Dashboard');
						break;

					default:
						# code...
						break;
				}
			}
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('Home');
	}
	public function _rules()
	{
		$this->form_validation->set_rules('username', 'Username Pegawai', 'required');
		$this->form_validation->set_rules('password', 'Password Pegawai', 'required');
	}
}
