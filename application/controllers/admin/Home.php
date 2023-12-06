<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('level') == NULL) {
			redirect('auth');
		}
		$this->load->model('Home_m');
	}
	public function index()
	{
		$data = array(
			'judul_halaman' => 'Dashboard',
			'pengguna' => $this->db->get_where('user', array('id_user' => $this->session->userdata('id_user')))->row(),
			'controller' => $this->uri->segment(2),
			'konten' => $this->db->get('konten')->num_rows(),
			'caraousel' => $this->db->get('caraousel')->num_rows(),
			'galeri' => $this->db->get('galeri')->num_rows(),
			'saran' => $this->db->get('saran')->num_rows(),
			'jumlah_konten' => $this->db->select('k.kategori, k.id_kategori, COUNT(c.id_konten) AS jumlah_konten')->from('kategori k')->join('konten c', 'k.id_kategori = c.id_kategori', 'left')->group_by('k.kategori, k.id_kategori')->get()->result(),
		);
		$this->template->load('template_admin', 'admin/dashboard', $data);
	}
}
