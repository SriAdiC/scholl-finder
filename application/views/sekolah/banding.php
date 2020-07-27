<!-- Begin Page Content -->
<div class="container-fluid">



  <table class="table table-banding">
    <thead class="bg bg-gray-200">
      <tr>
        <th scope="col" style="width: 10%;" class="text-center">Hapus</th>
        <th scope="col">Pilihan Sekolah</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($sklp as $s) : ?>
        <tr>
          <th scope="row" class="text-center">
            <a href="<?= base_url('sppk/hapus/') . $s['id'] . '?rkc=' . $range['id']; ?>"><i class="fas fa-times-circle text-secondary"></i></a>
          </th>
          <td>
            <div class="col-md-2">
              <img src="<?= base_url('assets/'); ?>img/sekolah/<?= $s['foto']; ?>" alt="sekolah" class="sampul">
            </div>
            <div class="biodata col-md-10">
              <a href="<?= base_url('sppk/detail/') . $s['id']; ?>">
                <h6><?= $s['nama']; ?></h6>
              </a>
              <table class="table">
                <tbody>
                  <tr>
                    <td style="width: 30%;">Status / Akreditasi</td>
                    <td><?= $s['status']; ?> / <?= $s['akreditasi']; ?></td>
                  </tr>
                  <tr>
                    <td>Sarana Prasarana</td>
                    <td><?= $s['sarpras']; ?></td>
                  </tr>
                  <tr>
                    <td>Kurikulum</td>
                    <td><?= $s['kurikulum']; ?></td>
                  </tr>
                  <tr>
                    <td>Website / Email</td>
                    <td><?= $s['website'] . ' / ' . $s['email'] ?></td>
                  </tr>
                  <tr>
                    <td>Jarak</td>
                    <td><?= $range['jarak']; ?> Km <span class="small text-danger">(Jarak di tentukan dari Kec. <?= $range['kecamatan']; ?> ke Kec. Balung)</span></td>

                  </tr>
                  <tr>
                    <td>Lokasi</td>
                    <td><?= $s['alamat']; ?></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </td>
        </tr>
      <?php endforeach ?>
    </tbody>
  </table>
  <div class="button">
    <a href="<?= base_url('sppk'); ?>" class="btn btn-secondary mb-3">Kembali</a>
    <a href="<?= base_url('sppk/pembobotan'); ?>" class="btn btn-primary mb-3" style="position: relative; left: 0;">Mulai Pembobotan</a>
  </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->