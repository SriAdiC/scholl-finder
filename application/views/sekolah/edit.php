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

        <button type="submit" class="btn btn-primary">Edit</button>

    </form>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->