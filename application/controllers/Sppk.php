<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sppk extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();

        $this->load->model('Sppk_model', 'Sppk');
    }

    public function index()
    {
        $data['title'] = 'Data Sekolah';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['sekolah'] = $this->db->get('sekolah')->result_array();

        $this->form_validation->set_rules('nama', 'Nama Sekolah', 'required|trim');
        $this->form_validation->set_rules('alamat', 'alamat', 'required|trim');
        $this->form_validation->set_rules('NPSN', 'NPSN', 'required|trim');
        $this->form_validation->set_rules('email', 'email', 'required|trim|valid_email');
        $this->form_validation->set_rules('kurikulum', 'kurikulum', 'required|trim');


        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('sekolah/datasekolah', $data);
            $this->load->view('templates/footer');
        } else {
            $slug = url_title($this->input->post('nama'), '-', TRUE);
            $data = [
                'npsn' => $this->input->post('NPSN'),
                'nama' => $this->input->post('nama'),
                'slug' => $slug,
                'alamat' => $this->input->post('alamat'),
                'status' => $this->input->post('status'),
                'akreditasi' => $this->input->post('akreditasi'),
                'kurikulum' => $this->input->post('kurikulum'),
                'website' => $this->input->post('website'),
                'email' => $this->input->post('email'),
                'no_telp' => $this->input->post('no_telp'),
                'foto' => 'sekolah1.jpg'
            ];

            $this->db->insert('sekolah', $data);
            $this->session->set_flashdata('msg', 'Berhasil Menambah Data');
            redirect('sppk');
        }
    }

    public function detail($id)
    {
        $id = $this->input->get('key');
        $data['title'] = 'Data Sekolah';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['sekolah'] = $this->db->get_where('sekolah', ['id' => $id])->row_array();

        $data['jurusan'] = $this->Sppk->getDataJurusan($id);

        $data['range'] = $this->Sppk->getJarak();

        $data['ekstra'] = $this->Sppk->getEskul($id);

        $this->form_validation->set_rules('rkc', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('sekolah/detail', $data);
            $this->load->view('templates/footer');
        }
    }

    public function banding()
    {
        $data['title'] = 'Data Sekolah';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['sekolah'] = $this->db->get('sekolah')->result_array();

        $id = $this->input->get('rkc');
        $data['range'] = $this->Sppk->getJarak($id);

        $data['jurusan'] = $this->Sppk->getJurusan();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('sekolah/banding', $data);
        $this->load->view('templates/footer');
    }

    public function pembobotan()
    {
        $data['title'] = 'Pembobotan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('sekolah/pembobotan', $data);
        $this->load->view('templates/footer');
    }

    public function delete($id)
    {
        $this->Sppk->delete($id);
        $this->session->set_flashdata('msg', 'Berhasil Menghapus Data');
        redirect('sppk');
    }

    public function jarak()
    {
        $data['title'] = 'Data Sekolah';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['sekolah'] = $this->db->get('sekolah')->result_array();
        $data['jarak'] = $this->Sppk->getJarak();

        // var_dump($data['jarak']);
        // die;

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('sekolah/jarak', $data);
        $this->load->view('templates/footer');
    }
}
