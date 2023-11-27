<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Konten extends CI_Controller
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
        $this->db->from('kategori');
        $this->db->order_by('kategori', ' ASC');
        $kategori = $this->db->get()->result_array();

        $this->db->from('konten a');
        $this->db->join('kategori b', 'a.id_kategori = b.id_kategori', 'left');
        $this->db->join('user c', 'a.username = c.username', 'left');
        $this->db->order_by('tanggal', ' DESC');
        $konten = $this->db->get()->result_array();
        $data = array(
            'judul_halaman' => 'Halaman Konten',
            'controller' => $this->uri->segment(2),
            'kategori'  => $kategori,
            'pengguna' => $this->db->get_where('user', array('id_user' => $this->session->userdata('id_user')))->row(),
            'konten'    => $konten
        );
        $this->template->load('template_admin', 'admin/konten_index', $data);
    }
    public function simpan()
    {
        $namafoto = date('YmdHis') . '.jpg';
        $config['upload_path']          = 'assets/upload/konten/';
        $config['max_size'] = 500 * 1024; //3 * 1024 * 1024; //3Mb; 0=unlimited
        $config['file_name']            = $namafoto;
        $config['allowed_types']        = "*";
        $this->load->library('upload', $config);
        if ($_FILES['foto']['size'] >= 500 * 5000) {
            $this->session->set_flashdata('alert', '
                    <div class="alert alert-danger alert-dismissible" role="alert">
                    Ukuran foto terlalu besar, upload ulang foto dengan ukuran yang kurang dari 500 KB.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                        ');
            redirect('admin/konten');
        } elseif (!$this->upload->do_upload('foto')) {
            $error = array('error' => $this->upload->display_errors());
        } else {
            $data = array('upload_data' => $this->upload->data());
        }

        $this->db->from('konten');
        $this->db->where('judul', $this->input->post('judul'));
        $cekso = $this->db->get()->result_array();
        if ($cekso != NULL) {
            $this->session->set_flashdata('alert', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        		Judul Sudah Dipakai!
        		<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        	  </div>');
            redirect('admin/konten');
        }
        $data = array(
            'judul' =>  $this->input->post('judul'),
            'id_kategori' =>  $this->input->post('id_kategori'),
            'isi_konten' =>  $this->input->post('isi_konten'),
            'tanggal' =>  date('Y-m-d'),
            'username' =>  $this->session->userdata('username'),
            'foto' =>  $namafoto,
            'slug'    => str_replace(' ', '-', $this->input->post('judul')),

        );
        $this->db->insert('konten', $data);
        $this->session->set_flashdata('alert', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        	Data Berhasil Disimpan!
        	<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>');
        redirect('admin/konten');
    }
    public function delete_data($id)
    {
        $filename = FCPATH . '/assets/upload/konten/' . $id;
        if (file_exists($filename)) {
            unlink("./assets/upload/konten/" . $id);
        }
        $where = array(
            'foto' => $id
        );
        $this->db->delete('konten', $where);
        $this->session->set_flashdata('alert', '<div class="alert alert-success alert-dismissible fade show" role="alert">
    	Data Berhasil Dihapus!
    	<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>');
        redirect('admin/konten');
    }
    public function update()
    {
        $namafoto = $this->input->post('nama_foto');
        $config['upload_path']          = 'assets/upload/konten/';
        $config['max_size'] = 2048 * 1024; //3 * 1024 * 1024; //3Mb; 0=unlimited
        $config['overwrite']            = true;
        $config['file_name']            = $namafoto;
        $config['allowed_types']        = "*";
        $this->load->library('upload', $config);
        if ($_FILES['foto']['size'] >= 2048 * 1024) {
            $this->session->set_flashdata('alert', '
                    <div class="alert alert-danger alert-dismissible" role="alert">
                    Ukuran foto terlalu besar, upload ulang foto dengan ukuran yang kurang dari 2 MB.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                        ');
            redirect('admin/konten');
        } elseif (!$this->upload->do_upload('foto')) {
            $error = array('error' => $this->upload->display_errors());
        } else {
            $data = array('upload_data' => $this->upload->data());
        }
        $data = array(
            'judul' =>  $this->input->post('judul'),
            'id_kategori' =>  $this->input->post('id_kategori'),
            'isi_konten' =>  $this->input->post('isi_konten'),
            'foto' =>  $namafoto,
            'slug'    => str_replace(' ', '-', $this->input->post('judul')),

        );
        $where = array('foto' => $this->input->post('nama_foto'));
        $this->db->update('konten', $data, $where);
        $this->session->set_flashdata('alert', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        	Data Berhasil Diperbarui!
        	<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>');
        redirect('admin/konten');
    }
}
