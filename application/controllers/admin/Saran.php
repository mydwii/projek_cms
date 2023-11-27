<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Saran extends CI_Controller
{
    public function index()
    {
        $this->db->from('saran');
        $saran = $this->db->get()->result_array();
        $data = array(
            'judul_halaman' => 'Halaman saran',
            'controller' =>  $this->uri->segment(2),
            'pengguna' => $this->db->get_where('user', array('id_user' => $this->session->userdata('id_user')))->row(),
            'saran'  => $saran,
        );
        $this->template->load('template_admin', 'admin/saran_index', $data);
    }
    public function delete_data($id)
    {
        $where = array(
            'id_saran' => $id
        );
        $this->db->delete('saran', $where);
        $this->session->set_flashdata('alert', '<div class="alert alert-success alert-dismissible fade show" role="alert">
		Data Berhasil Dihapus!
		<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
	  </div>');
        redirect('admin/saran');
    }
}
