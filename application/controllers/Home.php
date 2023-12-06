<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Home_m');
	}
	public function index()
	{
		$data['konten'] = $this->Home_m->getAllKonten();
		$this->db->from('konten a');
		$this->db->join('kategori b', 'a.id_kategori = b.id_kategori', 'left');
		$this->db->join('user c', 'a.username = c.username', 'left');
		$this->db->order_by('tanggal', ' DESC');
		$this->db->limit(5);
		$konten2 = $this->db->get()->result_array();

		//pagination 
		$this->load->library('pagination');

		//keyword
		if ($this->input->post('submit')) {
			$data['keyword'] = $this->input->post('keyword');
			$this->session->set_userdata('keyword', $data['keyword']);
		} else {
			$data['keyword'] = $this->session->userdata('keyword');
		}
		$this->db->like('isi_konten', $data['keyword']);
		$this->db->or_like('judul', $data['keyword']);
		$this->db->from('konten');
		$config['total_rows'] = $this->db->count_all_results();
		$data['total_rows'] = $config['total_rows'];
		$config['per_page'] = 6;

		$this->pagination->initialize($config);
		$data['start'] = $this->uri->segment(3);
		// $data['konten'] = $this->Home_m->getKonten($config['per_page'], $data['start']);


		$data = [
			'caraousel' => $this->db->get('caraousel')->result_array(),
			'kategori' => $this->db->get('kategori')->result_array(),
			'konfigurasi' => $this->db->get('konfigurasi')->row(),
			'konten'	=> $this->Home_m->getKonten($config['per_page'], $data['start'], $data['keyword']),
			'konten2'	=> $konten2,
		];
		$this->template->load('template_home', 'beranda', $data);
	}
	public function artikel($id)
	{
		$this->db->from('konten a');
		$this->db->join('kategori b', 'a.id_kategori = b.id_kategori', 'left');
		$this->db->join('user c', 'a.username = c.username', 'left');
		$this->db->where('slug', $id);
		$konten = $this->db->get()->row();
		$this->db->from('konten a');
		$this->db->join('kategori b', 'a.id_kategori = b.id_kategori', 'left');
		$this->db->join('user c', 'a.username = c.username', 'left');
		$this->db->order_by('tanggal', ' DESC');
		$this->db->limit(5);
		$konten2 = $this->db->get()->result_array();
		$data = [
			'judul'	=> $konten->judul . " | yoodwiio ",
			'kategori' => $this->db->get('kategori')->result_array(),
			'konfigurasi' => $this->db->get('konfigurasi')->row(),
			'konten'	=> $konten,
			'konten2'	=> $konten2,
		];

		$this->template->load('template_home', 'detail', $data);
	}
	public function kategori($id)
	{
		$this->db->from('konten a');
		$this->db->join('kategori b', 'a.id_kategori = b.id_kategori', 'left');
		$this->db->join('user c', 'a.username = c.username', 'left');
		$this->db->where('a.id_kategori', $id);
		$konten = $this->db->get()->result_array();
		$this->db->from('kategori');
		$this->db->where('id_kategori', $id);
		$nama_kategori = $this->db->get()->row()->kategori;
		$this->db->from('konten a');
		$this->db->join('kategori b', 'a.id_kategori = b.id_kategori', 'left');
		$this->db->join('user c', 'a.username = c.username', 'left');
		$this->db->order_by('tanggal', ' DESC');
		$this->db->limit(5);
		$konten2 = $this->db->get()->result_array();

		$data = [
			'kategori' => $this->db->get('kategori')->result_array(),
			'nama_kategori' => $nama_kategori,
			'konfigurasi' => $this->db->get('konfigurasi')->row(),
			'konten'	=> $konten,
			'konten2'	=> $konten2,
		];

		$this->template->load('template_home', 'kategori', $data);
	}
	public function galeri()
	{
		$data['konten'] = $this->Home_m->getAllKonten();
		$this->db->from('konten a');
		$this->db->join('kategori b', 'a.id_kategori = b.id_kategori', 'left');
		$this->db->join('user c', 'a.username = c.username', 'left');
		$this->db->order_by('tanggal', ' DESC');
		$this->db->limit(5);
		$konten2 = $this->db->get()->result_array();

		//pagination 
		$this->load->library('pagination');

		//keyword
		if ($this->input->post('submit')) {
			$data['keyword'] = $this->input->post('keyword');
			$this->session->set_userdata('keyword', $data['keyword']);
		} else {
			$data['keyword'] = $this->session->userdata('keyword');
		}
		$this->db->like('isi_konten', $data['keyword']);
		$this->db->or_like('judul', $data['keyword']);
		$this->db->from('konten');
		$config['total_rows'] = $this->db->count_all_results();
		$data['total_rows'] = $config['total_rows'];
		$config['per_page'] = 6;

		$this->pagination->initialize($config);
		$data['start'] = $this->uri->segment(3);
		// $data['konten'] = $this->Home_m->getKonten($config['per_page'], $data['start']);


		$data = [
			'galeri' => $this->db->get('galeri')->result_array(),
			'caraousel' => $this->db->get('caraousel')->result_array(),
			'kategori' => $this->db->get('kategori')->result_array(),
			'konfigurasi' => $this->db->get('konfigurasi')->row(),
			'konten'	=> $this->Home_m->getKonten($config['per_page'], $data['start'], $data['keyword']),
			'konten2'	=> $konten2,
		];
		$this->template->load('template_home', 'galeri', $data);
	}

	public function saran()
	{

		$data['konten'] = $this->Home_m->getAllKonten();
		$this->db->from('konten a');
		$this->db->join('kategori b', 'a.id_kategori = b.id_kategori', 'left');
		$this->db->join('user c', 'a.username = c.username', 'left');
		$this->db->order_by('tanggal', ' DESC');
		$this->db->limit(5);
		$konten2 = $this->db->get()->result_array();

		//pagination 
		$this->load->library('pagination');

		//keyword
		if ($this->input->post('submit')) {
			$data['keyword'] = $this->input->post('keyword');
			$this->session->set_userdata('keyword', $data['keyword']);
		} else {
			$data['keyword'] = $this->session->userdata('keyword');
		}
		$this->db->like('isi_konten', $data['keyword']);
		$this->db->or_like('judul', $data['keyword']);
		$this->db->from('konten');
		$config['total_rows'] = $this->db->count_all_results();
		$data['total_rows'] = $config['total_rows'];
		$config['per_page'] = 6;

		$this->pagination->initialize($config);
		$data['start'] = $this->uri->segment(3);
		// $data['konten'] = $this->Home_m->getKonten($config['per_page'], $data['start']);


		$data = [
			'caraousel' => $this->db->get('caraousel')->result_array(),
			'kategori' => $this->db->get('kategori')->result_array(),
			'konfigurasi' => $this->db->get('konfigurasi')->row(),
			'konten'	=> $this->Home_m->getKonten($config['per_page'], $data['start'], $data['keyword']),
			'konten2'	=> $konten2,
		];
		$this->template->load('template_home', 'saran', $data);
	}
	public function simpan()
	{
		date_default_timezone_set('Asia/Jakarta');
		$this->db->from('saran');
		$this->db->where('nama', $this->input->post('nama'));
		$cekso = $this->db->get()->result_array();
		$data = array(
			'nama' => $this->input->post('nama'),
			'email' => $this->input->post('email'),
			'pesan' => $this->input->post('pesan'),
		);
		$this->db->insert('saran', $data);
		$this->session->set_flashdata('alert', '<div class="alert alert-success alert-dismissible fade show" role="alert">
		Saran Berhasil dikirim!
		<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
	  </div>');
		redirect('home/saran');
	}
}
