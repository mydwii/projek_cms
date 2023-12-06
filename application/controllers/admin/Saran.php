<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Saran extends CI_Controller
{
    public function index()
    {
        $data = array(
            'judul_halaman' => 'Halaman saran',
            'controller' =>  $this->uri->segment(2),
            'pengguna' => $this->db->get_where('user', array('id_user' => $this->session->userdata('id_user')))->row(),
            'saran' => $this->db->get('saran')->result_array(),
            'user' => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),

        );
        $this->template->load('template_admin', 'admin/saran_index', $data);
    }
    public function delete()
    {
        if (isset($_POST['deleteall'])) {
            if (!empty($this->input->post('id'))) {
                $deleteall = $this->input->post('id');
                $check = [];
                foreach ($deleteall as $row) {
                    array_push($check, $row);
                }
                $this->load->model('User_m');
                $this->User_m->deleteselected($check);
                $this->session->set_flashdata('alert', '<div class="alert alert-succes alert-dismissible fade show" role="alert">
                Data berhasil dihapus!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>');
                redirect('admin/saran');
            } else {
                $this->session->set_flashdata('alert', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                Anda belum memilih data yang akan dihapus!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>');
                redirect('admin/saran');
            }
        }
    }
}
