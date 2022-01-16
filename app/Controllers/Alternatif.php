<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Alternatif as ModelsAlternatif;

class Alternatif extends BaseController
{
  public function __construct()
  {
    $this->model = new ModelsAlternatif();
  }

  public function index()
  {
    $data = [
      'judul' => 'Alternatif',
      'alternatif' => $this->model->findAll(),
    ];

    return view('alternatif/index', $data);
  }

  public function create()
  {

    $harga = str_replace(['Rp', '.'], '', $this->request->getPost('harga'));
    $data = [
      'kode' => $this->request->getPost('kode'),
      'nama' => $this->request->getPost('nama'),
      'harga' => $harga,
      'rating_produk' => $this->request->getPost('rating_produk'),
      'merk' => $this->request->getPost('merk'),
      'prosesor' => $this->request->getPost('prosesor'),
      'kapasitas_ram' => $this->request->getPost('kapasitas_ram'),
      'tipe_penyimpanan' => $this->request->getPost('tipe_penyimpanan'),
      'kapasitas_penyimpanan' => $this->request->getPost('kapasitas_penyimpanan'),
      'ukuran_layar' => $this->request->getPost('ukuran_layar'),
      'kartu_grafis' => $this->request->getPost('kartu_grafis'),
      'sistem_operasi' => $this->request->getPost('sistem_operasi'),
      'masa_garansi' => $this->request->getPost('masa_garansi'),
      'kondisi_produk' => $this->request->getPost('kondisi_produk'),
      'url_produk' => $this->request->getPost('url_produk'),
    ];

    if ($this->model->save($data) === FALSE) {
      return $this->response->setJSON(['status' => FALSE, 'errors' => $this->model->errors()]);
    } else {
      return $this->response->setJSON(['status' => TRUE, 'message' => 'Data berhasil ditambahkan']);
    }
  }

  public function delete()
  {
    $ids = $this->request->getPost('id');
    $this->model->whereIn('id', $ids)->delete();
    return $this->response->setJSON(['status' => TRUE, 'message' => 'Data berhasil dihapus']);
  }

  public function getDataById()
  {
    $id = $this->request->getPost('id');
    $data = $this->model->find($id);
    return $this->response->setJSON($data);
  }

  public function update()
  {
    $data = [
      'id' => $this->request->getPost('id'),
      'kode' => $this->request->getPost('kode'),
      'nama' => $this->request->getPost('nama'),
      'harga' => $this->request->getPost('harga'),
      'rating_produk' => $this->request->getPost('rating_produk'),
      'merk' => $this->request->getPost('merk'),
      'prosesor' => $this->request->getPost('prosesor'),
      'kapasitas_ram' => $this->request->getPost('kapasitas_ram'),
      'tipe_penyimpanan' => $this->request->getPost('tipe_penyimpanan'),
      'kapasitas_penyimpanan' => $this->request->getPost('kapasitas_penyimpanan'),
      'ukuran_layar' => $this->request->getPost('ukuran_layar'),
      'kartu_grafis' => $this->request->getPost('kartu_grafis'),
      'sistem_operasi' => $this->request->getPost('sistem_operasi'),
      'masa_garansi' => $this->request->getPost('masa_garansi'),
      'kondisi_produk' => $this->request->getPost('kondisi_produk'),
      'url_produk' => $this->request->getPost('url_produk'),
    ];

    if ($this->model->save($data) === FALSE) {
      return $this->response->setJSON(['status' => FALSE, 'errors' => $this->model->errors()]);
    } else {
      return $this->response->setJSON(['status' => TRUE, 'message' => 'Data berhasil diperbarui']);
    }
  }
}
