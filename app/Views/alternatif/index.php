<?= $this->extend('template/content'); ?>

<?php $this->section('content'); ?>

<div class="section">
  <div class="row">
    <div class="col-md-12">

      <h1 class="text-gray-900"><?= $judul; ?></h1>

      <?php if (session('role') === 'Admin') : ?>
        <div class="alert alert-primary mt-3" role="alert">
          <strong>
            Pastikan telah memasukkan semua data kriteria dan sub kriteria, hal ini juga akan digunakan pada form tambah data alternatif.
          </strong>
        </div>
      <?php endif; ?>

      <div class="row mt-4">
        <div class="col-md-12">
          <div class="card shadow">
            <div class="card-header">
              <button class="btn btn-primary btn-tambah" data-toggle="modal" data-target="#modalBoxTambah" data-backdrop="static" data-keyboard="false"><i class="fas fa fa-plus"></i> Tambah</button>
              <button class="btn btn-danger btn-hapus"><i class="fas fa fa-trash-alt"></i> Hapus</button>
              <button class="btn btn-success btn-ubah"><i class="fas fa fa-edit"></i> Ubah</button>
            </div>
            <div class="card-body">
              <table class="table table-bordered table-striped table-alternatif" id="dataTable">
                <thead>
                  <th>
                    <input type="checkbox" id="checkboxes">
                  </th>
                  <th>No.</th>
                  <th>Kode</th>
                  <th>Nama</th>
                  <th>Detail</th>
                </thead>
                <tbody>
                  <?php foreach ($alternatif as $key => $row) : ?>
                    <tr>
                      <td>
                        <input type="checkbox" name="id[]" class="checkbox" value="<?= $row['id_alternatif']; ?>">
                      </td>
                      <td><?= $key + 1; ?></td>
                      <td><?= $row['kode']; ?></td>
                      <td><?= $row['nama']; ?></td>
                      <td>
                        <button type="button" class="btn btn-info btn-detail" data-id="<?= $row['id_alternatif']; ?>"><i class=" fas fa-eye"></i></button>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
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

            <form action="/alternatif/create" method="POST" class="formSubmit" id="formTambah">
              <div class="modal-body">
                <?= csrf_field(); ?>

                <div class="row">
                  <div class="col-xl-3">
                    <div class="form-group">
                      <label for="kode">Kode</label>
                      <input type="text" name="kode" id="kode" class="form-control" placeholder="misal. A1..">
                      <div class="invalid-feedback"></div>
                    </div>
                    <div class="form-group">
                      <label for="nama">Nama Produk</label>
                      <input type="text" name="nama" id="nama" class="form-control" placeholder="misal. Laptop Asus 2022..">
                      <div class="invalid-feedback"></div>
                    </div>
                    <div class="form-group">
                      <label for="harga">Harga</label>
                      <input type="text" name="harga" id="harga" class="form-control" placeholder="misal. 6000000">
                      <div class="invalid-feedback"></div>
                    </div>
                    <div class="form-group">
                      <label for="url_produk">URL Produk</label>
                      <input type="text" name="url_produk" id="url_produk" class="form-control" placeholder="misal. shopee.co.id/laptop-asus-2022..">
                      <div class="invalid-feedback"></div>
                    </div>
                  </div>

                  <div class="col-xl-3">
                    <div class="form-group">
                      <label for="rating_produk">Rating Produk</label>
                      <input type="text" name="rating_produk" id="rating_produk" class="form-control" placeholder="misal. 4.8">
                      <div class="invalid-feedback"></div>
                    </div>
                    <div class="form-group">
                      <label for="merk">Merk</label>
                      <select name="merk" id="merk" class="form-control">
                        <option value="">-- Pilih --</option>
                        <?php foreach ($merk_options as $row) : ?>
                          <option value="<?= $row['nama']; ?>"><?= $row['nama']; ?></option>
                        <?php endforeach; ?>
                      </select>
                      <div class="invalid-feedback"></div>
                    </div>
                    <div class="form-group">
                      <label for="prosesor">Prosesor</label>
                      <select name="prosesor" id="prosesor" class="form-control">
                        <option value="">-- Pilih --</option>
                        <?php foreach ($prosesor_options as $row) : ?>
                          <option value="<?= $row['nama']; ?>"><?= $row['nama']; ?></option>
                        <?php endforeach; ?>
                      </select>
                      <div class="invalid-feedback"></div>
                    </div>
                    <div class="form-group">
                      <label for="kapasitas_ram">Kapasitas Memori RAM (GB)</label>
                      <input type="number" name="kapasitas_ram" id="kapasitas_ram" class="form-control" placeholder="misal. 8..">
                      <div class="invalid-feedback"></div>
                    </div>
                  </div>

                  <div class="col-xl-3">
                    <div class="form-group">
                      <label for="tipe_penyimpanan">Tipe Penyimpanan</label>
                      <select name="tipe_penyimpanan" id="tipe_penyimpanan" class="form-control">
                        <option value="">-- Pilih --</option>
                        <?php foreach ($tipe_penyimpanan_options as $row) : ?>
                          <option value="<?= $row['nama']; ?>"><?= $row['nama']; ?></option>
                        <?php endforeach; ?>
                      </select>
                      <div class="invalid-feedback"></div>
                    </div>
                    <div class="form-group">
                      <label for="kapasitas_penyimpanan">Kapasitas Penyimpanan (GB)</label>
                      <input type="number" name="kapasitas_penyimpanan" id="kapasitas_penyimpanan" class="form-control" placeholder="misal. 500..">
                      <div class="invalid-feedback"></div>
                    </div>
                    <div class="form-group">
                      <label for="ukuran_layar">Ukuran Layar (inch)</label>
                      <select name="ukuran_layar" id="ukuran_layar" class="form-control">
                        <option value="">-- Pilih --</option>
                        <?php foreach ($ukuran_layar_options as $row) : ?>
                          <option value="<?= $row['nama']; ?>"><?= $row['nama']; ?></option>
                        <?php endforeach; ?>
                      </select>
                      <div class="invalid-feedback"></div>
                    </div>
                    <div class="form-group">
                      <label for="kartu_grafis">Kartu Grafis</label>
                      <select name="kartu_grafis" id="kartu_grafis" class="form-control">
                        <option value="">-- Pilih --</option>
                        <?php foreach ($kartu_grafis_options as $row) : ?>
                          <option value="<?= $row['nama']; ?>"><?= $row['nama']; ?></option>
                        <?php endforeach; ?>
                      </select>
                      <div class="invalid-feedback"></div>
                    </div>
                  </div>

                  <div class="col-xl-3">
                    <div class="form-group">
                      <label for="sistem_operasi">Sistem Operasi</label>
                      <select name="sistem_operasi" id="sistem_operasi" class="form-control">
                        <option value="">-- Pilih --</option>
                        <?php foreach ($sistem_operasi_options as $row) : ?>
                          <option value="<?= $row['nama']; ?>"><?= $row['nama']; ?></option>
                        <?php endforeach; ?>
                      </select>
                      <div class="invalid-feedback"></div>
                    </div>
                    <div class="form-group">
                      <label for="masa_garansi">Garansi (bulan)</label>
                      <p class="small text-sm">Jika garansi tidak ada, isi dengan nilai 0</p>
                      <input type="text" name="masa_garansi" id="masa_garansi" class="form-control" placeholder="misal. 12..">
                      <div class="invalid-feedback"></div>
                    </div>
                    <div class="form-group">
                      <label for="kondisi_produk">Kondisi</label>
                      <select name="kondisi_produk" id="kondisi_produk" class="form-control">
                        <option value="">-- Pilih --</option>
                        <?php foreach ($kondisi_produk_options as $row) : ?>
                          <option value="<?= $row['nama']; ?>"><?= $row['nama']; ?></option>
                        <?php endforeach; ?>
                      </select>
                      <div class="invalid-feedback"></div>
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

      <!-- Modal Ubah -->
      <div class="modal fade" id="modalBoxUbah" tabindex="-1" role="dialog" aria-labelledby="modalBoxUbahTitle" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
          <div class="modal-content">
            <div class="modal-header badge-primary">
              <h5 class="modal-title">Ubah <?= $judul; ?></h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>

            <form action="/alternatif/update" method="POST" class="formSubmit" id="formUbah">
              <div class="modal-body">
                <?= csrf_field(); ?>

                <input type="hidden" name="id_alternatif">

                <div class="row">
                  <div class="col-xl-3">
                    <div class="form-group">
                      <label for="kode_ubah">Kode</label>
                      <input type="text" name="kode" id="kode_ubah" class="form-control" placeholder="misal. A1..">
                      <div class="invalid-feedback"></div>
                    </div>
                    <div class="form-group">
                      <label for="nama_ubah">Nama Produk</label>
                      <input type="text" name="nama" id="nama_ubah" class="form-control" placeholder="misal. Laptop Asus 2022..">
                      <div class="invalid-feedback"></div>
                    </div>
                    <div class="form-group">
                      <label for="harga_ubah">Harga</label>
                      <input type="text" name="harga" id="harga_ubah" class="form-control" placeholder="misal. 6.000.000..">
                      <div class="invalid-feedback"></div>
                    </div>
                    <div class="form-group">
                      <label for="url_produk_ubah">URL Produk</label>
                      <input type="text" name="url_produk" id="url_produk_ubah" class="form-control" placeholder="misal. shopee.co.id/laptop-asus-2022..">
                      <div class="invalid-feedback"></div>
                    </div>
                  </div>

                  <div class="col-xl-3">
                    <div class="form-group">
                      <label for="rating_produk_ubah">Rating Produk</label>
                      <input type="text" name="rating_produk" id="rating_produk_ubah" class="form-control" placeholder="misal. 4.8">
                      <div class="invalid-feedback"></div>
                    </div>
                    <div class="form-group">
                      <label for="merk_ubah">Merk</label>
                      <select name="merk" id="merk" class="form-control">
                        <option value="">-- Pilih --</option>
                        <?php foreach ($merk_options as $row) : ?>
                          <option value="<?= $row['nama']; ?>"><?= $row['nama']; ?></option>
                        <?php endforeach; ?>
                      </select>
                      <div class="invalid-feedback"></div>
                    </div>
                    <div class="form-group">
                      <label for="prosesor_ubah">Prosesor</label>
                      <select name="prosesor" id="prosesor" class="form-control">
                        <option value="">-- Pilih --</option>
                        <?php foreach ($prosesor_options as $row) : ?>
                          <option value="<?= $row['nama']; ?>"><?= $row['nama']; ?></option>
                        <?php endforeach; ?>
                      </select>
                      <div class="invalid-feedback"></div>
                    </div>
                    <div class="form-group">
                      <label for="kapasitas_ram_ubah">Kapasitas Memori RAM (GB)</label>
                      <input type="number" name="kapasitas_ram" id="kapasitas_ram_ubah" class="form-control" placeholder="misal. 8..">
                      <div class="invalid-feedback"></div>
                    </div>
                  </div>

                  <div class="col-xl-3">
                    <div class="form-group">
                      <label for="tipe_penyimpanan_ubah">Tipe Penyimpanan</label>
                      <select name="tipe_penyimpanan" id="tipe_penyimpanan" class="form-control">
                        <option value="">-- Pilih --</option>
                        <?php foreach ($tipe_penyimpanan_options as $row) : ?>
                          <option value="<?= $row['nama']; ?>"><?= $row['nama']; ?></option>
                        <?php endforeach; ?>
                      </select>
                      <div class="invalid-feedback"></div>
                    </div>
                    <div class="form-group">
                      <label for="kapasitas_penyimpanan_ubah">Kapasitas Penyimpanan (GB)</label>
                      <input type="number" name="kapasitas_penyimpanan" id="kapasitas_penyimpanan_ubah" class="form-control" placeholder="misal. 500..">
                      <div class="invalid-feedback"></div>
                    </div>
                    <div class="form-group">
                      <label for="ukuran_layar_ubah">Ukuran Layar (inch)</label>
                      <select name="ukuran_layar" id="ukuran_layar" class="form-control">
                        <option value="">-- Pilih --</option>
                        <?php foreach ($ukuran_layar_options as $row) : ?>
                          <option value="<?= $row['nama']; ?>"><?= $row['nama']; ?></option>
                        <?php endforeach; ?>
                      </select>
                      <div class="invalid-feedback"></div>
                    </div>
                    <div class="form-group">
                      <label for="kartu_grafis_ubah">Kartu Grafis</label>
                      <select name="kartu_grafis" id="kartu_grafis" class="form-control">
                        <option value="">-- Pilih --</option>
                        <?php foreach ($kartu_grafis_options as $row) : ?>
                          <option value="<?= $row['nama']; ?>"><?= $row['nama']; ?></option>
                        <?php endforeach; ?>
                      </select>
                      <div class="invalid-feedback"></div>
                    </div>
                  </div>

                  <div class="col-xl-3">
                    <div class="form-group">
                      <label for="sistem_operasi_ubah">Sistem Operasi</label>
                      <select name="sistem_operasi" id="sistem_operasi" class="form-control">
                        <option value="">-- Pilih --</option>
                        <?php foreach ($sistem_operasi_options as $row) : ?>
                          <option value="<?= $row['nama']; ?>"><?= $row['nama']; ?></option>
                        <?php endforeach; ?>
                      </select>
                      <div class="invalid-feedback"></div>
                    </div>
                    <div class="form-group">
                      <label for="masa_garansi_ubah">Garansi (bulan)</label>
                      <p class="small text-sm">Jika garansi tidak ada, isi dengan nilai 0</p>
                      <input type="text" name="masa_garansi" id="masa_garansi_ubah" class="form-control" placeholder="misal. 12..">
                      <div class="invalid-feedback"></div>
                    </div>
                    <div class="form-group">
                      <label for="kondisi_produk_ubah">Kondisi</label>
                      <select name="kondisi_produk" id="kondisi_produk" class="form-control">
                        <option value="">-- Pilih --</option>
                        <?php foreach ($kondisi_produk_options as $row) : ?>
                          <option value="<?= $row['nama']; ?>"><?= $row['nama']; ?></option>
                        <?php endforeach; ?>
                      </select>
                      <div class="invalid-feedback"></div>
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

      <!-- Modal Detail -->
      <div class="modal fade" id="modalBoxDetail" tabindex="-1" role="dialog" aria-labelledby="modalBoxDetailTitleId" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
          <div class="modal-content">
            <div class="modal-header badge-primary">
              <h5 class="modal-title">Detail <?= $judul; ?></h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="row">
                <div class="col-12">
                  <div class="card shadow card-detail">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-md-3 text-gray-900">Kode Alternatif</div>
                        <div class="col-md-1 d-none d-md-block">:</div>
                        <div class="col-md-8 kode"></div>
                      </div>
                      <div class="row">
                        <div class="col-md-3 text-gray-900">Nama Produk</div>
                        <div class="col-md-1 d-none d-md-block">:</div>
                        <div class="col-md-8 nama"></div>
                      </div>
                      <div class="row">
                        <div class="col-md-3 text-gray-900">Harga</div>
                        <div class="col-md-1 d-none d-md-block">:</div>
                        <div class="col-md-8 harga"></div>
                      </div>
                      <div class="row">
                        <div class="col-md-3 text-gray-900">Rating Produk</div>
                        <div class="col-md-1 d-none d-md-block">:</div>
                        <div class="col-md-8 rating_produk"></div>
                      </div>
                      <div class="row">
                        <div class="col-md-3 text-gray-900">Merk</div>
                        <div class="col-md-1 d-none d-md-block">:</div>
                        <div class="col-md-8 merk"></div>
                      </div>
                      <div class="row">
                        <div class="col-md-3 text-gray-900">Prosesor</div>
                        <div class="col-md-1 d-none d-md-block">:</div>
                        <div class="col-md-8 prosesor"></div>
                      </div>
                      <div class="row">
                        <div class="col-md-3 text-gray-900">Kapasitas Memori RAM (GB)</div>
                        <div class="col-md-1 d-none d-md-block">:</div>
                        <div class="col-md-8 kapasitas_ram"></div>
                      </div>
                      <div class="row">
                        <div class="col-md-3 text-gray-900">Tipe Penyimpanan</div>
                        <div class="col-md-1 d-none d-md-block">:</div>
                        <div class="col-md-8 tipe_penyimpanan"></div>
                      </div>
                      <div class="row">
                        <div class="col-md-3 text-gray-900">Kapasitas Penyimpanan (GB)</div>
                        <div class="col-md-1 d-none d-md-block">:</div>
                        <div class="col-md-8 kapasitas_penyimpanan"></div>
                      </div>
                      <div class="row">
                        <div class="col-md-3 text-gray-900">Ukuran Layar</div>
                        <div class="col-md-1 d-none d-md-block">:</div>
                        <div class="col-md-8 ukuran_layar"></div>
                      </div>
                      <div class="row">
                        <div class="col-md-3 text-gray-900">Kartu Grafis</div>
                        <div class="col-md-1 d-none d-md-block">:</div>
                        <div class="col-md-8 kartu_grafis"></div>
                      </div>
                      <div class="row">
                        <div class="col-md-3 text-gray-900">Sistem Operasi</div>
                        <div class="col-md-1 d-none d-md-block">:</div>
                        <div class="col-md-8 sistem_operasi"></div>
                      </div>
                      <div class="row">
                        <div class="col-md-3 text-gray-900">Masa Garansi (bulan)</div>
                        <div class="col-md-1 d-none d-md-block">:</div>
                        <div class="col-md-8 masa_garansi"></div>
                      </div>
                      <div class="row">
                        <div class="col-md-3 text-gray-900">Kondisi Produk</div>
                        <div class="col-md-1 d-none d-md-block">:</div>
                        <div class="col-md-8 kondisi_produk"></div>
                      </div>
                      <div class="row">
                        <div class="col-md-3 text-gray-900">URL Produk</div>
                        <div class="col-md-1 d-none d-md-block">:</div>
                        <div class="col-md-8 url_produk"></div>
                      </div>
                    </div>
                  </div>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>

<?php $this->endSection(); ?>

<?php $this->section('custom-js') ?>
<script>
  $(document).ready(function() {

    const formTambah = $('#formTambah')
    formTambah.submit(function(e) {
      e.preventDefault()

      requestSaveData(formTambah, '#modalBoxTambah')

      removeClasses('#formTambah')
    })

    $('.btn-hapus').on('click', function() {
      requestDeleteData('/alternatif/delete')
    })

    $('.btn-ubah').on('click', function(e) {
      requestGetDataById('/alternatif/getDataById')
    })

    const formUbah = $('#formUbah')
    formUbah.submit(function(e) {
      e.preventDefault()

      requestSaveData(formUbah, '#modalBoxUbah')

      removeClasses('#formUbah')
    })

    $(document).on('click', '.btn-detail', function() {
      let id = $(this).data('id')
      requestGetDataById('/alternatif/getDataById', '', id)
    })
  })

  $(document).on('click', '.btn-detail', function() {
    let id = $(this).data('id')
    requestGetDataById('/alternatif/getDataById', '', id)
  })
</script>
<?= $this->endSection(); ?>
