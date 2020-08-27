<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="message" data-flashdata="<?= $this->session->flashdata('msg') ?>"></div>
    <div class="error" data-flashdata="<?= $this->session->flashdata('error'); ?>"></div>

    <div class="card shadow mb-4 position-relative">
        <div class="card-header py-3 d-flex flex-row ">
            <h6 class="m-0 font-weight-bold text-primary">Rekomendasi Pemilihan Sekolah</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead class="bg-dark text-light text-center">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Sekolah</th>
                            <th scope="col">Nama Sekolah</th>
                            <th scope="col">Nilai</th>
                            <th scope="col">Rekomendasi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1;
                        foreach ($sklp as $skl) : ?>
                            <tr class="data" data-sekolah="<?= $skl['slug']; ?>" data-id="<?= $skl['id']; ?>">
                                <td><?= $i++ ?></td>
                                <td><img src="<?= base_url('assets/img/sekolah/') . $skl['foto']; ?>" alt="sekolah" width="150"></td>
                                <td><?= $skl['nama'] ?></td>
                                <td><?= $skl['alamat']; ?></td>
                                <td><?= $skl['no_telp']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="card shadow mb-4 position-relative">
        <div class="card-header py-3 d-flex flex-row ">
            <h6 class="m-0 font-weight-bold text-primary">Evaluasi Nilai</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead class="bg-dark text-light text-center">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Sekolah</th>
                            <th scope="col">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1;
                        foreach ($sklp as $skl) : ?>
                            <tr>
                                <td><?= $i++ ?></td>
                                <td><?= $skl['nama'] ?></td>
                                <td><?= $skl['alamat']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="position-relative">
        <a href="#" class="btn btn-circle bg-primary position-absolute" style="right: 0;"><i class="fas fa-file-pdf text-white"></i></a>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->