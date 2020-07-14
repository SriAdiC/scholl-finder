<!-- Begin Page Content -->
<div class="container-fluid">


  <div class="row">
    <div class="col-lg-8">
      <?= $this->session->flashdata('message'); ?>
    </div>
  </div>

  <div class="form-jarak col-md-8 offset-2">
    <form action="<?= base_url('sppk/banding'); ?>" method="GET">

      <div class="form-group">
        <label for="kec">Pilih Kecamatan Anda Terlebih Dahulu</label>
        <select class="form-control" id="kec" name="rkc">
          <option value="">- Pilih Kecamatan -</option>
          <?php foreach ($jarak as $r) : ?>
            <option value="<?= $r['id']; ?>"><?= $r['kecamatan']; ?></option>
          <?php endforeach; ?>
        </select>
      </div>

      <button type="submit" class="btn btn-success mb-5" style="margin-left: 50%; transform: translateX(-50%);">Lanjut Bandingkan</button>
    </form>
  </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->