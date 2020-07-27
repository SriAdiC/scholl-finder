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
        $data['pilihan'] = $this->db->count_all('sekolah_pilihan');
        $data['sklp'] = $this->db->get('sekolah_pilihan')->result_array();

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
        $data['pilihan'] = $this->db->count_all('sekolah_pilihan');
        $data['sklp'] = $this->db->get('sekolah_pilihan')->result_array();
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

    public function simpanData($id)
    {
        $sekolah = $this->db->get_where('sekolah', ['id' => $id])->row_array();
        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $sklp = $this->db->get_where('sekolah_pilihan', ['id' => $id])->row_array();

        $data = [
            'id' => $id,
            'nama' => $sekolah['nama'],
            'npsn' => $sekolah['npsn'],
            'slug' => $sekolah['slug'],
            'akreditasi' => $sekolah['akreditasi'],
            'kurikulum' => $sekolah['kurikulum'],
            'alamat' => $sekolah['alamat'],
            'status' => $sekolah['status'],
            'sarpras' => $sekolah['sarpras'],
            'website' => $sekolah['website'],
            'email' => $sekolah['email'],
            'no_telp' => $sekolah['no_telp'],
            'foto' => $sekolah['foto'],
            'id_user' => $user['id']
        ];

        if ($data['id'] == $sklp['id']) {
            $this->session->set_flashdata('error', 'Data sudah ada');
            redirect('sppk');
        }

        $this->db->insert('sekolah_pilihan', $data);
        $this->session->set_flashdata('msg', 'Berhasil Menambah Data ke Keranjang');
        redirect('sppk');
    }

    public function hapus($id)
    {
        $rkc = $this->input->get('rkc');
        $data['range'] = $this->Sppk->getJarak($rkc);

        $this->db->delete('sekolah_pilihan', ['id' => $id]);
        redirect('sppk/banding?rkc=' . $data['range']['id']);
    }

    public function banding()
    {
        $data['title'] = 'Data Sekolah';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['sekolah'] = $this->db->get('sekolah_pilihan')->result_array();
        $data['pilihan'] = $this->db->count_all('sekolah_pilihan');
        $data['sklp'] = $this->db->get('sekolah_pilihan')->result_array();
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
        $data['pilihan'] = $this->db->count_all('sekolah_pilihan');
        $data['sklp'] = $this->db->get('sekolah_pilihan')->result_array();

        $this->form_validation->set_rules('status', 'Status', 'required');
        $this->form_validation->set_rules('kurikulum', 'kurikulum', 'required');
        $this->form_validation->set_rules('sarpras', 'sarpras', 'required');
        $this->form_validation->set_rules('jarak', 'jarak', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('sekolah/pembobotan', $data);
            $this->load->view('templates/footer');
        } else {
            redirect('sppk/rekomendasi');
        }
    }

    public function rekomendasi()
    {
        $data['title'] = 'Pembobotan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['sekolah'] = $this->db->get('sekolah')->result_array();
        $data['pilihan'] = $this->db->count_all('sekolah_pilihan');
        $data['sklp'] = $this->db->get('sekolah_pilihan')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('sekolah/rekom', $data);
        $this->load->view('templates/footer');
    }

    public function delete($id)
    {
        $this->Sppk->delete($id);
        $this->session->set_flashdata('msg', 'Berhasil Menghapus Data');
        redirect('sppk');
    }

    public function edit($id)
    {
        $data['title'] = 'Data Sekolah';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['sekolah'] = $this->db->get_where('sekolah', ['id' => $id])->row_array();

        $data['jurusan'] = $this->Sppk->getDataJurusan($id);
        $data['sklp'] = $this->db->get('sekolah_pilihan')->result_array();

        $data['range'] = $this->Sppk->getJarak();

        $data['ekstra'] = $this->Sppk->getEskul($id);

        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('kurikulum', 'Kurikulum', 'required');
        $this->form_validation->set_rules('npsn', 'NPSN', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('sekolah/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $nama = $this->input->post('nama');
            $npsn = $this->input->post('npsn');
            $alamat = $this->input->post('alamat');
            $status = $this->input->post('status');
            $akreditasi = $this->input->post('akreditasi');
            $kurikulum = $this->input->post('kurikulum');


            //jika ada gambar yg diupload
            $upload_image = $_FILES['foto']['name'];
            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '2048';


                $config['upload_path'] = './assets/img/profile';
                $this->load->library('upload', $config);

                if ($this->upload->do_upload('foto')) {

                    $old_image = $data['sekolah']['foto'];
                    if ($old_image != 'default.png') {
                    }
                    unlink(FCPATH . 'assets/img/sekolah/' . $old_image);

                    $new_image = $this->upload->data('file_name');
                    $this->db->set('foto', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $data = [
                'npsn' => $npsn,
                'nama' => $nama,
                'alamat' => $alamat,
                'status' => $status,
                'akreditasi' => $akreditasi,
                'kurikulum' => $kurikulum
            ];

            $this->db->set($data);
            $this->db->where('id', $id);
            $this->db->update('sekolah');

            $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Data Berhasil di ubah!</div>');
            redirect('sppk');
        }
    }

    public function jarak()
    {
        $data['title'] = 'Data Sekolah';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['sekolah'] = $this->db->get('sekolah')->result_array();
        $data['jarak'] = $this->Sppk->getJarak();
        $data['pilihan'] = $this->db->count_all('sekolah_pilihan');
        $data['sklp'] = $this->db->get('sekolah_pilihan')->result_array();

        // var_dump($data['jarak']);
        // die;

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('sekolah/jarak', $data);
        $this->load->view('templates/footer');
    }
}
