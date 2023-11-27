<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        $this->load->view('login');
    }
    public function login()
    {
        $username = $this->input->post('username');
        $password = md5($this->input->post('password'));
        $this->db->from('user');
        $this->db->where('username', $this->input->post('username'));
        $cekso = $this->db->get()->row();
        if ($cekso == NULL) {
            $this->session->set_flashdata('alert', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Username Tidak Tersedia!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>');
            redirect('auth');
        } else if ($password == $cekso->password) {
            $data = array(
                'id_user' => $cekso->id_user,
                'username' => $cekso->username,
                'nama' => $cekso->nama,
                'level' => $cekso->level,
            );
            date_default_timezone_set('Asia/Jakarta');
            $this->db->set('recent_login', date('Y-m-d H:i:s'));
            $this->db->where('id_user', $cekso->id_user);
            $this->db->update('user');
            $this->session->set_userdata($data);
            redirect('admin/home');
        } else {
            $this->session->set_flashdata('alert', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Password Salah Coba Lagi!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>');
            redirect('auth');
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('auth');
    }
}
