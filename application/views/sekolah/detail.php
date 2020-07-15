<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="message" data-flashdata="<?= $this->session->flashdata('msg') ?>"></div>
    <div class="error" data-flashdata="<?= $this->session->flashdata('error'); ?>"></div>

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Detail Sekolah</h1>

    <div class="alert alert-info" role="alert">
        Sebelum klik tombol bandingkan anda harus memilih kecamatan yang anda tinggali terlebih dahulu.
    </div>

    <div class="detail col-md-12">
        <div class="text-center mb-3">
            <img class="img-thumbnail" width="450" src="<?= base_url('assets/img/sekolah/') . $sekolah['foto'] ?>" alt="sekolah">
        </div>

        <div class="col-md-8 offset-2">
            <table class="table table-bordered">
                <tr>
                    <th class="bg-dark text-light text-left" scope="col">NPSN</th>
                    <td><?= $sekolah['npsn'] ?></td>
                </tr>
                <tr>
                    <th class=" bg-dark text-light text-left" scope="col">Nama</th>
                    <td><?= $sekolah['nama']; ?></td>
                </tr>
                <tr>
                    <th class="bg-dark text-light text-left" scope="col">Alamat</th>
                    <td><?= $sekolah['alamat']; ?></td>
                </tr>
                <tr>
                    <th class="bg-dark text-light text-left" scope="col">Status / Akreditasi</th>
                    <td><?= $sekolah['status'] . ' / ' . $sekolah['akreditasi']; ?></td>
                </tr>
                <tr>
                    <th class="bg-dark text-light text-left" scope="col">Website / Email</th>
                    <td><a href="<?= $sekolah['website'] ?>" target="_blank"><?= $sekolah['website'] ?></a> / <?= $sekolah['email'] ?></td>
                </tr>
                <tr>
                    <th class="bg-dark text-light text-left" scope="col">Fax / No.Telp</th>
                    <td><?= $sekolah['no_telp']; ?></td>
                </tr>
                <tr>
                    <th class="bg-dark text-light text-left" scope="col">Kurikulum</th>
                    <td><?= $sekolah['kurikulum']; ?></td>
                </tr>
                <tr>
                    <th class="bg-dark text-light text-left" scope="col">Jurusan</th>
                    <td>
                        <?php foreach ($jurusan as $j) : ?>
                            - <?= $j['nama_jurusan'] ?> <br>
                        <?php endforeach; ?>
                    </td>
                </tr>
                <tr>
                    <th class="bg-dark text-light text-left" scope="col">Sarana Prasarana</th>
                    <td><?= $sekolah['sarpras']; ?></td>
                </tr>
                <tr>
                    <th class="bg-dark text-light text-left" scope="col">Ekstrakulikuler</th>
                    <td>
                        <?php foreach ($ekstra as $eks) : ?>
                            - <?= $eks['nama_ekskul'] ?> <br>
                        <?php endforeach; ?>
                    </td>
                </tr>
            </table>
            <a href="<?= base_url('sppk/jarak'); ?>" class="btn btn-success mb-5" style="margin-left: 50%; transform: translateX(-50%);">Bandingkan</a>
            <?php if ($this->session->userdata('role_id') == 1) : ?>
                <a href="<?= base_url('sppk/edit/') . $sekolah['id']; ?>" class="btn btn-warning mb-5">Edit</a>
                <a href="<?= base_url('sppk/delete/') . $sekolah['id']; ?>" class="btn btn-danger mb-5 hapus">Delete</a>
            <?php endif; ?>
        </div>
    </div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->