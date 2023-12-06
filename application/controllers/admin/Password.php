<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Password extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_m');
    }
    public function index()
    {
        $data = array(
            'judul_halaman' => 'Ganti Password',
            'controller' => $this->uri->segment(2),
            'pengguna' => $this->db->get_where('user', array('id_user' => $this->session->userdata('id_user')))->row(),
        );
        $this->template->load('template_admin', 'admin/password', $data);
    }
    public function ubahpass()
    {
        $user = $this->db->get_where('user', ['id_user' => $this->session->userdata('id_user')])->row_array();
        $password  = md5($this->input->post('password0'));
        $newpassword = $this->input->post('newpassword');
        $renewpassword = $this->input->post('renewpassword');

        if ($password != $user['password']) {
            $this->session->set_flashdata('alert', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        	Password Lama salah! Coba lagi!
        	<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>');
            redirect('admin/password');
        } else if ($password == $newpassword) {
            $this->session->set_flashdata('alert', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        	Password Baru harus berbeda dengan yang lama!
        	<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>');
            redirect('admin/password');
        } else if ($newpassword != $renewpassword) {
            $this->session->set_flashdata('alert', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        	Password Baru tidak cocok!
        	<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>');
            redirect('admin/password');
        } else {
            $this->db->set('password', md5($newpassword));
            $this->db->where('id_user', $this->session->userdata('id_user'));
            $this->db->update('user');
            $this->session->set_flashdata('alert', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        	Password Berhasil diganti!
        	<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>');
            redirect('auth');
        }
    }
    public function updatefoto()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $id_user = $this->input->post('id_user');

        $upload_image = $_FILES['image']['name'];

        if ($upload_image) {
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size'] = '2048';
            $config['upload_path'] = './assets/niceadmin/profile/';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('image')) {
                $old_image = $data['user']['image'];
                if ($old_image != 'default.jpg') {
                    unlink(FCPATH . 'assets/niceadmin/profile/' . $old_image);
                }

                $new_image = $this->upload->data('file_name');
                $this->db->set('image', $new_image);
            } else {
                echo $this->upload->display_errors();
            }
        }
        $this->db->where('id_user', $id_user);
        $this->db->update('user');

        $this->session->set_flashdata('alert', '<div class="alert alert-success" role="alert">
            congrats your proflie has been editing :D
          </div>');
        redirect('admin/password');
    }
}
