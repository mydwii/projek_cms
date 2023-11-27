<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home_m extends CI_Model
{
    public function getAllKonten()
    {
        $this->db->from('konten a');
        $this->db->join('kategori b', 'a.id_kategori = b.id_kategori', 'left');
        $this->db->join('user c', 'a.username = c.username', 'left');
        $this->db->order_by('tanggal', ' DESC');
        return $this->db->get()->result_array();
    }
    public function getKonten($limit, $start, $keyword = null)
    {
        if ($keyword) {
            $this->db->like('isi_konten', $keyword);
            $this->db->or_like('judul', $keyword);
        }
        $this->db->join('kategori', 'konten.id_kategori = kategori.id_kategori', 'left');
        $this->db->join('user', 'konten.username = user.username', 'left');
        $this->db->order_by('tanggal', ' DESC');
        return $this->db->get('konten', $limit, $start)->result_array();
    }
    public function countAllContent()
    {
        return $this->db->get('konten')->num_rows();
    }
}
