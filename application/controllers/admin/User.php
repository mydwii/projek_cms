<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('User_m');
		$this->load->library('form_validation');
		if ($this->session->userdata('level') <> 'Admin') {
			redirect('auth');
		}
	}
	public function index()
	{
		$this->db->from('user'); {
			$this->db->order_by('nama', ' ASC');
			$user = $this->db->get()->result_array();
			$data = array(
				'judul_halaman' => 'Data Pengguna',
				'controller' => $this->uri->segment(2),
            'pengguna' => $this->db->get_where('user', array('id_user' => $this->session->userdata('id_user')))->row(),
			'user'  => $user,
			);
			$this->template->load('template_admin', 'admin/user_index', $data);
		}
	}
	public function simpan()
	{
		$this->db->from('user');
		$this->db->where('username', $this->input->post('username'));
		$cekso = $this->db->get()->result_array();
		if ($cekso != NULL) {
			$this->session->set_flashdata('alert', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
			Username Sudah Terpakai!
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		  </div>');
			redirect('admin/user');
		}
		$this->User_m->simpan();
		$this->session->set_flashdata('alert', '<div class="alert alert-success alert-dismissible fade show" role="alert">
		Data Berhasil Disimpan!
		<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
	  </div>');
		redirect('admin/user');
	}
	public function delete_data($id)
	{
		$where = array(
			'id_user' => $id
		);
		$this->db->delete('user', $where);
		$this->session->set_flashdata('alert', '<div class="alert alert-success alert-dismissible fade show" role="alert">
		Data Berhasil Dihapus!
		<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
	  </div>');
		redirect('admin/user');
	}

	public function update()
	{
		$this->User_m->update();
		$this->session->set_flashdata('alert', '<div class="alert alert-success alert-dismissible fade show" role="alert">
		Data Berhasil Diubah!
		<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
	  </div>');
		redirect('admin/user');
	}
}
