<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Sppk_model extends CI_Model
{
    public function getDataJurusan($id)
    {
        $this->db->select('nama_jurusan');
        $this->db->from('sekolah_jurusan');
        $this->db->join('sekolah', 'sekolah.id_sekolah = sekolah_jurusan.sekolah_id', 'inner');
        $this->db->join('jurusan', 'jurusan.id_jurusan = sekolah_jurusan.id_jurusan', 'inner');
        $this->db->where('id_sekolah', $id);
        $query = $this->db->get();

        return $query->result_array();
    }

    public function getJurusan()
    {
        $this->db->select('nama_jurusan');
        $this->db->from('sekolah_jurusan');
        $this->db->join('sekolah', 'sekolah.id_sekolah = sekolah_jurusan.sekolah_id', 'inner');
        $this->db->join('jurusan', 'jurusan.id_jurusan = sekolah_jurusan.id_jurusan', 'inner');
        $query = $this->db->get();

        return $query->result_array();
    }

    public function getEskul($id)
    {
        $this->db->select('nama_ekskul');
        $this->db->from('sekolah_ekskul');
        $this->db->join('sekolah', 'sekolah.id_sekolah = sekolah_ekskul.sekolah_id', 'inner');
        $this->db->join('ekskul', 'ekskul.id = sekolah_ekskul.id_ekskul', 'inner');
        $this->db->where('sekolah_id', $id);
        $query = $this->db->get();

        return $query->result_array();
    }

    public function getJarak($id)
    {
        // if ($id != null) {
        //     $query = $this->db->get_where('jarak', ['id' => $id])->row_array();
        // } else {
        //     $query = $this->db->get('jarak')->result_array();
        // }
        $this->db->select('*');
        $this->db->from('user');
        $this->db->join('jarak', 'jarak.id_jarak = user.jarak', 'inner');
        $this->db->where('user.id', $id);
        $query = $this->db->get();

        return $query->row_array();
    }

    public function getPilihan($id_user)
    {
        $this->db->select('*');
        $this->db->from('sekolah_pilihan');
        $this->db->join('sekolah', 'sekolah.id_sekolah = sekolah_pilihan.sekolah_id', 'inner');
        $this->db->join('user', 'user.id = sekolah_pilihan.id_user', 'inner');
        $this->db->join('jarak', 'jarak.id_jarak = user.jarak', 'inner');
        $this->db->where('id_user', $id_user);
        $this->db->order_by('sekolah_pilihan.id_pilih', 'ASC');
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
        return $this->db->delete('sekolah', ['id_sekolah' => $id]);
    }

    public function standar($id_standar)
    {
        return $this->db->get_where('standart_kualitatif', ['id_standart' => $id_standar])->row_array();
    }

    public function maxStatus($id_user)
    {
        $query = "SELECT s.status FROM sekolah s, sekolah_pilihan t WHERE t.id_sekolah = s.id_sekolah AND id_user = '$id_user' ORDER BY s.status DESC LIMIT 1";
        return $this->db->query($query)->row_array();
    }

    public function maxAkreditasi($id_user)
    {
        $query = "SELECT s.skor_akreditasi FROM sekolah s, sekolah_pilihan t WHERE t.id_sekolah = s.id_sekolah AND id_user = '$id_user' ORDER BY s.skor_akreditasi DESC LIMIT 1";
        return $this->db->query($query)->row_array();
    }

    public function maxKurikulum($id_user)
    {
        $query = "SELECT s.kurikulum FROM sekolah s, sekolah_pilihan t WHERE t.id_sekolah = s.id_sekolah AND id_user = '$id_user' ORDER BY s.kurikulum DESC LIMIT 1";
        return $this->db->query($query)->row_array();
    }

    public function maxJarak()
    {
        $query = "SELECT jarak FROM jarak ORDER BY jarak DESC LIMIT 1";
        return $this->db->query($query)->row_array();
    }


    public function minKurikulum($id_user)
    {
        $query = "SELECT s.kurikulum FROM sekolah s, sekolah_pilihan t WHERE t.id_sekolah = s.id_sekolah AND id_user = '$id_user' ORDER BY s.kurikulum ASC LIMIT 1";
        return $this->db->query($query)->row_array();
    }

    public function minStatus($id_user)
    {
        $query = "SELECT s.status FROM sekolah s, sekolah_pilihan t WHERE t.id_sekolah = s.id_sekolah AND id_user = '$id_user' ORDER BY s.status ASC LIMIT 1";
        return $this->db->query($query)->row_array();
    }

    public function minAkreditasi($id_user)
    {
        $query = "SELECT s.skor_akreditasi FROM sekolah s, sekolah_pilihan t WHERE t.id_sekolah = s.id_sekolah AND id_user = '$id_user' ORDER BY s.skor_akreditasi ASC LIMIT 1";
        return $this->db->query($query)->row_array();
    }

    public function minJarak()
    {
        $query = "SELECT jarak FROM jarak ORDER BY jarak ASC LIMIT 1";
        return $this->db->query($query)->row_array();
    }

    public function alternatif($id_user)
    {
        $this->db->where('id_user', $id_user);
        return $this->db->count_all_results('sekolah_pilihan');
    }
}
