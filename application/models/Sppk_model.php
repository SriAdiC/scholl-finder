<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Sppk_model extends CI_Model
{
    public function getDataJurusan($id)
    {
        $this->db->select('nama_jurusan');
        $this->db->from('sekolah_jurusan');
        $this->db->join('sekolah', 'sekolah.id = sekolah_jurusan.id_sekolah', 'inner');
        $this->db->join('jurusan', 'jurusan.id_jurusan = sekolah_jurusan.id_jurusan', 'inner');
        $this->db->where('id_sekolah', $id);
        $query = $this->db->get();

        return $query->result_array();
    }

    public function getJurusan()
    {
        $this->db->select('nama_jurusan');
        $this->db->from('sekolah_jurusan');
        $this->db->join('sekolah', 'sekolah.id = sekolah_jurusan.id_sekolah', 'inner');
        $this->db->join('jurusan', 'jurusan.id_jurusan = sekolah_jurusan.id_jurusan', 'inner');
        $query = $this->db->get();

        return $query->result_array();
    }

    public function getEskul($id)
    {
        $this->db->select('nama_ekskul');
        $this->db->from('sekolah_ekskul');
        $this->db->join('sekolah', 'sekolah.id = sekolah_ekskul.sekolah_id', 'inner');
        $this->db->join('ekskul', 'ekskul.id = sekolah_ekskul.id_ekskul', 'inner');
        $this->db->where('sekolah_id', $id);
        $query = $this->db->get();

        return $query->result_array();
    }

    public function getJarak($id = null)
    {
        if ($id != null) {
            $query = $this->db->get_where('jarak', ['id' => $id])->row_array();
        } else {
            $query = $this->db->get('jarak')->result_array();
        }

        return $query;
    }

    public function getPilihan($id_user)
    {
        $this->db->select('*');
        $this->db->from('sekolah_pilihan');
        $this->db->join('sekolah', 'sekolah.id = sekolah_pilihan.id_sekolah', 'inner');
        $this->db->join('user', 'user.id = sekolah_pilihan.id_user', 'inner');
        $this->db->where('id_user', $id_user);
        $query = $this->db->get();

        return $query->result_array();
    }

    public function countSkl($id)
    {
        $this->db->where('id_user', $id);
        return $this->db->count_all_results('sekolah_pilihan');
    }

    public function delete($id)
    {
        return $this->db->delete('sekolah', ['id' => $id]);
    }
}
