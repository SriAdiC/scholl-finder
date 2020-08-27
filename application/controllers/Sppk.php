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
        $data['pilihan'] = $this->Sppk->countSkl($data['user']['id']);
        $data['sklp'] = $this->Sppk->getPilihan($data['user']['id']);

        // var_dump($data['sklp']);
        // die;

        $this->form_validation->set_rules('nama', 'Nama Sekolah', 'required|trim');
        $this->form_validation->set_rules('alamat', 'alamat', 'required|trim');
        $this->form_validation->set_rules('NPSN', 'NPSN', 'required|trim');
        // $this->form_validation->set_rules('email', 'email', 'required|trim|valid_email');
        $this->form_validation->set_rules('kurikulum', 'kurikulum', 'required|trim');


        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('sekolah/datasekolah', $data);
            $this->load->view('templates/footer');
        } else {
            $slug = url_title($this->input->post('nama'), '-', TRUE);
            $sarpras = $this->input->post('check[]');
            $jumlah = count($sarpras);

            if ($jumlah > 5) {
                $dataStandart = 1;
            } else if ($jumlah = 5) {
                $dataStandart = 2;
            } else if ($jumlah = 3) {
                $dataStandart = 3;
            } else if ($jumlah = 1) {
                $dataStandart = 4;
            } else {
                $dataStandart = 5;
            }

            $input = implode(", ", $sarpras);
            $data = [
                'npsn' => $this->input->post('NPSN'),
                'nama' => $this->input->post('nama'),
                'slug' => $slug,
                'alamat' => $this->input->post('alamat'),
                'status' => $this->input->post('status'),
                'akreditasi' => $this->input->post('akreditasi'),
                'sarpras' => $input,
                'ketersediaanSarpras' => $dataStandart,
                'kurikulum' => $this->input->post('kurikulum'),
                'website' => $this->input->post('website'),
                'email' => $this->input->post('email'),
                'no_telp' => $this->input->post('no_telp'),
                'foto' => 'sekolah1.jpg'
            ];

            // var_dump($data);
            // die;

            $this->db->insert('sekolah', $data);
            $this->session->set_flashdata('msg', 'Berhasil Menambah Data');
            redirect('sppk');
        }
    }

    public function detail($id)
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['pilihan'] = $this->Sppk->countSkl($data['user']['id']);
        $data['sklp'] = $this->Sppk->getPilihan($data['user']['id']);
        $id = $this->input->get('key');
        $data['title'] = 'Data Sekolah';

        $data['sekolah'] = $this->db->get_where('sekolah', ['id_sekolah' => $id])->row_array();

        $data['jurusan'] = $this->Sppk->getDataJurusan($id);

        $data['range'] = $this->Sppk->getJarak($data['user']['id']);

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
        $sekolah = $this->db->get_where('sekolah', ['id_sekolah' => $id])->row_array();
        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $sklp = $this->db->get_where('sekolah_pilihan', ['sekolah_id' => $id])->row_array();

        // var_dump($sklp);
        // die;

        $data = [
            'sekolah_id' => $id,
            'id_user' => $user['id']
        ];

        // if ($data['id_sekolah'] == $sklp['id_sekolah'] && $data['id_user'] == $user['id']) {
        //     $this->session->set_flashdata('error', 'Data sudah ada');
        //     redirect('sppk');
        // }

        $this->db->insert('sekolah_pilihan', $data);
        $this->session->set_flashdata('msg', 'Berhasil Menambah Data ke Keranjang');
        redirect('sppk');
    }

    public function hapus($id)
    {
        $rkc = $this->input->get('rkc');
        $data['range'] = $this->Sppk->getJarak($rkc);

        $this->db->delete('sekolah_pilihan', ['id_pilih' => $id]);
        redirect('sppk/banding?rkc=' . $data['range']['id']);
    }

    public function banding()
    {
        $data['title'] = 'Data Sekolah';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['sekolah'] = $this->db->get('sekolah_pilihan')->result_array();
        $data['pilihan'] = $this->Sppk->countSkl($data['user']['id']);
        $data['sklp'] = $this->Sppk->getPilihan($data['user']['id']);
        $data['range'] = $this->Sppk->getJarak($data['user']['id']);

        // var_dump($data['sklp']);
        // die;

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
        $data['pilihan'] = $this->Sppk->countSkl($data['user']['id']);
        $data['sklp'] = $this->Sppk->getPilihan($data['user']['id']);

        $this->form_validation->set_rules('status', 'Status', 'required');
        $this->form_validation->set_rules('akreditasi', 'Akreditasi', 'required');
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
            $jmlhAlternatif = $data['pilihan'];

            //          Nilai Max dari database

            $rmax = $this->Sppk->maxStatus($data['user']['id']);
            $MAUTstatusmax = $rmax['status'];
            $rmax2 = $this->Sppk->maxAkreditasi($data['user']['id']);
            $MAUTakreditasimax = $rmax2['skor_akreditasi'];
            $rmax3 = $this->Sppk->maxKurikulum($data['user']['id']);
            $MAUTkurikulumMax = $rmax3['kurikulum'];
            $rmax4 = $this->Sppk->maxJarak();
            $MAUTJarakmax = $rmax4['jarak'];

            //          Nilai Min dari Database

            $rmin = $this->Sppk->minStatus($data['user']['id']);
            $MAUTstatusmin = $rmin['status'];
            $rmin2 = $this->Sppk->minAkreditasi($data['user']['id']);
            $MAUTakreditasimin = $rmin2['skor_akreditasi'];
            $rmin3 = $this->Sppk->minKurikulum($data['user']['id']);
            $MAUTkurikulummin = $rmin3['kurikulum'];
            $rmin4 = $this->Sppk->minJarak();
            $MAUTJarakmin = $rmin4['jarak'];

            // var_dump($jmlhAlternatif);
            // die;

            $bobotStatus = $this->input->post('status');
            $bobotAkreditasi = $this->input->post('akreditasi');
            $bobotSarpras = $this->input->post('sarpras');
            $bobotKurikulum = $this->input->post('kurikulum');
            $bobotJarak = $this->input->post('jarak');
            $totalBobot = $bobotStatus + $bobotSarpras + $bobotKurikulum + $bobotJarak;

            $id_user = $data['user']['id'];

            $row = $data['sklp'];

            foreach ($row as $re) : endforeach;

            // var_dump($row);
            // die;

            $normalisasiStatus = $bobotStatus / $totalBobot;
            $normalisasiAkreditasi = $bobotAkreditasi / $totalBobot;
            $normalisasiSarpras = $bobotSarpras / $totalBobot;
            $normalisasiKurikulum = $bobotKurikulum / $totalBobot;
            $normalisasiJarak = $bobotJarak / $totalBobot;

            $a = 0;

            while ($r = $re) {
                // var_dump($r);
                // die;
                $a++;
                $data[$a]['status'] = $r['status'];
                $data[$a]['akreditasi'] = $r['akreditasi'];
                $r2 = $this->Sppk->standar($r['ketersediaanSarpras']);
                $data[$a]['ketersediaanSarpras'] = $r2['skor'];
                $data[$a]['kurikulum'] = $r['kurikulum'];
                $data[$a]['jarak'] = $r['jarak'];
            };

            for ($b = 1; $b <= $jmlhAlternatif; $b++) {

                $divStatus = $MAUTstatusmin - $MAUTstatusmax;
                $tempStatus = 0;
                if ($divStatus == 0) {
                    $tempStatus = 1;
                } else {
                    $tempStatus = ($data[$b]['status'] - $MAUTstatusmax) / $divStatus;
                }

                $ndata[$b]['status'] = $tempStatus;


                $divAkreditasi = $MAUTakreditasimin - $MAUTakreditasimax;
                $tempAkreditasi = 0;
                if ($divAkreditasi == 0) {
                    $tempAkreditasi = 1;
                } else {
                    $tempAkreditasi = ($data[$b]['akreditasi'] - $MAUTakreditasimax) / $divAkreditasi;
                }

                $ndata[$b]['akreditasi'] = $tempAkreditasi;


                $divKurikulum = $MAUTkurikulummin - $MAUTkurikulumMax;
                $tempKurikulum = 0;
                if ($divKurikulum == 0) {
                    $tempKurikulum = 1;
                } else {
                    $tempKurikulum = ($data[$b]['kurikulum'] - $MAUTkurikulumMax) / $divKurikulum;
                }

                $ndata[$b]['kurikulum'] = $tempKurikulum;


                $divJarak = $MAUTJarakmin - $MAUTJarakmax;
                $tempJarak = 0;
                if ($divJarak == 0) {
                    $tempJarak = 1;
                } else {
                    $tempJarak = ($data[$b]['Jarak'] - $MAUTJarakmax) / $divJarak;
                }

                $ndata[$b]['Jarak'] = $tempJarak;
            }

            $id_user = $data['user']['id'];

            $sekolah = $this->db->query("SELECT * FROM sekolah s,sekolah_pilihan sp FROM s.id = sp.sekolah_id AND sp.id_user = $id_user ORDER BY sp.id_pilih");

            $d = 0;
            while ($r = $sekolah) {
                $d++;
                $nilaiStatus = ($normalisasiStatus * $ndata[$d]['status']);
                $nilaiAkreditasi = ($normalisasiAkreditasi * $ndata[$d]['akreditasi']);
                $nilaiKurikulum = ($normalisasiKurikulum * $ndata[$d]['kurikulum']);
                $nilaiSarpras = ($normalisasiSarpras * $ndata[$d]['ketersediaanSarpras']);
                $nilaiJarak = ($normalisasiJarak * $ndata[$d]['jarak']);
                $v[$d] = $nilaiStatus + $nilaiAkreditasi + $nilaiKurikulum + $nilaiSarpras + $nilaiJarak;
                $nilai = $v[$d];

                $data = [
                    'id_sekolah' => $r['id'],
                    'id_cart' => $r['id_pilih'],
                    'id_user' => $id_user,
                    'nilai' => $nilai
                ];

                $this->db->insert('hasil_muat', $data);
                // var_dump($data);
                // die;
                echo 'Berhasil! Hore';
            }
            redirect('sppk/rekomendasi');
        }
    }

    public function rekomendasi()
    {
        $data['title'] = 'Pembobotan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['sekolah'] = $this->db->get('sekolah')->result_array();
        $data['pilihan'] = $this->Sppk->countSkl($data['user']['id']);
        $data['sklp'] = $this->Sppk->getPilihan($data['user']['id']);

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
        $data['sklp'] = $this->Sppk->getPilihan($data['user']['id']);

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
}
