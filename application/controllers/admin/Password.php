<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Password extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_m');
        $this->load->library('form_validation');
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
        // $password = $this->input->post('password');
        $newpassword = $this->input->post('newpassword');
        $renewpassword = $this->input->post('renewpassword');

        // $this->form_validation->set_rules('password', 'password', 'required');
        $this->form_validation->set_rules('newpassword', 'password baru', 'required|matches[renewpassword]');
        $this->form_validation->set_rules('renewpassword', 'ulang password', 'required');

        if ($this->form_validation->run() != FALSE) {
            $where = array(
                'id_user' => $this->input->post('id_user')
            );
            $data = array(
                // 'password' => $password,
                'password' => md5($newpassword),
            );
            $this->db->update('user', $data, $where);
            $this->session->set_flashdata('alert', '<div class="alert alert-success alert-dismissible fade show" role="alert">
		Password Berhasil Diubah!
		<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
	  </div>');
            redirect('Auth');
        } else {
            redirect('admin/password');
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
