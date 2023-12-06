<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_m extends CI_Model
{
    public function simpan()
    {
        date_default_timezone_set('Asia/Jakarta');
        $data = array(
            'username' => $this->input->post('username'),
            'nama' => $this->input->post('nama'),
            'password' => md5($this->input->post('password')),
            'level' => $this->input->post('level'),
            'recent_login' => date('Y-m-d H:i:s'),
            'image' => 'default.jpg'
        );
        $this->db->insert('user', $data);
    }

    public function update()
    {
        $where = array(
            'id_user' => $this->input->post('id_user')
        );
        $data = array(
            'nama' => $this->input->post('nama')
        );
        $this->db->update('user', $data, $where);
    }

    public function deleteselected($check)
    {
        $this->db->where_in('id_saran', $check);
        return $this->db->delete('saran');
    }
}
