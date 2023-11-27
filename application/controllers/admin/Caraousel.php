<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Caraousel extends CI_Controller
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
        $this->db->from('caraousel');
        $caraousel = $this->db->get()->result_array();
        $data = array(
            'judul_halaman' => 'Halaman Caraousel',
            'controller' =>  $this->uri->segment(2),
            'pengguna' => $this->db->get_where('user', array('id_user' => $this->session->userdata('id_user')))->row(),
            'caraousel'  => $caraousel,
        );
        $this->template->load('template_admin', 'admin/caraousel_index', $data);
    }
    public function simpan()
    {
        $namafoto = date('YmdHis') . '.jpg';
        $config['upload_path']          = 'assets/upload/carousel/';
        $config['max_size'] = 1500 * 1024; //3 * 1024 * 1024; //3Mb; 0=unlimited
        $config['file_name']            = $namafoto;
        $config['allowed_types']        = "*";
        $this->load->library('upload', $config);
        if ($_FILES['foto']['size'] >= 1500 * 1024) {
            $this->session->set_flashdata('alert', '
                    <div class="alert alert-danger alert-dismissible" role="alert">
                    Ukuran foto terlalu besar, upload ulang foto dengan ukuran yang kurang dari 1500 KB.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                        ');
            redirect('admin/caraousel');
        } elseif (!$this->upload->do_upload('foto')) {
            $error = array('error' => $this->upload->display_errors());
        } else {
            $data = array('upload_data' => $this->upload->data());
        }

        $data = array(
            'judul' =>  $this->input->post('judul'),
            'foto' =>  $namafoto,

        );
        $this->db->insert('caraousel', $data);
        $this->session->set_flashdata('alert', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        	Data Berhasil Disimpan!
        	<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>');
        redirect('admin/caraousel');
    }
    public function delete_data($id)
    {
        $filename = FCPATH . '/assets/upload/carousel/' . $id;
        if (file_exists($filename)) {
            unlink("./assets/upload/carousel/" . $id);
        }
        $where = array(
            'foto' => $id
        );
        $this->db->delete('caraousel', $where);
        $this->session->set_flashdata('alert', '<div class="alert alert-success alert-dismissible fade show" role="alert">
    	Data Berhasil Dihapus!
    	<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>');
        redirect('admin/caraousel');
    }
}
