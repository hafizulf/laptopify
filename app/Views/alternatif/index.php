<?= $this->extend('template/content'); ?>

<?php $this->section('content'); ?>

<div class="section">
  <div class="row">
    <div class="col-md-12">

      <h1 class="text-gray-900"><?= $judul; ?></h1>

      <div class="row mt-4">
        <div class="col-md-12">
          <div class="card shadow">
            <div class="card-header">
              <button class="btn btn-primary btn-tambah" data-toggle="modal" data-target="#modalBoxTambah" data-backdrop="static" data-keyboard="false"><i class="fas fa fa-plus"></i> Tambah</button>
              <button class="btn btn-danger btn-hapus"><i class="fas fa fa-trash-alt"></i> Hapus</button>
              <button class="btn btn-success btn-ubah"><i class="fas fa fa-edit"></i> Ubah</button>
            </div>
            <div class="card-body">
              <?php if ($alternatif) : ?>
                <table class="table table-bordered table-striped table-kriteria">
                  <thead>
                    <th>
                      <input type="checkbox" id="checkboxes">
                    </th>
                    <th>No.</th>
                  </thead>
                  <tbody>
                    <?php foreach ($alternatif->getResultArray() as $key => $row) : ?>
                      <tr>
                        <td>
                          <input type="checkbox" name="id[]" class="checkbox" value="<?= $row['id']; ?>">
                        </td>
                        <td><?= $key + 1; ?></td>
                      </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              <?php else : ?>
                <h3 class="text-center">DATA BELUM ADA</h3>
              <?php endif; ?>
            </div>
          </div>

        </div>
      </div>

      <!-- Modal -->
      <div class="modal fade" id="modalBoxTambah" tabindex="-1" role="dialog" aria-labelledby="modalBoxTambahTitle" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
          <div class="modal-content">
            <div class="modal-header badge-primary">
              <h5 class="modal-title">Tambah <?= $judul; ?></h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>

            <form action="/kriteria/create" method="POST" class="formSubmit" id="formTambah">
              <div class="modal-body">
                <?= csrf_field(); ?>

                <div class="row">
                  <div class="col-3">
                    <div class="form-group">
                      <label for="kode">Kode</label>
                      <input type="text" name="kode" id="kode" class="form-control" placeholder="misal. A1..">
                    </div>
                    <div class="form-group">
                      <label for="nama">Nama Produk</label>
                      <input type="text" name="nama" id="nama" class="form-control" placeholder="misal. Laptop Asus 2022..">
                    </div>
                    <div class="form-group">
                      <label for="harga">Harga</label>
                      <input type="number" name="harga" id="harga" class="form-control" placeholder="misal. 10000000..">
                    </div>
                    <div class="form-group">
                      <label for="url_produk">URL Produk</label>
                      <input type="text" name="url_produk" id="url_produk" class="form-control" placeholder="misal. 10000000..">
                    </div>
                  </div>

                  <div class="col-3">
                    <div class="form-group">
                      <label for="rating_produk">Rating Produk</label>
                      <input type="text" name="rating_produk" id="rating_produk" class="form-control" placeholder="misal. 4,8..">
                    </div>
                    <div class="form-group">
                      <label for="merk">Merk</label>
                      <input type="text" name="merk" id="merk" class="form-control" placeholder="misal. Lenovo..">
                    </div>
                    <div class="form-group">
                      <label for="prosesor">Prosesor</label>
                      <input type="text" name="prosesor" id="prosesor" class="form-control" placeholder="misal. Lenovo..">
                    </div>
                    <div class="form-group">
                      <label for="kapasitas_ram">Kapasitas Memori RAM (GB)</label>
                      <input type="number" name="kapasitas_ram" id="kapasitas_ram" class="form-control" placeholder="misal. 8..">
                    </div>
                  </div>

                  <div class="col-3">
                    <div class="form-group">
                      <label for="tipe_penyimpanan">Tipe Penyimpanan</label>
                      <input type="number" name="tipe_penyimpanan" id="tipe_penyimpanan" class="form-control" placeholder="misal. 500..">
                    </div>
                    <div class="form-group">
                      <label for="kapasitas_penyimpanan">Kapasitas Penyimpanan (GB)</label>
                      <input type="number" name="kapasitas_penyimpanan" id="kapasitas_penyimpanan" class="form-control" placeholder="misal. 500..">
                    </div>
                    <div class="form-group">
                      <label for="ukuran_layar">Ukuran Layar (inch)</label>
                      <select name="ukuran_layar" id="ukuran_layar" class="form-control">
                        <option value="">-- Pilih --</option>
                        <option value="ultra portable">Ultra Portable (<13 inch)</option>
                        <option value="portable">Portable (13-14,9 inch)</option>
                        <option value="standard">Standard (15-16,5 inch)</option>
                        <option value="large">Large (> 17,3 inch)</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="kartu_grafis">Kartu Grafis</label>
                      <input type="text" name="kartu_grafis" id="kartu_grafis" class="form-control" placeholder="misal. intel nvidia..">
                    </div>
                  </div>

                  <div class="col-3">
                    <div class="form-group">
                      <label for="sistem_operasi">Sistem Operasi</label>
                      <input type="text" name="sistem_operasi" id="sistem_operasi" class="form-control" placeholder="misal. windows..">
                    </div>
                    <div class="form-group">
                      <label for="masa_garansi">Garansi (bulan)</label>
                      <input type="number" name="masa_garansi" id="masa_garansi" class="form-control" placeholder="misal. 12..">
                    </div>
                    <div class="form-group">
                      <label for="kondisi_produk">Kondisi</label>
                      <select name="kondisi_produk" id="kondisi_produk" class="form-control">
                        <option value="">-- Pilih --</option>
                        <option value="Baru">Baru</option>
                        <option value="Bekas">Bekas</option>
                      </select>
                    </div>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary btn-simpan"><i class="fas fa fa-save"></i> Simpan</button>
              </div>
            </form>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>

<?php $this->endSection(); ?>
