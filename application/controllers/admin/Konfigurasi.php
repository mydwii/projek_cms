<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Konfigurasi extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('level') <> 'Admin') {
			redirect('auth');
		}
	}
	public function index()
	{
		$this->db->from('konfigurasi');
		$config = $this->db->get()->row();
		$data = array(
			'judul_halaman' => 'Halaman Konfigurasi',
			'controller' => $this->uri->segment(2),
            'pengguna' => $this->db->get_where('user', array('id_user' => $this->session->userdata('id_user')))->row(),
			'config'	=> $config,
		);
		$this->template->load('template_admin', 'admin/konfigurasi', $data);
	}

	public function update()
	{
		$where = array(
			'id' => 1
		);
		$data = array(
			'judul_website' => $this->input->post('judul_website'),
			'profil_website' => $this->input->post('profil_website'),
			'facebook' => $this->input->post('facebook'),
			'instagram' => $this->input->post('instagram'),
			'wa' => $this->input->post('wa'),
			'email' => $this->input->post('email'),
			'alamat' => $this->input->post('alamat')
		);
		$this->db->update('konfigurasi', $data, $where);
		$this->session->set_flashdata('alert', '<div class="alert alert-success alert-dismissible fade show" role="alert">
		Data Berhasil Diubah!
		<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
	  </div>');
		redirect('admin/konfigurasi');
	}
}
