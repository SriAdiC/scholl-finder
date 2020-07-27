<!-- Begin Page Content -->
<div class="container-fluid">

  <div class="row mb-2">
    <div class="col-sm-6">
      <h1 class="m-0 h3 text-dark"><?= $title; ?></h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Pembobotan</li>
      </ol>
    </div><!-- /.col -->
  </div><!-- /.row -->

  <div class="alert alert-secondary mb-5" role="alert">
    Masukkan nilai bobot pada kriteria yang sudah ditentukan. Nilai bobot menentukan hasil rekomendasi sekolah yang akan ada pilih. Semakin penting nilai bobot maka semakin tinggi nilai kriteria tersebut.
  </div>

  <div class="kriteria col-md-8 offset-2">
    <form action="<?= base_url('sppk/pembobotan'); ?>" method="POST">
      <table class="table table-bordered table-sm">
        <thead class="table-secondary text-dark">
          <th scope="col" style="width: 70%">Kriteria</th>
          <th scope="col">Bobot</th>
        </thead>
        <tbody>
          <tr>
            <td>Apakah <b>Status/Akreditasi</b> sangat penting bagi anda?</td>
            <td>
              <select class="form-control form-kriteria form-control-sm <?= (form_error('status')) ? 'is-invalid' : '' ?>" name="status">
                <option value="">-- Pilih Bobot --</option>
                <option value="5">Sangat Penting</option>
                <option value="4">Penting</option>
                <option value="3">Cukup Penting</option>
                <option value="2">Kurang Penting</option>
                <option value="1">Tidak Penting</option>
              </select>
              <div class="invalid-feedback">
                Mohon pilih salah satu.
              </div>
            </td>
          </tr>
          <tr>
            <td>Apakah <b>Sarana dan Prasarana</b> sangat penting bagi anda?</td>
            <td>
              <select class="form-control form-kriteria form-control-sm <?= (form_error('sarpras')) ? 'is-invalid' : '' ?>" name="sarpras">
                <option value="">-- Pilih Bobot --</option>
                <option value="5">Sangat Penting</option>
                <option value="4">Penting</option>
                <option value="3">Cukup Penting</option>
                <option value="2">Kurang Penting</option>
                <option value="1">Tidak Penting</option>
              </select>
              <div class="invalid-feedback">
                Mohon pilih salah satu.
              </div>
            </td>
          </tr>
          <tr>
            <td>Apakah <b>Kurikulum</b> sangat penting bagi anda?</td>
            <td>
              <select class="form-control form-kriteria form-control-sm <?= (form_error('kurikulum')) ? 'is-invalid' : '' ?>" name="kurikulum">
                <option value="">-- Pilih Bobot --</option>
                <option value="5">Sangat Penting</option>
                <option value="4">Penting</option>
                <option value="3">Cukup Penting</option>
                <option value="2">Kurang Penting</option>
                <option value="1">Tidak Penting</option>
              </select>
              <div class="invalid-feedback">
                Mohon pilih salah satu.
              </div>
            </td>
          </tr>
          <tr>
            <td>Apakah <b>Jarak</b> sangat penting bagi anda?</td>
            <td>
              <select class="form-control form-kriteria form-control-sm <?= (form_error('jarak')) ? 'is-invalid' : '' ?> " name="jarak">
                <option value="">-- Pilih Bobot --</option>
                <option value="5">Sangat Penting</option>
                <option value="4">Penting</option>
                <option value="3">Cukup Penting</option>
                <option value="2">Kurang Penting</option>
                <option value="1">Tidak Penting</option>
              </select>
              <div class="invalid-feedback">
                Mohon pilih salah satu.
              </div>
            </td>
          </tr>
        </tbody>
      </table>
      <button type="submit" class="btn btn-info" style="margin-left: 50%; transform: translateX(-50%);">Lihat Rekomendasi</button>
    </form>
  </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->