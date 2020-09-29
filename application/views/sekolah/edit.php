<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="message" data-flashdata="<?= $this->session->flashdata('msg') ?>"></div>
    <div class="error" data-error="<?= $this->session->flashdata('error'); ?>"></div>


    <form method="POST" action="<?= base_url('sppk/edit/') . $sekolah['id_sekolah'];  ?>">
        <div class="form-group row">
            <label for="npsn" class="col-sm-2 col-form-label">NPSN</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" name="npsn" id="npsn" value="<?= $sekolah['npsn']; ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="nama" class="col-sm-2 col-form-label">Nama Sekolah</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" name="nama" id="nama" value="<?= $sekolah['nama']; ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" name="alamat" id="alamat" value="<?= $sekolah['alamat']; ?>">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-6">
                <label for="status" class="col-sm-2 col-form-label">Status</label>
                <div class="col-sm-8">
                    <select class="form-control" id="status" name="status">
                        <option value="<?= $sekolah['status']; ?>"><?= ($sekolah['status'] == 5) ? 'NEGERI' : 'SWASTA' ?></option>
                        <option value="5">NEGERI</option>
                        <option value="3">SWASTA</option>
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <label for="akreditasi" class="col-sm-2 col-form-label">Akreditasi</label>
                <div class="col-sm-8">
                    <select class="form-control" id="akreditasi" name="akreditasi">
                        <option value="<?= $sekolah['akreditasi']; ?>"><?= $sekolah['akreditasi'] ?></option>
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="C">C</option>
                        <option value="D">D</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="form-group row">
            <label for="kurikulum" class="col-sm-2 col-form-label">Kurikulum</label>
            <div class="col-sm-8">
                <select class="form-control" id="kurikulum" name="kurikulum">
                    <option value="<?= $sekolah['kurikulum']; ?>"><?= ($sekolah['kurikulum'] == 5) ? 'Kurikulum 2013' : 'Kurikulum 2006 (KTSP)'; ?></option>
                    <option value="5">Kurikulum 2013</option>
                    <option value="3">Kurikulum 2006 (KTSP)</option>
                </select>
            </div>
        </div>

        <div class="form-group">
            <div class="row">
                <div class="col-md-4">
                    <label>Sarana Prasarana</label>
                </div>
                <div class="col-md-8">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="Perpustakaan" id="autoSizingCheck2" name="check[]" <?= ($sekolah['sarpras'] == "Perpustakaan") ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="autoSizingCheck2">
                            Perpustakaan
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="Lapangan Olahraga" id="autoSizingCheck2" name="check[]">
                        <label class="form-check-label" for="autoSizingCheck2">
                            Lapangan Olahraga
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="Lab Praktikum" id="autoSizingCheck2" name="check[]">
                        <label class="form-check-label" for="autoSizingCheck2">
                            Lab Praktikum
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="Ruang Osis" id="autoSizingCheck2" name="check[]">
                        <label class="form-check-label" for="autoSizingCheck2">
                            Ruang Osis
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="Ruang Ibadah" id="autoSizingCheck2" name="check[]">
                        <label class="form-check-label" for="autoSizingCheck2">
                            Ruang Ibadah
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="Kantin" id="autoSizingCheck2" name="check[]">
                        <label class="form-check-label" for="autoSizingCheck2">
                            Kantin
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="Kantor Guru" id="autoSizingCheck2" name="check[]">
                        <label class="form-check-label" for="autoSizingCheck2">
                            Kantor Guru
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="Kamar Mandi" id="autoSizingCheck2" name="check[]">
                        <label class="form-check-label" for="autoSizingCheck2">
                            Kamar Mandi
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="Ruang BK" id="autoSizingCheck2" name="check[]">
                        <label class="form-check-label" for="autoSizingCheck2">
                            Ruang BK
                        </label>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-4">
                <img src="<?= base_url('assets/img/sekolah/') . $sekolah['foto']; ?>" alt="" class="img-thumbnail" width="250">
            </div>
            <div class="col-md-4">
                <label for="foto">Masukan file input foto</label>
                <input type="file" class="custom-file-input" id="foto" name="foto">
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Edit</button>

    </form>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->