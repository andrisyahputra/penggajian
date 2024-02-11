<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{


	public function __construct()
	{
		parent::__construct();

		if ($this->session->userdata('hak_akses') != 1) {
			$this->session->set_flashdata('pesan', '
			 <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <strong>Anda belum Login atau Anda bukan Admin</strong>
        </div>
			');
			redirect('Home');
		}
	}
	public function index()
	{
		$data['title'] = 'Dashboard';

		$pegawai = $this->db->query("SELECT * FROM data_pegawai WHERE hak_akses = '2'");
		$data['dataPegawai'] = $pegawai->num_rows();
		$admin = $this->db->query("SELECT * FROM data_pegawai WHERE hak_akses = '1'");
		$data['dataAdmin'] = $admin->num_rows();
		$jabatan = $this->db->query("SELECT * FROM data_jabatan");
		$data['dataJabatan'] = $jabatan->num_rows();
		$kehadiran = $this->db->query("SELECT * FROM data_kehadiran");
		$data['dataKehadiran'] = $kehadiran->num_rows();


		$this->load->view('admin/template/header', $data);
		$this->load->view('admin/template/sidebar', $data);
		$this->load->view('admin/dashboard', $data);
		$this->load->view('admin/template/footer', $data);
	}
}
