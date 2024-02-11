<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
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
		$data['title'] = 'Dashboard Data Pegawai';
		$id = $this->session->userdata('user');
		$data['data'] = $this->db->query("SELECT * FROM data_pegawai WHERE id = '$id'")->result();

		$this->load->view('pegawai/template/header', $data);
		$this->load->view('pegawai/template/sidebar', $data);
		$this->load->view('pegawai/dashboard', $data);
		$this->load->view('pegawai/template/footer', $data);
	}
}
