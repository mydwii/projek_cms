<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kategori extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('level') == NULL) {
            redirect('Home');
        }
    }
    public function index()
    {
        $this->db->from('kategori'); {
            $this->db->order_by('kategori', ' ASC');
            $kategori = $this->db->get()->result_array();
            $data = array(
                'judul_halaman' => 'Kategori Konten',
                'pengguna' => $this->db->get_where('user', array('id_user' => $this->session->userdata('id_user')))->row(),
                'controller' => $this->uri->segment(2),
                'kategori'  => $kategori
            );
            $this->template->load('template_admin', 'admin/kategori_index', $data);
        }
    }
    public function simpan()
    {
        $this->db->from('kategori');
        $this->db->where('kategori', $this->input->post('kategori'));
        $cekso = $this->db->get()->result_array();
        if ($cekso != NULL) {
            $this->session->set_flashdata('alert', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
			Kategori Konten Sudah Terpakai!
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		  </div>');
            redirect('admin/kategori');
        }
        $data = array(
            'kategori' =>  $this->input->post('kategori')
        );
        $this->db->insert('kategori', $data);
        $this->session->set_flashdata('alert', '<div class="alert alert-success alert-dismissible fade show" role="alert">
		Data Berhasil Disimpan!
		<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
	  </div>');
        redirect('admin/kategori');
    }
    public function delete_data($id)
    {
        $where = array(
            'id_kategori' => $id
        );
        $this->db->delete('kategori', $where);
        $this->session->set_flashdata('alert', '<div class="alert alert-success alert-dismissible fade show" role="alert">
		Data Berhasil Dihapus!
		<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
	  </div>');
        redirect('admin/kategori');
    }

    public function update()
    {
        $where = array(
            'id_kategori' => $this->input->post('id_kategori')
        );
        $data = array(
            'kategori' => $this->input->post('kategori')
        );
        $this->db->update('kategori', $data, $where);
        $this->session->set_flashdata('alert', '<div class="alert alert-success alert-dismissible fade show" role="alert">
		Data Berhasil Diubah!
		<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
	  </div>');
        redirect('admin/kategori');
    }
}
