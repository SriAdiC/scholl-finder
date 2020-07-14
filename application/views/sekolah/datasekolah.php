<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="message" data-flashdata="<?= $this->session->flashdata('msg') ?>"></div>
    <div class="error" data-flashdata="<?= $this->session->flashdata('error'); ?>"></div>

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="card shadow mb-4 position-relative">
        <div class="card-header py-3 d-flex flex-row ">
            <h6 class="m-0 font-weight-bold text-primary">Data Sekolah</h6>
            <?php if ($this->session->userdata['role_id'] == 1) : ?>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-circle btn-primary position-absolute right" data-toggle="modal" data-target="#exampleModal" style="top: 5px; right:1em;"><i class="fas fa-plus"></i>
                </button>
            <?php endif; ?>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover" id="dataTable">
                    <thead class="bg-dark text-light text-center">
                        <tr>
                            <th scope="col">NPSN</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Status / Akreditasi</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">No.telepon</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($sekolah as $skl) : ?>
                            <tr class="data" data-sekolah="<?= $skl['slug']; ?>" data-id="<?= $skl['id']; ?>">
                                <td><?= $skl['npsn']; ?></td>
                                <td><?= $skl['nama']; ?></td>
                                <td><?= $skl['status'] . ' / ' . $skl['akreditasi']; ?></td>
                                <td><?= $skl['alamat']; ?></td>
                                <td><?= $skl['no_telp']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data Sekolah</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('sppk') ?>" method="POST">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="NPSN">NPSN</label>
                            <input type="number" class="form-control" id="NPSN" name="NPSN">
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama Sekolah</label>
                            <input type="text" class="form-control" id="nama" name="nama">
                        </div>
                        <div class="col-lg-12 d-flex">
                            <div class="form-group col-sm-6">
                                <label for="status">Status</label>
                                <select class="form-control" id="status" name="status">
                                    <option value="">Pilih Status</option>
                                    <option value="NEGERI">NEGERI</option>
                                    <option value="SWASTA">SWASTA</option>
                                </select>
                            </div>

                            <div class="form-group col-sm-6">
                                <label for="akreditasi">Akreditasi</label>
                                <select class="form-control" id="akreditasi" name="akreditasi">
                                    <option value="">Pilih Akreditasi</option>
                                    <option value="A">A</option>
                                    <option value="B">B</option>
                                    <option value="C">C</option>
                                    <option value="D">D</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat Sekolah</label>
                            <input type="text" class="form-control" id="alamat" name="alamat">
                        </div>
                        <div class="form-group">
                            <label for="kurikulum">Kurikulum</label>
                            <select class="form-control" id="kurikulum" name="kurikulum">
                                <option value="">Pilih Kurikulum</option>
                                <option value="Kurikulum 2006 (KTSP)">Kurikulum 2006 (KTSP)</option>
                                <option value="Kurikulum 2013">Kurikulum 2013</option>
                            </select>
                        </div>
                        <div class="col-lg-12 d-flex">
                            <div class="form-group col-sm-6">
                                <label for="website">Website</label>
                                <input type="text" class="form-control" id="website" name="website" placeholder="http://www.example.sch.id">
                            </div>

                            <div class="form-group col-sm-6">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="no_telp">No Telp</label>
                            <input type="no_telp" class="form-control" id="no_telp" name="no_telp">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->